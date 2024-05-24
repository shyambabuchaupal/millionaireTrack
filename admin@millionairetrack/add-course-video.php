<?php
require 'sidebar.php';
$row = 0;
$id = 0;
$courseId = sqlSelector("SELECT `id`, `course_name` FROM `courses`");
if (isset($_GET['id'])) {
    $id = filterData($_GET['id']);
    $details = sqlSelector("SELECT `courses`.`id`, `courses`.`image`,`courses`.`package_id`, `courses`.`course_name`,`package`.`Package_name` FROM `courses`,`package` WHERE `courses`.`package_id` = `package`.`Package_id` AND `courses`.`id` = ?",'s',$id);
    $row = count($details);
    $buttonName = "updateCourseVideo";
    $formData = "update-details.php";
} else {
    $details = array(
        array(
            'id' => '',
            'image' => '',
            'course_name' => '',
            'Package_name' => ''
        )
    );
    $buttonName = "insertCourseVideo";
    $formData = "insert-details.php";
}
?>
<style>
    .modal {
        position: fixed;
    }
</style>
<div class="row">
    <div class="col-lg-12 mt-4">
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h5 class="text-md-start text-center mb-0">Course Video</h5>


                <form action="php/<?= $formData ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Course Video Title</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark fea icon-sm icons">
                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <input id="first" type="text" class="form-control ps-5" value="<?= $details[0]['course_name'] ?>" name="title">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Course Video Link</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark fea icon-sm icons">
                                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <input id="first" type="text" class="form-control ps-5" value="<?= $details[0]['course_name'] ?>" name="videoLink">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Course</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name = "course">
                                    <option selected disabled >Select Package</option>
                                        <?php
                                        foreach($courseId as $course){
                                            if($course['id']==$details[0]['package_id']){
                                                echo '<option value = "'.$course['id'].'" Selected>'.$course['course_name'].'</option>';
                                            }
                                            else{
                                                echo '<option value = "'.$course['id'].'" >'.$course['course_name'].'</option>';
                                            }
                                        }
                                        
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" id="submit" name="<?= $buttonName ?>" class="btn btn-primary" value="Submit">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js" integrity="sha512-synHs+rLg2WDVE9U0oHVJURDCiqft60GcWOW7tXySy8oIr0Hjl3K9gv7Bq/gSj4NDVpc5vmsNkMGGJ6t2VpUMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/cropperjs"></script>
<script>
    $(document).ready(function() {

        var $modal = $('#modal');
        var image = document.getElementById('sample_image');

        var cropper;

        $('#profile1').change(function(event) {
            var files = event.target.files;
            var done = function(url) {
                image.src = url;
                $modal.show();
                cropper = new Cropper(image, {
                    viewMode: 1,
                    preview: '.preview'
                });
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });


        $('#crop').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $('#blob').val(base64data);
                    cropper.destroy();
                    cropper = null;
                    $modal.hide();
                };
            });
        });
        $('#cropperX').click(function() {
            cropper.destroy();
            cropper = null;
            $modal.hide();
        });
        $('#cropperClose').click(function() {
            cropper.destroy();
            cropper = null;
            $modal.hide();
        });

    });
    $('#profile').change(function(event) {
        var files = event.target.files;
        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('file-data').src = reader.result;
            };
            reader.readAsDataURL(files[0]);
        }
    });
</script>
<?php
require 'footer.php';
?>