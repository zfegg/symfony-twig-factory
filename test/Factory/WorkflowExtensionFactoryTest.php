<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\WorkflowExtension;
use Symfony\Component\Workflow\Registry;
use Zfegg\SymfonyTwigFactory\Factory\WorkflowExtensionFactory;

class WorkflowExtensionFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Registry::class)
            ->willReturn(new Registry())
            ->shouldBeCalled();
        $factory = new WorkflowExtensionFactory();
        $ext     = $factory($container->reveal());
        $this->assertInstanceOf(WorkflowExtension::class, $ext);
    }
}
