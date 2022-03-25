<?php

namespace ContainerKTLb8be;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getJWTCreatedSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Events\JWTCreatedSubscriber' shared autowired service.
     *
     * @return \App\Events\JWTCreatedSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Events/JWTCreatedSubscriber.php';

        return $container->privates['App\\Events\\JWTCreatedSubscriber'] = new \App\Events\JWTCreatedSubscriber(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}