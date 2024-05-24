<?php
require 'config/functions.php';
if($_GET['id']){
    $id = $_GET['id'];
}
$sql = "SELECT users.name AS username,users.userId AS uniqe_id,users.userId as User_id,
(SELECT COUNT(`Reference_id`) FROM reference WHERE `Payment_unpaid`=1 AND `Reff_User_id`=users.userId AND status='1') AS Unpaid,
(SELECT COUNT(`Reference_id`)FROM reference WHERE `Payment_paid`=1 AND `Reff_User_id`=users.userId AND status='1') AS Paid,
(SELECT SUM(`Ref_amount`) FROM reference WHERE `Payment_unpaid`=1 AND `Reff_User_id`=users.userId AND status='1') AS TotalUnPaidAmnt,
(SELECT SUM(`Ref_amount`)FROM reference WHERE `Payment_paid`=1 AND `Reff_User_id`=users.userId AND status='1') AS TotalPaidAmnt,
(SELECT SUM(`Ref_amount`)FROM reference WHERE `Reff_User_id`=users.userId AND status='1') AS TotalAmnt
FROM users where `userId` = '$id'";
$query = sqlSelector($sql);
foreach($query as $row){
    $userId = $row['User_id'];
    
    $countUnpaid = $row['Unpaid'];
    $countPaid = $row['Paid'];
    $countTotalUnPaidAmnt = $row['TotalUnPaidAmnt'];
    $countTotalPaidAmnt = $row['TotalPaidAmnt'];
    
    $sql1 = "UPDATE `users` SET `paidCount`='$countPaid',`unpaidCount`='$countUnpaid',`totalUnpaid`='$countTotalUnPaidAmnt',`totalPaid`='$countTotalPaidAmnt' WHERE userId='$userId'";
    $res = sqlSelector($sql1);
    if(count($res)>0){
        die('success');
    }
    else{
        die('error');
    }
}


?>