<?php
require 'sidebar.php';
$sql = "SELECT * FROM `usersaccount` WHERE `User_id` = (SELECT `userId` FROM `users` WHERE `secret_key` = ?)";
$details = sqlSelector($sql,'s',$user);
$row = count($details);
if($row==0){
$details = array(
    array(
        'accountName'=>'',
        'accountNumber'=>'',
        'accountIFSC'=>'',
        'accountBank'=>'',
        'accountAddress'=>'',
		'UPI_ID'=>'',
        'admin_status'=>' ',
        'reson'=>'Wating For Approval',
    )
);
}
?>
<div class="row">
    <div class="col-lg-12 mt-4">
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h5 class="text-md-start text-center mb-0">KYC Detail :</h5>

                <div class="mt-4 text-md-start text-center d-sm-flex align-items-center">
                    <img src="images/<?=$profile?>" class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="">
                    <div>
                    <h6 class="mb-0">KYC Status</h6>
                    <?php
                    if($details[0]['admin_status']==2){
                        $status = "Rejected";
                    }
                    elseif($details[0]['admin_status']==1){
                        $status = "Approved";
                    }
                    else{
                        $status = "Submitted For Verification";
                    }
                    ?>
                    <h6 class="mb-0"><?=$status?></h6>
                    </div>
                </div>

                <form action = "php/update-kyc.php" method="POST">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bank Name</label>
                                <div class="form-icon position-relative">
                                    <input name="bank" id="first" type="text" class="form-control ps-5"  value ="<?=$details[0]['accountBank']?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Account Holder Name</label>
                                <div class="form-icon position-relative">
                                    <input name="name" id="first" type="text" class="form-control ps-5"  value ="<?=$details[0]['accountName']?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Account Number</label>
                                <div class="form-icon position-relative">
                                    <input name="account" id="first" type="number" class="form-control ps-5"  value ="<?=$details[0]['accountNumber']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">IFSC Code</label>
                                <div class="form-icon position-relative">
                                    <input name="ifsc" id="email" type="text" class="form-control ps-5" value ="<?=$details[0]['accountIFSC']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Branch</label>
                                <div class="form-icon position-relative">
                  <input name="address" id="number" type="text" class="form-control ps-5"  value ="<?=$details[0]['accountAddress']?>">
                                </div>
                            </div>
                        </div>
						<h4> Enter Your Valid Bank Account Number OR UPI ID<h4>
						
						 <!--end col-->
						<div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">UPI ID</label>
                                <div class="form-icon position-relative">
                                    <input placeholder="8989898989@ybl "name="UPI ID" id="number" type="text" class="form-control ps-5"  value ="<?=$details[0]['UPI_ID']?>">
                                </div>
                            </div>
                        </div>			
						
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            if($row==0){
                                $button = "SubmitKYC";
                            }
                            else{
                                $button="UpdateKYC";
                            }
                            if(!($details[0]['admin_status']==1)){
                                echo '<input type="submit" id="submit" name="'.$button.'" class="btn btn-primary">';
                            }
                            //echo '<input type="submit" id="submit" name="'.$button.'" class="btn btn-primary">';
                            ?>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
                <!--end form-->
            </div>
        </div>
    </div>
    <!--end col-->

</div>
<?php
require 'footer.php';
?>