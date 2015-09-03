<?php
/*************************************************************************************/
/*                                                                                   */
/*      for Thelia	                                                                 */
/*                                                                                   */
/*      Copyright (c) Zzuutt34                                                       */
/*      email : zzuutt34@free.fr                                                     */
/*                                                                                   */
/*************************************************************************************/

namespace RecommandationTransceiverAntenna\Controller;
use RecommandationTransceiverAntenna\Form\ConfigurationForm;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Model\ConfigQuery;
use Thelia\Tools\URL;


/**
 * Class ConfigurationController
 * @package RecommandationTransceiverAntenna\Controller
 * @author zzuutt <zzuutt34@free.fr>
 */
class ConfigurationController extends BaseAdminController
{

    public function configureAction()
    {
        if (null !== $response = $this->checkAuth(AdminResources::MODULE, 'recommandationtransceiverantenna', AccessManager::UPDATE)) {
            return $response;
        }

        $form = new ConfigurationForm($this->getRequest());
        $response = null;
        $error_msg = null;
        try {
            $configForm = $this->validateForm($form);

            ConfigQuery::write('Category_Recommandation_Transceiver', $configForm->get('category_transceiver')->getData(), false, true);
            ConfigQuery::write('Category_Recommandation_Antenna', $configForm->get('category_antenna')->getData(), false, true);
            // Redirect to the success URL,
            if ($this->getRequest()->get('save_mode') == 'stay') {
                // If we have to stay on the same page, redisplay the configuration page/
                $route = '/admin/module/RecommandationTransceiverAntenna';
            } else {
                // If we have to close the page, go back to the module back-office page.
                $route = '/admin/modules';
            }
            $response = RedirectResponse::create(URL::getInstance()->absoluteUrl($route));
        } catch (FormValidationException $e) {
            $error_msg = $this->createStandardFormValidationErrorMessage($e);
        } catch (\Exception $e) {
            $error_msg = $e->getMessage();
        }
        if (null !== $error_msg) {
            $this->setupFormErrorContext(
                'RecommandationTransceiverAntenna Configuration',
                $error_msg,
                $form,
                $e
            );
            $response = $this->render(
                'module-configure',
                ['module_code' => 'RecommandationTransceiverAntenna']
            );
        }
        return $response;
    }
} 