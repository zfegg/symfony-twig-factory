<?php

use Symfony\Component\Form\Forms;
use Twig\Environment;

include __DIR__ . '/../vendor/autoload.php';


$configs = (new \Zfegg\SymfonyTwigFactory\ConfigProvider())();
$configs = array_merge_recursive($configs, (new Mezzio\Twig\ConfigProvider())());

$container = new \Laminas\ServiceManager\ServiceManager($configs['dependencies']);
$configs['assets'] = [
    'base_path' => '/',
    'packages'  => [
        'unpkg' => [
            'base_urls' => 'https://unpkg.com/',
        ],
    ]
    //Keys:
    // - base_path
    // - base_urls
    // - packages
    // - version
    // - version_format
    // - version_strategy
    // - json_manifest_path
];
//$configs['twig']['form_themes'] = [
//    'form/layout.html.twig',
//    'form/fields.html.twig',
//];
$configs['templates']['paths'][] = __DIR__;
$container->setService('config', $configs);
$twig = $container->get(Environment::class);

echo $twig->render('asset.twig');
echo $twig->render('expression.twig');
echo $twig->render(
    'yaml.twig',
    [
        'obj' => [
            'foo' => 'bar',
            'bar' => ['foo' => 'bar', 'bar' => 'baz'],
        ],
    ]
);

$formFactory = Forms::createFormFactory();
$form = $formFactory->createBuilder()
    ->add('firstName', 'Symfony\Component\Form\Extension\Core\Type\TextType')
    ->add('lastName', 'Symfony\Component\Form\Extension\Core\Type\TextType')
    ->add('age', 'Symfony\Component\Form\Extension\Core\Type\IntegerType')
    ->add('color', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', [
    'choices' => ['Red' => 'r', 'Blue' => 'b'],
    ])
    ->getForm();
echo $twig->render(
    'form.twig',
    [
        'form' => $form->createView(),
    ]
);
