<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\YamlExtension;
use Zfegg\SymfonyTwigFactory\Factory\InvokableFactory;
use Zfegg\SymfonyTwigFactory\Factory\YamlExtensionFactory;
use PHPUnit\Framework\TestCase;

class InvokableFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);

        $factory = new InvokableFactory();
        $ext = $factory($container->reveal(), YamlExtension::class);
        $this->assertInstanceOf(YamlExtension::class, $ext);
    }
}
