<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace RecommandationTransceiverAntenna\Form;
use RecommandationTransceiverAntenna\RecommandationTransceiverAntenna;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;
use Thelia\Model\ConfigQuery;


/**
 * Class ConfigurationForm
 * @package RecommandationTransceiverAntenna\Form
 * @author zzuutt <zzuutt34@free.fr>
 */
class ConfigurationForm extends BaseForm
{

    /**
     *
     * in this function you add all the fields you need for your Form.
     * Form this you have to call add method on $this->formBuilder attribute :
     *
     * $this->formBuilder->add("name", "text")
     *   ->add("email", "email", array(
     *           "attr" => array(
     *               "class" => "field"
     *           ),
     *           "label" => "email",
     *           "constraints" => array(
     *               new \Symfony\Component\Validator\Constraints\NotBlank()
     *           )
     *       )
     *   )
     *   ->add('age', 'integer');
     *
     * @return null
     */
    protected function buildForm()
    {
        $this->formBuilder
            ->add('category_transceiver', 'text', [
                'constraints' => [
                    new NotBlank()
                ],
                'label' => Translator::getInstance()->trans('IDs Category transceiver', [], RecommandationTransceiverAntenna::DOMAIN_NAME),
                'label_attr' => [
                    'for' => 'Category-Recommandation-Transceiver'
                ],
                'data' => ConfigQuery::read('Category_Recommandation_Transceiver', 0)
            ])
            ->add('category_antenna', 'text', [
                'constraints' => [
                    new NotBlank()
                ],
                'label' => Translator::getInstance()->trans('IDs Category antenna', [], RecommandationTransceiverAntenna::DOMAIN_NAME),
                'label_attr' => [
                    'for' => 'Category-Recommandation-Antenna'
                ],
                'data' => ConfigQuery::read('Category_Recommandation_Antenna', 0)
            ])
            ;
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return 'recommandationtransceiverantenna_config';
    }
}