<?php


namespace Zfegg\SymfonyTwigFactory;


use Symfony\Bridge\Twig\Extension\TranslationExtension;

class TranslationConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    TranslationExtension::class => Factory\InvokableFactory::class,
                ],
            ],
            'twig' => [
                'extensions' => [
                    TranslationExtension::class,
                ]
            ]
        ];
    }
}