<?php
$data['mainMenu'] = array(
    'invoices'  => array('title' => 'Invoices',   'class' => 'icon-home',  'href' => $app['url_generator']->generate('invoice_list')),
    'tickets'   => array('title' => 'Tickets',    'class' => 'icon-home',  'href' => $app['url_generator']->generate('ticket_list')),
    'projects'  => array('title' => 'Projects',   'class' => 'icon-home',  'href' => $app['url_generator']->generate('project_list')),
    'orders'    => array('title' => 'Orders',     'class' => 'icon-home',  'href' => $app['url_generator']->generate('order_list')),
    'profile'   => array('title' => 'Profile',    'class' => 'icon-home',  'href' => $app['url_generator']->generate('profile_form')),
    'contacts'  => array('title' => 'Contacts',   'class' => 'icon-home',  'href' => $app['url_generator']->generate('contact_list')),
);
