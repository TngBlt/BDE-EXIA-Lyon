<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php if(isset($customTitle)){ echo $customTitle." - "; }?>BDE Cesi Lyon</title>
    <link rel="stylesheet" href="/static/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="icon" href="../static/img/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/static/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/static/css/foothead.css"/>
    <?php if(isset($_GET["admin"])): ?>
    <link rel="stylesheet" type="text/css" href="/static/css/adminBar.css"/>
    <?php endif; ?>
    <?php if(isset($customHead)){ echo $customHead; }?>
</head>
<body>
<?php if(isset($_GET["admin"])): ?>
<div class="admin-toolbar-container container-fluid">
    <div class="admin-toolbar row">
        <div class="col-12 col-md-2 admin-toolbar-title">
            Admin login
        </div>
        <div class="admin-toolbar-action col-auto both-lines">
            <i class="fa fa-plus" aria-hidden="true"></i> Add <i class="fa fa-caret-down admin-toolbar-dropdown-icon" aria-hidden="true"></i>
            <ul class="admin-toolbar-dropdown">
                <li class="admin-toolbar-dropdown-item"><a href="#">Page</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Member</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Event</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Product</a></li>
            </ul>
        </div>
        <div class="admin-toolbar-action col-auto">
            <i class="fa fa-location-arrow" aria-hidden="true"></i> Go to <i class="fa fa-caret-down admin-toolbar-dropdown-icon" aria-hidden="true"></i>
            <ul class="admin-toolbar-dropdown">
                <li class="admin-toolbar-dropdown-item"><a href="#">Pages</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Events</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Members</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Gallery</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Shop</a></li>
                <li class="admin-toolbar-dropdown-item"><a href="#">Purchases</a></li>
            </ul>
        </div>
        <?php if(isset($customActions)): ?>
        <div class="admin-toolbar-action col-auto">
            <i class="fa fa-bolt" aria-hidden="true"></i> Actions <i class="fa fa-caret-down admin-toolbar-dropdown-icon" aria-hidden="true"></i>
            <ul class="admin-toolbar-dropdown">
                <?= $customActions ?>
            </ul>
        </div>
        <?php endif; ?>
        <div class="admin-toolbar-flex-separator"></div>
        <div class="admin-toolbar-action col-auto inversed-lines" title="Disconnect">
            <i class="fa fa-power-off" aria-hidden="true"></i>
        </div>
    </div>
</div>
<?php endif; ?>
<header class="container-fluid main-header-container">
    <div class="main-header row no-gutters">
        <a href="/" class="main-header-logo col-12 col-md-1">
            <img class="main-header-logo-img" src="/static/img/logobde.svg" alt="logo" />
        </a>
        <nav class="main-navbar-container col-12 col-md-8">
            <div class="row justify-content-left main-navbar">
                <a href="/" class="col-12 col-md-auto"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
                <a href="/events.php" class="col-12 col-md-auto"><i class="fa fa-calendar" aria-hidden="true"></i>Events</a>
                <a href="/gallery.php" class="col-12 col-md-auto"><i class="fa fa-picture-o" aria-hidden="true"></i>Gallery</a>
                <a href="/shop.php" class="col-12 col-md-auto"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Shop</a>
                <a href="/members.php" class="col-12 col-md-auto"><i class="fa fa-users" aria-hidden="true"></i>Members</a>
            </div>
        </nav>
        <div class="col-12 col-md-3 main-header-connection-container">
            <div class="row justify-content-center main-header-connection align-items-center">
                <div class="col-md-5 main-header-connection-btn-container">
                    <a href="../Signin/signin.php" class="main-header-connection-btn" >Log in</a>
                </div>
                <div class="col-md-5 main-header-connection-btn-container">
                    <a href="../Signin/login.php" class="main-header-connection-btn">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="container main-page">