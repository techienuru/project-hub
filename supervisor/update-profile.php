<?php

session_start();
include "../include/connect.php";

//DECLARING NEW VARIABLES
$new_password_err = null;
$photo = null;

if (isset($_SESSION["supervisor_id"])) {
    $user_id = $_SESSION["supervisor_id"];
    $sql = mysqli_query($connect, "SELECT * FROM `supervisor` WHERE id = $user_id");
    
    if ($sql) {
        $fetch = mysqli_fetch_assoc($sql);
        $firstname = $fetch["firstname"];
        $lastname = $fetch["lastname"];
        $othername = $fetch["othername"];
        $email = $fetch["email"];
        $password = $fetch["password"];
        if (isset($fetch["photos"])) {
            $photos = $fetch["photos"];
        }

        $modified_lastname = strtoupper($lastname);

    } else {
        die("Error: " . mysqli_error($connect));
    }
if (isset($_POST['submit'])) {
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];
    $new_othername = $_POST['othername'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_cpassword = $_POST['cpassword'];
    $photo = $_FILES["photo"];

    //GETTING FILE DETAILS
    $real_photo_name = $photo["name"];
    $temp_name = $photo["tmp_name"];

    $pathinfo_array = pathinfo($real_photo_name, PATHINFO_EXTENSION);

    $extension = pathinfo($real_photo_name, PATHINFO_EXTENSION);

    $target_dir = "supervisor-images/" . $real_photo_name;




    if ($new_password != $new_cpassword) {
        $new_password_err = "Password mismatch";
    }else {

        $move_photos = move_uploaded_file($temp_name,$target_dir);
        if ($move_photos) {
            $sql = mysqli_query($connect,"UPDATE `supervisor` SET firstname = '$new_firstname', lastname = '$new_lastname', othername = '$new_othername', email = '$new_email', password = '$new_password', photos = '$target_dir' WHERE id = $user_id");    
            if ($sql) {
                echo "<script>alert('update successful');</script>";
            }else {
                die("NOT SUCCESSFUL");
            }    
        }

        
    }

    
}

} else {
    header("location:../login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NSUK PROJECTS APP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
        }
    
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="index.php">
                    <h3 style="color: white;">NSUK</h3>
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="<?php echo $photos; ?>" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal"><?php echo $modified_lastname; ?></h5>
                                <span>SUPERVISOR</span>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="nav-item nav-category"> 
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="index.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-view-dashboard"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="student.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-eye"></i>
                        </span>
                        <span class="menu-title">View Students</span>
                    </a>
                </li>
        
                <li class="nav-item menu-items">
                    <a class="nav-link" href="./approval.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-thumb-up"></i>
                        </span>
                        <span class="menu-title">Project approval</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="./final-copy.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-check-circle"></i>
                        </span>
                        <span class="menu-title">Final-copy approval</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="./feedback.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-comment-text-outline"></i>
                        </span>
                        <span class="menu-title">Feedback</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.php -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <!-- <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.php"><img
                            src="assets/images/logo-mini.svg" alt="logo" /></a>
                </div> -->
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="<?php echo $photos; ?>" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"> <?php echo "$firstname" . " " .$lastname; ?> </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <div class="dropdown-divider"></div>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" onclick="logout()">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="text-center mb-4">Update Your Profile</h2>
                    <form action="update-profile.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" value="<?php echo $firstname?>" class="form-control" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">last Name</label>
                            <input type="text" name="lastname"  value="<?php echo $lastname?>" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">other Name </label>
                            <input type="text" name="othername"  value="<?php echo $othername?>" class="form-control" placeholder="Enter your password" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Email </label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"  value="<?php echo $email?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password"  value="<?php echo $password?>" required>
                            <p class="text-danger"><?php echo $new_password_err; ?></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirm your password"  value="<?php echo $password?>" required>
                            <p class="text-danger"><?php echo $new_password_err; ?></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function logout(){
            if (confirm("You are about to logout!")) {
                window.location.href="logout.php";
            }
        }
    </script>

    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
