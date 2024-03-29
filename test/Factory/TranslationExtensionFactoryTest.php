<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Contracts\Translation\TranslatorInterface;
use Zfegg\SymfonyTwigFactory\Factory\TranslationExtensionFactory;

class TranslationExtensionFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $container = $this->prophesize(ContainerInterface::class);

        $factory = new TranslationExtensionFactory();
        $container->has(TranslatorInterface::class)
            ->willReturn(false)
            ->shouldBeCalled();

        $ext = $factory($container->reveal(), TranslationExtension::class);
        $this->assertInstanceOf(TranslationExtension::class, $ext);
    }
}
