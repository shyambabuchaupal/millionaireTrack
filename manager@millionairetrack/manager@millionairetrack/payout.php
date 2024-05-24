<?php
require 'sidebar.php';
error_reporting(E_ERROR|E_PARSE);
$_SESSION['var_start_date']=$_POST['start_date'];
$_SESSION['var_end_date']=$_POST['end_date'];
$var_start_date=$_POST['start_date'];
$var_end_date=$_POST['end_date'];
$queryDirectIncomes="SELECT usersaccount.accountName,usersaccount.accountNumber,usersaccount.accountIFSC,users.userId FROM usersaccount INNER JOIN users on users.userId=usersaccount.User_id AND users.joining_date BETWEEN '".$var_start_date."'AND '".$var_end_date."'";
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

<div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 card-manager-try">
    <div class="col mt-2 p-4  try-card-manager">
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
    <div class="col mt-2 p-4  try-card-manager">
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

    <div class="col mt-2 p-4  try-card-manager">
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
    <div class="col mt-2 p-4  try-card-manager">
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
    <div class=" mt-2 p-4 try-card-manager">
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
    <div class="col mt-2 p-4  try-card-manager" >
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
    <div class="col mt-2 p-4  try-card-manager ">
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

<form method="POST">
  <div class='try-start-date'>
    <div class="form-group pb-2">
    <label for="start_date">Start Date</label>
    <input type="date" class="form-control" id="start_date" name="start_date">
  </div>
  </div>
 <div class='try-end-date'>
     <div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" class="form-control" id="end_date" name="end_date">
  </div>
 </div>
 <div class='try-manger-button'>
     <button type="submit" class="btn btn-primary">Submit</button>
 </div>
 <div class='try-card-excel'>
    <a href ="downexcel.php">
          <button type="button" class="btn btn-primary"> Download Excel Sheet</button> <a>
 </div>
</form>

<!--try code for php  -->
<!--<?php/*
$conn=mysqli_connect('localhost','root','','datedb');
if($conn){
echo 'connection to the database established';
}
else{
 echo 'connection failed ';
}
    //connect to db
    $nickname= $_POST["nickname"];
    $sql = "SELECT * FROM users  WHERE nickname = '".$nickname."'";
    print_r($sql);
    $result = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    echo '<br>';
    echo $numRows;
    //disconnect to db
*/?>-->

<!--<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Taking data form front and dynmically create code</title>
    </head>
    <body>
        <div>
            <form method="post" >
                <label>name</label>
                <input name="nickname" type="text" id="nickname">
                <label> pwd</label>
                <input name="password" type="text" id="password" class="hiding">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
-->
<!-- --> 
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
                                <th class="border-bottom">UserName</th>
                                <th class="border-bottom">Account Number</th>
                                <th class="border-bottom">Account ISFC</th>
                                <th class="border-bottom">UserId</th>
                               <!-- <th class="border-bottom">Total Unpaid</th>
                                <th class="border-bottom">Total Paid</th>
                                <th class="border-bottom">Action</th>-->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                               foreach($details as $data){
                                $c++;
                                   echo '<tr>';
                                   echo '<td>'.$c.'</td>';
                                   echo '<td>'.$data['accountName'].'</td>';
                                   echo '<td>'.$data['accountNumber'].'</td>';
                                   echo '<td>'.$data['accountIFSC'].'</td>';
                                   echo '<td>'.$data['userId'].'</td>';
                                  // echo '<td><a class = "btn btn-primary" href = "pay-payout.php?userId='.$data['User_id'].'">Pay<a></td>';
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