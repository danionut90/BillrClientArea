<?php
$controller = $app['controllers_factory'];

// List
$controller->get('/', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'contacts';

    $user = $app['session']->get('user');
    $data['contacts'] = $app['helper.billrApi.query']('ClientContact', array('idClient' => $user['id']));

    return $app['helper.view']('contact_list.php', $data);
})->bind('contact_list');

return $controller;