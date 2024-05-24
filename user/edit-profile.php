<?php
require 'sidebar.php';
$details = sqlSelector("SELECT `userId`,`name`, `email`, `phone`,`sponsorId`, `sponsor`, `city`, `address`,`profile` FROM `users` WHERE `secret_key` = ?",'s',$user);
?>
<style>
    .modal{
        position:fixed;
    }
</style>
<div class="row">
    <div class="col-lg-8 mt-4">
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h5 class="text-md-start text-center mb-0">Personal Detail :</h5>

                <div class="mt-4 text-md-start text-center d-sm-flex">
                    <img src="images/<?=$details[0]['profile']?>" class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="" id = "file-data">

                    <div class="mt-md-4 mt-3 mt-sm-0">
                        <a onclick="document.getElementById('profile').click();" class="btn btn-primary mt-2">Change Picture</a>
                    </div>
                </div>
                
                <div class="mb-3 mt-4">
                                <label class="form-label">Referal Link</label>
                                <div class="form-icon position-relative">
                                    <input name="address" id="referalLink" type="text" class="form-control ps-5" placeholder="Address :" value="https://millionairetrack.com/user/register.php?sponsor=<?=$details[0]['userId']?>">
                                </div>
                            </div>
                            <div class="mt-md-4 mt-3 mt-sm-0">
                        <a onclick="mycopy();" class="btn btn-primary mt-2">Copy Referal Link</a>
                    </div>
                <form action="php/update-profile.php" method="POST" enctype="multipart/form-data">
                    <input type="file" id = "profile" hidden name ="profile"/>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sponsor Id</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark fea icon-sm icons">
                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <input id="first" type="text" class="form-control ps-5" placeholder="First Name :" disabled value="<?=$details[0]['sponsorId']?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sponsor Name</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input  id="first" type="text" class="form-control ps-5" placeholder="First Name :" disabled value="<?=$details[0]['sponsor']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Your Email</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <input id="email" type="email" class="form-control ps-5" placeholder="Your email :" disabled value="<?=$details[0]['email']?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input name="name" id="first" type="text" class="form-control ps-5" placeholder="First Name :" value="<?=$details[0]['name']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone No. :</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    <input name="phone" id="number" type="number" class="form-control ps-5" placeholder="Phone :" value="<?=$details[0]['phone']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map fea icon-sm icons">
                                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                        <line x1="8" y1="2" x2="8" y2="18"></line>
                                        <line x1="16" y1="6" x2="16" y2="22"></line>
                                    </svg>
                                    <input name="city" id="number" type="text" class="form-control ps-5" placeholder="City :" value="<?=$details[0]['city']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin fea icon-sm icons">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    <input name="address" id="number" type="text" class="form-control ps-5" placeholder="Address :" value="<?=$details[0]['address']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" id="submit" name="updateProfile" class="btn btn-primary" value="Save Changes">
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

    <div class="col-lg-4 mt-4">
        <div class="card border-0 rounded shadow p-4">
            <h5 class="mb-0">Change password :</h5>
            <form action="php/update-password.php" method="POST">
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Old password :</label>
                            <div class="form-icon position-relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                    <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                </svg>
                                <input type="password" class="form-control ps-5" placeholder="Old password" required="" name="oldPassword">
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">New password :</label>
                            <div class="form-icon position-relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                    <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                </svg>
                                <input type="password" class="form-control ps-5" placeholder="New password" required="" name = "password">
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Re-type New password :</label>
                            <div class="form-icon position-relative">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons">
                                    <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                </svg>
                                <input type="password" class="form-control ps-5" placeholder="Re-type New password" required="" name = "confirmPassword">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2 mb-0">
                        <button class="btn btn-primary" name = "updatePassword">Save password</button>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </form>
        </div>

    </div>

    <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Crop Image Before Upload</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" id = "cropperX">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">

                                            <img src="" id="sample_image" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                <button type="button" class="btn btn-secondary" id = "cropperClose">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
    <!--end col-->

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"
    integrity="sha512-synHs+rLg2WDVE9U0oHVJURDCiqft60GcWOW7tXySy8oIr0Hjl3K9gv7Bq/gSj4NDVpc5vmsNkMGGJ6t2VpUMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/cropperjs"></script>
<script>
function mycopy() {
  /* Get the text field */
  var copyText = document.getElementById("referalLink");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Referal Link Copy: " + copyText.value);
}


    $(document).ready(function(){
 
 var $modal = $('#modal');
 var image = document.getElementById('sample_image');

 var cropper;

 $('#profile1').change(function(event){
   var files = event.target.files;
   var done = function(url){
     image.src = url;
     $modal.show();
     cropper = new Cropper(image, {
     viewMode: 1,
     preview:'.preview'
   });
   };

   if(files && files.length > 0)
   {
     reader = new FileReader();
     reader.onload = function(event)
     {
       done(reader.result);
     };
     reader.readAsDataURL(files[0]);
   }
 });


 $('#crop').click(function(){
   canvas = cropper.getCroppedCanvas({
     width:400,
     height:400
   });

   canvas.toBlob(function(blob){
     url = URL.createObjectURL(blob);
     var reader = new FileReader();
     reader.readAsDataURL(blob);
     reader.onloadend = function(){
       var base64data = reader.result;
       $('#blob').val(base64data);
       cropper.destroy();
       cropper = null;
       $modal.hide(); 
     };
   });
 });
 $('#cropperX').click(function(){
       cropper.destroy();
      cropper = null;
      $modal.hide(); 
 });
 $('#cropperClose').click(function(){
       cropper.destroy();
      cropper = null;
      $modal.hide(); 
 });

});
$('#profile').change(function(event){
    var files = event.target.files;
    if(files && files.length > 0)
   {
     reader = new FileReader();
     reader.onload = function(event)
     {
       document.getElementById('file-data').src = reader.result;
     };
     reader.readAsDataURL(files[0]);
   }
});
</script>
<?php
require 'footer.php';
?>