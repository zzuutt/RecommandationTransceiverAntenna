<?php

namespace RecommandationTransceiverAntenna\Model\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18nQuery;


/**
 * This class defines the structure of the 'RecommandationTransceiverAntenna_recommandation_i18n' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RecommandationtransceiverantennaRecommandationI18nTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'RecommandationTransceiverAntenna.Model.Map.RecommandationtransceiverantennaRecommandationI18nTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'RecommandationTransceiverAntenna_recommandation_i18n';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\RecommandationTransceiverAntenna\\Model\\RecommandationtransceiverantennaRecommandationI18n';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'RecommandationTransceiverAntenna.Model.RecommandationtransceiverantennaRecommandationI18n';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the ID field
     */
    const ID = 'RecommandationTransceiverAntenna_recommandation_i18n.ID';

    /**
     * the column name for the LOCALE field
     */
    const LOCALE = 'RecommandationTransceiverAntenna_recommandation_i18n.LOCALE';

    /**
     * the column name for the TITLE field
     */
    const TITLE = 'RecommandationTransceiverAntenna_recommandation_i18n.TITLE';

    /**
     * the column name for the DESCRIPTION field
     */
    const DESCRIPTION = 'RecommandationTransceiverAntenna_recommandation_i18n.DESCRIPTION';

    /**
     * the column name for the CHAPO field
     */
    const CHAPO = 'RecommandationTransceiverAntenna_recommandation_i18n.CHAPO';

    /**
     * the column name for the POSTSCRIPTUM field
     */
    const POSTSCRIPTUM = 'RecommandationTransceiverAntenna_recommandation_i18n.POSTSCRIPTUM';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Locale', 'Title', 'Description', 'Chapo', 'Postscriptum', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'locale', 'title', 'description', 'chapo', 'postscriptum', ),
        self::TYPE_COLNAME       => array(RecommandationtransceiverantennaRecommandationI18nTableMap::ID, RecommandationtransceiverantennaRecommandationI18nTableMap::LOCALE, RecommandationtransceiverantennaRecommandationI18nTableMap::TITLE, RecommandationtransceiverantennaRecommandationI18nTableMap::DESCRIPTION, RecommandationtransceiverantennaRecommandationI18nTableMap::CHAPO, RecommandationtransceiverantennaRecommandationI18nTableMap::POSTSCRIPTUM, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'LOCALE', 'TITLE', 'DESCRIPTION', 'CHAPO', 'POSTSCRIPTUM', ),
        self::TYPE_FIELDNAME     => array('id', 'locale', 'title', 'description', 'chapo', 'postscriptum', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Locale' => 1, 'Title' => 2, 'Description' => 3, 'Chapo' => 4, 'Postscriptum' => 5, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'locale' => 1, 'title' => 2, 'description' => 3, 'chapo' => 4, 'postscriptum' => 5, ),
        self::TYPE_COLNAME       => array(RecommandationtransceiverantennaRecommandationI18nTableMap::ID => 0, RecommandationtransceiverantennaRecommandationI18nTableMap::LOCALE => 1, RecommandationtransceiverantennaRecommandationI18nTableMap::TITLE => 2, RecommandationtransceiverantennaRecommandationI18nTableMap::DESCRIPTION => 3, RecommandationtransceiverantennaRecommandationI18nTableMap::CHAPO => 4, RecommandationtransceiverantennaRecommandationI18nTableMap::POSTSCRIPTUM => 5, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'LOCALE' => 1, 'TITLE' => 2, 'DESCRIPTION' => 3, 'CHAPO' => 4, 'POSTSCRIPTUM' => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'locale' => 1, 'title' => 2, 'description' => 3, 'chapo' => 4, 'postscriptum' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('RecommandationTransceiverAntenna_recommandation_i18n');
        $this->setPhpName('RecommandationtransceiverantennaRecommandationI18n');
        $this->setClassName('\\RecommandationTransceiverAntenna\\Model\\RecommandationtransceiverantennaRecommandationI18n');
        $this->setPackage('RecommandationTransceiverAntenna.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'RecommandationTransceiverAntenna_recommandation', 'ID', true, null, null);
        $this->addPrimaryKey('LOCALE', 'Locale', 'VARCHAR', true, 5, 'en_US');
        $this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('DESCRIPTION', 'Description', 'CLOB', false, null, null);
        $this->addColumn('CHAPO', 'Chapo', 'LONGVARCHAR', false, null, null);
        $this->addColumn('POSTSCRIPTUM', 'Postscriptum', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RecommandationtransceiverantennaRecommandation', '\\RecommandationTransceiverAntenna\\Model\\RecommandationtransceiverantennaRecommandation', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n $obj A \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getId(), (string) $obj->getLocale()));
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n) {
                $key = serialize(array((string) $value->getId(), (string) $value->getLocale()));

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Locale', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Locale', TableMap::TYPE_PHPNAME, $indexType)]));
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? RecommandationtransceiverantennaRecommandationI18nTableMap::CLASS_DEFAULT : RecommandationtransceiverantennaRecommandationI18nTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (RecommandationtransceiverantennaRecommandationI18n object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RecommandationtransceiverantennaRecommandationI18nTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RecommandationtransceiverantennaRecommandationI18nTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RecommandationtransceiverantennaRecommandationI18nTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RecommandationtransceiverantennaRecommandationI18nTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RecommandationtransceiverantennaRecommandationI18nTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = RecommandationtransceiverantennaRecommandationI18nTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RecommandationtransceiverantennaRecommandationI18nTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RecommandationtransceiverantennaRecommandationI18nTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(RecommandationtransceiverantennaRecommandationI18nTableMap::ID);
            $criteria->addSelectColumn(RecommandationtransceiverantennaRecommandationI18nTableMap::LOCALE);
            $criteria->addSelectColumn(RecommandationtransceiverantennaRecommandationI18nTableMap::TITLE);
            $criteria->addSelectColumn(RecommandationtransceiverantennaRecommandationI18nTableMap::DESCRIPTION);
            $criteria->addSelectColumn(RecommandationtransceiverantennaRecommandationI18nTableMap::CHAPO);
            $criteria->addSelectColumn(RecommandationtransceiverantennaRecommandationI18nTableMap::POSTSCRIPTUM);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.LOCALE');
            $criteria->addSelectColumn($alias . '.TITLE');
            $criteria->addSelectColumn($alias . '.DESCRIPTION');
            $criteria->addSelectColumn($alias . '.CHAPO');
            $criteria->addSelectColumn($alias . '.POSTSCRIPTUM');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(RecommandationtransceiverantennaRecommandationI18nTableMap::DATABASE_NAME)->getTable(RecommandationtransceiverantennaRecommandationI18nTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(RecommandationtransceiverantennaRecommandationI18nTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(RecommandationtransceiverantennaRecommandationI18nTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new RecommandationtransceiverantennaRecommandationI18nTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a RecommandationtransceiverantennaRecommandationI18n or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or RecommandationtransceiverantennaRecommandationI18n object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecommandationtransceiverantennaRecommandationI18nTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RecommandationtransceiverantennaRecommandationI18nTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(RecommandationtransceiverantennaRecommandationI18nTableMap::ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(RecommandationtransceiverantennaRecommandationI18nTableMap::LOCALE, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = RecommandationtransceiverantennaRecommandationI18nQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { RecommandationtransceiverantennaRecommandationI18nTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { RecommandationtransceiverantennaRecommandationI18nTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the RecommandationTransceiverAntenna_recommandation_i18n table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RecommandationtransceiverantennaRecommandationI18nQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a RecommandationtransceiverantennaRecommandationI18n or Criteria object.
     *
     * @param mixed               $criteria Criteria or RecommandationtransceiverantennaRecommandationI18n object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecommandationtransceiverantennaRecommandationI18nTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from RecommandationtransceiverantennaRecommandationI18n object
        }


        // Set the correct dbName
        $query = RecommandationtransceiverantennaRecommandationI18nQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // RecommandationtransceiverantennaRecommandationI18nTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RecommandationtransceiverantennaRecommandationI18nTableMap::buildTableMap();
