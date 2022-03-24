<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory;

use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Packages;

class AssetConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    Packages::class       => Factory\AssetPackagesFactory::class,
                    AssetExtension::class => Factory\AssetTwigExtensionFactory::class,
                ],
            ],
            'twig'         => [
                'extensions' => [
                    AssetExtension::class,
                ],
            ],

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
