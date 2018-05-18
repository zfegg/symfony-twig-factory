<?php

declare(strict_types=1);

namespace Zfegg\SymfonyTwigFactory\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;

class AssetPackagesFactory
{

    public function __invoke(ContainerInterface $container): Packages
    {
        $configs = $container->get('config')['assets'] ?? [];
        $defaultPackage = $this->createPackage($configs, $container);

        $packages = [];
        if (isset($configs['packages'])) {
            foreach ((array)$configs['packages'] as $name => $packageConfig) {
                $packages[$name] = $this->createPackage(
                    $packageConfig,
                    $container
                );
            }
        }

        return new Packages($defaultPackage, $packages);
    }

    public function createPackage(
        array $config,
        ContainerInterface $container
    ): Package {
        if (isset($config['json_manifest_path'])) {
            $versionStrategy = new JsonManifestVersionStrategy($config['json_manifest_path']);
        } elseif (isset($config['version'])) {
            $versionStrategy = new StaticVersionStrategy(
                $config['version'],
                $config['version_format'] ?? null
            );
        } elseif (isset($config['version_strategy'])) {
            $versionStrategy = $container->get($config['version_strategy']);
        } else {
            $versionStrategy = new EmptyVersionStrategy();
        }

        if (isset($config['base_urls'])) {
            $package = new UrlPackage($config['base_urls'], $versionStrategy);
        } elseif (isset($config['base_path'])) {
            $package = new PathPackage($config['base_path'], $versionStrategy);
        } else {
            $package = new Package($versionStrategy);
        }

        return $package;
    }
}
