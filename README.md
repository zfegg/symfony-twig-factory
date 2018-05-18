Symfony twig bridge factories
==============================

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
- [ ] `\Symfony\Bridge\Twig\Extension\FormExtension`
- [ ] `\Symfony\Bridge\Twig\Extension\TranslationExtension`
- [x] `\Symfony\Bridge\Twig\Extension\WorkflowExtension`
- [x] `\Symfony\Bridge\Twig\Extension\YamlExtension`

Usage / 使用
------------

### Asset extension usage  / asset 扩展使用


#### 1. Add `symfony/asset` library. / 添加 `symfony/asset` 扩展

```bash
composer require symfony/asset
```

#### 2. Add config in project. / 在项目中添加配置  

Example file `config/autoload/template.global.php`.

举例文件 `config/autoload/template.global.php`.

```php

return [
    // `zendframework/zend-expressive-twigrenderer` factory config.
    // `zendframework/zend-expressive-twigrenderer` 扩展的工厂配置.
    'twig' => [
        'extensions'     => [
            AssetExtension::class,
        ],
    ],
    
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
