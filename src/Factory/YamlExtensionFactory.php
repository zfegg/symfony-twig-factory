<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\YamlExtension;

class YamlExtensionFactory
{
    public function __invoke(ContainerInterface $container): YamlExtension
    {
        return new YamlExtension();
    }
}
