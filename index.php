<?php
require 'header.php';
$sql = "SELECT `courses`.`id`, `courses`.`image`,`courses`.`course_name`,`package`.`Package_name`, `courses`.`package_id` FROM `courses`,`package` WHERE `courses`.`package_id` = `package`.`Package_id` order by id desc LIMIT 4";
$demandCourse = sqlSelector($sql);
$sql = "SELECT `Package_name`, `Package_price`, `Package_image`,`package_id` FROM `package` ORDER BY Package_id desc";
$packageResult = sqlSelector($sql);
?>   <!-- header-area-end -->
   <main>
      <!-- hero-area-sart -->
      <section class="slider-area hero-height position-relative fix" data-background="assets/images/header-img.jpg">
         <img class="shape-3 d-none d-xxl-block" src="assets/img/shape/shape-03.png" alt="image not found">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6">
                  <div class="hero-text pt-95">
                     <h5>Discover your journey</h5>
                     <h2>21<sup>st</sup>Century Skills Are Here </h2>
                     <p>Take your learning organization to the next level. to the next level. Who'll
                        share their knowledge to people around the world.</p>
                     <div class="hero-btn">
                        <a class="edu-btn" href="courses.php">View all course</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-6">
                  <div class="hero-right position-relative">
                     <img data-depth="0.2" class="shape shape-1" src="assets/img/shape/shape-01.png" alt="shape">
                     <img data-depth="0.2" class="shape-2" src="assets/img/shape/shape-02.png" alt="shape">
                     <img class="shape-6" src="assets/img/shape/slider-shape-6.png" alt="shape">
                     <div class="shape-4">
                        <img class="" src="assets/img/shape/shape-04.png" alt="shape">
                        <h5 class="hero-shape-text">Top Rated
                           Instructors</h5>
                     </div>
                     <div class="shape-5">
                        <h5>More than <span>21,500+</span> students
                           enrolled around the world</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- slider-area-end -->

      <!-- portfolio main area start  -->
      <section class="course-area p-relative pt-110 pb-90">
         <div class="course-shape-1">
            <img src="assets/img/shape/portfolio-shap-1.png" alt="shape">
         </div>
         <div class="course-shape-2">
            <img src="assets/img/shape/portfolio-shap-2.png" alt="shape">
         </div>
         <div class="course-shape-3">
            <img src="assets/img/shape/portfolio-shap-3.png" alt="shape">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 f-center">
                  <div class="section-title mb-50 text-center">
                     <h2>Discover<br>
                        In Demand <span class="down-mark-line">Courses</span></h2>
                  </div>
               </div>
            </div>
            <div class="row grid course-main-items">
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
                                <span class="price-now">'.$data['Package_name'].'</span>
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
         </div>
      </section>
      <!-- portfolio main area end -->

      <!-- features-area-start-->
      <div class="features-area pt-45 pb-15" data-background="assets/img/fact/fact.png">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="features-wrapper d-flex align-items-center mb-30">
                     <div class="features-icon">
                        <i class="flaticon-online-course"></i>
                     </div>
                     <div class="features-content">
                        <h3>Learn with skills
                           over 2,420 courses</h3>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="features-wrapper d-flex align-items-center mb-30">
                     <div class="features-icon">
                        <i class="flaticon-certificate"></i>
                     </div>
                     <div class="features-content">
                        <h3>Earn certificates
                           and degrees</h3>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="features-wrapper d-flex align-items-center mb-30">
                     <div class="features-icon">
                        <i class="flaticon-laptop"></i>
                     </div>
                     <div class="features-content">
                        <h3>Learn from
                           anywhere, any time</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- fact-area-end-->

      <!-- student-choose-area start -->
      <div class="student-choose-area fix pt-120 pb-110">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6">
                  <div class="student-wrapper">
                     <div class="section-title mb-30">
                        <h2>What We <span class="down-mark-line">Believe</span> In</h2>
                     </div>
                     <div class="sitdent-choose-content">
                        <p>Helping employees gain skills and providing career development often take a back seat to
                           business priorities but workplace better right now. Seventy percent of workers think that.
                        </p>
                     </div>
                     <div class="student-choose-list">
                        <ul>
                           <li><i class="fas fa-check-circle"></i>Free for physically handcraft </li>
                           <li><i class="fas fa-check-circle"></i>Easy to enroll courses</li>
                           <li><i class="fas fa-check-circle"></i>Course certificate for particular course</li>
                        </ul>
                     </div>
                     <div class="student-btn">
                        <a class="edu-sec-btn" href="about.php">More about us</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-1 col-lg-1">

               </div>
               <div class="col-xl-5 col-lg-5">
                  <div class="student-choose-wrapper position-relative">
                     <div class="shap-03">
                        <img src="assets/img/shape/student-shape-03.png" alt="image not found">
                     </div>
                     <div class="shap-04">
                        <img src="assets/img/shape/student-shape-04.png" alt="image not found">
                     </div>
                     <div class="shap-05">
                        <img src="assets/img/shape/student-shape-05.png" alt="image not found">
                     </div>
                     <div class="shap-06">
                        <img src="assets/img/shape/student-shape-06.png" alt="image not found">
                     </div>
                     <div class="shap-07">
                        <img src="assets/img/shape/student-shape-07.png" alt="image not found">
                     </div>

                     <div class="student-choose-thumb">
                        <img src="assets/images/believe.png" alt="image not found">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- student-choose-area end -->
      <div class="counter-area pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <svg id="layer2" xmlns="http://www.w3.org/2000/svg" width="50.897" height="56.553" viewBox="0 0 50.897 56.553">
                                    <path id="path3518" d="M26.3.646,1.793,13.689a.834.834,0,0,0,.048,1.522L16.07,21.734h21.4L51.7,15.211a.834.834,0,0,0,.05-1.522L27.244.647a.9.9,0,0,0-.473-.117A1.023,1.023,0,0,0,26.3.646Z" transform="translate(-1.323 -0.529)" fill="#5299d3"></path>
                                    <path id="path3534" d="M16.66,2.911a35.363,35.363,0,0,0-7.55.718,9.782,9.782,0,0,0-2.456.841,3.065,3.065,0,0,0-.858.648,1.7,1.7,0,0,0-.451,1.106v7.4l-.077.893a17.977,17.977,0,0,1,22.781,0l-.077-.891v-7.4a1.7,1.7,0,0,0-.451-1.106,3.056,3.056,0,0,0-.856-.648,9.78,9.78,0,0,0-2.456-.841,35.363,35.363,0,0,0-7.55-.718Z" transform="translate(8.788 5.574)" fill="#a0c7e7"></path>
                                    <path id="path3604" d="M9.111,3.629a9.782,9.782,0,0,0-2.456.841,3.065,3.065,0,0,0-.858.648,1.7,1.7,0,0,0-.451,1.106v7.4l-.077.893a17.891,17.891,0,0,1,1.962-1.388V6.225a1.7,1.7,0,0,1,.451-1.106A3.066,3.066,0,0,1,8.54,4.47,9.782,9.782,0,0,1,11,3.629a34,34,0,0,1,6.607-.7c-.316-.006-.62-.02-.943-.02a35.363,35.363,0,0,0-7.55.718Z" transform="translate(8.788 5.574)" fill="#74addc"></path>
                                    <path id="rect3599" d="M18.372,4.5h1.885A14.107,14.107,0,0,1,34.395,18.636V33.67H4.233V18.636A14.107,14.107,0,0,1,18.372,4.5Z" transform="translate(6.135 9.64)" fill="#356287"></path>
                                    <path id="path3610" d="M18.372,4.5A14.107,14.107,0,0,0,4.233,18.636V33.669H6.118V18.636A14.107,14.107,0,0,1,20.257,4.5Z" transform="translate(6.135 9.64)" fill="#2c5170"></path>
                                    <path id="path3506" d="M15.317,11.649a14.343,14.343,0,0,0-13.2,14.545v1.451a.943.943,0,0,0,.939.946H46.418a.943.943,0,0,0,.939-.946V26.193a14.341,14.341,0,0,0-13.2-14.545H15.317Z" transform="translate(0.711 27.962)" fill="#5299d3"></path>
                                    <path id="path3508" d="M7.827,9.922a.943.943,0,0,0-.948.939v8.909a.943.943,0,0,0,.948.939h9.42a.943.943,0,0,0,.946-.939V10.861a.943.943,0,0,0-.946-.939Z" transform="translate(12.912 23.538)" fill="#fca"></path>
                                    <path id="path3510" d="M7.827,9.922a.943.943,0,0,0-.948.939v2.723a9.605,9.605,0,0,0,11.314,0V10.861a.943.943,0,0,0-.946-.939Z" transform="translate(12.913 23.538)" fill="#ffb889"></path>
                                    <path id="path3512" d="M15.318,11.648a14.345,14.345,0,0,0-13.2,14.546v1.451a.943.943,0,0,0,.939.946H4.941A.943.943,0,0,1,4,27.645V26.194A14.345,14.345,0,0,1,17.2,11.648H15.318Z" transform="translate(0.711 27.961)" fill="#3385c8"></path>
                                    <path id="path3514" d="M8.661,11.126,5.83,13.95a.943.943,0,0,0,0,1.329l6.6,6.6a.943.943,0,0,0,1.329,0l2.163-2.158,2.165,2.158a.943.943,0,0,0,1.329,0l6.6-6.6a.943.943,0,0,0,0-1.329L23.19,11.126a.942.942,0,0,0-1.337,0l-5.928,5.928L9.99,11.126a.933.933,0,0,0-1.329,0Z" transform="translate(9.523 25.911)" fill="#a0c7e7"></path>
                                    <path id="path3520" d="M8.387,7.087a3.625,3.625,0,0,0-3.514,3.7A3.63,3.63,0,0,0,8.387,14.5a3.252,3.252,0,0,0,.808-.114c0-.007,0-.013,0-.02V7.189a3.341,3.341,0,0,0-.8-.1Z" transform="translate(7.773 16.275)" fill="#ffb889"></path>
                                    <path id="path3522" d="M15.171,10.79A3.63,3.63,0,0,1,11.656,14.5a3.252,3.252,0,0,1-.808-.114c0-.007,0-.013,0-.02V7.189a3.341,3.341,0,0,1,.8-.1,3.625,3.625,0,0,1,3.514,3.7Z" transform="translate(23.084 16.275)" fill="#fca"></path>
                                    <path id="path3528" d="M13.067,5.316a.943.943,0,0,0-.954.933A3.829,3.829,0,0,1,8.28,10.055H6.7a.943.943,0,0,0-.939.939v4.732a9.637,9.637,0,0,0,19.273,0V10.994a.943.943,0,0,0-.939-.939h-5.54a4.624,4.624,0,0,1-4.571-3.938.943.943,0,0,0-.919-.8Z" transform="translate(10.051 11.736)" fill="#fca"></path>
                                    <path id="path3530" d="M4.8,3.167l-1.887,1v13.16H4.8Z" transform="translate(2.743 6.23)" fill="#eee"></path>
                                    <path id="path3532" d="M3.592,6.614a.943.943,0,0,0-.946.939v8.511a.943.943,0,0,0,.946.946H5.473a.943.943,0,0,0,.939-.946V7.553a.943.943,0,0,0-.939-.939Z" transform="translate(2.067 15.063)" fill="#ffca28"></path>
                                    <path id="path3537" d="M3.592,6.614a.943.943,0,0,0-.946.939v8.512a.943.943,0,0,0,.946.946H5.473a.943.943,0,0,1-.943-.946V7.553a.943.943,0,0,1,.943-.939Z" transform="translate(2.067 15.063)" fill="#ecb200"></path>
                                    <path id="path3542" d="M6.7,6.646a.943.943,0,0,0-.939.939v4.731a9.613,9.613,0,0,0,6.526,9.1,10.337,10.337,0,0,1-5.374-9.068V7.255a1.014,1.014,0,0,1,.206-.609Z" transform="translate(10.051 15.145)" fill="#ffb889"></path>
                                    <g id="Group_2872" data-name="Group 2872" transform="translate(11.311 50.9)">
                                        <path id="path3544" d="M5.483,14.818A.943.943,0,0,0,4.5,15.84v4.62H6.379V15.84A.943.943,0,0,0,5.483,14.818Z" transform="translate(-4.498 -14.817)" fill="#3385c8"></path>
                                        <path id="path3547" d="M12.891,14.818a.943.943,0,0,0-.981,1.022v4.62h1.878V15.84a.943.943,0,0,0-.9-1.022Z" transform="translate(14.485 -14.817)" fill="#3385c8"></path>
                                    </g>
                                </svg>
                                <div class="count-number">
                                    <span class="counter">68,806</span>
                                    <p>Students Enrolled</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <svg id="online-course" xmlns="http://www.w3.org/2000/svg" width="51.549" height="56.553" viewBox="0 0 51.549 56.553">
                                    <path id="Path_7050" data-name="Path 7050" d="M220.4,404.2h8.315v8.63H220.4Z" transform="translate(-198.783 -358.613)" fill="#726b93"></path>
                                    <path id="Path_7051" data-name="Path 7051" d="M102.177,357.3v1.612a1.535,1.535,0,0,1-1.53,1.53H56.83a1.535,1.535,0,0,1-1.53-1.53V357.3Z" transform="translate(-52.964 -317.19)" fill="#988fc4"></path>
                                    <path id="Path_7052" data-name="Path 7052" d="M102.177,77.142v29.021H55.3V77.142a1.535,1.535,0,0,1,1.53-1.53h7.042l-.993.5a1.831,1.831,0,0,0-1.016,1.635,1.81,1.81,0,0,0,1.016,1.635l3.959,1.974v7.661a2.825,2.825,0,0,0,2.242,2.756,47.052,47.052,0,0,0,19.34,0,2.825,2.825,0,0,0,2.242-2.756V81.357l1.144-.572v7.521a1.168,1.168,0,0,0,2.336,0V79.617l.479-.245a1.831,1.831,0,0,0,1.016-1.635A1.81,1.81,0,0,0,94.621,76.1l-.993-.5h7.042A1.548,1.548,0,0,1,102.177,77.142Zm-6.563,25.132a1.171,1.171,0,0,0-1.168-1.168H70.634a1.168,1.168,0,1,0,0,2.336H94.446A1.164,1.164,0,0,0,95.614,102.274ZM83.468,96.656A1.171,1.171,0,0,0,82.3,95.488H70.622a1.168,1.168,0,0,0,0,2.336H82.3A1.157,1.157,0,0,0,83.468,96.656Zm-16.934,0a1.171,1.171,0,0,0-1.168-1.168H63.031a1.168,1.168,0,1,0,0,2.336h2.336A1.157,1.157,0,0,0,66.535,96.656Zm0,5.617a1.171,1.171,0,0,0-1.168-1.168H63.031a1.168,1.168,0,1,0,0,2.336h2.336A1.157,1.157,0,0,0,66.535,102.274Z" transform="translate(-52.964 -68.389)" fill="#e3fbff"></path>
                                    <path id="Path_7053" data-name="Path 7053" d="M193.229,134.9v6.493a.491.491,0,0,1-.374.479,44.718,44.718,0,0,1-18.382,0,.479.479,0,0,1-.374-.479V134.9l8.747,4.379a1.882,1.882,0,0,0,1.635,0Z" transform="translate(-157.89 -120.763)" fill="#726b93"></path>
                                    <path id="Path_7054" data-name="Path 7054" d="M164.718,41.349l-13.909,6.96L136.9,41.349,150.809,34.4Z" transform="translate(-125.035 -32)" fill="#988fc4"></path>
                                    <path id="Path_7055" data-name="Path 7055" d="M86.849,22.6V55.571a3.87,3.87,0,0,1-3.866,3.866H67.568v8.63h4.158a1.168,1.168,0,1,1,0,2.336h-21.3a1.168,1.168,0,1,1,0-2.336h4.158v-8.63H39.166A3.87,3.87,0,0,1,35.3,55.571V22.6a3.87,3.87,0,0,1,3.866-3.866H50.879l9.378-4.695a1.83,1.83,0,0,1,1.635,0l9.378,4.683H82.983A3.88,3.88,0,0,1,86.849,22.6ZM84.513,55.571V53.96H37.636v1.612a1.535,1.535,0,0,0,1.53,1.53H82.983A1.528,1.528,0,0,0,84.513,55.571Zm0-3.947V22.6a1.535,1.535,0,0,0-1.53-1.53H75.941l.993.5A1.831,1.831,0,0,1,77.95,23.21a1.81,1.81,0,0,1-1.016,1.635l-.479.245v8.689a1.168,1.168,0,0,1-2.336,0V26.247l-1.144.572V34.48a2.813,2.813,0,0,1-2.242,2.756,47.533,47.533,0,0,1-9.67,1,47.533,47.533,0,0,1-9.67-1,2.825,2.825,0,0,1-2.242-2.756V26.819l-3.959-1.974a1.831,1.831,0,0,1-1.016-1.635,1.81,1.81,0,0,1,1.016-1.635l.993-.5H39.166a1.535,1.535,0,0,0-1.53,1.53V51.624ZM61.074,30.159,74.983,23.21,61.074,16.25,47.165,23.2Zm9.565,4.309V27.975l-8.747,4.379a1.882,1.882,0,0,1-1.635,0L51.51,27.975v6.493a.491.491,0,0,0,.374.479,44.718,44.718,0,0,0,18.382,0A.479.479,0,0,0,70.639,34.468Zm-5.407,33.6v-8.63H56.917v8.63Z" transform="translate(-35.3 -13.85)"></path>
                                    <path id="Path_7056" data-name="Path 7056" d="M201.58,294a1.168,1.168,0,0,1,0,2.336H177.768a1.168,1.168,0,0,1,0-2.336Z" transform="translate(-160.098 -261.283)"></path>
                                    <path id="Path_7057" data-name="Path 7057" d="M189.346,245.9a1.168,1.168,0,1,1,0,2.336H177.668a1.168,1.168,0,0,1,0-2.336Z" transform="translate(-160.01 -218.8)"></path>
                                    <path id="Path_7058" data-name="Path 7058" d="M115,245.9a1.168,1.168,0,0,1,0,2.336h-2.336a1.168,1.168,0,0,1,0-2.336Z" transform="translate(-102.601 -218.8)"></path>
                                    <path id="Path_7059" data-name="Path 7059" d="M115,294a1.168,1.168,0,0,1,0,2.336h-2.336a1.168,1.168,0,0,1,0-2.336Z" transform="translate(-102.601 -261.283)"></path>
                                </svg>

                                <div class="count-number">
                                    <span class="counter">5,740</span>
                                    <p>Class Completed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <svg id="teacher_1_" data-name="teacher (1)" xmlns="http://www.w3.org/2000/svg" width="55.594" height="56.553" viewBox="0 0 55.594 56.553">
                                    <path id="Path_7060" data-name="Path 7060" d="M174.816,53.749l-.316,2.846-.213,1.917H147.448l-.213-1.917-.316-2.846a14.748,14.748,0,0,1,1.1-7.437,14.762,14.762,0,0,0,1.174-6.545l-.167-3.316a11.854,11.854,0,1,1,23.678,0l-.167,3.316a14.762,14.762,0,0,0,1.174,6.545A14.741,14.741,0,0,1,174.816,53.749Z" transform="translate(-132.111 -24.004)" fill="#8f4d2e"></path>
                                    <path id="Path_7061" data-name="Path 7061" d="M256.173,53.743l-.316,2.846H245.1V46.045l1.917-3.834V34.543a10.554,10.554,0,0,0-7.757-10.171,11.867,11.867,0,0,1,14.8,12.073l-.167,3.316a14.762,14.762,0,0,0,1.174,6.545,14.741,14.741,0,0,1,1.1,7.437Z" transform="translate(-213.469 -23.999)" fill="#82462a"></path>
                                    <path id="Path_7062" data-name="Path 7062" d="M219.886,223.668a1.341,1.341,0,0,1-1.342-1.342V216h-7.668v6.326a1.341,1.341,0,0,1-1.342,1.342H208v5.751h13.419v-5.751Z" transform="translate(-185.954 -192.995)" fill="#fec9a3"></path>
                                    <path id="Path_7063" data-name="Path 7063" d="M236.412,220.793a5.259,5.259,0,0,0,3.256-1.175V216H232v3.617a5.259,5.259,0,0,0,3.256,1.175Z" transform="translate(-207.078 -192.995)" fill="#feb784"></path>
                                    <path id="Path_7064" data-name="Path 7064" d="M209.253,85.751v4.793a8.627,8.627,0,1,1-17.253,0V85.751a13,13,0,0,0,4.421-5.008l.371-.743.544.454a23.932,23.932,0,0,0,11.917,5.3Z" transform="translate(-171.871 -73.29)" fill="#fec9a3"></path>
                                    <path id="Path_7065" data-name="Path 7065" d="M284.734,121.566v4.793a8.63,8.63,0,0,1-6.979,8.469,10.506,10.506,0,0,0,3.145-7.511V120.69A23.905,23.905,0,0,0,284.734,121.566Z" transform="translate(-247.352 -109.105)" fill="#fec093"></path>
                                    <path id="Path_7066" data-name="Path 7066" d="M217.438,138.876a1.438,1.438,0,1,1,1.438-1.438A1.438,1.438,0,0,1,217.438,138.876Z" transform="translate(-192.995 -122.581)" fill="#7a432a"></path>
                                    <path id="Path_7067" data-name="Path 7067" d="M289.438,138.876a1.438,1.438,0,1,1,1.438-1.438A1.438,1.438,0,0,1,289.438,138.876Z" transform="translate(-256.369 -122.581)" fill="#7a432a"></path>
                                    <path id="Path_7068" data-name="Path 7068" d="M242.876,178.876A2.879,2.879,0,0,1,240,176h1.917a.959.959,0,1,0,1.917,0h1.917A2.879,2.879,0,0,1,242.876,178.876Z" transform="translate(-214.12 -157.788)" fill="#f7a468"></path>
                                    <path id="Path_7069" data-name="Path 7069" d="M224,312h9.585v6.71H224Z" transform="translate(-200.037 -277.493)" fill="#e0e0de"></path>
                                    <path id="Path_7070" data-name="Path 7070" d="M121.515,304.882a2.909,2.909,0,0,1-3.231-1.93l-6.331-11.877a7.465,7.465,0,0,1-1.337,7.137v7.668H93.362v-7.668a7.477,7.477,0,0,1-1.323-7.226l-6.434,11.966a2.908,2.908,0,1,1-5.522-1.826l7.038-17.518A5.749,5.749,0,0,1,92.458,280h3.78l5.751,10.544L107.74,280h3.766a5.756,5.756,0,0,1,5.344,3.627l6.958,17.5a2.91,2.91,0,0,1-2.292,3.756Z" transform="translate(-73.234 -249.327)" fill="#ec8c8c"></path>
                                    <path id="Path_7071" data-name="Path 7071" d="M74.16,392.987,74.851,384H80.6v9.235a3.226,3.226,0,1,1-6.442-.247Z" transform="translate(-68.142 -340.866)" fill="#f59898"></path>
                                    <path id="Path_7072" data-name="Path 7072" d="M32.965,266.888a1.865,1.865,0,0,0-1.216,2.643l.878,1.754H29.192a5.751,5.751,0,0,1-2.572-.607l-.955-.478A1.15,1.15,0,0,0,24,271.23v2.705a1.917,1.917,0,0,0,1.06,1.715l1.56.78a5.751,5.751,0,0,0,2.572.607h7.269v-5.751L35.148,268a1.865,1.865,0,0,0-2.184-1.116Z" transform="translate(-24 -237.737)" fill="#fec9a3"></path>
                                    <path id="Path_7073" data-name="Path 7073" d="M80,352h5.751v3.834H80Z" transform="translate(-73.29 -312.701)" fill="#e0e0de"></path>
                                    <path id="Path_7074" data-name="Path 7074" d="M222.468,308.614a2.909,2.909,0,0,1-3.231-1.93l-6.331-11.877a7.464,7.464,0,0,1-1.337,7.137v7.668H194.63c7.911-5.166,14.586-11.723,20.189-25.372a5.742,5.742,0,0,1,2.983,3.119l6.958,17.5a2.91,2.91,0,0,1-2.292,3.756Z" transform="translate(-174.186 -253.059)" fill="#e07f7f"></path>
                                    <path id="Path_7075" data-name="Path 7075" d="M305.585,351.336,296,349.419V336l9.585,1.917Z" transform="translate(-263.41 -298.618)" fill="#a36548"></path>
                                    <path id="Path_7076" data-name="Path 7076" d="M408,351.336l9.585-1.917V336L408,337.917Z" transform="translate(-361.991 -298.618)" fill="#8f4d2e"></path>
                                    <path id="Path_7077" data-name="Path 7077" d="M376,352h3.834v13.419H376Z" transform="translate(-333.825 -312.701)" fill="#95573a"></path>
                                    <path id="Path_7078" data-name="Path 7078" d="M307.5,316.793a3.4,3.4,0,0,0-2.836-3.348L296,312v2.876l9.585,1.917H307.5a3.4,3.4,0,0,1,2.836-3.348L319,312v2.876l-9.585,1.917Z" transform="translate(-263.41 -277.493)" fill="#d4bd81"></path>
                                    <path id="Path_7079" data-name="Path 7079" d="M436.95,421.661l-3.834.639a.958.958,0,0,1-1.116-.945v-3.563a1.248,1.248,0,0,1,1.042-1.231l3.256-.543a1.248,1.248,0,0,1,1.453,1.231v3.466A.959.959,0,0,1,436.95,421.661Z" transform="translate(-383.115 -369.034)" fill="#fec9a3"></path>
                                </svg>
                                <div class="count-number">
                                    <span class="counter">470</span><span>+</span>
                                    <p>Skilled Instructors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="56.551" height="56.553" viewBox="0 0 56.551 56.553">
                                    <g id="course" transform="translate(-0.499 -0.5)">
                                        <path id="Path_7080" data-name="Path 7080" d="M12.17.5A11.663,11.663,0,0,0,6.259,22.221v2.067a1.346,1.346,0,0,0,1.347,1.346H8.13V13.516A1.348,1.348,0,0,0,6.784,12.17a1.346,1.346,0,0,1,0-2.693,4.044,4.044,0,0,1,4.039,4.039V25.635h2.693V13.516a4.044,4.044,0,0,1,4.039-4.039,1.346,1.346,0,1,1,0,2.693,1.348,1.348,0,0,0-1.346,1.346V25.635h.524a1.346,1.346,0,0,0,1.346-1.347V22.221A11.663,11.663,0,0,0,12.17.5Z" transform="translate(0)" fill="#3e3ef4"></path>
                                        <path id="Path_7081" data-name="Path 7081" d="M17.39,33.193H8.263a1.346,1.346,0,1,1,0-2.693H17.39a1.346,1.346,0,1,1,0,2.693Z" transform="translate(-0.657 -3.07)" fill="#3e3ef4"></path>
                                        <path id="Path_7082" data-name="Path 7082" d="M56.657,35.7a6.266,6.266,0,0,1,0-8.85,1.347,1.347,0,0,0-.952-2.3H28.4A6.715,6.715,0,0,0,23.019,35.3l-21.172,0A1.347,1.347,0,0,0,.9,37.6a6.218,6.218,0,0,1,1.833,4.425A6.219,6.219,0,0,1,.9,46.454a1.347,1.347,0,0,0,.952,2.3h5.4a6.714,6.714,0,0,0,5.37,10.761h0l43.086-.008a1.347,1.347,0,0,0,.952-2.3,6.258,6.258,0,0,1,0-8.85,1.347,1.347,0,0,0-.952-2.3h-5.4A6.685,6.685,0,0,0,50.317,38l5.389,0a1.347,1.347,0,0,0,.952-2.3ZM4.468,46.06a8.915,8.915,0,0,0,.954-4.031A8.919,8.919,0,0,0,4.468,38l40.581,0a4.03,4.03,0,1,1-.113,8.059Zm48.618,2.693a9,9,0,0,0,0,8.061l-40.467.007h0a4.034,4.034,0,0,1,0-8.068ZM28.273,35.3a4.029,4.029,0,1,1,.125-8.057H53.09a9,9,0,0,0,0,8.062Z" transform="translate(0 -2.461)"></path>
                                        <path id="Path_7083" data-name="Path 7083" d="M48.59,6.388,49.883,5.1V18.047a1.346,1.346,0,0,0,2.693,0V5.1l1.292,1.292a1.346,1.346,0,0,0,1.9-1.9L52.183.895a1.35,1.35,0,0,0-1.907,0L46.686,4.483a1.346,1.346,0,1,0,1.9,1.9Z" transform="translate(-4.686 0)"></path>
                                        <path id="Path_7084" data-name="Path 7084" d="M34.59,6.387,35.883,5.1V18.047a1.346,1.346,0,0,0,2.693,0V5.1l1.292,1.292a1.346,1.346,0,1,0,1.9-1.9L38.183.894a1.351,1.351,0,0,0-1.907,0L32.686,4.483a1.346,1.346,0,0,0,1.9,1.9Z" transform="translate(-3.254 0)"></path>
                                    </g>
                                </svg>
                                <div class="count-number">
                                    <span class="counter">6,548</span>
                                    <p>Premium Courses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- categories-area start -->
                <div class="categories-area grey-2 pt-110 pb-90 position-relative">
            <div class="category-shap-02">
                <img src="assets/img/shape/categorey-shap-02.png" alt="image not found">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-20">
                        <div class="section-title mb-30">
                            <h2>Top <span class="down-mark-line-2">Packages</span></h2>
                        </div>
                    </div>
                    <div class="">
                        <div class="category-main-wrapper position-relative">
                            <div class="category-shap-01">
                                <img src="assets/img/shape/categorey-shap-01.png" alt="image not found">
                            </div>
                            <div class="">
                                <div class="category-slide-wrapper position-relative">
                                    <div class="swiper-container category-active">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- Slides -->
                                            <?php
                                            foreach($packageResult as $data){
                                                echo '                                            <div class="swiper-slide">
                                                <a href="user/register.php?package='.$data['package_id'].'">
                                                    <div class="categories-wrapper text-center mb-30">
                                                        <div class="categiories-thumb">
                                                            <img src = "'.$path.$data['Package_image'].'" width = "100%"/>
                                                        </div>
                                                        <div class="categories-content">
                                                            <h4>'.$data['Package_name'].'</h4>
                                                            <p>13 Course available</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>';
                                            }
                                            ?>
                                        </div>
                                        <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="category-nav">
                                        <div class="category-button-prev"><i class="far fa-long-arrow-left"></i></div>
                                        <div class="category-button-next"><i class="far fa-long-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- categories-area end -->

      <!-- browser-course-area-start -->
      <div class="browser-course-area">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
                  <div class="browser-course-wrapper course-height" data-background="">
                     <div class="browser-course-bg">
                        <img src="assets/img/browser-course/browser-course-01.jpg" alt="image not found">
                     </div>
                     <div class="browser-course-content">
                        <span>Start from today</span>
                        <div class="browser-course-tittle">
                           <a href="become-instructor.php">Become an instructor
                              and spread your knowledge</a>
                        </div>
                        <div class="browser-btn">
                           <a class="course-btn" href="become-instructor.php">View details</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
                  <div class="browser-course-wrapper course-height" data-background="">
                     <div class="browser-course-bg">
                        <img src="assets/img/browser-course/browser-course-02.jpg" alt="image not found">
                     </div>
                     <div class="row">
                        <div class="col-xl-7 col-lg-7">
                           <div class="browser-course-content">
                              <span>Discover your gain</span>
                              <div class="browser-course-tittle">
                                 <a href="become-affiliate.php">Keep your skilled centers of
                                    excellence competitive</a>
                              </div>
                              <div class="browser-btn">
                                 <a class="course-btn" href="become-affiliate.php">View Details</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- browser-course-area-end -->

      <!-- education-area-start -->
      <section class="education-area position-relative pt-85">
         <div class="container">
            <img class="education-shape-2" src="assets/img/shape/education-shape-04.png" alt="shape">
            <img class="education-shape-3" src="assets/img/shape/education-shape-01.png" alt="shape">
            <img class="education-shape-4" src="assets/img/shape/education-shape-03.png" alt="shape">
            <div class="row">
               <div class="col-xl-4 col-lg-4 offset-xl-2 offset-lg-2">
                  <div class="education-img mb-30">
                     <img src="assets/img/teacher/education.png" alt="image not found">
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4">
                  <div class="section-title mb-30">
                     <h2>Transform Your
                        Life Through <span class="down-mark-line">Education</span></h2>
                  </div>
                  <div class="education-content mb-30">
                     <p>Helping employees gain skills and providing career development often take a back seat to
                        business priorities but workplace.</p>
                     <a class="edu-sec-btn" href="about.php">Watch how to start</a>
                  </div>
               </div>
            </div>
         </div>

      </section>
      <!-- education-area-end -->
       <!-- testimonial-area-start -->
       <div class="testimonial-area pb-120 pt-50">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3">
                  <div class="section-title text-center mb-55">
                     <h2>What Students<br>
                        Think and Say About <span class="down-mark-line">Eduman</span></h2>
                  </div>
               </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container testimonial-active">
               <!-- Additional required wrapper -->
               <div class="swiper-wrapper">
                  <!-- Slides -->
                  <div class="swiper-slide">
                     <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                           <div class="testimonial-img">
                              <img src="assets/img/testimonial/Image.png" alt="image not found">
                           </div>
                           <div class="testimonial-title">
                              <h4>David Johnson</h4>
                              <span>Student</span>
                           </div>
                        </div>
                        <div class="testimoni-quotes">
                           <img src="assets/img/testimonial/quotes.png" alt="image not found">

                        </div>
                        <div class="testimonial-body">
                           <h3>Great Course !</h3>
                           <p>Thanks to our marketplace model, our content keeps pace with market changes. You’ll find
                              courses on the latest technologies and business practice and more!</p>
                        </div>
                        <div class="testimonial-icon">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                           <div class="testimonial-img">
                              <img src="assets/img/testimonial/testimonial-02.png" alt="image not found">
                           </div>
                           <div class="testimonial-title">
                              <h4>Brandon Tylor</h4>
                              <span>Student</span>
                           </div>
                        </div>
                        <div class="testimoni-quotes">
                           <img src="assets/img/testimonial/quotes.png" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                           <h3>Best Experience !</h3>
                           <p>In every software-as-a-service solution, user billing and payments are key aspects in the
                              sale of services rendered. Let’s learn about Stripe the metal mates.</p>
                        </div>
                        <div class="testimonial-icon">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                           <div class="testimonial-img">
                              <img src="assets/img/testimonial/testimonial.png" alt="image not found">
                           </div>
                           <div class="testimonial-title">
                              <h4>Richard Joseph</h4>
                              <span>Student</span>
                           </div>
                        </div>
                        <div class="testimoni-quotes">
                           <img src="assets/img/testimonial/quotes.png" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                           <h3>Helpful Instructors !</h3>
                           <p>There are so many websites out there that have not considered the overall usability of
                              their visually impaired users. When it comes to designing better links.</p>
                        </div>
                        <div class="testimonial-icon">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- If we need pagination -->
               <div class="testimonial-pagination text-center"></div>
            </div>
         </div>
      </div>
      <!-- testimonial-area-end -->
   </main>

   
<?php
require 'footer.php';
?>