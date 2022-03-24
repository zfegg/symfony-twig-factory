<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory;

use Symfony\Bridge\Twig\Extension\TranslationExtension;

class TranslationConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    TranslationExtension::class => Factory\TranslationExtensionFactory::class,
                ],
            ],
            'twig'         => [
                'extensions' => [
                    TranslationExtension::class,
                ],
            ],
        ];
    }
}
