<?php 

include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle form submission
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $sex = $_POST['sex'];
  $email = $_POST['email'];
  $role_id = $_POST['role_id'];
  $username = $_POST['username'];

  $password = trim($_POST['password']);
  $password = password_hash($password, PASSWORD_BCRYPT); // Hash the password

  // Check if the email already exists
  $checkQuery = "SELECT COUNT(*) as count FROM users WHERE email_address = '$email'";
  $checkResult = mysqli_query($connection, $checkQuery);
  $checkData = mysqli_fetch_assoc($checkResult);

  if ($checkData['count'] > 0) {
      // Email already exists
      $errorMessage = 'Error: Email already exists in the database.';
  } else {
      // Insert data into the 'users' table
      $insertQuery = "INSERT INTO users (firstname, lastname, sex, email_address, role_id, username, password) 
                      VALUES ('$firstname', '$lastname', '$sex', '$email', '$role_id', '$username', '$password')";

      $insertResult = mysqli_query($connection, $insertQuery);

      if ($insertResult) {
          $successMessage = 'Registration successful!';
      } else {
          // Registration failed
          $errorMessage = 'Error: ' . mysqli_error($connection);
      }
  }
}

// Function to update view count for a page
function updatePageViews($pageName, $connection)
{
   include('db_connection.php');
    $pageName = $connection->real_escape_string($pageName); // Sanitize input

    $query = "UPDATE page_views SET view_count = view_count + 1 WHERE page_name = '$pageName'";
    $connection->query($query);
}

$currentPage = $_SERVER['REQUEST_URI'];
updatePageViews($currentPage, $connection);



$query2 = "SELECT id, name FROM master_role";
$resultRole = mysqli_query($connection, $query2);


/* display post or new */
$sql = "SELECT list_new.id,
              list_new.name, 
              list_new.description, 
              list_new.image_link, 
              list_new.date_created, 
              users.firstname, 
              users.lastname
              FROM list_new
              LEFT JOIN users ON users.id = list_new.user_id
              ORDER BY list_new.id DESC LIMIT 3";
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
          <li class="dropdown has-dropdown"><a href="servicesFrontend.php"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dd-box-shadow">
              <li><a href="5Tiered.php">Five-Tiered Library Instruction Program</a></li>
                <ul class="dd-box-shadow">
                </ul>
              </li>
            </ul>
          <!-- <li><a href="index.php#portfolio">Portfolio</a></li> -->
          <li><a href="staffFrontend.php">Team</a></li>
          <li><a href="whatsnewd.php">What's New</a></li>
          <li class="dropdown has-dropdown"><a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dd-box-shadow">
              <li><a href="eresourcesFrontend.php">E - Books</a></li>
              <li><a href="ejournalFrontend.php">E - Journals</a></li>
                <ul class="dd-box-shadow">
                </ul>
              </li>
            </ul>
            <li><a href="aboutlisa.php"><button style="background-color: #f8c400; color: maroon; font-weight: 1000; border: none; padding: 5px 20px; border-radius: 20px;">L I S A</button></a></li>
          </li>
         </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <!-- REGISTER AND LOGIN BUTTON-->
      <div class="row">
      <div class="col">
          <!-- <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#registrationModal"> -->
              <!-- Registration -->
          <!-- </button> -->
      </div>
      <!-- <div class="col">
          <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#loginModal">
              Login
          </button>
      </div> -->
  </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

<section id="hero" class="hero">
 
      <img src="assets/img/mainbg.png" alt="" data-aos="fade-in">

  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h2 data-aos="fade-up" data-aos-delay="100" style='color: white;font-size:80px;'>Learning Resource<br> And Activity Center </h2>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">
        Open Registration Modal 
    </button> -->
        <p data-aos="fade-up" data-aos-delay="100" style='color: white;'>The Learning Resource and Activity center is more than a Library. 
        The space has been designed<br> to maximize learning and enable collaboration. With discussion areas, learning becomes fun and interactive</p>
      </div>
    </div>
  </div>


</section>


<!-- FIVE TIERRED -->
<div class="container section-title" data-aos="fade-up">
  <br>
  <br>
        <h2 style='color:orange;'>FIVE TIERED LIBRARY INSTRUCTION PROGRAM</h2>
    </div>

