<?php
session_start();
$user = $_SESSION['user'];
require '../config/functions.php';
if(isset($_POST['SubmitKYC'])){
    $bank = filterData($_POST['bank']);
    $name = filterData($_POST['name']);
    $account = filterData($_POST['account']);
    $ifsc = filterData($_POST['ifsc']);
    $address = filterData($_POST['address']);
    $userId = sqlSelector("SELECT `userId` FROM `users` WHERE `secret_key` = ?",'s',$user);
    $userId = $userId[0]['userId'];
    $insertKYC = sqlInsert('INSERT INTO `usersaccount` SET `User_id`=?,`accountName`=?,`accountNumber`=?,`accountIFSC`=?,`accountBank`=?,`accountAddress`=?,`UPI_ID`=?,','ssssss',$userId,$name,$account,$ifsc,$bank,$address);
    if($insertKYC){
            ?>
            <script>
                alert("KYC UPDATED");
                window.location.href = "../edit-KYC.php";
            </script>
            <?php
    }
    else{
            ?>
            <script>
                alert("Something Went Wrong");
                window.location.href = "../edit-KYC.php";
            </script>
            <?php
    }
}

if(isset($_POST['UpdateKYC'])){
    $bank = filterData($_POST['bank']);
    $name = filterData($_POST['name']);
    $account = filterData($_POST['account']);
    $ifsc = filterData($_POST['ifsc']);
    $address = filterData($_POST['address']);
	$upi_id = filterData($_POST['UPI_ID']);
    $userId = sqlSelector("SELECT `userId` FROM `users` WHERE `secret_key` = ?",'s',$user);
    $userId = $userId[0]['userId'];
    $KycStatus = sqlSelector("SELECT `admin_status` FROM `usersaccount` WHERE `User_id` = '$userId'");
    $KycStatus = $KycStatus[0]['admin_status'];
    if(!($KycStatus==1)){
    $insertKYC = sqlUpdate('UPDATE `usersaccount` SET `accountName`=?,`accountNumber`=?,`accountIFSC`=?,`accountBank`=?,`accountAddress`=?,
	`UPI_ID`=? WHERE `User_id`=?','ssssss',$name,$account,$ifsc,$bank,$address,$upi_id,$userId);
	print_r($insertKYC);
        if($insertKYC){
            ?>
            <script>
                alert("KYC UPDATED");
                window.location.href = "../edit-KYC.php";
            </script>
            <?php
    }
    else{
            ?>
            <script>
                alert("Something Went Wrong");
               window.location.href = "../edit-KYC.php";
            </script>
            <?php
    }
    }
    else{
                    ?>
            <script>
                alert("KYC is Approved Can't Be Updated");
                window.location.href = "../edit-KYC.php";
            </script>
            <?php
    }
}
?>