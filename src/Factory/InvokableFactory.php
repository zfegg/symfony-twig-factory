<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;

class InvokableFactory
{
    public function __invoke(ContainerInterface $container, string $requestName): object
    {
        return new $requestName();
    }
}
