<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Packages;

class AssetTwigExtensionFactory
{
    public function __invoke(ContainerInterface $container): AssetExtension
    {
        return new AssetExtension($container->get(Packages::class));
    }
}
