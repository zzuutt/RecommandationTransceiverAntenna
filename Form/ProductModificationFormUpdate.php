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
class ProductModificationFormUpdate extends BaseForm
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
        $list_category_transceiver = explode(',',ConfigQuery::read("Category_Recommandation_Transceiver", "0"));
        $list_category_antenna = explode(',',ConfigQuery::read("Category_Recommandation_Antenna", "0"));
        
        //ID category to research and List recommendation for the current product
        $category_search_product = $list_category_transceiver;
        if(in_array($category_product, $list_category_transceiver)) {
          $category_search_product = $list_category_antenna;
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

        $array_display_product =  array();
        $array_recommandationTransceiverAntenna =  array();

        //List product for the research category
        foreach($category_search_product as $r) {
            $search_display_product = array();
            $search_display_product = ProductQuery::create()->joinProductCategory()
                ->where('ProductCategory.category_id = ?', $r)
                ->find();
            foreach($search_display_product as $display_product) {
                $array_display_product[] = $display_product->getId();
            }
        }

        

        foreach($list_recommandationTransceiverAntenna as $display_product) {
          if($category_product == $category_transceiver) {
            $array_recommandationTransceiverAntenna[] = $display_product->getAntennaId();
          }
          else {
            $array_recommandationTransceiverAntenna[] = $display_product->getTransceiverId();
          }
        }
        
        //ID product unaffected for the current product
        $product_unaffected = array();
        $product_unaffected = array_diff($array_display_product,$array_recommandationTransceiverAntenna);
         
        //public ProductI18nQuery filterById(mixed $id = null, string $comparison = null)
        //generate List for the choice
        $choicesList = array();
        foreach($product_unaffected as $display_product) {
            $title = ProductI18nQuery::Create()->findOneById($display_product)->getTitle();
            $choicesList[$display_product] = $title;
        }        
        //Tlog::getInstance()->error("Recommandation Form search product :".$search_display_product);        

        $searchRecommandationList = RecommandationtransceiverantennaRecommandationQuery::create()->orderById()->find();
        $recommandationList = array();
        foreach($searchRecommandationList as $r){
            $recommandationList[$r->getId()] = $r->getCode();
        }
        $this->formBuilder
            ->add('listproduct', 'choice', [
                "choices" => $choicesList,
                'multiple' => true,
                'expanded' => false,
                'label' => Translator::getInstance()->trans('Select the product')
                ])

            ->add('recommandation', 'choice', [
                "choices" => $recommandationList,
                'multiple' => false
            ])
            ;
    }

    /**
     * @return string the name of you form. This name must be unique
     */
    public function getName()
    {
        return 'recommandationtransceiverantenna_update_product';
    }
}