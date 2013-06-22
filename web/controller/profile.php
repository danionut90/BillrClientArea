<?php
$controller = $app['controllers_factory'];

// List
$controller->get('/form', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'profile';

    $user = $app['session']->get('user');
    //$data['projects'] = $app['helper.billrApi.query']('ProductOrder', array('idClient' => $user['id']));

    return $app['helper.view']('profile_form.php', $data);
})->bind('profile_form');

return $controller;
