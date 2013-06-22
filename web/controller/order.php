<?php
$controller = $app['controllers_factory'];

// List
$controller->get('/', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'orders';

    $user = $app['session']->get('user');
    $data['orders'] = $app['helper.billrApi.query']('ProductOrder', array('idClient' => $user['id']));

    return $app['helper.view']('order_list.php', $data);
})->bind('order_list');

return $controller;
