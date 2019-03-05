<?php


namespace Zfegg\SymfonyTwigFactory;

use Symfony\Bridge\Twig\Extension\ExpressionExtension;
use Symfony\Bridge\Twig\Extension\YamlExtension;

class BaseConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    ExpressionExtension::class => Factory\InvokableFactory::class,
                    YamlExtension::class => Factory\InvokableFactory::class,
                ],
            ],

            'twig' => [
                'extensions'     => [
                    ExpressionExtension::class,
                    YamlExtension::class,
                ],
            ],
        ];
    }
}
