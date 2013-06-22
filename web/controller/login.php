<?php
use Symfony\Component\HttpFoundation\Request;

$controller = $app['controllers_factory'];

// Show login page
$controller->get('/', function () use ($app) {
    $data = array();
    include 'common.php';
    $data['headerMenuSelected'] = 'invoice';

    return $app['helper.view']('login.php', $data);
})->bind('login');
 
// Perform login
$controller->post('/check', function() use ($app) {
    $data = array();
    $username = $app['request']->get('username', '');
    $password = $app['request']->get('password', '');

    $result = $app['helper.billrApi.verifyClient']($username, $password);
    if ($result['result'] == 'ok') {
        $app['session']->set('isAuthenticated', true);
        $app['session']->set('user', $result['client']);

        return $app->redirect($app['url_generator']->generate('invoice_list'));
    }
    else {
        $data['error'] = $result['message'];
        return $app['helper.view']('login.php', $data);
    }
})->bind('login_check');

// logout
$controller->get('/logout', function () use ($app) {
    $app['session']->set('isAuthenticated', false);
    return $app->redirect($app['url_generator']->generate('login'));
})->bind('logout');
 
// add authentication checking
$app->before(function (Request $request) use ($app) {
    if ($request->getRequestUri() == $app['url_generator']->generate('login') ||
        $request->getRequestUri() == $app['url_generator']->generate('login_check')) {
        return null;
    }

    if (!$app['session']->get('isAuthenticated')) {
        $ret = $app->redirect($app['url_generator']->generate('login'));
    } else {
        $ret = null;
    }

    return $ret;
}, 0);

return $controller;
