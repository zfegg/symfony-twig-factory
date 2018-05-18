<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\YamlExtension;
use Zfegg\SymfonyTwigFactory\Factory\YamlExtensionFactory;
use PHPUnit\Framework\TestCase;

class YamlExtensionFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);

        $factory = new YamlExtensionFactory();
        $ext = $factory($container->reveal());
        $this->assertInstanceOf(YamlExtension::class, $ext);
    }
}
