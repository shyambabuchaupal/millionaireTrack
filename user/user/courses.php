<?php
require 'sidebar.php';
$userDetails = "SELECT `users`.`package` FROM `users`WHERE `users`.`secret_key` = ?";
$userDetails = sqlSelector($userDetails, 's', $user);
$courseDetails = sqlSelector("SELECT `id`, `image`,`course_name` FROM `courses` WHERE `package_id` <= '" . $userDetails[0]['package'] . "'");
$packages = sqlSelector("SELECT `Package_id`, `Package_name`,`Package_image`, `Package_price`FROM `package`");
?>
<div class="row justify-content-center">
    <?php
    foreach ($packages as $package) {
    ?>

        <div class="col-md-4">
            <div class="card border-0 rounded p-4 shadow mt-4 width-fit-content">
                <img src="<?=$path.'images/'.$package['Package_image'] ?>" class="img-fluid rounded courseImageExtra" alt="" width="260px">
                <div class="section-title ms-md-4">
                    <h5><?= $package['Package_name'] ?></h5>
                    <div class="d-md-flex justify-content-between align-items-center">
                        <h6 class="text-muted mb-0">₹ <?=$package['Package_price']?> </h6>
                    </div>

                    <div class="mt-4">
                        <?php
                        if ($package['Package_id'] <= $userDetails[0]['package']) {
                            echo '<a class="btn btn-primary ms-2">Enrolled</a>';
                        } else {
                            echo '<a class="btn btn-primary ms-2">Enroll</a>';
                            echo '<a class="btn btn-soft-primary ms-2" href = "php/upgrade-cashfree-package.php?package='.$package['Package_id'].'">Buy Now</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<h5 class="mb-0 fw-bold p-3">Courses in your enrolled Package</h5>
<div class="row">
    <?php
    foreach ($courseDetails as $data) {
    ?>
        <a class="col-md-4" href = "learning-courses.php?course=<?=md5($data['id'])?>">
            <div class="card shadow border-0 rounded">
                <div class="d-flex align-items-center">
                    <img src="<?=$path."images/".$data['image'] ?>" class="img-fluid avatar avatar-md-md rounded shadow" alt="">
                    <h6 class="mb-0 ms-3 me-3"><?= $data['course_name'] ?></h6>
                </div>
            </div>
        </a>
    <?php
    }
    ?>
</div>
</main>
</div>
<?php
require 'footer.php';
?>