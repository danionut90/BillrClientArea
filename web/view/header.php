<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Client area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= APP_URL ?>/static/styles/bootstrap.css" rel="stylesheet"> 
    <script src="<?= APP_URL ?>/static/js/jquery-1.8.2.min.js"></script>
    <script src="<?= APP_URL ?>/static/js/bootstrap.min.js"></script>

    <style>
        body {
            padding-top: 60px;
        }
    </style>    
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <span class="brand">Client area</span>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li><a href="<?= APP_URL ?>/login/logout"><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs">
                <?php foreach ($mainMenu as $menuId => $menu) { ?>
                    <li <?php if ($menuId == $headerMenuSelected) { ?> class="active" <?php } ?>>
                        <a href="<?php echo $menu['href'] ?>"><?php echo $menu['title'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>