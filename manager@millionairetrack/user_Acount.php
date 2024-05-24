<?php
require 'sidebar.php';
$queryDirectIncomes= "SELECT users.name AS username,users.userId as User_id, users.unpaidCount AS Unpaid, users.paidCount AS Paid, users.totalUnpaid AS TotalUnPaidAmnt, users.totalPaid AS TotalPaidAmnt FROM users,usersaccount WHERE users.userId = usersaccount.User_id AND usersaccount.admin_status = 1 AND users.`totalUnpaid` >0 ORDER BY `name` ASC limit 500";
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
                                   echo '<td><a class= "btn btn-info">Edit<a>
                                   <a class="btn btn-danger">Delete<a>
                                    </td>';
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