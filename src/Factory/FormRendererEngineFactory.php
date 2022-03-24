<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Twig\Environment;

class FormRendererEngineFactory
{
    public function __invoke(ContainerInterface $container): TwigRendererEngine
    {
        $twig   = $container->get(Environment::class);
        $themes = $container->get('config')['twig']['form_themes'] ?? [];

        return new TwigRendererEngine($themes, $twig);
    }
}
