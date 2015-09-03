<?php
/*************************************************************************************/
/*                                                                                   */
/*      for Thelia	                                                                 */
/*                                                                                   */
/*      Copyright (c) Zzuutt34                                                       */
/*      email : zzuutt34@free.fr                                                     */
/*                                                                                   */
/*************************************************************************************/

namespace RecommandationTransceiverAntenna\Loop;

use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaQuery;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18nQuery;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationQuery;

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseI18nLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;

use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;
use Thelia\Core\Template\Loop\Argument\Argument;

use Thelia\Type\TypeCollection;
use Thelia\Type;
use Thelia\Type\BooleanOrBothType;

use Thelia\Log\Tlog;

/**
 *
 * RecommandationTransceiverAntenna loop
 *
 *
 * Class RecommandationTransceiverAntenna
 * @package RecommandationTransceiverAntenna\Loop
 * @author zzuutt34
 */
class RecommandationTransceiverAntenna extends BaseI18nLoop implements PropelSearchLoopInterface
{
    protected $timestampable = true;

    /**
     * @return ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument('id'),
            Argument::createIntListTypeArgument('transceiver_id'),
            Argument::createIntListTypeArgument('antenna_id'),
            Argument::createIntListTypeArgument('recommandation_id')
        );
    }

    public function buildModelCriteria()
    {
        $id = $this->getId();
        $transceiver = $this->getTransceiverId();
        $antenna = $this->getAntennaId();
        $recommandation = $this->getRecommandationId();
        
        $search = RecommandationTransceiverAntennaQuery::create();
        
        if (!is_null($transceiver)) {
            $search->findByTransceiverId($transceiver);
        }


        if (!is_null($antenna)) {
            $search->findByAntennaId($antenna);
        }
        

        if (!is_null($recommandation)) {
            $search->findByRecommandationId($recommandation);
        }


        if (!is_null($id)) {
            $search->filterById($id, Criteria::IN);
        }
        
        return $search;

    }

    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $result) {

            $loopResultRow = new LoopResultRow($result);
            $loopResultRow
                ->set("ID", $result->getId())
                ->set("TRANSCEIVER_ID", $result->getTransceiverId())
                ->set("ANTENNA_ID", $result->getAntennaId())
                ->set("RECOMMANDATION_ID", $result->getRecommandationId())
            ;
            $this->addOutputFields($loopResultRow, $result);

            $loopResult->addRow($loopResultRow);
        }

        return $loopResult;

    }

}
