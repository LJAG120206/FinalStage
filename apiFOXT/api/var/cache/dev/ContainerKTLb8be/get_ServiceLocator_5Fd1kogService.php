<?php

namespace ContainerKTLb8be;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_5Fd1kogService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.5Fd1kog' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.5Fd1kog'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'customerSuccessRepository' => ['privates', 'App\\Repository\\CustomerSuccessRepository', 'getCustomerSuccessRepositoryService', true],
        ], [
            'customerSuccessRepository' => 'App\\Repository\\CustomerSuccessRepository',
        ]);
    }
}
