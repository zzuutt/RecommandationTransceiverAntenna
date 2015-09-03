<?php

namespace RecommandationTransceiverAntenna\Model;

use RecommandationTransceiverAntenna\Model\Base\RecommandationtransceiverantennaQuery as BaseRecommandationtransceiverantennaQuery;


/**
 * Skeleton subclass for performing query and update operations on the 'RecommandationTransceiverAntenna' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class RecommandationtransceiverantennaQuery extends BaseRecommandationtransceiverantennaQuery
{
    /**
     * Load an existing relation from the database
     * @param $productId
     * @param $keywordId
     * @return ChildProductAssociatedKeyword
     */
    public static function getTransceiverAssociation($productId) {

        return self::create()
            ->filterByTransceiverId($productId)
            ->findOne();
    }
    
    public static function getAntennaAssociation($productId) {

        return self::create()
            ->filterByAntennaId($productId)
            ->findOne();
    }

    public static function getTransceiverAntennaAssociation($transceiverId,$antennaId) {

        return self::create()
            ->filterByAntennaId($antennaId)
            ->filterByTransceiverId($transceiverId)
            ->findOne();
    }} // RecommandationtransceiverantennaQuery
