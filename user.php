<?php 
session_start();
include('db_connection.php');


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
                    <span style='color:white'>Announcement</span></a>
                    
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

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


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


                <!-- #################################################Begin Page Content ############################################-->
            
                <?php 
                    include('db_connection.php');
                    $sql_user = "SELECT * FROM users ORDER BY id DESC";
                    $user = $connection->query($sql_user);
                ?>
                <div class="container-fluid">
                  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email Address</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if ($user->num_rows > 0) 
                                            {
                                                while ($row = $user->fetch_assoc())
                                                {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["username"] . "</td>";
                                                    echo "<td class='hidden-xs hidden-sm'>" . $row["firstname"] . "</td>";
                                                    echo "<td class='hidden-xs hidden-sm'>" . $row["lastname"] . "</td>";
                                                    echo "<td class='hidden-xs hidden-sm'>" . $row["email_address"] . "</td>";
                                                    echo "<td><button onclick='deleteUser(" . $row["id"] . ")' class='btn btn-danger'>Delete</button></td>";
                                                    echo "</tr>";
                                                }
                                                } else {
                                                    echo "<tr><td colspan='6'>No records found</td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>
                    <!-- /.container-fluid -->

                    </div>

                <!-- #################################################Begin Page Content ############################################-->
               

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
    <script src="assets/js/main.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- sweet alert -->
   
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script> 
    <script>
    function deleteUser(userId) {
        // Display a SweetAlert2 confirmation dialog
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            // If the user clicks "OK", proceed with deletion
            if (result.isConfirmed) {
                // Perform the deletion using AJAX or redirect to a PHP script
                // Here, I'll show an example using AJAX
                $.ajax({
                    url: 'delete_user.php', // replace with your actual PHP script
                    type: 'POST',
                    data: { userId: userId },
                    success: function(response) {
                        // Update the UI or handle success as needed
                        Swal.fire("Deleted!", "User deleted successfully.", "success");
                    },
                    error: function(error) {
                        // Handle the error or display an appropriate message
                        Swal.fire("Error!", "Error deleting user.", "error");
                    }
                });
            }
        });
    }
</script>

</body>

</html>