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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>CIT - U Mainlibrary</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<!-- sweet alert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<!-- sweet alert -->

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <img src="assets/img/citu/CITLOGO.png" class="img-fluid" alt=""><h1 style="font-size: 30px;">LRAC</h1>
        <span>.</span>
      </a>

    <style>
    .navmenu {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    </style>
      
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
        <!-- <div class="col">
            <button  type="button color:maroon" class="btn btn-success mb-2" data-toggle="modal" data-target="#registrationModal">
                Registration
            </button> -->
        </div>
        <!-- <div class="col">
            <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#loginModal">
                Login
            </button>
        </div> -->
    </div>
    <div class="logo">
      <img src="assets/img/citu/lib-logo.png" alt="New Logo">
    </div>

    </div>
</header><!-- End Header -->

    <section id="hero">
      <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/mainbgcarousel/6_img.jpg" class="d-block w-100" alt="Slide 1">
          </div>
          <div class="carousel-item">
             <img src="assets/img/mainbgcarousel/8_img.jpg" class="d-block w-100" alt="Slide 2">
           </div>
          <div class="carousel-item">
             <img src="assets/img/mainbgcarousel/13_img.jpg" class="d-block w-100" alt="Slide 2">
           </div>
          <div class="carousel-item">
            <img src="assets/img/mainbgcarousel/4_img.jpg" class="d-block w-100" alt="Slide 2">
          </div>
          <div class="carousel-item">
            <img src="assets/img/mainbgcarousel/3_img.jpg" class="d-block w-100" alt="Slide 3">
          </div>
          <div class="carousel-item">
            <img src="assets/img/mainbgcarousel/14_img.jpg" class="d-block w-100" alt="Slide 3">
          </div>
          <div class="carousel-item">
            <img src="assets/img/mainbgcarousel/15_img.jpg" class="d-block w-100" alt="Slide 3">
          </div>
          <div class="carousel-item">
            <img src="assets/img/mainbgcarousel/16_img.jpg" class="d-block w-100" alt="Slide 3">
          </div>
        </div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-lg-10">
                    <h2 data-aos="fade-up" data-aos-delay="100" style='color: white;font-size:80px;'>
                <span style="font-size: 100px; font-weight: bold;">L</span>earning <br>
                <span style="font-size: 100px; font-weight: bold;">R</span>esource & <br>
                <span style="font-size: 100px; font-weight: bold;">A</span>ctivity <br>
                <span style="font-size: 100px; font-weight: bold;">C</span>enter <br>
              </h2>
            </div>
        </div>
      </div>
  </section>
   

    <!-- About Section - Home Page -->
    <section id="about" class="about">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-xl-center gy-4">

      <!-- Brief History Box -->
      <div class="col-xl-12">
        <div class="icon-box brief-history-box" data-aos="fade-up" data-aos-delay="100">
          <h3 style='color:maroon;'>About Us</h3>
          <h2 style='color:#f8c400;'>BRIEF HISTORY</h2>
          <p style='word-wrap: break-word; overflow: hidden;  text-overflow: ellipsis; text-align: justify; font-size: 15px;'>In 1946, approximately following the conclusion of 
          World War II, the Cebu Institute of Technology opened its doors as an educational institution on F. Ramos Street, Cebu City. This endeavor was brought to fruition through 
          the visionary efforts of its founder, Dr. Nicolas G. Escario, a physician who collaborated with the three distinguished technocrats: Engr. Fidel Dagatani, Engr. Amancio 
          Alcordo and Engr. Jose A. Cavan. The institution’s inception was marked by the utilization of two prefabricated structures, with the library being improvised from a war 
          damaged residential concrete structure’s living room. In the 1960’s CIT underwent a significant transition, relocating to a new campus on N. Bacalso Ave., a move that also 
          involved the transfer of the library to its new location. In late1978, during the presidency of Don Rodolfo Lizares, Sr., a one- storey library building was constructed as 
          part of a multi-million campus- wide development project in collaboration with EDPITAF (Educational Development Projects Implementing Task Force, Philippines). This project 
          led to the library’s present location. In 2004, a major renovation of the college library was undertaken under the leadership of President Gregorio L. Escario who served as 
          the third President of CIT and the first President of CIT-University. The renovated library underwent a transformation from its previous dull and dark gray appearance to a 
          warm, cozy, and visually pleasing ochre ambiance. To enhance its suitability as a study environment, air-conditioning units were installed, and library operations were 
          modernized through the implementation of a custom-built library management system. Furthermore, computers for the electronic catalog were seamlessly integrated using wireless
           technology. An Internet Center was also added. In line with staying current and adapting to contemporary educational needs, the library underwent a transformation into a
            Learning Resource and Activity Center. This renovation embraced the concept of a learning common, aiming to inspire learners toward innovation and excellence. With this 
            redesigned space various learning areas were introduced, including discussion rooms, collaborative rooms, an activity loft, a pitch room, an activity center, a student’s 
            lounge, and a multimedia viewing room.</p>
        </div>
      </div>

    <!-- Vision Box -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="icon-box">
        <i class="bi bi-eye" style="color: maroon;"></i>
        <h3 style='color:#f8c400;'>OUR VISION</h3>
        <p style='text-align: justify; font-size: 15px;'>To become the premier facilitator in bridging the gap between the vast array of information resources housed within our library
         and the diverse and evolving needs of contemporary knowledge seekers in the 21st century.</p><br><br>  
      </div>
    </div> <!-- End Vision Box -->
    
    <!-- Mission Box -->
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
      <div class="icon-box">
        <i class="bi bi-compass" style="color: maroon;"></i>
        <h3 style='color:#f8c400;'>OUR MISSION</h3>
        <p style='text-align: justify; font-size: 15px;'>To empower individuals with the tools, resources, and support necessary to navigate and harness the wealth of information 
        available, thus fostering lifelong learning, critical thinking, and academic success in the ever-evolving landscape of the 21st century.</p><br>
      </div>
    </div> <!-- End Mission Box -->
    
    <!-- Service Hours Box -->

    <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
      <div class="icon-box">
        <i class="bi bi-clock" style="color: maroon;"></i>
        <h3 style='color:#f8c400;'>SERVICE HOURS</h3>
        <p style='text-align: justify; font-size: 15px;'>
        Monday to Friday 7:30 AM - 7:30 PM
        Saturday for the Undergraduate library 8:00 AM - 12:00 PM
        Graduate School Library 8:00 - 4:00 PM
        LIBRARY HOURS BEFORE major exams(Prelims,Midterms,Pre-final and Final exam)
        Monday to Friday 7:30 AM - 9:00 PM
        Saturday 8:00 AM - 5:00 PM

        </p>
      </div>
    </div> <!-- End Service Hours Box -->

    </div>
  </div>

</section><!-- End About Section -->

   <!-- ==================================LIBRARY IMAGES SHOWCASE SECTION ========================= -->
   <style>
    /* CSS for the stats section */
    #stats {
      position: relative; /* Ensure the section can contain the image */
      overflow: hidden; /* Hide any overflow from the image */
      height: 435px; /* Adjust the height as needed */
    }

    #stats img {
      width: 100%; /* Make the image fill the entire width of its container */
      height: 100%; /* Ensure the image covers the full height of the container */
      object-fit: cover; /* Ensure the image covers the entire container */
      position: absolute; /* Position the image within its container */
      top: 0; /* Position the image at the top */
      left: 0; /* Position the image at the left */
      filter: none; /* Remove any filters */
      opacity: 1; /* Ensure full opacity */
    }
  </style>

  <section id="stats" class="stats">
    <img src="assets/img/citu/3c_img.jpg" alt="" data-aos="fade-in">
  </section>




   
