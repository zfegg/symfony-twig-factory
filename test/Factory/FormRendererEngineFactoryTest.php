<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Zfegg\SymfonyTwigFactory\Factory\FormRendererEngineFactory;

class FormRendererEngineFactoryTest extends TestCase
{
    use ProphecyTrait;

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