<section class="timeline">
  <div class="container">
    <div class="timeline-item">
      <div class="timeline-img"></div>

      <div class="timeline-content js--fadeInLeft">
        <h2 style='color:maroon;'><b>LIP LEVEL 1 (LIBRARY TOUR)</b></h2>
        <p style='text-align: justify; font-size: 15px;'>LIP Level I (Library Tour) caters to anyone who wishes to have an overview of the Library system through a physical tour of its facilities, service areas, holdings, and more.</p>
      </div>
    </div> 

    <div class="timeline-item">

      <div class="timeline-img"></div>

      <div class="timeline-content timeline-card js--fadeInRight">
        <div class="timeline-img-header">
          <h2 style='color:maroon;'><b>LIP LEVEL 2 (LIBRARY ORIENTATION)</b></h2>
        </div>
        <p style='text-align: justify; font-size: 15px;'>LIP Level II (Library Orientation) caters to all students taking up English 011 (Study and Thinking Skills) to help them find their way in using the library. Students are given an overview 
                  of the library system through a virtual tour, launched last July 2012 using an audio-visual presentation. Then through a lecture, students are taught the library policies and basic library skills, 
                  such as using the e-catalog and borrowing/returning a book, etc.</p>
      </div>
    </div>   
    <div class="timeline-item">

      <div class="timeline-img"></div>

      <div class="timeline-content js--fadeInLeft">
        <h2 style='color:maroon;'><b>LIP LEVEL 3 (BIBLIOGRAPHIC INSTRUCTION)</b></h2>
        <p style='text-align: justify; font-size: 15px;'>LIP Level III (Bibliographic Instruction) caters to all students taking up English 012/014 (Writing in the Disciplines/Technical Writing). In preparation for intensive research and data gathering in their later years, 
                  freshman and sophomore students are given a more enhanced discussion on the various types of library resources and are trained how to access and use these resources using the various library search tools, e.g. e-catalog, 
                  periodical index system, and online databases, though lecture, hands-on exercises, and skills testing.</p>
      </div>
    </div>   
    <div class="timeline-item">

      <div class="timeline-img"></div>

      <div class="timeline-content js--fadeInRight">
        <h2 style='color:maroon;'><b>TLIP LEVEL 4 (RESEARCH STRATEGIES SEMINAR-WORKSHOP)</b></h2>
        <p style='text-align: justify; font-size: 15px;'>LIP Level IV (Research Strategies Seminar-Workshop) caters to fourth year and fifth year students taking up research courses in their specific fields of study. Now, students are given an in-depth discussion on how the library’s 
                  resources and services can aid them throughout the entire research process. Part 1 provides a brief introduction to thesis writing, a comprehensive study of the different library resources available, and the search tools used to access these resources. 
                  Part 2 gives practical tips in data gathering and literature search, utilizing web resources, evaluating websites and other information sources, note-taking and bibliographic citation. Each session is followed by a hands-on workshop on finding and citing 
                  sources using the library and web search tools.</p>
      </div>
    </div>   
    <div class="timeline-item">

      <div class="timeline-img"></div>

      <div class="timeline-content timeline-card js--fadeInLeft">
        <div class="timeline-img-header">
          <h2 style='color:maroon;'><b>LIP LEVEL 5 (RESEARCH STRATEGIES SEMINAR-WORKSHOP)</b></h2>
        </div>
        <p style='text-align: justify; font-size: 15px;'>LIP Level V (Library Instruction for Faculty) caters to faculty members in all three levels (Elementary, High School, and College) to acquaint them with the various library resources, services, and facilities suitable for them and the students they are handling. 
                      Faculty members are oriented with the library policies and service procedures, e.g. book borrowing, applicable to them. They are also trained in the use of the library search tools, particularly the online databases.</p>
      </div>
    </div>   
    <div class="timeline-item">
      <br>
      <br>

    
  </div>
</section>

    <!-- End Features Section -->
   
<style>
  .chat-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}

.chat-history {
  max-height: 200px;
  overflow-y: auto;
  padding: 10px;
}

.user-input {
  display: flex;
  align-items: center;
  padding: 10px;
}

.user-input input[type="text"] {
  flex: 1;
  margin-right: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 8px;
}

.user-input button {
  background-color: blue;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.pls {
  position: absolute;
  bottom: -70px;
  right: 10px;
}

</style> 

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
                                <li><a href="http://citulib.pinnacle.com.ph">OPAC</a></li>
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
  <!-- REGISTRATION MODAL -->
  <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <!-- Include your registration form here -->
          <form method="post" action="">
              <div class="modal-header">
                  <h5 class="modal-title" id="registrationModalLabel">User Registration</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                          <!-- Left Column -->
                          <div class="form-group">
                              <label for="firstname">First Name:</label>
                              <input type="text" class="form-control" name="firstname" required>
                          </div>
                          <div class="form-group">
                              <label for="lastname">Last Name:</label>
                              <input type="text" class="form-control" name="lastname" required>
                          </div>
                          <div class="form-group">
                              <label for="sex">Sex:</label>
                              <select class="form-control" name="sex" required>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <!-- Right Column -->
                          <div class="form-group">
                              <label for="email">Email Address:</label>
                              <input type="email" class="form-control" name="email" required>
                          </div>

                          <div class="form-group">
                              <label for="username">Username:</label>
                              <input type="text" class="form-control" name="username" required>
                          </div>
                          
                      </div>
                  </div>
                  <!-- Additional form fields go here -->
                  <div class="form-group">
    
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    
                  </div>
                
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Register</button>
              </div>
          </form>
      </div>
  </div>
</div>

<!-- LOGIN  -->
<!-- LOGIN MODAL -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Include your login form here -->
            <form method="post" action="login_process.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">User Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="login_username">Username:</label>
                        <input type="text" class="form-control" name="login_username" required>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password:</label>
                        <input type="password" class="form-control" name="login_password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- LOGIN  -->


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
  <script>
    $(document).ready(function() {
      $('#level1').click(function(e) {
        e.preventDefault();
        $('#level1Modal').modal('show');
      });
    });

    $(document).ready(function() {
      $('#level2').click(function(e) {
        e.preventDefault();
        $('#level2Modal').modal('show');
      });
    });

    $(document).ready(function() {
      $('#level3').click(function(e) {
        e.preventDefault();
        $('#level3Modal').modal('show');
      });
    });

    $(document).ready(function() {
      $('#level4').click(function(e) {
        e.preventDefault();
        $('#level4Modal').modal('show');
      });
    });

    $(document).ready(function() {
      $('#level5').click(function(e) {
        e.preventDefault();
        $('#level5Modal').modal('show');
      });
    });

    
  </script>
  
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

html, body  /* sa LIP */

.timeline {

	position: relative;

.timeline-item {
	
	&:nth-child(even) {

		.timeline-content {
			float: right;
			padding: 40px 30px 10px 30px;
		}
	}
	&::after {
		content: '';
		display: block;
		clear: both;
	}
}
.timeline-content {
	position: relative;
	width: 45%;
	padding: 10px 30px;
	border-radius: 4px;
	background: #f5f5f5;
	box-shadow: 0 20px 25px -15px rgba(0, 0, 0, .3);

}
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