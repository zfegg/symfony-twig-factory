<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory;

use Composer\Autoload\ClassLoader;
use ReflectionClass;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\FormRendererEngineInterface;
use Symfony\Component\Form\FormRendererInterface;
use Twig\RuntimeLoader\ContainerRuntimeLoader;

use function dirname;
use function realpath;

class FormConfigProvider
{
    public function __invoke(): array
    {
        $reflector = new ReflectionClass(ClassLoader::class);
        $file      = $reflector->getFileName();
        $vendorDir = realpath(dirname($file) . '/../');

        return [
            'dependencies' => [
                'factories' => [
                    FormExtension::class               => Factory\InvokableFactory::class,
                    ContainerRuntimeLoader::class      => Factory\ContainerRuntimeLoaderFactory::class,
                    FormRendererInterface::class       => Factory\FormRendererFactory::class,
                    FormRendererEngineInterface::class => Factory\FormRendererEngineFactory::class,
                ],
                'aliases'   => [
                    FormRenderer::class => FormRendererInterface::class,
                ],
            ],
            'templates'    => [
                'paths' => [
                    $vendorDir . '/symfony/twig-bridge/Resources/views/Form',
                ],
            ],
            'twig'         => [
                'form_themes'     => [
                    'form_div_layout.html.twig',
                ],
                'extensions'      => [
                    FormExtension::class,
                ],
                'runtime_loaders' => [
                    ContainerRuntimeLoader::class,
                ],
            ],
        ];
    }
}