<!----------------------------------------------  SERVICESSSSS ----------------------------------------------------->
  
    <section id="services" class="services">
        <br>
        <br>
  <div class="container section-title" data-aos="fade-up">
      <h2 style='color:orange;'>SERVICES</h2>
  </div><!-- End Section Title -->
  <div class="container">
      <div class="row gy-4">
          <?php
              // Include your database connection
              include('db_connection.php');
  
              // Define the SQL query to fetch data
              $sql = "SELECT title, description, pic_link FROM service_table";
              $result = $connection->query($sql);
              // Check if the query was successful
              
              if ($result) {
              // Fetch data as an associative array
              while ($row = $result->fetch_assoc()) {
               echo '<div class="col-xl-6" data-aos="fade-up" data-aos-delay="100">';
               echo '<div class="service-container">';
               echo '<div class="post-img">';
             // Assuming you have an 'image' column in your database
               echo '<img src="services/' . $row['pic_link'] . '" alt="" class="img-fluid">';
               echo '</div>';
               echo '<div class="service-content">';
             // Change text color here
               echo '<p class="post-category" style="font-weight: bold; color: maroon;">' . $row['title'] . '</p>';
             // Change text color and background color here
               echo '<h2 class="title" style="color: black; background-color: white;">' . $row['description'] . '</a></h2>';
               echo '</div>';
               echo '</div>';
               echo '</div>';
    }
} else {
    // Handle query error
    echo "Error executing query: " . $connection->error;
}

              // Close the database connection
              $connection->close();
              ?>
          </div>
      </div>
       <style>
     /* CSS for service container */
     .service-container {
         display: flex;
         flex-direction: row; /* Arrange items horizontally */
         border-radius: 8px; /* Add border radius for rounded corners */
         overflow: hidden; /* Hide overflow content */
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow effect */
         height: 150px; /* Set fixed height for the container */
     }
   
     /* CSS for post image */
     .post-img {
         flex: 0 0 auto; /* Do not allow image to grow */
         width: 200px; /* Set fixed width for image */
         
     }
   
     /* CSS for service content */
     .service-content {
         flex: 1; /* Allow content to grow */
         padding: 20px; /* Add padding for spacing */
     }
     /* Adjust font sizes */
     .post-category {
         font-size: 16px !important; /* Adjust font size for title */
         margin-bottom: 8px; /* Adjust margin bottom for title */
     }
     .title {
         font-size: 14px !important; /* Adjust font size for description */
     }
     
   </style>       
  </section>

   <!------------------------------------------------- End Services Section ------------------------------------------------------------->

   <!----------------------------------------------------------- STAFF Section ---------------------------------------------------------->
   <hr>
   <br>
   <br>
   <div class="container section-title" data-aos="fade-up" style="text-align: center;"><br>
   <h2 style='color:orange;'>MEET YOUR LIBRARY STAFF</h2>
    <br>
    <br>
    <p style='font-size:19px; color:black; text-align: center;'>The <b>Library and Learning Resource Center</b> is currently staffed by <b>(13)</b> qualified professional librarians, 
    three <b>(3)</b> professional support personnel and forty-eight <b>(48)</b> Non - Academic Scholars <b>(NAS)</b>, all directed by the University Librarian, 
    who has a master's degree in Library Science and certifications earned abroad. These qualifications satisfy the minimum requirement set by 
    CHED and PACUCOA for university librarians. The daily operations of the library are facilitated with the help of the library staff assisting 
    the University Librarian, who are all united with one direction: providing quality service to the clientele making them fully learned and 
    independent information seekers.</p>
    <br>
    </div>

    <div class="container">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-md-8"> <!-- Adjust the column width as needed -->
            <div class="row gy-4">
                <?php
                // Include your database connection
                include('db_connection.php');

                // Define the SQL query to fetch data
                $sql = "SELECT name, position, profile_link FROM staff_table";
                $result = $connection->query($sql);
                // Check if the query was successful           
                if ($result) {
                // Fetch data as an associative array
                while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="text-align: center;">'; // Center align content
                  echo '<article style="width: 200px; height: 245px;">';
                  echo '<div class="post-img" style="height: 200px;">';
                  // Assuming you have an 'image' column in your database
                  echo '<img src="staff/' . $row['profile_link'] . '" alt="" class="img-fluid uniform-image rounded-circle" style="border: 1px solid maroon;">'; 
                  echo '</div>';
                  echo '<p class="post-category" style="margin-bottom: 0;">' . $row['name'] . '</p>'; // Center the name and remove bottom margin
                  echo '<h2 class="position">' . $row['position'] . '</h2>'; // Center the position with reduced top margin
                  echo '<div class="d-flex align-items-center">';
                  echo '<div class="post-meta">';
                  echo '</div>';
                  echo '</div>';
                  echo '</article>';
                  echo '</div>';
                     }
                } else {
    // Handle query error
    echo "Error executing query: " . $connection->error;
}


                // Close the database connection
                $connection->close();
                ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

        </div>
      <style>
    /* CSS to make images uniform in size and align center */
    .img-fluid.uniform-image {
        width: 100%; /* Set width to 100% */
        height: auto; /* Maintain aspect ratio */
        max-width: 200px; /* Set max-width for uniformity */
    }
    /* Flexbox to vertically center align items */
    .post-img {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%; /* Ensure the container takes the full height */
    }
    /* CSS to adjust font size */
    .post-category {
    font-weight: 600;
    font-size: 20px; /* Adjust font size as needed */
    margin-top: 1px; /* Increase top margin for spacing */
    margin-bottom: 0; /* Remove bottom margin */
    font-size: 20px
    }
    .position {
      font-size: 15px;

    }
    </style>
    </section>
    
    
    
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

.Lisa {
  width: 50px;
  height: 50px;
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
                  <h5 class="modal-title" id="registrationModalLabel">Admin Registration</h5>
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
                           <label for="role_id">Role:</label>
                           <select class="form-control" name="role_id" required>
                               <option value=""> -- SELECT -- </option>
                               <?php
                               while ($row = mysqli_fetch_assoc($resultRole)) {
                                   echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                               }
                               ?>
                           </select>
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


<!--========================================== LOGIN  ===============================================-->


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
  position: relative;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  filter: brightness(50%); /* Adjust brightness percentage as needed */
}


    .hero-content {
      text-align: center;
     
    }

    .hero-content h2 {
      font-size: 2.5rem;
      font-weight:bold;
      color: #FFFFFF;
      }

    .hero-content p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }
    
    .carousel {
      position: absolute;
      top: 0;
      width: 100%;
      height: 100%;
    }
    .carousel-inner {
      height: 100%;
    }
    .carousel-item {
      height: 100%;
      filter: brightness(50%); /* Adjust the percentage to change the brightness */
    }
    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 100%;
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