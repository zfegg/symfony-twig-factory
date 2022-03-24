<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\FormRendererEngineInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Zfegg\SymfonyTwigFactory\Factory\FormRendererFactory;
use PHPUnit\Framework\TestCase;

class FormRendererFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(FormRendererEngineInterface::class)
            ->willReturn(new TwigRendererEngine([], new Environment(new FilesystemLoader())))
            ->shouldBeCalled();

        $container->has(CsrfTokenManagerInterface::class)
            ->willReturn(null)
            ->shouldBeCalled();

        $service = (new FormRendererFactory())($container->reveal());

        $this->assertInstanceOf(FormRenderer::class, $service);
    }
}
