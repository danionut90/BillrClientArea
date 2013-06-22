<?php
$controller = $app['controllers_factory'];

// List
$controller->get('/', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'projects';

    $user = $app['session']->get('user');
    $data['projects'] = $app['helper.billrApi.query']('ClientProject', array('idClient' => $user['id']));

    return $app['helper.view']('project_list.php', $data);
})->bind('project_list');

// View
$controller->get('/view', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'projects';

    $idProject = $app['request']->get('id', 0);
    $data['project'] = array_pop($app['helper.billrApi.query']('ClientProject', array('id' => $idProject)));
    $data['trackings'] = $app['helper.billrApi.query']('ClientProjectTracking', array('idProject' => $idProject));
    $data['tasks'] = $app['helper.billrApi.query']('ClientProjectTask', array('idProject' => $idProject));
    $data['attachments'] = $app['helper.billrApi.query']('ClientProjectAttachment', array('idProject' => $idProject));

    return $app['helper.view']('project_view.php', $data);
})->bind('project_view');


return $controller;
