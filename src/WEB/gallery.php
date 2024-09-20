<?php include "./isLogin.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Gallery</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>

<body>
   <!--header section start -->
   <?php include "./include/header.php" ?>
   <!--header section end -->
   <!-- gallery section start -->
   <div class="gallery_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h1 class="gallery_taital">Our Gallery</h1>
               <?php
               include './func/conect.php';
               if (!isset($_POST['query']))
               {
                  $_POST['query'] = "";
               } ?>
               <p class="gallery_text">Total amount for results for <?= $_POST['query'] ?></p>
            </div>
         </div>
         <div class="">
            <div class="gallery_section_2">
               <div class="row">
                  <?php
                  $a = $_POST['query'];
                  if (strpos($a, 'union') === false)
                  {
                     $a = str_ireplace("union","",$a);
                  }
                  $raw = $con->query("SELECT * FROM drinks WHERE name LIKE '%$a'");
                  while ($drink = $raw->fetch_assoc())
                  { ?>
                     <div class="col-md-4">
                        <div class="container_main">
                           <img src="images/<?php echo $drink['img']; ?>" alt="Avatar" class="image">
                           <div class="overlay">
                              <div class="text"><a href="#" style="font-size: 50px;">
                                    <?php echo $drink['name']; ?>
                                 </a></div>
                           </div>
                        </div>
                     </div>

                  <?php }
                  ?>
               </div>
            </div>
         </div>


      </div>
   </div>
   </div>
   <!-- gallery section end -->
   <div class="footer_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-sm-6">
               <h3 class="useful_text">About</h3>
               <p class="footer_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h3 class="useful_text">Menu</h3>
               <div class="footer_menu">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="about.php">About Us</a></li>
                     <li><a href="gallery.php">Gallery</a></li>
                     <li><a href="services.php">Services</a></li>
                     <li><a href="contact.php">Contact Us</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h1 class="useful_text">Useful Link</h1>
               <p class="dummy_text">Adipiscing Elit, sed do Eiusmod Tempor incididunt </p>
            </div>
            <div class="col-lg-3 col-sm-6">
               <h1 class="useful_text">Contact Us</h1>
               <div class="location_text">
                  <ul>
                     <li>
                        <a href="#">
                           <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_10">Address :
                              Loram Ipusm</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">Call : +01
                              1234567890</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_10">Email :
                              demo@gmail.com</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- footer section end -->
   <!-- copyright section start -->
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html
               Templates</a></p>
      </div>
   </div>
   <!-- copyright section end -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
</body>

</html>