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
 * RecommandationTransceiverAntenna_Recommandation loop
 *
 *
 * Class RecommandationTransceiverAntenna_Recommandation
 * @package RecommandationTransceiverAntenna\Loop
 * @author zzuutt34
 */
class RecommandationTransceiverAntennaRecommandation extends BaseI18nLoop implements PropelSearchLoopInterface
{
    protected $timestampable = true;

    /**
     * @return ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument('id'),
            Argument::createAnyTypeArgument('code')
        );
    }

    public function buildModelCriteria()
    {
        $search = RecommandationtransceiverantennaRecommandationQuery::create();

        /* manage translations */
        $this->configureI18nProcessing($search);

        $id = $this->getId();

        if (null !== $id) {
            $search->filterById($id, Criteria::IN);
        }

        $code = $this->getCode();

        if (null !== $code) {
            $search->filterByCode($code, Criteria::EQUAL);
        }

        return $search;
    }

    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $orderStatus) {
            $loopResultRow = new LoopResultRow($orderStatus);
            $loopResultRow->set("ID", $orderStatus->getId())
                ->set("IS_TRANSLATED", $orderStatus->getVirtualColumn('IS_TRANSLATED'))
                ->set("LOCALE", $this->locale)
                ->set("CODE", $orderStatus->getCode())
                ->set("TITLE", $orderStatus->getVirtualColumn('i18n_TITLE'))
            ;
            $this->addOutputFields($loopResultRow, $orderStatus);

            $loopResult->addRow($loopResultRow);
        }

        return $loopResult;
    }
}
