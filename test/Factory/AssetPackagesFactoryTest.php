<?php

declare(strict_types=1);

namespace ZfeggTest\SymfonyTwigFactory\Factory;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Container\ContainerInterface;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Zfegg\SymfonyTwigFactory\Factory\AssetPackagesFactory;

class AssetPackagesFactoryTest extends TestCase
{
    use ProphecyTrait;

    public function testInvoke()
    {
        $factory = new AssetPackagesFactory();

        $container = $this->prophesize(ContainerInterface::class);
        $container->get('config')->willReturn(
            [
                'assets' => [
                    'base_path'          => '/',
                    'json_manifest_path' => 'public/assets/manifest.json',
                    'packages'           => [
                        'url'          => [
                            'base_urls' => 'https://example.com/packages/',
                        ],
                        'ver'          => [
                            'version'        => 'abc',
                            'version_format' => '%s?v=%s',
                        ],
                        'ver_strategy' => [
                            'version_strategy' => 'test.strategy',
                        ],
                    ],
                ],
            ]
        );

        $testStrategy = new EmptyVersionStrategy();
        $container->get('test.strategy')->willReturn($testStrategy);

        $packages = $factory($container->reveal());

        $this->assertInstanceOf(PathPackage::class, $packages->getPackage());
        $this->assertInstanceOf(
            UrlPackage::class,
            $packages->getPackage('url')
        );
        $this->assertInstanceOf(Package::class, $packages->getPackage('ver'));
        $this->assertInstanceOf(
            Package::class,
            $packages->getPackage('ver_strategy')
        );
    }
}
