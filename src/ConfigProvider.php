<?php


namespace Zfegg\SymfonyTwigFactory;

use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Bridge\Twig\Extension\WorkflowExtension;
use Symfony\Bridge\Twig\Extension\YamlExtension;
use Symfony\Component\Asset\Packages;

class ConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    Packages::class => Factory\AssetPackagesFactory::class,
                    AssetExtension::class => Factory\AssetTwigExtensionFactory::class,
                    WorkflowExtension::class => Factory\WorkflowExtensionFactory::class,
                    YamlExtension::class => Factory\YamlExtensionFactory::class,
                ],
            ],
            // //Add extensions
            // 'twig' => [
            //    'extensions'     => [
            //        AssetExtension::class,
            //    ],
            // ],
            // Configures  配置结构见以下链接
            // @See: http://symfony.com/doc/current/reference/configuration/framework.html#assets
            // 'assets' => [
            //  //Keys:
            //  // - base_path
            //  // - base_urls
            //  // - packages
            //  // - version
            //  // - version_format
            //  // - version_strategy
            //  // - json_manifest_path
            // ],
        ];
    }
}
