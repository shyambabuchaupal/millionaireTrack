<?php
require'config/functions.php';
$packageData = sqlSelector('SELECT `Package_id`, `Package_name`, `Package_price`, `discount`FROM `package`');
if(isset($_GET['sponsor'])){
    $sponsor = filterData($_GET['sponsor']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Millionaire Track</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- simplebar -->
        <link href="assets/css/simplebar.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/tabler-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
         <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
           <link href="https://fonts.googleapis.com/css2?&amp;family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link href="../jquery.app/jqueryscripttop.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <!-- Css -->
        <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

       <!-- Hero Start -->
<section class="cover-user bg-white">
    <div class="container-fluid px-0">
        <div class="row g-0 position-relative">
            <div class="col-lg-5 cover-my-30 order-2">
                <div class="cover-user-img1 d-lg-flex align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0" style="z-index: 1">
                                <div class="card-body p-0">
                                    <h4 class="card-title text-center">Register with Millionaire Track</h4>
                                    <form class="login-form mt-4" autocomplete="on" action="php/cashfree-register.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input type="text" class="form-control ps-5" placeholder="Name" name="name" required="" value="">
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="" value = "">
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="phone-call" class="fea icon-sm icons"></i>
                                                        <input type="number" class="form-control ps-5" placeholder="Phone Number" name="Phone" required="" maxlength="10" value = "">
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Referal Code <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input type="text" class="form-control ps-5" placeholder="Referal Code" name="sponsorId" value = "<?=$sponsor?>"onchange="fetchName(this.value)">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3"> 
                                                    <label class="form-label">Referal User Name <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                        <input id = "sponsor" type="text" class="form-control ps-5" placeholder="Referal User Name" name="sponsorName"  readonly>
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Package <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="package" class="fea icon-sm icons"></i>
                                                        <select name = "package" class="form-control ps-5" required onchange="updatePrice(this.value)">
                                                            <option selected disabled value="">Select Package</option>
                                                            <?php
                                                                if(isset($_GET['package'])){
                                                                    $package = $_GET['package'];
                                                                }
                                                                else{
                                                                    $package = '';
                                                                }
                                                            foreach($packageData as $data){
                                                                if($package == $data['Package_id']){
                                                                    echo '<option value="'.$data['Package_id'].'">'.$data['Package_name'].'</option>';
                                                                }
                                                                else{
                                                                    echo '<option value="'.$data['Package_id'].'">'.$data['Package_name'].'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3"> 
                                                    <label class="form-label">Amount <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"  class="feather feather-user fea icon-sm icons"><path d="M.0022 64C.0022 46.33 14.33 32 32 32H288C305.7 32 320 46.33 320 64C320 81.67 305.7 96 288 96H231.8C241.4 110.4 248.5 126.6 252.4 144H288C305.7 144 320 158.3 320 176C320 193.7 305.7 208 288 208H252.4C239.2 266.3 190.5 311.2 130.3 318.9L274.6 421.1C288.1 432.2 292.3 452.2 282 466.6C271.8 480.1 251.8 484.3 237.4 474L13.4 314C2.083 305.1-2.716 291.5 1.529 278.2C5.774 264.1 18.09 256 32 256H112C144.8 256 173 236.3 185.3 208H32C14.33 208 .0022 193.7 .0022 176C.0022 158.3 14.33 144 32 144H185.3C173 115.7 144.8 96 112 96H32C14.33 96 .0022 81.67 .0022 64V64z"/></svg>
                                                        <input type="text" class="form-control ps-5" placeholder="Amount" name="amount" required="" readonly>
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input type="password" class="form-control ps-5" placeholder="Password" required="" value="" name = "password">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input type="password" class="form-control ps-5" placeholder="Password" required="" value = "" name = "confirm-Password">
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                    </div>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary">Register</button>
                                                </div>
                                            </div><!--end col-->

                                            <div class="mx-auto">
                                                <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="index.php" class="text-dark fw-bold">Sign in</a></p>
                                            </div>
                                        </div><!--end row-->
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div> <!-- end about detail -->
            </div> <!-- end col -->    

            <div class="col-lg-7 offset-lg-5 padding-less img order-1" style="background-image:url('assets/images/register.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->    
        </div><!--end row-->
    </div><!--end container fluid-->
    
</section><!--end section-->
        <!-- Hero End --> 

        <!-- start code in shyam  Night -->

<main>
    <section class="form-section">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="signUP__formDiv">
                            <div class="signUP__formRow">
                                <div class="signUp__images">
                                    <!-- <img class="signIn__desktop" src="#"
                                        onerror="this.onerror=null;this.src='Biz/img/signin-form-banner-desk.png';">
                                    <img class="signIn__mobile" src="#"
                                        onerror="this.onerror=null;this.src='Biz/img/signin-form-banner-mob.png';"> -->
                                        <img src="assets/images/signin-form-banner-desk.png" alt="">
                                </div>
                                <div class="form-divMain">
                                    <div class="form-div">
                                        <div class="col-md-12">
                                            <div class="signUp__title">
                                                <h2>Enroll to MillionaireTrack</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Id</label>
                                                <div style="float: right">
                                                    <label id="lbl_loginid" class="lbl_msg"></label>
                                                    <li id="li_icon" style="display: none"></li>
                                                </div>
                                                <input name="ctl00$ContentPlaceHolder1$txtLoginId" type="email"
                                                    id="txtLoginId" class="form-control" onpaste="return false"
                                                    placeholder="xyz@gmail.com" />

                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Confirm Email</label>
                                                <span
                                                    data-val-controltovalidate="ContentPlaceHolder1_txtconfirmemail"
                                                    data-val-errormessage="*Email Id is not matched"
                                                    id="emailCompare" data-val="true"
                                                    data-val-evaluationfunction="CompareValidatorEvaluateIsValid"
                                                    data-val-controltocompare="txtLoginId"
                                                    data-val-controlhookup="txtLoginId"
                                                    style="color:Red;visibility:hidden;">*Email Id is not
                                                    matched</span>
                                                <div class="pass-div">

                                                    <input name="ctl00$ContentPlaceHolder1$txtconfirmemail"
                                                        type="text" id="ContentPlaceHolder1_txtconfirmemail"
                                                        class="form-control" onpaste="return false" />

                                                </div>

                                            </div>
                                        </div>
                                       <div class="d-flex">
                                         <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enter Mobile Number</label>
                                                <input name="ctl00$ContentPlaceHolder1$txtMobileNumber"
                                                    type="number" id="txtMobileNumber" class="form-control"
                                                    placeholder="+91 |" />

                                                <div>
                                                    <label id="lbl_mobile" class="lbl_msg"></label>
                                                    <li id="li_mobicon" style="display: none"></li>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <div class="pass-div">

                                                    <input name="ctl00$ContentPlaceHolder1$txtPassword"
                                                        type="password" id="txtPassword" class="form-control" />
                                                    <label id="lbl_pwd" class="lbl_msg"></label>

                                                    <span id="ContentPlaceHolder1_lblerrormsg"
                                                        style="color:Red;font-weight:bold;"></span>

                                                </div>

                                            </div>
                                        </div>
                                       </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enter State</label>
                                                <select name="ctl00$ContentPlaceHolder1$dd_state" id="dd_state"
                                                    class="form-control">
                                                    <option value="1">Select State</option>
                                                    <option value="2">Andhra Pradesh</option>
                                                    <option value="3">Arunachal Pradesh</option>
                                                    <option value="4">Assam</option>
                                                    <option value="5">Bihar</option>
                                                    <option value="6">Chandigarh</option>
                                                    <option value="7">Chattisgarh</option>
                                                    <option value="8">Dadra and Nagar Haveli</option>
                                                    <option value="9">Daman and Diu</option>
                                                    <option value="10">Delhi</option>
                                                    <option value="11">Goa</option>
                                                    <option value="12">Gujarat</option>
                                                    <option value="13">Haryana</option>
                                                    <option value="14">Himachal Pradesh</option>
                                                    <option value="15">Jammu and Kashmir</option>
                                                    <option value="16">Jharkhand</option>
                                                    <option value="17">Karnataka</option>
                                                    <option value="18">Kerala</option>
                                                    <option value="19">Lakshadweep</option>
                                                    <option value="20">Madhya Pradesh</option>
                                                    <option value="21">Maharashtra</option>
                                                    <option value="22">Manipur</option>
                                                    <option value="23">Meghalaya</option>
                                                    <option value="24">Mizoram</option>
                                                    <option value="25">Nagaland</option>
                                                    <option value="26">Orissa</option>
                                                    <option value="27">Pondicherry</option>
                                                    <option value="28">Punjab</option>
                                                    <option value="29">Rajasthan</option>
                                                    <option value="30">Tamil Nadu</option>
                                                    <option value="31">Tripura</option>
                                                    <option value="32">Uttarakhand</option>
                                                    <option value="33">Uttaranchal</option>
                                                    <option value="34">Uttar Pradesh</option>
                                                    <option value="35">West Bengal</option>
                                                    <option value="36">Sikkim</option>
                                                    <option value="37">Telangana</option>
                                                    <option value="38">Andaman and Nicobar Islands</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Enter Referral Code</label>
                                                <span style="float: right; color: blue; display: none"
                                                    id="iscodeval">Code Applied Successfully!!</span>
                                                <div class="aff-div">

                                                    <input name="ctl00$ContentPlaceHolder1$refercode"
                                                        type="text" id="refercode" class="form-control" />
                                                    <button type="button" id="apply_code">Apply Code</button>
                                                    <label id="spnname" class="lbl_msg"></label>
                                                    <label id="spnmobile" class="lbl_msg"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="ctl00$ContentPlaceHolder1$hdn_id" id="hdn_id"
                                            value="0" />
                                        <input type="hidden" name="ctl00$ContentPlaceHolder1$hdn_dec_id"
                                            id="hdn_dec_id" value="0" />
                                        <input type="hidden" name="ctl00$ContentPlaceHolder1$hdn_dec_spon"
                                            id="hdn_dec_spon" value="0000" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-ms-12 col-xs-12">
                        <div class="bundle-section">
                            <h3 id="choosebundel">Choose Your Bundle</h3>
                            <div class="bundle-img-div">
                                <div class="col-md-4 col-sm-4 col-xs-12 step1" style="float: left;">
                                <div class="bundle-img course_img">
                                    <img src="assets/images/marketing-mastery.png" alt="">
                                    <h4>Silver</h4>
                                    <span class="orgprice">
                                        <span>₹</span>786
                                    </span>

                                </div>
                            
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12 step1" style="float: left;">
                                <div class="bundle-img course_img">
                                    <img src="assets/images/marketing-mastery.png" alt="">
                                    <h4>Silver</h4>
                                    <span class="orgprice">
                                        <span>₹</span>786
                                    </span>

                                </div>
                            
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12 step1" style="float: left;">
                                <div class="bundle-img course_img">
                                    <img src="assets/images/marketing-mastery.png" alt="">
                                    <h4>Silver</h4>
                                    <span class="orgprice">
                                        <span>₹</span>786
                                    </span>

                                </div>
                            
                            </div>
                            </div>
                        </div>
                    </div>

                   


                 
                   
                  
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                       


                        <div class="submit-btn">

                            <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="Submit"
                                onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnSubmit&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))"
                                id="btnSubmit" class="btn btn-default" />

                        </div>

                       
                    </div>

                </div>

              

            </div>
        </section>
</main>
        <!-- end code in shyam  Night -->
   
       
        <!-- javascript -->
        <script> 
        let package = {
            <?php
                foreach($packageData as $value){
                    echo "'".$value['Package_id']."':"."'".$value['Package_price']."',";
                }
                ?>
        };
        let packageExtra = {
            <?php
                foreach($packageData as $value){
                    echo "'".$value['Package_id']."':"."'".$value['discount']."',";
                }
                ?>
        };
        function fetchName(data){
            fetch('php/fetchname.php?mtid='+data)
  .then(response => response.json())
  .then(data => {
      if(typeof(data.error) =='undefined'){
          document.getElementById('sponsor').value = data[0].name;
      }
      else{
        document.getElementById('sponsor').value = '';
      }
  });

        }
        <?php
        if(isset($_GET['sponsor'])){
            $sponsor = filterData($_GET['sponsor']);
            echo "fetchName('".$sponsor."');";
        }
        ?>
        function submitForm(e){
            var val = document.getElementById('sponsor').value;
            if(val!=''){
                return true;
            }
            return false;
        }
           function updatePrice(data){
               var referal = document.getElementById('sponsor').value;
               if(referal==''){
                   document.getElementsByName('amount')[0].value = packageExtra[data];
               }else{
                   document.getElementsByName('amount')[0].value = package[data];
               }
           }
           <?php
                      if(isset($_GET['package'])){
                        $package = $_GET['package'];
                        echo 'updatePrice("'.$package.'")';
                      }
           ?>
        </script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- simplebar -->
        <script src="assets/js/simplebar.min.js"></script>
        <!-- Icons -->
        <script src="assets/js/feather.min.js"></script>
        <!-- Main Js -->
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        
    </body>


</html>