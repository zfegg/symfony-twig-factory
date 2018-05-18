<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Packages;
use Zfegg\SymfonyTwigFactory\Factory\AssetTwigExtensionFactory;

class AssetTwigExtensionFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Packages::class)
            ->willReturn(new Packages())
            ->shouldBeCalled();
        $factory = new AssetTwigExtensionFactory();
        $ext = $factory($container->reveal());
        $this->assertInstanceOf(AssetExtension::class, $ext);
    }
}
