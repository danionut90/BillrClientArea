<?php
$controller = $app['controllers_factory'];

$controller->get('/', function () { 
    return new $app->redirect($app['url_generator']->generate('invoice_list'));
});

return $controller;