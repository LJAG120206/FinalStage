<?php

namespace ContainerKTLb8be;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_Describers_ApiPlatformService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'nelmio_api_doc.describers.api_platform' shared service.
     *
     * @return \Nelmio\ApiDocBundle\Describer\ApiPlatformDescriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/Describer/DescriberInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/Describer/ExternalDocDescriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/api-doc-bundle/Describer/ApiPlatformDescriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Documentation/DocumentationInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Documentation/Documentation.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-foundation/Request.php';

        return $container->privates['nelmio_api_doc.describers.api_platform'] = new \Nelmio\ApiDocBundle\Describer\ApiPlatformDescriber(($container->services['api_platform.action.documentation'] ?? $container->load('getApiPlatform_Action_DocumentationService'))->__invoke(new \Symfony\Component\HttpFoundation\Request()), ($container->privates['api_platform.swagger.normalizer.api_gateway'] ?? $container->getApiPlatform_Swagger_Normalizer_ApiGatewayService()));
    }
}
