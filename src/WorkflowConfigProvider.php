<?php


namespace Zfegg\SymfonyTwigFactory;


use Symfony\Bridge\Twig\Extension\WorkflowExtension;
use Symfony\Component\Workflow\Registry;

class WorkflowConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    WorkflowExtension::class => Factory\WorkflowExtensionFactory::class,
                    Registry::class => Factory\InvokableFactory::class,
                ],
            ],

            'twig' => [
                'extensions'     => [
                    WorkflowExtension::class,
                ],
            ],
        ];
    }
}