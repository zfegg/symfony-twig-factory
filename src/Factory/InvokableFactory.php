<?php

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;

class InvokableFactory
{

    public function __invoke(ContainerInterface $container, $requestName)
    {
        return new $requestName();
    }
}
