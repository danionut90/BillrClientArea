<?php

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('', __DIR__.'/business');

include 'config.php';
include 'mapping.php';
include 'function.php';

$app = new Silex\Application();

$app['debug'] = true;

// Configure services
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
 
$app->register(new Helper\BillrApi());
$app->register(new Helper\View());

// Configure controller
$app->mount('/', include 'controller/index.php');
$app->mount('/login', include 'controller/login.php');
$app->mount('/invoice', include 'controller/invoice.php');
$app->mount('/order', include 'controller/order.php');
$app->mount('/profile', include 'controller/profile.php');
$app->mount('/ticket', include 'controller/ticket.php');
$app->mount('/project', include 'controller/project.php');
$app->mount('/contact', include 'controller/contact.php');

// Run
$app->run();
