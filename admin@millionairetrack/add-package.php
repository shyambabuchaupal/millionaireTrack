<?php
require 'sidebar.php';
$row = 0;
$id = 0;
if(isset($_GET['id'])){
    $id = filterData($_GET['id']);
    $details = sqlSelector("SELECT `Package_name`, `Package_price`, `Package_image`, `Direct`, `passive` FROM `package` WHERE `Package_id` = ?",'s',$id);
    $row = count($details);
    $buttonName = "updatePackage";
    $formData = "update-details.php";
}
else{
    $details = array(
        array(
            'Package_name'=>'',
            'Package_price'=>'',
            'Package_image'=>'',
            'Direct'=>'',
            'passive'=>'',
            )
        );
        $buttonName = "insertPackage";
        $formData = "insert-details.php";
}
?>
<style>
    .modal{
        position:fixed;
    }
</style>
<div class="row">
    <div class="col-lg-12 mt-4">
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h5 class="text-md-start text-center mb-0">Package Detail :</h5>

                <div class="mt-4 text-md-start text-center d-sm-flex">
                    <img src="images/<?=$details[0]['Package_image']?>" class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="" id = "file-data">

                    <div class="mt-md-4 mt-3 mt-sm-0">
                        <a onclick="document.getElementById('profile').click();" class="btn btn-primary mt-2">Package Image</a>
                    </div>
                </div>

                <form action="php/<?=$formData?>" method="POST" enctype="multipart/form-data">
                    <input type="text" hidden name ="packageId" value="<?=$id?>"/>
                    <input type="file" id = "profile" hidden name ="package"/>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Package Name</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark fea icon-sm icons">
                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <input id="first" type="text" class="form-control ps-5" value="<?=$details[0]['Package_name']?>" name = "name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Package Price</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input  id="first" type="text" class="form-control ps-5"  value="<?=$details[0]['Package_price']?>" name = "price">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Direct Commission</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <input id="email" type="text" class="form-control ps-5" value="<?=$details[0]['Direct']?>" name = "direct">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Passive Commission</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input name="passive" id="text" type="text" class="form-control ps-5" value="<?=$details[0]['passive']?>">
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" id="submit" name="<?=$buttonName?>" class="btn btn-primary" value="Submit">
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
    <!--end col-->

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"
    integrity="sha512-synHs+rLg2WDVE9U0oHVJURDCiqft60GcWOW7tXySy8oIr0Hjl3K9gv7Bq/gSj4NDVpc5vmsNkMGGJ6t2VpUMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/cropperjs"></script>
<script>
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