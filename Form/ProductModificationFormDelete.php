<?php
/*************************************************************************************/
/*                                                                                   */
/*      for Thelia	                                                                 */
/*                                                                                   */
/*      Copyright (c) Zzuutt34                                                       */
/*      email : zzuutt34@free.fr                                                     */
/*                                                                                   */
/*************************************************************************************/

namespace RecommandationTransceiverAntenna\Form;

use RecommandationTransceiverAntenna\RecommandationTransceiverAntenna;
use Symfony\Component\Validator\Constraints\NotBlank;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;
use Thelia\Model\ConfigQuery;
use Thelia\Model\ProductCategoryQuery;
use Thelia\Model\ProductQuery;
use Thelia\Model\Base\ProductI18nQuery;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaQuery;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationQuery;
use Thelia\Log\Tlog;


/**
 * Class ConfigurationForm
 * @package RecommandationTransceiverAntenna\Form
 * @author zzuutt <zzuutt34@free.fr>
 */
class ProductModificationFormDelete extends BaseForm
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
        //ID current product
        $productId = $this->getRequest()->get('product_id');
        //ID category of the current product
        $category_product = ProductCategoryQuery::Create()
                            ->filterByProductId($productId)
                            ->findOne()
                            ->getCategoryId()
                            ;
        //Read config
        $category_transceiver = ConfigQuery::read("Category_Recommandation_Transceiver", "0");
        $category_antenna = ConfigQuery::read("Category_Recommandation_Antenna", "0");
        
        //ID category to research and List recommendation for the current product
        $category_search_product = $category_transceiver;
        if($category_product == $category_transceiver) {
          $category_search_product = $category_antenna;
          $list_recommandationTransceiverAntenna = RecommandationtransceiverantennaQuery::Create()
                                                   ->filterByTransceiverId($productId)
                                                   ->find()
                                                   ;
        }
        else {
          $list_recommandationTransceiverAntenna = RecommandationtransceiverantennaQuery::Create()
                                                   ->filterByAntennaId($productId)
                                                   ->find()
                                                   ;
        }
    
        $recommandationList = array();
        foreach($list_recommandationTransceiverAntenna as $display_product) {
          if($category_product == $category_transceiver) {
              $title = ProductI18nQuery::Create()->findOneById($display_product->getAntennaId())->getTitle();
              $recommandationList[$display_product->getAntennaId()] = $title;
          }
          else {
              $title = ProductI18nQuery::Create()->findOneById($display_product->getTransceiverId())->getTitle();
              $recommandationList[$display_product->getTransceiverId()] = $title;
          }
        }
    
        $this->formBuilder
            ->add('listproductDelete', 'choice', [
                'choices' => $recommandationList,
                'multiple' => true,
                'expanded' => false,
                'label' => Translator::getInstance()->trans('Select the product')
            ])
            ->add('recommandationDelete','hidden')
            ;
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return 'recommandationtransceiverantenna_delete_product';
    }
}