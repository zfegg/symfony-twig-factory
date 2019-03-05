<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory;

class ConfigProvider
{

    public function __invoke(): array
    {
        $config = (new BaseConfigProvider())();
        $config = array_merge_recursive($config, (new WorkflowConfigProvider())());
        $config = array_merge_recursive($config, (new AssetConfigProvider())());
        $config = array_merge_recursive($config, (new FormConfigProvider())());
        $config = array_merge_recursive($config, (new TranslationConfigProvider())());

        return $config;
    }
}
