<?php
require 'sidebar.php';
ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
require 'config/functions.php';
if(isset($_POST['examUpload'])){
    $file = $_FILES['examCSV'];
    if($file['error']==0){
         if (($open = fopen($file['tmp_name'], "r")) !== FALSE) {
        $c = 0;
    while (($data = fgetcsv($open, ",")) !== FALSE) 
    { 
        $sql = "UPDATE `users` SET `package`=?,`status`='ACTIVE' WHERE `email` = ?";
        $activeSql = sqlUpdate($sql,'ss',$data[2],$data[1]);
        $userPackage = $data[2];
        $sql = "SELECT `sponsorId`,`package`,`userId` FROM `users` WHERE `email` = '$data[1]'";
        $emailChecker = sqlSelector($sql)[0];
        echo $emailChecker['userId'].'<br/>';
        $directPackage = "SELECT `package`,`sponsorId`  FROM `users` WHERE `userId` = '".$emailChecker['sponsorId']."'";
        $directPackageres = sqlSelector($directPackage)[0];
        $passivePackage = "SELECT `package`  FROM `users` WHERE `userId` = '".$directPackageres['sponsorId']."'";
        $passivePackageres = sqlSelector($passivePackage)[0];
        $directPackage = $directPackageres['package'];
        $directId = $emailChecker['sponsorId'];
        $passiveId = $directPackageres['sponsorId'];
        $passivePackage = $passivePackageres['package'];
        $checkDirectComm = "SELECT * FROM `reference` WHERE `User_id` = '".$emailChecker['userId']."' AND `Reff_User_id` = '".$directId."'";
        $checkDirectCommRes = sqlSelector($checkDirectComm);
        $checkPassiveComm = "SELECT * FROM `reference` WHERE `User_id` = '".$emailChecker['userId']."' AND `Reff_User_id` = '".$passiveId."'";
        $checkPassiveCommRes = sqlSelector($checkPassiveComm);
        if(count($checkDirectCommRes)==0){
            if($userPackage<$directPackage){
                $directPackage = $userPackage;
            }
            $directAmount = "SELECT`Direct` FROM `package` WHERE `Package_id` = ?";
            $directValue = sqlSelector($directAmount,'s',$directPackage);
            $directValue = $directValue[0]['Direct'];
            $DirectCommissionSql = "INSERT INTO `reference` SET `User_id`=?,`Reff_User_id`=?,`Account_id`='Excel',`Ref_amount`=?,`Level_from`='Direct',`Amount_transfer_Date`=NUll,`Payment_Status`='Pending',`Payment_unpaid`='1',`Payment_paid`='0',`Ref_process`='API',`date`='',`status`='1',`payment_id`='EXCEL'";
            $directCommissionInsert = sqlInsert($DirectCommissionSql,'sss',$emailChecker['userId'],$directId,$directValue);
        }
        if(count($checkPassiveCommRes)==0){
                if($userPackage<$passivePackage){
                $passivePackage = $userPackage;
            }
            $PassiveAmount = "SELECT `passive` FROM `package` WHERE `Package_id` = ?";
            $passiveValue = sqlSelector($PassiveAmount,'s',$passivePackage);
            $passiveValue = $passiveValue[0]['passive'];
            $PassiveCommissionSql = "INSERT INTO `reference` SET `User_id`=?,`Reff_User_id`=?,`Account_id`='Excel',`Ref_amount`=?,`Level_from`='Passive',`Amount_transfer_Date`=NUll,`Payment_Status`='Pending',`Payment_unpaid`='1',`Payment_paid`='0',`Ref_process`='API',`date`='',`status`='1',`payment_id`='EXCEL'";
            $directCommissionInsert = sqlInsert($PassiveCommissionSql,'sss',$emailChecker['userId'],$passiveId,$passiveValue);
        }
    }
    fclose($open);
  }
  else{
        $data = array('res' => 'success');
        exit(json_encode($data));
  }
    }else{
         $data = array('res' => 'error');
                exit(json_encode($data));
    }
}

?>
<form id = "examForm" action = "excel-update.php" enctype="multipart/form-data" method = "POST">
   <input type = "file" id = "examCSV"  name = "examCSV"/>
<button class="btn btn-primary mt-4 mb-0" type="submit" id = "uploadCSVFile" name = "examUpload">Upload</button>
</form>

<?php
require 'footer.php';
?>