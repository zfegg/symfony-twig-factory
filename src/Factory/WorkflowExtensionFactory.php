<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Bridge\Twig\Extension\WorkflowExtension;
use Symfony\Component\Workflow\Registry;

class WorkflowExtensionFactory
{

    public function __invoke(ContainerInterface $container): WorkflowExtension
    {
        return new WorkflowExtension($container->get(Registry::class));
    }
}
