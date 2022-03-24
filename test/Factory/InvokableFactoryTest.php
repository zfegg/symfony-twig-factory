<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\YamlExtension;
use Zfegg\SymfonyTwigFactory\Factory\InvokableFactory;

class InvokableFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);

        $factory = new InvokableFactory();
        $ext     = $factory($container->reveal(), YamlExtension::class);
        $this->assertInstanceOf(YamlExtension::class, $ext);
    }
}
