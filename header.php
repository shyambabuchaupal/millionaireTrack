<?php
require 'user/config/functions.php';
$path = 'admin@millionairetrack/images/';
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Millionaire Track</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
   <!-- CSS here -->
   <!-- not used <link rel="stylesheet" href="assets/css/preloader.css">-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!--<link rel="stylesheet" href="assets/css/meanmenu.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/swiper-bundle.css">
   <!--not used <link rel="stylesheet" href="assets/css/backToTop.css">-->
   <!--<link rel="stylesheet" href="assets/css/magnific-popup.css">-->
   <!--not used <link rel="stylesheet" href="assets/css/huicalendar.css">-->
   <!--not used <link rel="stylesheet" href="assets/css/nice-select.css">-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!--<link rel="stylesheet" href="assets/css/flaticon.css">-->
   <!--<link rel="stylesheet" href="assets/css/default.css">-->
   <!--<link rel="stylesheet" href="assets/css/style.css">-->
   
   
   <!--main css-->
   <link rel="stylesheet" href="assets/css/mainStyle.css">
</head>

<body>


   <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

   <!-- Add your site or application content here -->

   <!-- pre loader area start -->
   <!--<div id="loading">-->
   <!--   <div id="loading-center">-->
   <!--      <div id="loading-center-absolute">-->
   <!--         <div class=" text-center d-flex flex-column align-items-center justify-content-center">-->
   <!--         <img src="assets/images/logo.png" alt="" width = "300px">-->
   <!--            <img class="loading-logo" src="assets/img/logo/preloader.svg" alt="">-->
   <!--         </div>-->
   <!--      </div>-->
   <!--   </div>-->
   <!--</div>-->
   <!-- pre loader area end -->

   <!-- cart mini area start -->
   <div class="body-overlay"></div>
   <!-- cart mini area end -->

   <!-- side toggle start -->
   <div class="fix">
      <div class="side-info">
         <div class="side-info-content">
            <div class="offset-widget offset-logo mb-40">
               <div class="row align-items-center">
                  <div class="col-9">
                     <a href="index.html">
                        <img src="assets/images/logo.png" alt="Logo" width = "100px">
                     </a>
                  </div>
                  <div class="col-3 text-end"><button class="side-info-close"><i class="fal fa-times"></i></button>
                  </div>
               </div>
            </div>
            <div class="mobile-menu d-xl-none fix"></div>

         </div>
      </div>
   </div>
   <!-- side toggle end -->
   <!-- header note area end -->

   <!-- header-area-start  -->
   <header>
      <div class="header-area header-transparent sticky-header">
         <div class="container-fluid">
            <div class="header-main-wrapper">
               <div class="row align-items-center">
                  <div class="col-xl-9 col-lg-9 col-md-7 col-sm-9 col-9">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="header-logo">
                           <a href="index.html"><img src="assets/images/logo.png" alt="logo" width = "100"></a>
                        </div>
                        <div class="main-menu d-none d-xl-block">
                           <nav id="mobile-menu">
                              <ul>
                                 <li class="menu-item"><a href="index.html">Home</a>
                                 </li>
                                 <li class="menu-item"><a href="courses.php">Course</a>
                                 </li>
                                 <li class="menu-item"><a href="about.php">About US</a>
                                 </li>
                                 <li class="menu-item"><a href="contact.php">Contact US</a>
                                 </li>
                                 <li class="menu-item"><a href="user/index.php">Login</a>
                                 </li>
                                 <li class="menu-item"><a href="user/register.php">Enroll Now</a>
                                 </li>
                              </ul>
                              
                           </nav>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-5 col-sm-3 col-3">
                     <div class="header-right d-flex align-items-center justify-content-end">
                        <div class="user-btn-inner p-relative d-none d-md-block">
                           <div class="user-btn-wrapper">
                              <div class="user-btn-content ">
                                 <a class="user-btn-sign-in" href="user/index.php">Login </a>
                              </div>
                           </div>
                        </div>
                        <div class="d-none d-md-block">
                           <a class="user-btn-sign-up edu-btn" href="user/register.php">Enroll Now</a>
                        </div>
                        <div class="menu-bar d-xl-none ml-20">
                           <a class="side-toggle" href="javascript:void(0)">
                              <div class="bar-icon">
                                 <span></span>
                                 <span></span>
                                 <span></span>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>