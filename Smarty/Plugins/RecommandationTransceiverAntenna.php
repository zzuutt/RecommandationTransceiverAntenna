<?php
/*************************************************************************************/
/*                                                                                   */
/*      for Thelia	                                                                 */
/*                                                                                   */
/*      Copyright (c) Zzuutt34                                                       */
/*      email : zzuutt34@free.fr                                                     */
/*                                                                                   */
/*************************************************************************************/

namespace RecommandationTransceiverAntenna\Smarty\Plugins;

use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaQuery;
use Thelia\Core\Template\Smarty\AbstractSmartyPlugin;
use Thelia\Core\Template\Smarty\SmartyPluginDescriptor;

class RecommandationTransceiverAntenna extends AbstractSmartyPlugin
{

    /**
     * Check if transceiver is associated to antenna
     * @param $params
     * @return bool
     */
    public function TransceiverHasRecommandation($params)
    {
        $ret = false;
        
        if (isset($params['transceiver_id'])) {
           $recommandationTransceiverAssociation = RecommandationtransceiverantennaQuery::getTransceiverAssociation($params['transceiver_id']);
           if (null !== $recommandationTransceiverAssociation) {
               $ret = true;
           } else {
               $ret = false;
           }
        }

        return $ret;

    }

    /**
     * Check if antenna is associated to antenna
     * @param $params
     * @return bool
     */
    public function AntennaHasRecommandation($params)
    {
        $ret = false;
        
        if (isset($params['antenna_id'])) {
           $recommandationAntennaAssociation = RecommandationtransceiverantennaQuery::getAntennaAssociation($params['antenna_id']);
           if (null !== $recommandationAntennaAssociation) {
               $ret = true;
           } else {
               $ret = false;
           }
        }

        return $ret;

    }

    /**
     * Check if antenna is associated to antenna
     * @param $params
     * @return bool
     */
    public function TransceiverWithAntennaHasRecommandation($params)
    {
        $ret = false;

        if (isset($params['antenna_id']) && isset($params['transceiver_id'])) {
            $recommandationAntennaAssociation = RecommandationtransceiverantennaQuery::getTransceiverAntennaAssociation($params['transceiver_id'],$params['antenna_id']);
            if (null !== $recommandationAntennaAssociation) {
                $ret = true;
            } else {
                $ret = false;
            }
        }

        return $ret;

    }
    /**
     * @return an array of SmartyPluginDescriptor
     */
    public function getPluginDescriptors()
    {
        return array(
            new SmartyPluginDescriptor("function", "transceiver_has_recommandation", $this, "TransceiverHasRecommandation"),
            new SmartyPluginDescriptor("function", "antenna_has_recommandation", $this, "AntennaHasRecommandation"),
            new SmartyPluginDescriptor("function", "transceiver_with_antenna_has_recommandation", $this, "TransceiverWithAntennaHasRecommandation")
        );
    }
}
