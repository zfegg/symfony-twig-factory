<?php

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Zfegg\SymfonyTwigFactory\Factory\FormRendererEngineFactory;
use PHPUnit\Framework\TestCase;

class FormRendererEngineFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Environment::class)
            ->willReturn(new Environment(new FilesystemLoader()))
            ->shouldBeCalled();

        $container->get('config')
            ->willReturn(['twig' => ['form_themes' => []]])
            ->shouldBeCalled();

        $service = (new FormRendererEngineFactory())($container->reveal());

        $this->assertInstanceOf(TwigRendererEngine::class, $service);
    }
}
