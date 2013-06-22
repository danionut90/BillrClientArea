<?php
$controller = $app['controllers_factory'];

// List
$controller->get('/', function () use ($app) {
	$data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'invoices';

    $user = $app['session']->get('user');
    $data['invoices'] = $app['helper.billrApi.query']('ClientInvoice', array('idClient' => $user['id']));
    $data['estimates'] = $app['helper.billrApi.query']('ClientEstimate', array('idClient' => $user['id']));

    return $app['helper.view']('invoice_list.php', $data);
})->bind('invoice_list');

// View
$controller->get('/view', function () use ($app) { 
    $idInvoice = $app['request']->get('id', 0);

	$data = array();
    $data['invoice'] = $app['helper.billrApi.query']('ClientInvoice', array('id' => $idInvoice));

    return $app['twig']->render('invoice_view.html.twig', $data);
})->bind('invoice_view');

return $controller;
