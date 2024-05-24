<?php
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
require 'config/functions.php';
if((isset($_GET['key']))&&isset($_GET['reset'])){
    $key = filterData($_GET['key']);
    $reset = filterData($_GET['reset']);
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
        <link href="../../../unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
        <!-- Css -->
        <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>

        <!-- Hero Start -->
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row g-0 position-relative">
                <div class="col-lg-7 padding-less img order-1" style="background-image:url('assets/images/login.jpg')" data-jarallax='{"speed": 0.5}'></div>
                    <div class="col-lg-5 cover-my-30 order-2 offset-lg-7">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card login-page border-0" style="z-index: 1">
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-center font-weight-800">Reset your account password</h4>  
                                            <form class="login-form mt-4" action="php/change-password-callpack.php" method="POST">
                                                <input name = "key" value = "<?=$key?>" hidden/>
                                                <input name = "reset" value = "<?=$reset?>" hidden/>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">New Password<span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="New Password" name="password" required="">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm New Password<span class="text-danger">*</span></label>
                                                            <div class="form-icon position-relative">
                                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                                <input type="text" class="form-control ps-5" placeholder="Confirm New Password" name="conPassword" required="">
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12 mb-0">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" name = "resetUser">Sign in</button>
                                                        </div>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->
        
        <!-- javascript -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- simplebar -->
        <script src="assets/js/simplebar.min.js"></script>
        <!-- Icons -->
        <script src="assets/js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        
    </body>
</html>
<?php
}else{
    header('LOCATION: ../index.php');
}
?>