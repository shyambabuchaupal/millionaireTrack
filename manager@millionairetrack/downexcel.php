<?php
require 'config/functions.php';
session_start();
$var_start_date=$_SESSION['var_start_date'];
$var_end_date=$_SESSION['var_end_date'];
$queryDirectIncomes="SELECT usersaccount.accountName,usersaccount.accountNumber,usersaccount.accountIFSC,users.userId FROM usersaccount INNER JOIN users on users.userId=usersaccount.User_id AND users.joining_date BETWEEN '".$var_start_date."'AND '".$var_end_date."'";
$details = sqlSelector($queryDirectIncomes);
$html='<table><tr><td>S.No</td><td>UserName</td><td>Account Number</td><td>Account IFSC</td><td>UserId</td></tr>';
$c=0;
foreach($details as $row){
    $c++;
    $html.='<tr><td>'.$c.'</td><td>'.$row['accountName'].'</td><td>'.$row['accountNumber'].'</td><td>'.$row['accountIFSC'].'</td><td>'.$row['userId'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report121.xls');
ob_end_flush();
echo $html;
?>