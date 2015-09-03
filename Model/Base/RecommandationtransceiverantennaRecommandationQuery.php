<?php

namespace RecommandationTransceiverAntenna\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandation as ChildRecommandationtransceiverantennaRecommandation;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18nQuery as ChildRecommandationtransceiverantennaRecommandationI18nQuery;
use RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationQuery as ChildRecommandationtransceiverantennaRecommandationQuery;
use RecommandationTransceiverAntenna\Model\Map\RecommandationtransceiverantennaRecommandationTableMap;

/**
 * Base class that represents a query for the 'RecommandationTransceiverAntenna_recommandation' table.
 *
 *
 *
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery groupById() Group by the id column
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery groupByCode() Group by the code column
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery leftJoinRecommandationtransceiverantenna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Recommandationtransceiverantenna relation
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery rightJoinRecommandationtransceiverantenna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Recommandationtransceiverantenna relation
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery innerJoinRecommandationtransceiverantenna($relationAlias = null) Adds a INNER JOIN clause to the query using the Recommandationtransceiverantenna relation
 *
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery leftJoinRecommandationtransceiverantennaRecommandationI18n($relationAlias = null) Adds a LEFT JOIN clause to the query using the RecommandationtransceiverantennaRecommandationI18n relation
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery rightJoinRecommandationtransceiverantennaRecommandationI18n($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RecommandationtransceiverantennaRecommandationI18n relation
 * @method     ChildRecommandationtransceiverantennaRecommandationQuery innerJoinRecommandationtransceiverantennaRecommandationI18n($relationAlias = null) Adds a INNER JOIN clause to the query using the RecommandationtransceiverantennaRecommandationI18n relation
 *
 * @method     ChildRecommandationtransceiverantennaRecommandation findOne(ConnectionInterface $con = null) Return the first ChildRecommandationtransceiverantennaRecommandation matching the query
 * @method     ChildRecommandationtransceiverantennaRecommandation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRecommandationtransceiverantennaRecommandation matching the query, or a new ChildRecommandationtransceiverantennaRecommandation object populated from the query conditions when no match is found
 *
 * @method     ChildRecommandationtransceiverantennaRecommandation findOneById(int $id) Return the first ChildRecommandationtransceiverantennaRecommandation filtered by the id column
 * @method     ChildRecommandationtransceiverantennaRecommandation findOneByCode(string $code) Return the first ChildRecommandationtransceiverantennaRecommandation filtered by the code column
 * @method     ChildRecommandationtransceiverantennaRecommandation findOneByCreatedAt(string $created_at) Return the first ChildRecommandationtransceiverantennaRecommandation filtered by the created_at column
 * @method     ChildRecommandationtransceiverantennaRecommandation findOneByUpdatedAt(string $updated_at) Return the first ChildRecommandationtransceiverantennaRecommandation filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ChildRecommandationtransceiverantennaRecommandation objects filtered by the id column
 * @method     array findByCode(string $code) Return ChildRecommandationtransceiverantennaRecommandation objects filtered by the code column
 * @method     array findByCreatedAt(string $created_at) Return ChildRecommandationtransceiverantennaRecommandation objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildRecommandationtransceiverantennaRecommandation objects filtered by the updated_at column
 *
 */
abstract class RecommandationtransceiverantennaRecommandationQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \RecommandationTransceiverAntenna\Model\Base\RecommandationtransceiverantennaRecommandationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\RecommandationTransceiverAntenna\\Model\\RecommandationtransceiverantennaRecommandation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRecommandationtransceiverantennaRecommandationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationQuery) {
            return $criteria;
        }
        $query = new \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildRecommandationtransceiverantennaRecommandation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RecommandationtransceiverantennaRecommandationTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RecommandationtransceiverantennaRecommandationTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildRecommandationtransceiverantennaRecommandation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CODE, CREATED_AT, UPDATED_AT FROM RecommandationTransceiverAntenna_recommandation WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildRecommandationtransceiverantennaRecommandation();
            $obj->hydrate($row);
            RecommandationtransceiverantennaRecommandationTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildRecommandationtransceiverantennaRecommandation|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \RecommandationTransceiverAntenna\Model\Recommandationtransceiverantenna object
     *
     * @param \RecommandationTransceiverAntenna\Model\Recommandationtransceiverantenna|ObjectCollection $recommandationtransceiverantenna  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByRecommandationtransceiverantenna($recommandationtransceiverantenna, $comparison = null)
    {
        if ($recommandationtransceiverantenna instanceof \RecommandationTransceiverAntenna\Model\Recommandationtransceiverantenna) {
            return $this
                ->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $recommandationtransceiverantenna->getRecommandationId(), $comparison);
        } elseif ($recommandationtransceiverantenna instanceof ObjectCollection) {
            return $this
                ->useRecommandationtransceiverantennaQuery()
                ->filterByPrimaryKeys($recommandationtransceiverantenna->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRecommandationtransceiverantenna() only accepts arguments of type \RecommandationTransceiverAntenna\Model\Recommandationtransceiverantenna or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Recommandationtransceiverantenna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function joinRecommandationtransceiverantenna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Recommandationtransceiverantenna');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Recommandationtransceiverantenna');
        }

        return $this;
    }

    /**
     * Use the Recommandationtransceiverantenna relation Recommandationtransceiverantenna object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaQuery A secondary query class using the current class as primary query
     */
    public function useRecommandationtransceiverantennaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRecommandationtransceiverantenna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Recommandationtransceiverantenna', '\RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaQuery');
    }

    /**
     * Filter the query by a related \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n object
     *
     * @param \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n|ObjectCollection $recommandationtransceiverantennaRecommandationI18n  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function filterByRecommandationtransceiverantennaRecommandationI18n($recommandationtransceiverantennaRecommandationI18n, $comparison = null)
    {
        if ($recommandationtransceiverantennaRecommandationI18n instanceof \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n) {
            return $this
                ->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $recommandationtransceiverantennaRecommandationI18n->getId(), $comparison);
        } elseif ($recommandationtransceiverantennaRecommandationI18n instanceof ObjectCollection) {
            return $this
                ->useRecommandationtransceiverantennaRecommandationI18nQuery()
                ->filterByPrimaryKeys($recommandationtransceiverantennaRecommandationI18n->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRecommandationtransceiverantennaRecommandationI18n() only accepts arguments of type \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18n or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RecommandationtransceiverantennaRecommandationI18n relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function joinRecommandationtransceiverantennaRecommandationI18n($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RecommandationtransceiverantennaRecommandationI18n');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RecommandationtransceiverantennaRecommandationI18n');
        }

        return $this;
    }

    /**
     * Use the RecommandationtransceiverantennaRecommandationI18n relation RecommandationtransceiverantennaRecommandationI18n object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18nQuery A secondary query class using the current class as primary query
     */
    public function useRecommandationtransceiverantennaRecommandationI18nQuery($relationAlias = null, $joinType = 'LEFT JOIN')
    {
        return $this
            ->joinRecommandationtransceiverantennaRecommandationI18n($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RecommandationtransceiverantennaRecommandationI18n', '\RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18nQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRecommandationtransceiverantennaRecommandation $recommandationtransceiverantennaRecommandation Object to remove from the list of results
     *
     * @return ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function prune($recommandationtransceiverantennaRecommandation = null)
    {
        if ($recommandationtransceiverantennaRecommandation) {
            $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::ID, $recommandationtransceiverantennaRecommandation->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the RecommandationTransceiverAntenna_recommandation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecommandationtransceiverantennaRecommandationTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RecommandationtransceiverantennaRecommandationTableMap::clearInstancePool();
            RecommandationtransceiverantennaRecommandationTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildRecommandationtransceiverantennaRecommandation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildRecommandationtransceiverantennaRecommandation object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecommandationtransceiverantennaRecommandationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RecommandationtransceiverantennaRecommandationTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        RecommandationtransceiverantennaRecommandationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RecommandationtransceiverantennaRecommandationTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(RecommandationtransceiverantennaRecommandationTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(RecommandationtransceiverantennaRecommandationTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(RecommandationtransceiverantennaRecommandationTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(RecommandationtransceiverantennaRecommandationTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(RecommandationtransceiverantennaRecommandationTableMap::CREATED_AT);
    }

    // i18n behavior

    /**
     * Adds a JOIN clause to the query using the i18n relation
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function joinI18n($locale = 'en_US', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $relationName = $relationAlias ? $relationAlias : 'RecommandationtransceiverantennaRecommandationI18n';

        return $this
            ->joinRecommandationtransceiverantennaRecommandationI18n($relationAlias, $joinType)
            ->addJoinCondition($relationName, $relationName . '.Locale = ?', $locale);
    }

    /**
     * Adds a JOIN clause to the query and hydrates the related I18n object.
     * Shortcut for $c->joinI18n($locale)->with()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildRecommandationtransceiverantennaRecommandationQuery The current query, for fluid interface
     */
    public function joinWithI18n($locale = 'en_US', $joinType = Criteria::LEFT_JOIN)
    {
        $this
            ->joinI18n($locale, null, $joinType)
            ->with('RecommandationtransceiverantennaRecommandationI18n');
        $this->with['RecommandationtransceiverantennaRecommandationI18n']->setIsWithOneToMany(false);

        return $this;
    }

    /**
     * Use the I18n relation query object
     *
     * @see       useQuery()
     *
     * @param     string $locale Locale to use for the join condition, e.g. 'fr_FR'
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
     *
     * @return    ChildRecommandationtransceiverantennaRecommandationI18nQuery A secondary query class using the current class as primary query
     */
    public function useI18nQuery($locale = 'en_US', $relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinI18n($locale, $relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RecommandationtransceiverantennaRecommandationI18n', '\RecommandationTransceiverAntenna\Model\RecommandationtransceiverantennaRecommandationI18nQuery');
    }

} // RecommandationtransceiverantennaRecommandationQuery
