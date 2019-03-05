Symfony twig bridge factories
==============================


[![Build Status](https://travis-ci.org/zfegg/symfony-twig-factory.png)](https://travis-ci.org/zfegg/symfony-twig-factory)
[![Coverage Status](https://coveralls.io/repos/github/zfegg/symfony-twig-factory/badge.svg?branch=master)](https://coveralls.io/github/zfegg/symfony-twig-factory?branch=master)
[![Latest Stable Version](https://poser.pugx.org/zfegg/symfony-twig-factory/v/stable.png)](https://packagist.org/packages/zfegg/symfony-twig-factory)


Using `symfony/twig-bridge` in Expressive. (e.g.: asset,workflow)

在 Zend Expressive 中使用部分的 `symfony/twig-bridge` twig 扩展

Installation / 安装
-------------------

```bash
composer require zfegg/symfony-twig-factory
```

TODO factories / 需实现的twig扩展
--------------------------------

- [x] `asset`
- [ ] `code`
- [ ] `dump`
- [x] `expression`
- [x] `\Symfony\Bridge\Twig\Extension\FormExtension`
- [x] `\Symfony\Bridge\Twig\Extension\TranslationExtension`
- [x] `\Symfony\Bridge\Twig\Extension\WorkflowExtension`
- [x] `\Symfony\Bridge\Twig\Extension\YamlExtension`

Usage / 使用
------------

Based on expressive.

### Add all symfony twig extension in Expressive.


You can add all extension configs or customize add you want.

你可以添加全部扩展配置,或者自定义添加您想要的。

- `Zfegg\SymfonyTwigFactory\ConfigProvider` Load all the configs of twig extensions. / 加载全部 twig 扩展配置.
    - `Zfegg\SymfonyTwigFactory\AssetConfigProvider`
        - `Symfony\Bridge\Twig\Extension\AssetExtension`
    - `Zfegg\SymfonyTwigFactory\BaseConfigProvider`
        - `Symfony\Bridge\Twig\Extension\ExpressionExtension`
        - `Symfony\Bridge\Twig\Extension\YamlExtension`
    - `Zfegg\SymfonyTwigFactory\FormConfigProvider` 
        - `Symfony\Bridge\Twig\Extension\FormExtension`
    - `Zfegg\SymfonyTwigFactory\TranslationConfigProvider`
        - `Symfony\Bridge\Twig\Extension\TranslationExtension`
    - `Zfegg\SymfonyTwigFactory\WorkflowConfigProvider`
        - `Symfony\Bridge\Twig\Extension\WorkflowExtension`


### Asset extension usage  / asset 扩展使用


#### 1. Add `symfony/asset` library. / 添加 `symfony/asset` 扩展

```bash
composer require symfony/asset
```

#### 2. Add config provider in project `config.php`. / 在项目中添加配置

Add `AssetConfigProvider` to `config.php` file, if you just want to use `AssetExtension`. 

如果你只想要 `AssetExtension`, 就添加`AssetConfigProvider` 到 `config.php` 配置文件中.

```php
$aggregator = new ConfigAggregator([
  // Only load `AssetExtension` configs.
  Zfegg\SymfonyTwigFactory\AssetConfigProvider::class,
]);
```


#### 3. Add config in project. / 在项目中添加配置  

Example file `config/autoload/template.global.php`.

举例文件 `config/autoload/template.global.php`.

```php

return [
    // asset component configs.
    // asset 配置结构详见以下链接
    // @See: http://symfony.com/doc/current/reference/configuration/framework.html#assets
    'assets' => [
        'base_path' => '/'
        //Keys:
        // - base_path
        // - base_urls
        // - packages
        // - version
        // - version_format
        // - version_strategy
        // - json_manifest_path
    ],
];
```

### Form extension usage  / form 扩展使用

#### 1. Add `symfony/form` library. / 添加 `symfony/form` 扩展

```bash
composer require symfony/form
```

#### 2. Add config provider in project `config.php`. / 在项目中添加配置

Add `FormConfigProvider` to `config.php` file, if you just want to use `FormExtension`. 

如果你只想要 `FormExtension`, 就添加`FormConfigProvider` 到 `config.php` 配置文件中.

```php
$aggregator = new ConfigAggregator([
  // Only load `FormExtension` configs.
  Zfegg\SymfonyTwigFactory\FormConfigProvider::class,
]);
```


#### 3. More form configs in project. / 在项目中表单的配置  

Example file `config/autoload/template.global.php`.

举例文件 `config/autoload/template.global.php`.

```php

return [
    // form themes configs. / 表单主题(form_themes)配置结构详见以下链接
    // @See: https://symfony.com/doc/current/form/form_themes.html

    // Add form themes.
    // 'twig' => [ 
    //     'form_themes' => [
    //         'form/layout.html.twig'
    //     ],
    // ],
];
```


### Run the examples. /  运行示例

[example/index.php](example/index.php)
