<?php
// ini_set ('display_errors', 'on');
//  ini_set ('log_errors', 'on');
//  ini_set ('display_startup_errors', 'on');
//  ini_set ('error_reporting', E_ALL);
require 'config/functions.php';
if($_GET['userId'])
{   $userId = filterData($_GET['userId']);
    $userDetails = "SELECT * FROM `users` WHERE `userId` = '$userId'";
    $userDetailsRes = sqlSelector($userDetails)[0];
    $userAccDetails = "SELECT * FROM `usersaccount` WHERE `User_id` = '$userId'";
    $userAccDetailsRes = sqlSelector($userAccDetails)[0];
    $sql1 = "SELECT SUM(`Ref_amount`) AS TotalUnPaidAmnt FROM reference WHERE `Payment_unpaid`=1 AND `Reff_User_id`= '$userId' AND status='1'";
				$res = sqlSelector($sql1)[0];
				$referUserId = $userId;
				$emailpayment = $userDetailsRes['email'];	
				 $namepayment = $userDetailsRes['name'];
				 $totalpayment = $res['TotalUnPaidAmnt'];
				 $accountNumber =$userAccDetailsRes['accountNumber'];
				 $accountIFSC =$userAccDetailsRes['accountIFSC'];
				 $date=date('d-m-Y'); 
				 $apiname = 'Transaction';
	
	$picking_response_from_table="select * from `payout`where `userId`='$userId' ";
    $picking_response_from_table_res = sqlSelector($picking_response_from_table)[0];
	print_r($picking_response_from_table_res );
    $new_response=$picking_response_from_table_res;
      	
		if(1)
		{
            echo 'database is updated successfully';
     	    $CORPID = $new_response['CORP_ID'];
     	    $USER_ID = $new_response['USER_ID'];
     	    $AGGR_ID = $new_response['AGGR_ID'];
     	    $AGGR_NAME = $new_response['AGGR_NAME'];
     	    $REQID = $new_response['REQID'];
     	    $STATUS = $new_response['STATUS'];
     	    $UNIQUEID = $new_response['UNIQUEID'];
     	    $URN = $new_response['URN'];
     	    $UTRNUMBER = $new_response['UTRNUMBER'];
     	    $RESPONSE = $new_response['RESPONSE'];
     	    $sql_payment_response = "INSERT INTO `payout` SET `userId`='userId',`CORP_ID`=$CORPID,`USER_ID`=$USER_ID,`AGGR_ID`=$AGGR_ID,`AGGR_NAME`=$AGGR_NAME,`REQID`=$REQID,`STATUS`=$STATUS,`UNIQEID`=$UNIQUEID,`URN`=$URN,`UTRNUMBER`=$UTRNUMBER,`RESPONSE`= $RESPONSE,`AMOUNT`=100,`DATE`='11-12-2022',`parameter`=Null,`AccountNo`=Null";
    		$res = sqlInsert($sql_payment_response);
    		$update_response = "UPDATE `reference` set `Amount_transfer_Date`='$date' ,`Payment_unpaid`=0,`Payment_paid`=1 where Reff_User_id='$userId' AND `Payment_unpaid`= '1'";
    		$update_res = sqlUpdate($update_response,'s',$referUserId);
    		$updateDataCommission = "SELECT users.name AS username,users.userId AS uniqe_id,users.`userId` as User_id, 
            (SELECT COUNT(`Reference_id`) FROM reference WHERE `Payment_unpaid`=1 AND `Reff_User_id`=users.`userId` AND status='1') AS Unpaid, 
            (SELECT COUNT(`Reference_id`)FROM reference WHERE `Payment_paid`=1 AND `Reff_User_id`=users.`userId` AND status='1') AS Paid, 
            (SELECT SUM(`Ref_amount`) FROM reference WHERE `Payment_unpaid`=1 AND `Reff_User_id`=users.`userId` AND status='1') AS TotalUnPaidAmnt, 
            (SELECT SUM(`Ref_amount`)FROM reference WHERE `Payment_paid`=1 AND `Reff_User_id`=users.`userId` AND status='1') AS TotalPaidAmnt, 
            (SELECT SUM(`Ref_amount`)FROM reference WHERE `Reff_User_id`=users.`userId` AND status='1') AS TotalAmnt 
            FROM users where users.email = '$emailpayment'";
                $updateCommission = sqlSelector($updateDataCommission)[0];
                echo '<br>';
                print_r($updateCommission);
                $userId = $updateCommission['User_id'];
                print_r($userId);
                echo 'this is user id';
                 $countUnpaid = $updateCommission['Unpaid'];
                 $countPaid = $updateCommission['Paid'];
                  $countTotalUnPaidAmnt = $updateCommission['TotalUnPaidAmnt'];
                  $countTotalPaidAmnt = $updateCommission['TotalPaidAmnt'];
                 $sql5 = "UPDATE `users` SET `paidCount`='$countPaid',`unpaidCount`='$countUnpaid',`totalUnpaid`='$countTotalUnPaidAmnt',`totalPaid`='$countTotalPaidAmnt' WHERE userId='$userId'";
             $res = sqlSelector($sql5);
    		$to = $emailpayment;
              $subject = "Congratulations Payment Sent";
                          $message = "<img src='https://millionairetrack.com/assets/images/payout.jpeg' style='width:100%'><br><br>" .
                "Hey, " . $namepayment . "<br><br>" .
                "We hope you are doing well today:)<br><br>" .
                "Many Many Congratulations !!! <br><br>" .
                "You Have Earned (" . $totalpayment . ")<br><br>" .
                " <br>" .
                "Team Millionaire Track ";
            //   $message = "Hi, ".$namepayment."\r\n\r\n\r\n".
            //                       "You Have Earned " .$totalpayment." INR 
            //                       We are Happy To Inform You That We Have Transferred Your Payment Into 
            //                       Your Bank Account.
            //                       <br/><br/>
            //                       Thank You
            //                       <br/>
            //                       Team <b>Millionairetrack</b>
            //                       \r\n\r\n\r\n";
                                  $headers = 'MIME-Version: 1.0' . "\r\n";
                                $headers.= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                                $headers.= 'From: <noreply@millionairetrack.com> '."\n";
             //$from = "From: info@millionairetrack.in";
             mail($to,$subject,$message,$headers);
    		echo'success';
     	}else{
            echo 'i am else condition means else condition is running';
     	    $CORPID = "Something Went Wrong";
     	    $USER_ID = 'MOHDAHME';
     	    $AGGR_ID = 'OTOE0399';
     	    $AGGR_NAME = 'YIEP';
     	    $REQID = $new_response['ERRORCODE'];
     	    $STATUS = $new_response['STATUS'];
     	    $UNIQUEID = $new_response['ERRORCODE'];
     	    $URN = $new_response['RESPONSECODE'];
     	    $UTRNUMBER = $new_response['RESPONSECODE'];
     	    $RESPONSE = $new_response['RESPONSE'];
     	    $newsource = $new_response['MESSAGE'];
     	    $sql_payment_response = "INSERT INTO `payout` SET `userId`=?,`CORP_ID`=?,`USER_ID`=?,`AGGR_ID`=?,`AGGR_NAME`=?,`REQID`=?,`STATUS`=?,`UNIQEID`=?,`URN`=?,`UTRNUMBER`=?,`RESPONSE`=?,`AMOUNT`=?,`DATE`=?,`parameter`=?";
    		$res = sqlInsert($sql_payment_response,'ssssssssssssss',$referUserId,$CORPID,$USER_ID,$AGGR_ID,$AGGR_NAME,$REQID,$STATUS,$UNIQUEID,$URN,$UTRNUMBER,$RESPONSE,$totalpayment,$date,$newsource);
    		    		$to = $emailpayment;
              $subject = "Payout Unsuccess";
                          $message = "<img src='https://millionairetrack.com/assets/images/payout.jpeg' style='width:100%'><br><br>" .
                "Hey, " . $namepayment . "<br><br>" .
                "We hope you are doing well today:)<br><br>" .
                "Your Payout of this week is failed !!! Due to the following reason <br><br>" .
                $newsource." <br><br>" .
                " <br>" .
                "Team Millionaire Track ";
                                  $headers = 'MIME-Version: 1.0' . "\r\n";
                                $headers.= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                                $headers.= 'From: <noreply@millionairetrack.com> '."\n";
								mail($to,$subject,$message,$headers);
								echo'Payout Failed Due To '.$newsource;
     	}
}

?>