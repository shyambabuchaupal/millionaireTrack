<?php
require 'sidebar.php';
$row = 0;
$id = 0;
$courseId = sqlSelector("SELECT `id`, `course_name`FROM `courses`");
if (isset($_GET['id'])) {
    $id = filterData($_GET['id']);
    $details = sqlSelector("SELECT `courses`.`id`, `courses`.`image`,`courses`.`package_id`, `courses`.`course_name`,`package`.`Package_name` FROM `courses`,`package` WHERE `courses`.`package_id` = `package`.`Package_id` AND `courses`.`id` = ?", 's', $id);
    $row = count($details);
    $buttonName = "updateCertificate";
    $formData = "update-details.php";
} else {
    $details = array(
        array(
            'id' => '',
            'image' => '',
            'course_name' => '',
            'Package_name' => '',
            'Package_id' => ''
        )
    );
    $buttonName = "insertCertificate";
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
                <h5 class="text-md-start text-center mb-0">Certificate :</h5>

                <form action="php/<?= $formData ?>" method="POST" enctype="multipart/form-data">
                    <input type="text" hidden name="certificateId" value="<?= $id ?>" />
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Certificate Name </label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name="courseId">
                                        <option selected disabled>Select Certificate Name</option>
                                        <?php
                                        foreach ($courseId as $course) {
                                            if ($course['id'] == $details[0]['Package_id']) {
                                                echo '<option value = "' . $course['id'] . '" Selected>' . $course['course_name'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $course['id'] . '" >' . $course['course_name'] . '</option>';
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>

                    <div class="row mt-4">
                        <h5 class="text-md-start text-center mb-0">Question 1 :</h5>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Question 1" name="question1" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 1</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 1" name="choice1[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 2</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 2" name="choice1[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 3</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 3" name="choice1[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 4</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 4" name="choice1[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correct Answer </label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name="answer1">
                                        <option value='1'>Choice 1</option>
                                        <option value='2'>Choice 2</option>
                                        <option value='3'>Choice 3</option>
                                        <option value='4'>Choice 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row mt-4">
                        <h5 class="text-md-start text-center mb-0">Question 2 :</h5>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Question 1" name="question2" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 1</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 1" name="choice2[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 2</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 2" name="choice2[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 3</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 3" name="choice2[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 4</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 4" name="choice2[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correct Answer </label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name="answer2">
                                        <option value='1'>Choice 1</option>
                                        <option value='2'>Choice 2</option>
                                        <option value='3'>Choice 3</option>
                                        <option value='4'>Choice 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row mt-4">
                        <h5 class="text-md-start text-center mb-0">Question 3 :</h5>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Question 1" name="question3" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 1</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 1" name="choice3[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 2</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 2" name="choice3[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 3</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 3" name="choice3[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 4</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 4" name="choice3[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correct Answer </label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name="answer3">
                                        <option value='1'>Choice 1</option>
                                        <option value='2'>Choice 2</option>
                                        <option value='3'>Choice 3</option>
                                        <option value='4'>Choice 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row mt-4">
                        <h5 class="text-md-start text-center mb-0">Question 4 :</h5>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Question 1" name="question4" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 1</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 1" name="choice4[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 2</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 2" name="choice4[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 3</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 3" name="choice4[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 4</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 4" name="choice4[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correct Answer </label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name="answer4">
                                        <option value='1'>Choice 1</option>
                                        <option value='2'>Choice 2</option>
                                        <option value='3'>Choice 3</option>
                                        <option value='4'>Choice 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row mt-4">
                        <h5 class="text-md-start text-center mb-0">Question 5 :</h5>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Question 1" name="question5" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 1</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 1" name="choice5[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 2</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 2" name="choice5[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 3</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 3" name="choice5[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Choice 4</label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input class="form-control ps-5" placeholder="Choice 4" name="choice5[]" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Correct Answer </label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <select class="form-control ps-5" name="answer5">
                                        <option value='1'>Choice 1</option>
                                        <option value='2'>Choice 2</option>
                                        <option value='3'>Choice 3</option>
                                        <option value='4'>Choice 4</option>
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