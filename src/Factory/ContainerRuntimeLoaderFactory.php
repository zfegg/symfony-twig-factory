<?php


namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Twig\RuntimeLoader\ContainerRuntimeLoader;

class ContainerRuntimeLoaderFactory
{

    public function __invoke(ContainerInterface $container) : ContainerRuntimeLoader
    {
        return new ContainerRuntimeLoader($container);
    }
}
