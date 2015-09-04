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
use RecommandationTransceiverAntenna\Form\ProductModificationFormDelete;

use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Core\Security\AccessManager;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Model\ProductQuery;
use Thelia\Model\ProductCategoryQuery;
use Thelia\Model\ConfigQuery;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaQuery;
use Thelia\Tools\URL;
//use Thelia\Tools\Redirect;

use Thelia\Log\Tlog;

/**
 * Class DeleteController
 * @author zzuutt <zzuutt34@free.fr>
 */
class DeleteController extends BaseAdminController
{

    public function deleteProductAssociation($product_id)
    {
        if (null !== $response = $this->checkAuth(AdminResources::MODULE, 'recommandationtransceiverantenna', AccessManager::UPDATE)) {
            return $response;
        }
        
        try {
            /*
             * Check if product exists
             */
            $product = ProductQuery::create()
                ->findPk($product_id);
            if ($product === null) {
                throw new \Exception("This product doesn't exist");
            }

            /*
             * Validate form
             */
            $form = new ProductModificationFormDelete($this->getRequest());

            $vform = $this->validateForm($form);

            //search product category
            $category = ProductCategoryQuery::create()->filterByProductId($product_id)
                        ->findOne()
                        ->getCategoryId()
                        ;

            //Read config
            $category_transceiver = ConfigQuery::read("Category_Recommandation_Transceiver", "0");
            $category_antenna = ConfigQuery::read("Category_Recommandation_Antenna", "0");
            $list_category_transceiver = explode(',',$category_transceiver);
            $list_category_antenna = explode(',',$category_antenna);

            $listproduct = $vform->get('listproductDelete')->getviewData();
            $recommandationDelete = $vform->get('recommandationDelete')->getData();


            if(in_array($category,$list_category_antenna)){
                foreach($listproduct as $p){
                    RecommandationtransceiverantennaQuery::create()
                        ->filterByAntennaId($product_id)
                        ->filterByTransceiverId($p)
                        ->filterByRecommandationId($recommandationDelete)
                        ->delete();
                }
            }
            if(in_array($category,$list_category_transceiver)){
                foreach($listproduct as $p){
                    RecommandationtransceiverantennaQuery::create()
                        ->filterByAntennaId($p)
                        ->filterByTransceiverId($product_id)
                        ->filterByRecommandationId($recommandationDelete)
                        ->delete();
                }
            }

            return $this->generateSuccessRedirect($form);

        } catch (FormValidationException $e) {
            $message = sprintf("Please check your input: %s", $e->getMessage());
        } catch (PropelException $e) {
            $message = $e->getMessage();
        } catch (\Exception $e) {
            $message = sprintf("Sorry, an error occured: %s", $e->getMessage()." ".$e->getFile());
        }

        if ($message !== false) {
            \Thelia\Log\Tlog::getInstance()->error(
                sprintf("Error during recommandation association update process : %s.", $message)
            );

            $form->setErrorMessage($message);

            $this->getParserContext()
                ->addForm($form)
                ->setGeneralError($message)
            ;
        }

        // Redirect to current folder
        return $this->generateRedirectFromRoute(
            'admin.products.update',
            array(),
            array('product_id' => $product_id, 'current_tab' => 'modules')
        );
  }
}
 