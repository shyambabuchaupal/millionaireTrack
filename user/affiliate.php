<?php
require 'sidebar.php';
$sql = "SELECT * FROM `users` WHERE `secret_key` = '$user'";
$userDetails = sqlSelector($sql)[0];
$y = date('Y');
$d = date('d');
$m = date('m');
$days30 = $y."-".($m-1)."-".$d." 00:00:00";
$todays = $y."-".$m."-".$d." 00:00:00";
$comm = "SELECT SUM(`Ref_amount`) as data  FROM `reference` WHERE `Reff_User_id` = '".$userDetails['userId']."'";
$commRes = sqlSelector($comm)[0];
$comm7 = "SELECT SUM(`Ref_amount`)as data FROM `reference` WHERE `Reff_User_id` = '".$userDetails['userId']."' AND DATE(Created_date)>= DATE(NOW()) - INTERVAL 7 DAY";
$comm7Res = sqlSelector($comm7)[0];
$commtoday = "SELECT SUM(`Ref_amount`) as data FROM `reference` WHERE `Reff_User_id` = '".$userDetails['userId']."'  AND `Created_date`>'$todays'";
$commtodayRes = sqlSelector($commtoday)[0];
if($d ==31){
    $d = 30;
}
$comm30 = "SELECT SUM(`Ref_amount`) as data FROM `reference` WHERE `Reff_User_id` = '".$userDetails['userId']."'  AND `Created_date`>'$days30'";
$comm30Res = sqlSelector($comm30)[0];
$joining = "SELECT count(`Ref_amount`) as data  FROM `reference` WHERE `Reff_User_id` = '".$userDetails['userId']."' AND Level_from = 'Direct'";
$resJoining = sqlSelector($joining)[0];
?>
<style>
    .bg-fcb300d6{
        background: linear-gradient(45deg, #fff 10%, #fcb300d6 95%);
    }
    .bg-3eb6e4{
        background: linear-gradient(45deg, #3eb6e4 10%, #fff 95%);
    }
    .text-202942{
        color: #202942 !important;
    }
</style>
<div class="row dash-res-row">
    <div class="col-md-6">
        <div class="row row-cols-xl-2 row-cols-md-2 row-cols-1">
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-fcb300d6 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Today's Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?=$commtodayRes['data']?>"><?=$commtodayRes['data']?></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-fcb300d6 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Total's Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?=$commRes['data']?>"><?=$commRes['data']?></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <!--end col-->
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-3eb6e4 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Last 7 Days Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?=$comm7Res['data']?>"><?=$comm7Res['data']?></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <!--end col-->
            <div class="col mt-4 dash-res-mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-fcb300d6 rounded shadow p-3 dash-res-p3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-rupee-sign fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Last 30 Days Earning</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?=$comm30Res['data']?>"><?=$comm30Res['data']?></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>




            <div class="col mt-4">
                <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-3eb6e4 rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-pill">
                            <i class="uil uil-users-alt fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-202942">Total Joining</h6>
                            <p class="fs-5 text-dark fw-bold mb-0"><span class="counter-value" data-target="<?=$resJoining['data']?>"><?=$resJoining['data']?></span></p>
                        </div>
                    </div>

                    
                </a>
            </div>
            <div class="col rounded dash-res-extra mt-4">
        <div class="card shadow border-0">
            <div class="p-4 border-bottom">
                <div class="row">
                    <div class="col-md-8 mt-4">
                        <h5 class="mb-0 text-left">Email</h5>
                        <h6 class="text-muted ps-2"><?=$userDetails['email']?></h6>
                        <h5 class="mb-0 text-left">Phone</h5>
                        <h6 class="text-muted ps-2"><?=$userDetails['phone']?></h6>
                        <h5 class="mb-0 text-left">Username</h5>
                        <h6 class="text-muted ps-2"><?=$userDetails['userId']?></h6>
                        <h5 class="mb-0 text-left">Package</h5>
                        <h6 class="text-muted ps-2"><?=$package['Package_name']?></h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!--end col-->
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 mt-4 rounded">
        <div class="card shadow border-0">
            <div class="p-4 border-bottom dash-p-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mt-4 text-md-start text-center dash-res-user">
                            <div class="text-center">
                                <img src="images/<?=$userDetails['profile']?>" class="avatar float-md-center avatar-medium rounded-circle shadow md-4" alt="">
                            </div>
                            <div class="pt-4">
                                <h6 class="mb-0 text-center"><?=$userDetails['name']?></h6>
                                <h6 class="mb-0 text-center">Affiliate Id: <?=$userDetails['userId']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-4 dash-res">
                        <h5 class="mb-0 text-left">Email</h5>
                        <h6 class="text-muted ps-2"><?=$userDetails['email']?></h6>
                        <h5 class="mb-0 text-left">Phone</h5>
                        <h6 class="text-muted ps-2"><?=$userDetails['phone']?></h6>
                        <h5 class="mb-0 text-left">Username</h5>
                        <h6 class="text-muted ps-2"><?=$userDetails['userId']?></h6>
                        <h5 class="mb-0 text-left">Package</h5>
                        <h6 class="text-muted ps-2"><?=$package['Package_name']?></h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>