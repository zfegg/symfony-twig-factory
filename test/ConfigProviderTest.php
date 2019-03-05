<?php

namespace ZfeggTest\SymfonyTwigFactory;

use Zfegg\SymfonyTwigFactory\ConfigProvider;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{

    public function testInvoke()
    {
        $config = (new ConfigProvider())();

        $this->assertArrayHasKey('dependencies', $config);
        $this->assertArrayHasKey('twig', $config);
        $this->assertArrayHasKey('templates', $config);
        $this->assertArrayHasKey('factories', $config['dependencies']);
    }
}
