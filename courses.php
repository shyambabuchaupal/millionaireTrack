<?php
require 'header-2.php';
$sql = "SELECT `courses`.`id`, `courses`.`image`,`courses`.`course_name`,`package`.`Package_name`, `courses`.`package_id` FROM `courses`,`package` WHERE `courses`.`package_id` = `package`.`Package_id` order by id desc";
$demandCourse = sqlSelector($sql);
?>

<main>
      <!-- hero-area-start -->
      <div class="hero-arera course-item-height" data-background="assets/img/slider/course-slider.jpg">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="hero-course-1-text">
                     <h2>Course 02</h2>
                  </div>
                  <div class="course-title-breadcrumb">
                     <nav>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                           <li class="breadcrumb-item"><span>Courses</span></li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- hero-area-end -->

      <!-- course-content-start -->
      <section class="course-content-area pb-90 pt-90">
         <div class="container">
            <div class="row mb-10">
               <div class="col-xl-12 col-lg-12 col-md-12">
                  <div class="row justify-content-center">
                  <?php
                foreach($demandCourse as $data){
                    echo '<div class="col-xl-3 col-lg-3 col-md-6 grid-item c-2">
                    <div class="eduman-course-main-wrapper mb-30">
                      
                       <div class="eduman-course-thumb w-img">
                          <a href="user/register.php?package='.$data['package_id'].'"><img src="'.$path.$data['image'].'"
                                alt="course-img"></a>
                       </div>
                       <div class="eduman-course-wraper">
                          <div class="eduman-course-text">
                             <h5><a href="user/register.php?package='.$data['package_id'].'">'.$data['course_name'].'</a>
                             </h5>
                          </div>
                          <div class="eduman-course-meta">
                             <div class="eduman-course-price">
                                <span class="price-now">Gold Package</span>
                             </div>
                          </div>
                       </div>
                       <div class="eduman-course-footer">
                          <div class="course-deteals-btn">
                             <a href="user/register.php?package='.$data['package_id'].'"><span class="me-2">Get Started</span><i
                                   class="far fa-arrow-right"></i></a>
                          </div>
                       </div>
                    </div>
                 </div>';
                }
                ?>
                  </div>
                  <!-- <div class="row">
                     <div class="edu-pagination mt-30 mb-20">
                        <ul>
                           <li><a href="#"><i class="fal fa-angle-left"></i></a></li>
                           <li class="active"><a href="#"><span>01</span></a></li>
                           <li><a href="#"><span>02</span></a></li>
                           <li><a href="#"><i class="fal fa-angle-right"></i></a></li>
                        </ul>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </section>
      <!-- course-content-end -->
   </main>
   <?php
   require 'footer.php';
   ?>