<?php
require 'sidebar.php';
$queryDirectIncomes= "SELECT users.name AS username,users.userId as User_id, users.unpaidCount AS Unpaid, users.paidCount AS Paid, users.totalUnpaid AS TotalUnPaidAmnt, users.totalPaid AS TotalPaidAmnt FROM users,usersaccount WHERE users.userId = usersaccount.User_id AND usersaccount.admin_status = 1 AND users.`totalUnpaid` >0 ORDER BY `name` ASC";
$details = sqlSelector($queryDirectIncomes);
$query= "SELECT count(*) as TotalUser  FROM users";
$TotalUser=sqlSelector($query)[0];

$query= "SELECT SUM(Ref_amount) as TotalReff  FROM reference";
$TotalUserReference=sqlSelector($query)[0];

$query= "SELECT count(*) as TotalReff  FROM reference";
$TotalUserReferenceCount=sqlSelector($query)[0];

$queryDirectIncome= "SELECT SUM(Ref_amount) as UnpaidReff  FROM reference WHERE Payment_unpaid = '1'";
$UnpaidReff=sqlSelector($queryDirectIncome)[0];

$queryDirectIncome= "SELECT count(*) as UnpaidReff  FROM reference WHERE Payment_unpaid = '1'";
$UnpaidReffCount=sqlSelector($queryDirectIncome)[0];

$queryDirectIncome= "SELECT SUM(Ref_amount) as PaidReff  FROM reference WHERE Payment_paid = '1'";
$PaidReff=sqlSelector($queryDirectIncome)[0];

$queryDirectIncome= "SELECT count(*) as PaidReff  FROM reference WHERE Payment_paid = '1'";
$PaidReffCount=sqlSelector($queryDirectIncome)[0];
?>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
<div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-user-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Total User</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$TotalUser['TotalUser']?></p>
                </div>
            </div>
        </a>
    </div>
    <!--end col-->

    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-usd-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Total User Reference</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$TotalUserReference['TotalReff']?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-usd-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Total User Reference Count</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$TotalUserReferenceCount['TotalReff']?></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-usd-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Unpaid Refferal</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$UnpaidReff['UnpaidReff']?></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-usd-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Unpaid Refferal Count</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$UnpaidReffCount['UnpaidReff']?></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-usd-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Paid Refferal</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$PaidReff['PaidReff']?></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-usd-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Paid Reff Count</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><?=$PaidReffCount['PaidReff']?></p>
                </div>
            </div>
        </a>
    </div>
    <!--end col-->
</div>
<div class="row g-2">
    <!--end col-->

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-4">
        <div class="tab-content rounded-0 shadow-0" id="pills-tabContent">
            <div class="tab-pane fade show active" id="days7" role="tabpanel" aria-labelledby="all-tab">
                <div class="table-responsive bg-white shadow rounded p-3">
                    <table class="table mb-0" id = "mytable">
                        <thead>
                            <tr>
                                <th class="border-bottom">S.No</th>
                                <th class="border-bottom">User</th>
                                <th class="border-bottom">User Name</th>
                                <th class="border-bottom">Amount Paid</th>
                                <th class="border-bottom">Amount Unpaid</th>
                                <th class="border-bottom">Total Unpaid</th>
                                <th class="border-bottom">Total Paid</th>
                                <th class="border-bottom">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                               foreach($details as $data){
                                $c++;
                                   echo '<tr>';
                                   echo '<td>'.$c.'</td>';
                                   echo '<td>'.$data['User_id'].'</td>';
                                   echo '<td>'.$data['username'].'</td>';
                                   echo '<td>'.$data['Paid'].'</td>';
                                   echo '<td>'.$data['Unpaid'].'</td>';
                                   echo '<td>'.$data['TotalUnPaidAmnt'].'</td>';
                                   echo '<td>'.$data['TotalPaidAmnt'].'</td>';
                                   echo '<td><a style="font-size:12px!important" class = "btn btn-primary" href ="pay-payout.php?userId='.$data['User_id'].'">Update<br>Record<a></td>';
                                   echo '</tr>';
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