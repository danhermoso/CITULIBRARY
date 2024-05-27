<?php 
session_start();
include('db_connection.php');



$id = $_GET['id'];

$sql = "SELECT * FROM list_new
        LEFT JOIN list_new_details ON list_new.id = list_new_details.new_id
        WHERE list_new_details.new_id = '$id' LIMIT 1";
$result = $connection->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CIT - U Mainlibrary</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<!-- sweet alert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<!-- sweet alert -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Updated: Feb 01 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <img src="assets/img/citu/lib-logo.png" class="img-fluid" alt=""><h1>LRAC</h1>
        <span>.</span>
      </a>

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
        <ul style='font-weight:bold'>
          <li><a href="index.php#hero" class="active">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="servicesFrontend.php">Services</a></li>
          <!-- <li><a href="index.php#portfolio">Portfolio</a></li> -->
          <li><a href="staffFrontend.php">Team</a></li>
          <li><a href="whatsnewd.php">What's New</a></li>
          <li class="dropdown has-dropdown"><a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
        <ul class="dd-box-shadow">
            <li><a href="5Tiered.php">Five-Tiered Library Instruction Program</a></li>
            <li><a href="eresourcesFrontend.php">E - Resources</a></li>
            <li><a href="ejournalFrontend.php">E - Journal</a></li>
        <ul class="dd-box-shadow">
        </ul>
         </li>
     </ul>
     <li><a href="LISABOT.php"><button style="background-color: #f8c400; color: maroon; font-weight: 1000; border: none; padding: 5px 20px; border-radius: 20px;">L I S A</button></a></li>
   </li>   
 </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

             <!-- REGISTER AND LOGIN BUTTON-->
             <div class="row">
     <!-- <div class="col"> -->
         <!-- <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#registrationModal"> -->
             <!-- Registration -->
         <!-- </button> -->
     <!-- </div> -->
     <div class="col">
         <!-- <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#loginModal">
             Login
         </button> -->
     </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

  <section id="hero" class="hero">
 
      <img src="assets/img/mainbg.png" alt="" data-aos="fade-in">

    <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h2 data-aos="fade-up" data-aos-delay="100" style='color: white;font-size:80px; margin-top:-350px'>Learning Resource<br> And Activity <a data-toggle="modal" >Center</a></h2>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">
        Open Registration Modal -->
    </button>
        <p data-aos="fade-up" data-aos-delay="100" style='color: white;'>The Learning Resource and Activity center is more than a Library. The space has been designed<br> to maximize learni
      </div>
    </div>
  </div>


</section>

  
    <!-- ==================== Test ko lang  -->
    <section id="recent-posts" class="recent-posts">
     <div class="container section-title" data-aos="fade-up">
         <h2 style='color:orange;'>What's New</h2>
     </div>

    <div class="container">
    <?php
    if ($result && $result->num_rows > 0) {
        // Fetch one row from the result set
        $row = $result->fetch_assoc();
        ?>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <!-- Image without border -->
                <div class="card border-0">
                    <div class="card-img-top">
                        <!-- Apply img-fluid class directly to the img tag -->
                        <img src="whatsnew/<?php echo $row['image_link']; ?>" alt="<?php echo $row['image_link']; ?>" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Description cards without borders -->
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <?php if (!empty($row['description_' . $i])) : ?>
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['description_' . $i]; ?></p>
                                <!-- Add more HTML elements to display other fields as needed -->
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <?php
    } else {
        // If no row is found, display an error message or handle it accordingly
        
        echo"<div class='row justify-content-center'>";
            echo"<div class='col-md-6'>";
                echo"<div class='alert alert-danger' role='alert'>";
                echo"<strong>No data found!</strong> Please try again later.";
                echo"</div>";
              echo"</div>";
          echo"</div>";
    }
    ?>
