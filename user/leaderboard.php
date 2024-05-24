<?php
$month = array('dum','January','Febeary','March','April','May','June','July','August','September','October','November','December');
$year = date('Y');
require 'sidebar.php';
?>
<style>
    .nameDiv{
        display: block;
    }
</style>
<div class="row g-2">
    <div class="col-xl-2 col-lg-3 col-md-4 col-12 mt-4">
        <div class="card rounded border-0 shadow p-4">
            <ul class="nav nav-pills nav-link-soft nav-justified flex-column mt-4 bg-white mb-0" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link rounded active" id="days7-tab" data-bs-toggle="pill" href="#days7" role="tab" aria-controls="7days" aria-selected="false">
                        <div class="text-start px-3">
                            <span class="mb-0"></i>All</span>
                        </div>
                    </a>
                    <!--end nav link-->
                </li>
                <!--end nav item-->

                <li class="nav-item mt-2">
                    <a class="nav-link rounded" id="days30-tab" data-bs-toggle="pill" href="#days30" role="tab" aria-controls="30days" aria-selected="false">
                        <div class="text-start px-3">
                            <span class="mb-0"></i>Last 30 Days</span>
                        </div>
                    </a>
                    <!--end nav link-->
                </li>
                <!--end nav item-->

                <li class="nav-item mt-2">
                    <a class="nav-link rounded" id="all-tab" data-bs-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="false">
                        <div class="text-start px-3">
                            <span class="mb-0"></i>last 7 Days</span>
                        </div>
                    </a>
                    <!--end nav link-->
                </li>
            </ul>
            <!--end nav pills-->
        </div>
    </div>
    <!--end col-->

    <div class="col-xl-10 col-lg-9 col-md-8 col-12 mt-4">
        <div class="tab-content rounded-0 shadow-0" id="pills-tabContent">
            <div class="tab-pane fade show active" id="days7" role="tabpanel" aria-labelledby="all-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">User</th>
                                <th class="border-bottom">Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                             $c=1;
                                             $sql = "SELECT `Reff_User_id`, SUM(`Ref_amount`) total FROM `reference` GROUP BY `Reff_User_id` ORDER BY total DESC limit 10";
                                               $result = sqlSelector($sql);
                                                foreach($result as $data){
                                                    $user_id = $data['Reff_User_id'];
                                                    $user_details_sql = "SELECT `name`,`profile` FROM `users` WHERE `userId` = '$user_id'";
                                                    $user_details_result = sqlSelector($user_details_sql)[0];
                                             ?>
                                             
                                             
                                             
                                                <tr>
                                                    <td><?=$c++;?></td>
                                                    <td><img src = "images/<?=$user_details_result['profile'];?>" class = "userImg" width = "100"/></td>
                                                    <td><div><span class = "nameDiv"><?=$user_details_result['name'];?></span><span class = "nameDiv">Payout: <?=$data['total'];?></span></div></td>
                                                  
                                                    
                                                </tr>
                                               <?php
                                                }
                                               ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <div>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-left"></i></a>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-right"></i></a>
                    </div>

                    <span class="text-muted me-3">Showing 1 - 10 out of 45</span>
                </div>
            </div>
            <div class="tab-pane fade show" id="days30" role="tabpanel" aria-labelledby="30days-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">User</th>
                                <th class="border-bottom">Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $d1 = 01;
                                            $d2 = date('d');
                                                $m1 = (int)date('m');
                                                $m2 = (int)date('m');
                                                $date1 = $year.'-'.'0'.$m1.'-'.'0'.$d1.' 00:00:00';
                                                 if($d1<10){
                                                    $d1 = '0'.$d1;
                                                }
                                                $monLead = $d1.' '.$month[$m1].' - '.$d2.' '.$month[$m2];
                                                
                                                 $query1= "SELECT `Reff_User_id`, SUM(`Ref_amount`) total, Created_date FROM `reference` WHERE `Created_date` > '$date1' GROUP BY `Reff_User_id` ORDER BY total desc limit 10";
                                                $rowre1 = sqlSelector($query1);
                                                $c='1';
                                                foreach($rowre1 as $data){
                                                    $user_id = $data['Reff_User_id'];
                                                    $user_details_sql = "SELECT `name`,`profile` FROM `users` WHERE `userId` = '$user_id'";
                                                    $user_details_result = sqlSelector($user_details_sql)[0];
                                             ?>
                                             <tr>
                                                    <td><?=$c++;?></td>
                                                    <td><img src = "images/<?=$user_details_result['profile'];?>" class = "userImg" width = "100"/></td>
                                                    <td><div><span class = "nameDiv"><?=$user_details_result['name'];?></span><span class = "nameDiv"><?=$data['total'];?></span></div></td>
                                                  
                                                    
                                                </tr>
                                               <?php
                                                }
                                               ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <div>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-left"></i></a>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-right"></i></a>
                    </div>

                    <span class="text-muted me-3">Showing 1 - 10 out of 45</span>
                </div>
            </div>
            <div class="tab-pane fade show" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">User</th>
                                <th class="border-bottom">Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $d1 = date('d')-6;
                                            if($d1<0){
                                                $d1 = 1;
                                            }
                                            $d2 = date('d');
                                                $m = (int)date('m');
                                                if($m<10){
                                                    $m="0".$m;
                                                }
                                                if($d1<10){
                                                    $d1 = '0'.$d1;
                                                }
                                                $date1 = $year.'-'.$m.'-'.$d1.' 00:00:00';
                                                $date1;
                                                $query1= "SELECT `Reff_User_id`, SUM(`Ref_amount`) total, Created_date FROM `reference` WHERE `Created_date` > '$date1' GROUP BY `Reff_User_id` ORDER BY total desc limit 10";
                                                $rowre1 = sqlSelector($query1);
                                                $c='1';
                                                foreach($rowre1 as $data){
                                                    $user_id = $data['Reff_User_id'];
                                                    $user_details_sql = "SELECT `name`,`profile` FROM `users` WHERE `userId` = '$user_id'";
                                                    $user_details_result = sqlSelector($user_details_sql)[0];
                                             ?>
                                             <tr>
                                                    <td><?=$c++;?></td>
                                                    <td><img src = "images/<?=$user_details_result['profile'];?>" class = "userImg" width = "100"/></td>
                                                    <td><div><span class = "nameDiv"><?=$user_details_result['name'];?></span><span class = "nameDiv"><?=$data['total'];?></span></div></td>
                                                  
                                                    
                                                </tr>
                                               <?php
                                                }
                                               ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex align-items-center justify-content-between">
                    <div>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-left"></i></a>
                        <a href="#" class="btn btn-icon btn-sm btn-pills btn-soft-light"><i class="ti ti-arrow-right"></i></a>
                    </div>

                    <span class="text-muted me-3">Showing 1 - 10 out of 45</span>
                </div>
            </div>


        </div>
    </div>
    <!--end col-->
</div>
<?php
require 'footer.php';
?>