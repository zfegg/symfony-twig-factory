<?php

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\YamlExtension;

class YamlExtensionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new YamlExtension();
    }
}
