<?php

namespace Container1AeE4JY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Yjds1FaService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Yjds1Fa' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Yjds1Fa'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\AuthorController::getAuthors' => ['privates', '.service_locator.c2_CVxI', 'get_ServiceLocator_C2CVxIService', true],
            'App\\Controller\\AuthorController::getDetailAuthor' => ['privates', '.service_locator.FxyxYao', 'get_ServiceLocator_FxyxYaoService', true],
            'App\\Controller\\BookController::DeleteBook' => ['privates', '.service_locator.FaIXBcg', 'get_ServiceLocator_FaIXBcgService', true],
            'App\\Controller\\BookController::createBook' => ['privates', '.service_locator.OvD6SVk', 'get_ServiceLocator_OvD6SVkService', true],
            'App\\Controller\\BookController::getBooks' => ['privates', '.service_locator.msKV3CX', 'get_ServiceLocator_MsKV3CXService', true],
            'App\\Controller\\BookController::getDetailBook' => ['privates', '.service_locator.uAQXRKb', 'get_ServiceLocator_UAQXRKbService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\AuthorController:getAuthors' => ['privates', '.service_locator.c2_CVxI', 'get_ServiceLocator_C2CVxIService', true],
            'App\\Controller\\AuthorController:getDetailAuthor' => ['privates', '.service_locator.FxyxYao', 'get_ServiceLocator_FxyxYaoService', true],
            'App\\Controller\\BookController:DeleteBook' => ['privates', '.service_locator.FaIXBcg', 'get_ServiceLocator_FaIXBcgService', true],
            'App\\Controller\\BookController:createBook' => ['privates', '.service_locator.OvD6SVk', 'get_ServiceLocator_OvD6SVkService', true],
            'App\\Controller\\BookController:getBooks' => ['privates', '.service_locator.msKV3CX', 'get_ServiceLocator_MsKV3CXService', true],
            'App\\Controller\\BookController:getDetailBook' => ['privates', '.service_locator.uAQXRKb', 'get_ServiceLocator_UAQXRKbService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\AuthorController::getAuthors' => '?',
            'App\\Controller\\AuthorController::getDetailAuthor' => '?',
            'App\\Controller\\BookController::DeleteBook' => '?',
            'App\\Controller\\BookController::createBook' => '?',
            'App\\Controller\\BookController::getBooks' => '?',
            'App\\Controller\\BookController::getDetailBook' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\AuthorController:getAuthors' => '?',
            'App\\Controller\\AuthorController:getDetailAuthor' => '?',
            'App\\Controller\\BookController:DeleteBook' => '?',
            'App\\Controller\\BookController:createBook' => '?',
            'App\\Controller\\BookController:getBooks' => '?',
            'App\\Controller\\BookController:getDetailBook' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}