</div>
</section>


  <!-- ===================================== Footer ========================== -->
  <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-0 pb-0">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i> 
                        </div>
                    </div>
                    </div> 
            <div class="footer-content pt-4 pb-4">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                              <img src="assets/img/logoo.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p> N. Bacalso Avenue, Cebu City, Philippines 6000 <br>
                                    +63 32 411 2000 <br>
                                    Trunkline <br>
                                    info@cit.edu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3> Quick Links</h3>
                            </div>
                            <ul>
                                <li><a href="https://cituweb.pinnacle.com.ph/aims/students/">AIMS</a></li>
                                <li><a href="https://cit.edu/enrollment/">Enrollment</a></li>
                                <li><a href="https://cituonlinepayment.powerappsportals.com/Payment-Portal/">Payment Portal</a></li>
                                <li><a href="https://cit.edu/scholarships/">Scholarships</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Follow us</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, and check out social media updates!</p>
                            </div>
                            <style>
                                 .social-links {
                                  display: flex;
                                   margin-top: 6px; /* Adjust top margin as needed */
                                               }
                                  .social-links a {
                                  font-size: 24px; /* Adjust the font size as needed */
                                  margin-right: 10px; /* Adjust right margin between links */
                                               }
                                  /* Add margin between links */
                                  .social-links a:not(:last-child) {
                                  margin-right: 10px; /* Adjust the spacing between links */
                                  }
                              </style>
                                 <div class="social-links mt-6">
                                 <a href="https://twitter.com/CIT_University" style='color:white;' href=""><i class="bi bi-twitter"></i></a>
                                 <a href="https://www.facebook.com/CITUniversity" style='color:white;' href=""><i class="bi bi-facebook"></i></a>
                                 <a href="https://www.instagram.com/cituniversity/" style='color:white;' href=""><i class="bi bi-instagram"></i></a>
                                 <a href="https://www.tiktok.com/@cituniversity" style='color:white;' href=""><i class="bi bi-tiktok"></i></a>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                <div class="col-xl-6 col-lg-6 mx-auto text-center text-lg-left">
                      <div class="copyright-text">
                      <p style="text-align: center;">CAPSTONE GROUP 2 PROJECT SIR PASARA MI PLS GRADUATE CUTIE <br>
                      Copyright &copy; 2024. All Rights Reserved </p>
                       </div>
                  </div>
                </div>
            </div>
        </div>
    </footer>
<!-- End Footer -->

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>





  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>
  <style>
       body, html {
     height: 100%;
     margin: 0;
   }
   #hero {
     display: flex;
     align-items: center;
     justify-content: center;
     height: 100vh;
     position: relative;
     padding-top: 460px; /* Adjust this value based on your navigation bar height */
     overflow: hidden; /* Hide overflow from navigation bar */
   }
   .hero-content {
     text-align: center;
    
   }
   .hero-content h2 {
     font-size: 2.5rem;
     font-weight:bold;
     color: #8c383e
   
     margin-bottom: 16px;
   }
   .hero-content p {
     font-size: 1.2rem;
     margin-bottom: 30px;
   }
   /* start footer */
   .footer-section {
      background: #65000b;    /* backround color sa footer */
      position: relative;
   }
   .footer-logo img {
      max-width: 200px; /* size sa logo */
   }
   .footer-text p {
     margin-bottom: 14px;
     font-size: 16px;
     color: #ffffff; /* text ubos sa cit logo */
     line-height: 28px;
   }
   .footer-widget-heading h3 {
     color: #ffcc33;   /* color for heading quick links follow us */
     font-size: 20px;
     font-weight: 600;
     margin-bottom: 40px;
     position: relative;
   }
   .footer-widget-heading h3::before { /* lines ubos sa useful links ug follow us */
     content: "";
     position: absolute;
     left: 0;
     bottom: -15px;
     height: 2px;
     width: 50px;
     background: #ffcc33;
   }
   .footer-widget ul li {
     display: inline-block; /* para ma linya ang menu sa quick links*/
     float: left;
     width: 50%;
     margin-bottom: 12px;
   }
   .footer-widget ul li a:hover{
     color: #ffcc33;
   }
   .footer-widget ul li a { /* useful links :home chichui */
     color: #ffffff;
     text-transform: capitalize;
   }
   .copyright-area{
     background: #480607; /* color ni ubos sa main footer */
     padding: 25px 0;
   }
   .copyright-text p {
     margin: 0;
     font-size: 11px;
     color: #ffffff;   /* color ni copyright text */
   }
   .copyright-text p a{
     color: #ffffff;
   }
  
   /* Define a class for your button */
   .custom-button {
       background-color: blue; /* Set the background color */
       color: white; /* Set the text color */
       /* Add any additional styles here */
   }
   /* Define hover styles for the button */
   .custom-button:hover {
       background-color: darkblue; /* Set the hover background color */
       /* Add any additional hover styles here */
   }
   /* footer end */
 </style>
   <!-- Your HTML body content... -->

   <?php
    if (isset($successMessage)) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: '$successMessage',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'index.php';
                });
              </script>";
    } elseif (isset($errorMessage)) {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: '$errorMessage',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
    ?>

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Other script tags... -->
</body>

</html>