<?php
require 'sidebar.php';
$commissionDetails = "SELECT `reference`.`User_id`,`reference`.`Ref_amount`, `reference`.`Level_from`, `reference`.`Amount_transfer_Date`,`reference`.`Created_date`,`users`.`name`,`users`.`package` FROM `reference`,`users` WHERE `users`.`userId` = `reference`.`User_id` AND  `reference`.`Reff_User_id` = '".$userDetails['userId']."' ORDER BY `reference`.`Created_date` DESC";
$commission = sqlSelector($commissionDetails);
$commissionDirectDetails = "SELECT `reference`.`User_id`,`reference`.`Ref_amount`, `reference`.`Level_from`, `reference`.`Amount_transfer_Date`,`reference`.`Created_date`,`users`.`name`,`users`.`package` FROM `reference`,`users` WHERE `users`.`userId` = `reference`.`User_id` AND  `reference`.`Reff_User_id` = '".$userDetails['userId']."' AND `reference`.`Level_from` = 'Direct' ORDER BY `reference`.`Created_date` DESC";
$commissionDirect = sqlSelector($commissionDirectDetails);
$commissionPassiveDetails = "SELECT `reference`.`User_id`,`reference`.`Ref_amount`, `reference`.`Level_from`, `reference`.`Amount_transfer_Date`,`reference`.`Created_date`,`users`.`name`,`users`.`package` FROM `reference`,`users` WHERE `users`.`userId` = `reference`.`User_id` AND  `reference`.`Reff_User_id` = '".$userDetails['userId']."' AND `reference`.`Level_from` = 'Passive1' ORDER BY `reference`.`Created_date` DESC";
$commissionPassive = sqlSelector($commissionPassiveDetails);
?>
<div class="row g-2">
    <div class="col-xl-2 col-lg-3 col-md-4 col-12 mt-4">
        <div class="card rounded border-0 shadow p-4">
            <ul class="nav nav-pills nav-link-soft nav-justified flex-column mt-4 bg-white mb-0" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link rounded active" id="all-tab" data-bs-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="false">
                        <div class="text-start px-3">
                            <span class="mb-0"></i>ALL</span>
                        </div>
                    </a>
                    <!--end nav link-->
                </li>
                <!--end nav item-->

                <li class="nav-item mt-2">
                    <a class="nav-link rounded" id="direct-tab" data-bs-toggle="pill" href="#direct" role="tab" aria-controls="direct" aria-selected="false">
                        <div class="text-start px-3">
                            <span class="mb-0"></i>Direct</span>
                        </div>
                    </a>
                    <!--end nav link-->
                </li>
                <!--end nav item-->

                <li class="nav-item mt-2">
                    <a class="nav-link rounded" id="passive-tab" data-bs-toggle="pill" href="#passive" role="tab" aria-controls="passive" aria-selected="false">
                        <div class="text-start px-3">
                            <span class="mb-0"></i>Passive</span>
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
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">Level</th>
                                <th class="border-bottom">Name</th>
                                <th class="border-bottom">Date Of Joining</th>
                                <th class="border-bottom">Package</th>
                                <th class="border-bottom">Commission</th>
                                <th class="border-bottom">Amount TransferDate</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($commission as $data){
                                $c++;
                                if($data['package']==0){
                                    $p = 'Elite';
                                }elseif($data['package']==1){
                                    $p = 'Silver';
                                }elseif($data['package']==12){
                                    $p = 'Gold';
                                }
                                if($data['Amount_transfer_Date']==''){
                                    $ATD = 'UnPaid';
                                }else{
                                    $ATD = $data['Amount_transfer_Date'];
                                }
                                
                            echo '<tr>
                                <td>'.$c.'</td>
                                <td>'.$data['Level_from'].'</td>
                                <td>'.$data['name'].'</td>
                                <td>'.$data['Created_date'].'</td>
                                <td>'.$p.'</td>
                                <td>'.$data['Ref_amount'].'</td>
                                <td>'.$ATD.'</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show" id="direct" role="tabpanel" aria-labelledby="direct-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">Name</th>
                                <th class="border-bottom">Date Of Joining</th>
                                <th class="border-bottom">Package</th>
                                <th class="border-bottom">Commission</th>
                                <th class="border-bottom">Amount TransferDate</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($commissionDirect as $data){
                                $c++;
                                if($data['package']==0){
                                    $p = 'Elite';
                                }elseif($data['package']==1){
                                    $p = 'Silver';
                                }elseif($data['package']==12){
                                    $p = 'Gold';
                                }
                                if($data['Amount_transfer_Date']==''){
                                    $ATD = 'UnPaid';
                                }else{
                                    $ATD = $data['Amount_transfer_Date'];
                                }
                                
                            echo '<tr>
                                <td>'.$c.'</td>
                                <td>'.$data['name'].'</td>
                                <td>'.$data['Created_date'].'</td>
                                <td>'.$p.'</td>
                                <td>'.$data['Ref_amount'].'</td>
                                <td>'.$ATD.'</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show" id="passive" role="tabpanel" aria-labelledby="passive-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">Name</th>
                                <th class="border-bottom">Date Of Joining</th>
                                <th class="border-bottom">Package</th>
                                <th class="border-bottom">Commission</th>
                                <th class="border-bottom">Amount TransferDate</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($commissionPassive as $data){
                                $c++;
                                if($data['package']==0){
                                    $p = 'Elite';
                                }elseif($data['package']==1){
                                    $p = 'Silver';
                                }elseif($data['package']==12){
                                    $p = 'Gold';
                                }
                                if($data['Amount_transfer_Date']==''){
                                    $ATD = 'UnPaid';
                                }else{
                                    $ATD = $data['Amount_transfer_Date'];
                                }
                                
                            echo '<tr>
                                <td>'.$c.'</td>
                                <td>'.$data['name'].'</td>
                                <td>'.$data['Created_date'].'</td>
                                <td>'.$p.'</td>
                                <td>'.$data['Ref_amount'].'</td>
                                <td>'.$ATD.'</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>
    <!--end col-->
</div>
<?php
require 'footer.php';
?>