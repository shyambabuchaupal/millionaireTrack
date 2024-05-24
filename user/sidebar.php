<?php
session_start();
require 'config/functions.php';
$path = "https://millionairetrack.com/admin@millionairetrack/";
if(!isset($_SESSION['user'])){
    header('LOCATION: index.php');
    die();
}
$title = explode('/', $_SERVER['REQUEST_URI']);
if ($title[3] == '') {
    $data = 'overview';
} else {
    $data = explode('.', $title[3])[0];
}
$user = $_SESSION['user'];
$profile = $_SESSION['profile'];
$userId = "SELECT `userId` FROM `users` WHERE `secret_key` = '$user'";
$userDetails = "SELECT  `userId`, `name`, `sponsorId`, `sponsor`, `package`, `profile` FROM `users` WHERE `secret_key` = '$user'";
$userDetails = sqlSelector($userDetails)[0];
$package = "SELECT `Package_name`  FROM `package` WHERE `Package_id` = '".$userDetails['package']."'";
$package = sqlSelector($package)[0];
$page = end(explode('/',$_SERVER['PHP_SELF']));
if(!($userDetails['package']>-1)){
        if(!($page=='courses.php')){
            header('LOCATION: courses.php');
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Millionaire Track</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- simplebar -->
    <link href="assets/css/simplebar.css" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tabler-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/line.css" rel="stylesheet">
    <!-- Css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" id="theme-opt" />

</head>

<body>

    <div class="page-wrapper landrick-theme toggled">
        <nav id="sidebar" class="sidebar-wrapper sidebar-colored">
            <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
                <div class="sidebar-brand">
                    <a href="index.html">
                        <img src="assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                        <img src="assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                        <span class="sidebar-colored">
                            <img src="assets/images/millions-1w.png" height="24" alt="">
                            Millionaire Track
                        </span>
                    </a>
                </div>

                <ul class="sidebar-menu">
                    <li><a href="dashboard.php"><i class="ti ti-home me-2"></i>Overview</a></li>
                    <li><a href="courses.php"><i class="ti ti-home me-2"></i>Courses</a></li>
                    <li><a href="certificate.php"><i class="ti ti-home me-2"></i>Certificate</a></li>
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-user me-2"></i>Profile</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="edit-profile.php">User Profile</a></li>
                                <li><a href="edit-KYC.php">KYC Details</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="javascript:void(0)"><i class="ti ti-brand-gravatar me-2"></i>Affiliate Panel</a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="affiliate.php">Dashboard</a></li>
                                <li><a href="commission-list.php">Commision</a></li>
                                <li><a href="leaderboard.php">Leaderboard</a></li>
                                <li><a href="webinar.php">Webinar</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href=""><i class="ti ti-home me-2"></i>Setting</a></li>
                </ul>
                <!-- sidebar-menu  -->
            </div>
            <!-- Sidebar Footer -->
            <ul class="sidebar-footer list-unstyled mb-0">
                <li class="list-inline-item mb-0">
                    <a href="login.php" class="btn btn-icon btn-soft-light"><i class="ti ti-shopping-cart"></i></a><a href="logout.php"><small class="color-white ms-1">Logout</small></a>
                </li>
            </ul>
            <!-- Sidebar Footer -->
        </nav>
        <main class="page-content bg-light">
            <div class="top-header topHeader-display">
                <div class="header-bar d-flex justify-content-between border-bottom">
                    <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                    <a href="#" class="logo-icon me-3 top-header-extra">
                        <img src="assets/images/logo-icon.png" height="30" class="small" alt="">
                    </a>
                </div>
            </div>
            <div class="container-fluid">
                <div class="layout-specing">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted mb-1">Welcome back, <?=$userDetails['name']?> !</h6>
                            <h5 class="mb-0 text-cap"><?= $data ?></h5>
                        </div>
                        <ul class="list-unstyled mb-0">


                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/<?=$userDetails['profile']?>" class="avatar avatar-ex-small rounded" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="profile.html">
                                            <img src="images/<?=$userDetails['profile']?>" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block"><?=$userDetails['name']?></span>
                                                <small class="text-muted"><?=$userDetails['userId']?></small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-mail"></i></span> Package: <?=$package['Package_name']?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Sponsor: <?=$userDetails['sponsor']?></a>
                                        <a class="dropdown-item text-dark"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span> Sponsor ID: <?=$userDetails['sponsorId']?></a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="logout.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>