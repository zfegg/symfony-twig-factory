<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Twig\RuntimeLoader\ContainerRuntimeLoader;
use Zfegg\SymfonyTwigFactory\Factory\ContainerRuntimeLoaderFactory;

class ContainerRuntimeLoaderFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $service   = (new ContainerRuntimeLoaderFactory())($container->reveal());

        $this->assertInstanceOf(ContainerRuntimeLoader::class, $service);
    }
}
