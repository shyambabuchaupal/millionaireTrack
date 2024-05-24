<?php
include 'sidebar.php';
$userDetails = "SELECT `users`.`package`,`package`.`Package_name`,`package`.`Package_image`,`package`.`Package_id` FROM `users`,`package` WHERE `users`.`package` = `package`.`Package_id` AND `users`.`secret_key` = ?";
$userDetails = sqlSelector($userDetails,'s',$user);
$courseDetails = sqlSelector("SELECT `id`, `image`,`course_name` FROM `courses` WHERE `package_id` = '".$userDetails[0]['Package_id']."'");

?>
<div class="row row-cols-xl-4 row-cols-md-2 row-cols-1">
    <div class="col mt-4">
        <a href="#!" class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
            <div class="d-flex align-items-center">
                <div class="icon text-center rounded-pill">
                    <i class="uil uil-user-circle fs-4 mb-0"></i>
                </div>
                <div class="flex-1 ms-3">
                    <h6 class="mb-0 text-muted">Paackage Enrolled</h6>
                    <p class="fs-5 text-dark fw-bold mb-0"><span><?=$userDetails[0]['Package_name']?></span></p>
                </div>
            </div>
        </a>
    </div>
    <!--end col-->
    <!--end col-->
</div>
<!--end row-->

<div class="row">
    <div class="col-xl-8 col-lg-7 mt-4">
        <h5 class="mb-0 fw-bold p-3">Enrolled Courses</h5>
        <div class="row">
            <?php
            foreach($courseDetails as $data){
            ?>
            <a class="col-md-4" href = "learning-courses.php?course=<?=md5($data['id'])?>">
                <div class="card shadow border-0 rounded">
                    <div class="d-flex align-items-center">
                        <img src="<?=$path."images/".$data['image']?>" class="img-fluid avatar avatar-md-md rounded shadow" alt="">
                        <h6 class="mb-0 ms-3 me-3"><?=$data['course_name']?></h6>
                    </div>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
    <!--end col-->

    <div class="col-xl-4 col-lg-5 mt-4 rounded">
        <div class="card shadow border-0">
            <div class="p-4 border-bottom row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <img src="<?=$path."images/".$userDetails[0]['Package_image']?>" width="100%" />
                </div>
            </div>
            <div class="d-flex justify-content-center m-3">
            <a href="courses.php" class="btn btn-outline-primary col-md-6">Start Learning</a>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
</main>
<!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->
<?php
include 'footer.php';
?>