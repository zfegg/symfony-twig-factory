<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\WorkflowExtension;
use Symfony\Component\Workflow\Registry;
use Zfegg\SymfonyTwigFactory\Factory\WorkflowExtensionFactory;
use PHPUnit\Framework\TestCase;

class WorkflowExtensionFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Registry::class)
            ->willReturn(new Registry())
            ->shouldBeCalled();
        $factory = new WorkflowExtensionFactory();
        $ext = $factory($container->reveal());
        $this->assertInstanceOf(WorkflowExtension::class, $ext);
    }
}
