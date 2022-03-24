<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory;

use PHPUnit\Framework\TestCase;
use Zfegg\SymfonyTwigFactory\ConfigProvider;

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
