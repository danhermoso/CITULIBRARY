<?php
session_start();

include('db_connection.php');

//==================== WEBSITE VISIT ====================
$ctr_visit = "SELECT view_count as count FROM page_views";
$res_visit = $connection->query($ctr_visit);


$count = 0;
if ($res_visit && $res_visit->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_visit->fetch_assoc();
    $count = $row["count"];
}

//==================== USER COUNT ====================
$ctr_user = "SELECT count(*) as user_count FROM users";
$res_user = $connection->query($ctr_user);

$query2 = "SELECT id, name FROM master_role";
$resultRole = mysqli_query($connection, $query2);


$count_user = 0;
if ($res_user && $res_user->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_user->fetch_assoc();
    $count_user = $row["user_count"];
}

//================== WHATS NEW COUNT ==================
$ctr_new = "SELECT count(*) as list_new FROM list_new";
$res_new = $connection->query($ctr_new);


$list_new = 0;
if ($res_new && $res_new->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_new->fetch_assoc();
    $list_new = $row["list_new"];
}


//================== SERVICES COUNT ==================
$ctr_new = "SELECT count(*) as service_table FROM service_table";
$res_new = $connection->query($ctr_new);


$service_table = 0;
if ($res_new && $res_new->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_new->fetch_assoc();
    $service_table = $row["service_table"];
}


//================== STAFF COUNT ==================
$ctr_new = "SELECT count(*) as staff_table FROM staff_table";
$res_new = $connection->query($ctr_new);


$staff_table = 0;
if ($res_new && $res_new->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_new->fetch_assoc();
    $staff_table = $row["staff_table"];
}


//================== STAFF COUNT ==================
$ctr_new = "SELECT count(*) as eresources_table FROM eresources_table";
$res_new = $connection->query($ctr_new);


$eresources_table = 0;
if ($res_new && $res_new->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_new->fetch_assoc();
    $eresources_table = $row["eresources_table"];
}


//================== STAFF COUNT ==================
$ctr_new = "SELECT count(*) as ejournal_table FROM ejournal_table";
$res_new = $connection->query($ctr_new);


$ejournal_table = 0;
if ($res_new && $res_new->num_rows > 0) {
    // Step 3: Fetch count
    $row = $res_new->fetch_assoc();
    $ejournal_table = $row["ejournal_table"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CITU - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #8c383e">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <img src="assets/img/citu/lib-logo.png" class="img-fluid" alt="Logo">
                </div>
                <div class="sidebar-brand-text mx-3">CIT - U Mainlibrary</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog" style='color:white'></i>
                    <span style='color:white'>Announcement</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="whatsnew.php" >Whats New</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder" style='color:white'></i>
                    <span style='color:white'>Masterdata</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Module</h6>
                        <a class="collapse-item" href="user.php">User</a>
                        <a class="collapse-item" href="chatbotdb.php">Chat Bot</a>
                        <a class="collapse-item" href="servicesdb.php">Services</a>
                        <a class="collapse-item" href="staffdb.php">Staff</a>
                        <a class="collapse-item" href="eresourcedb.php">E - Books</a>
                        <a class="collapse-item" href="ejournaldb.php">E - Journal</a> 
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <!-- Nav Item - User Information -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 
                                    // Check if user ID is set in the session
                                    if(isset($_SESSION['id'])) {
                                        // Retrieve user's name from the database using user ID
                                        $userId = $_SESSION['id'];
                                        $query = "SELECT firstname, lastname FROM users WHERE id = $userId";
                                        $result = mysqli_query($connection, $query);
                                        if($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            echo $row['firstname'].' '.$row['lastname'];
                                        } else {
                                            echo "Unknown User";
                                        }
                                    } else {
                                        echo "Unknown User";
                                    }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#"> -->
                                    <!-- <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                    <!-- Profile -->
                                <!-- </a> -->
                                <!-- <a class="dropdown-item" href="#"> -->
                                    <!-- <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                    <!-- Settings -->
                                <!-- </a> -->
                                <!-- <a class="dropdown-item" href="#"> -->
                                    <!-- <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                    <!-- Activity Log -->
                                <!-- </a> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                   </ul>
               </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!--====================== WEBSITE VISITS =====================================-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Website Visits</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $count; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-globe fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--================================ WEBSITE USER ==============================-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_user; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--======================================= DASH BOARD WHATS NEW POST ===========================-->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">What's New</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $list_new; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!--======================================= DASH BOARD WHATS SERVICES ===========================-->
                        <div class="col-xl-4 col-md-6 mb-4">
                             <div class="card border-left-danger shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Services</div>
                                             <div class="row no-gutters align-items-center">
                                                 <div class="col-auto">
                                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $service_table; ?></div>
                                                 </div>
                                                 <div class="col">
                                                     <div class="progress progress-sm mr-2">
                                                         <div class="progress-bar bg-danger" role="progressbar"
                                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-wrench fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>

                         <!--======================================= DASH BOARD WHATS STAFF ===========================-->
                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Staff</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $staff_table; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!--======================================= DASH BOARD WHATS E-Resources ===========================-->
                        <div class="col-xl-4 col-md-6 mb-4">
                             <div class="card border-left-primary shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">E-Books</div>
                                             <div class="row no-gutters align-items-center">
                                                 <div class="col-auto">
                                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $eresources_table; ?></div>
                                                 </div>
                                                 <div class="col">
                                                     <div class="progress progress-sm mr-2">
                                                         <div class="progress-bar bg-primary" role="progressbar"
                                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div> 
                        </div>

                         <!--======================================= DASH BOARD WHATS E-Resources ===========================-->
                        <div class="col-xl-4 col-md-6 mb-4">
                             <div class="card border-left-info shadow h-100 py-2">
                                 <div class="card-body">
                                     <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">E-Books</div>
                                             <div class="row no-gutters align-items-center">
                                                 <div class="col-auto">
                                                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ejournal_table; ?></div>
                                                 </div>
                                                 <div class="col">
                                                     <div class="progress progress-sm mr-2">
                                                         <div class="progress-bar bg-info" role="progressbar"
                                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CITU Mainlibrary 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <style>
            /* CSS */
        .sticky-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ffffff;
            text-align: center;
            padding: 10px 0;
            /* Adjust as needed */
        }

    </style>
    
</body>


</html>