<?php


namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\FormRendererEngineInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class FormRendererFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new FormRenderer(
            $container->get(FormRendererEngineInterface::class),
            $container->has(CsrfTokenManagerInterface::class) ?
                $container->get(CsrfTokenManagerInterface::class) : null
        );
    }
}
