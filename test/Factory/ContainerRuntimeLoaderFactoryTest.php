<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Twig\RuntimeLoader\ContainerRuntimeLoader;
use Zfegg\SymfonyTwigFactory\Factory\ContainerRuntimeLoaderFactory;
use PHPUnit\Framework\TestCase;

class ContainerRuntimeLoaderFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $service = (new ContainerRuntimeLoaderFactory())($container->reveal());

        $this->assertInstanceOf(ContainerRuntimeLoader::class, $service);
    }
}
