<?php
/*************************************************************************************/
/*                                                                                   */
/*      for Thelia	                                                                 */
/*                                                                                   */
/*      Copyright (c) Zzuutt34                                                       */
/*      email : zzuutt34@free.fr                                                     */
/*                                                                                   */
/*************************************************************************************/

namespace RecommandationTransceiverAntenna;

use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Install\Database;
use Thelia\Module\BaseModule;
use Thelia\Model\ConfigQuery;

class RecommandationTransceiverAntenna extends BaseModule
{
    const DOMAIN_NAME = "recommandationtransceiverantenna";
    /*
     * You may now override BaseModuleInterface methods, such as:
     * install, destroy, preActivation, postActivation, preDeactivation, postDeactivation
     *
     * Have fun !
     */
    public function postActivation(ConnectionInterface $con = null)
    {
        $database = new Database($con->getWrappedConnection());
        $database->insertSql(null, array(THELIA_ROOT . '/local/modules/RecommandationTransceiverAntenna/Config/thelia.sql'));
        ConfigQuery::write('Category_Recommandation_Transceiver', 0, false, true);
        ConfigQuery::write('Category_Recommandation_Antenna', 0, false, true);
    }
}
