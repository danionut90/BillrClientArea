<?php
$controller = $app['controllers_factory'];

// List
$controller->get('/', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'tickets';

    $user = $app['session']->get('user');
    $data['tickets'] = $app['helper.billrApi.query']('Ticket', array('idClient' => $user['id']));

    return $app['helper.view']('ticket_list.php', $data);
})->bind('ticket_list');


return $controller;
