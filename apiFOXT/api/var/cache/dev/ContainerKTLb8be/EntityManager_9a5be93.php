<?php

namespace ContainerKTLb8be;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder0456a = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer02911 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties2f6e5 = [
        
    ];

    public function getConnection()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getConnection', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getMetadataFactory', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getExpressionBuilder', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'beginTransaction', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getCache', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getCache();
    }

    public function transactional($func)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'transactional', array('func' => $func), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'wrapInTransaction', array('func' => $func), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'commit', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->commit();
    }

    public function rollback()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'rollback', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getClassMetadata', array('className' => $className), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'createQuery', array('dql' => $dql), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'createNamedQuery', array('name' => $name), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'createQueryBuilder', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'flush', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'clear', array('entityName' => $entityName), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->clear($entityName);
    }

    public function close()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'close', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->close();
    }

    public function persist($entity)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'persist', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'remove', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'refresh', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'detach', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'merge', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getRepository', array('entityName' => $entityName), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'contains', array('entity' => $entity), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getEventManager', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getConfiguration', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'isOpen', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getUnitOfWork', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getProxyFactory', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'initializeObject', array('obj' => $obj), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'getFilters', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'isFiltersStateClean', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'hasFilters', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return $this->valueHolder0456a->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer02911 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder0456a) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder0456a = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder0456a->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, '__get', ['name' => $name], $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        if (isset(self::$publicProperties2f6e5[$name])) {
            return $this->valueHolder0456a->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0456a;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder0456a;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0456a;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder0456a;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, '__isset', array('name' => $name), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0456a;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder0456a;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, '__unset', array('name' => $name), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder0456a;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder0456a;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, '__clone', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        $this->valueHolder0456a = clone $this->valueHolder0456a;
    }

    public function __sleep()
    {
        $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, '__sleep', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;

        return array('valueHolder0456a');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer02911 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer02911;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer02911 && ($this->initializer02911->__invoke($valueHolder0456a, $this, 'initializeProxy', array(), $this->initializer02911) || 1) && $this->valueHolder0456a = $valueHolder0456a;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder0456a;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder0456a;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
