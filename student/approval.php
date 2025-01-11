<?php
session_start();
include "../include/connect.php";

if (isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    $sql = mysqli_query($connect, "SELECT * FROM `student` WHERE id = $user_id");

    if ($sql) {
        $fetch = mysqli_fetch_assoc($sql);
        $firstname = $fetch["firstname"];
        $lastname = $fetch["lastname"];
        $othername = $fetch["othername"];
        $matricno = $fetch["matricno"];
        $level = $fetch["level"];
        $email = $fetch["email"];
        $photos = $fetch["photos"];

        $fullname = "{$firstname} {$lastname}";
        $modified_lastname = strtoupper($lastname);
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
    <link rel="shortcut icon" href="../images/NSUK_logo.jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/styles.css">
    <style>
        .status-badge {
            display: block;
            width: 200px;
            margin-bottom: 20px;
            padding: 15px 20px;
            border-radius: 30px;
            text-align: center;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .approved {
            background-color: #28a745;
            /* Green color for approved status */
            color: #fff;
            /* White text color for approved status */
            font-weight: bold;
            opacity: 1;
            /* Full opacity for approved status */
        }

        .not-approved {
            background-color: #dc3545;
            /* Red color for not approved status */
            color: #ccc;
            /* Light gray text color for not approved status */
            font-weight: normal;
            opacity: 0.7;
            /* 70% opacity for not approved status */
        }

        /* FontAwesome icons */
        i {
            margin-right: 10px;
            font-size: 18px;
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
                                <span>STUDENT</span>
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
                            <i class="mdi mdi-apps"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="project.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-folder-search"></i>
                        </span>
                        <span class="menu-title">Browse Projects</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="suggest.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-magnify-plus-outline"></i>
                        </span>
                        <span class="menu-title">Suggest project topic</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="./approval.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-check"></i>
                        </span>
                        <span class="menu-title">Project approval</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="./upload.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-upload"></i>
                        </span>
                        <span class="menu-title">Upload project</span>
                    </a>
                </li>

                <li class="nav-item menu-items">
                    <a class="nav-link" href="./feedback.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-comment-account"></i>
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
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="<?php echo $photos; ?>" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $firstname . " " . $lastname; ?></p>
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
            <div class="main-panel ">
                <div class="content-wrapper">
                    <div class="container p-5">
                        <h2 class="mb-5">Project Suggestion Feedback</h2>
                        <?php
                        $sql2 = mysqli_query($connect, "SELECT * FROM `approved_suggestion` WHERE student_name = '$fullname'");

                        if (mysqli_num_rows($sql2) > 0) {
                            $row = mysqli_fetch_assoc($sql2);
                            $project_tittle = $row["project_tittle"];
                            $project_description = $row["project_description"];
                            echo '
        <div class="status-badge approved d-block"> 
            <i class="fas fa-check-circle"></i> Approved 
        </div>
        <div class="status-badge  w-100 d-block" style="border:3px solid white;"> 
            <p class="rounded-5 text-break p-3"><strong>Project Description:</strong>' . $project_description . ' </p>
            <p class="d-flex justify-content-end w-100"><strong>Project Title:</strong>' . $project_tittle . '</p>
        </div>
        
        ';
                        }

                        ?>

                        <?php
                        $sql3 = mysqli_query($connect, "SELECT * FROM `declined_suggestion` WHERE student_name = '$fullname'");


                        if (mysqli_num_rows($sql3) > 0) {
                            while ($fetch3 = mysqli_fetch_assoc($sql3)) {

                                $project_tittle = $fetch3["project_tittle"];
                                $message = $fetch3["declined_message"];
                                $declined_time = $fetch3["declined_time"];
                                echo '
            <div class="status-badge not-approved"> 
                <i class="fas fa-times-circle"></i> Not Approved
            </div>

            <div class="status-badge  w-100 d-block" style="border:3px solid white;"> 
                <p class="rounded-5 text-break p-3"><strong>Project Description:</strong>' . $project_tittle . ' </p>
                <p class="rounded-5 text-break text-danger p-3"><strong>Message:</strong>' . $message . ' </p>
                <p class="d-flex justify-content-end w-100">' . $declined_time . '</p>
            </div>
            ';
                            }
                        }

                        ?>

                        <h2 class="mb-5">Final Project Feedback</h2>


                        <?php
                        $sql4 = mysqli_query($connect, "SELECT * FROM `pending_project` WHERE student_name = '$fullname' AND project_status IS NOT NULL");


                        if (mysqli_num_rows($sql4) > 0) {
                            while ($fetch3 = mysqli_fetch_assoc($sql4)) {

                                $pending_project_tittle = $fetch3["project_tittle"];
                                $pending_message = $fetch3["decline_message"];
                                echo '
            <div class="status-badge not-approved"> 
                <i class="fas fa-times-circle"></i> Not Approved
            </div>

            <div class="status-badge  w-100 d-block" style="border:3px solid white;"> 
                <p class="rounded-5 text-break p-3"><strong>Project Description:</strong>' . $pending_project_tittle . ' </p>
                <p class="rounded-5 text-break text-danger p-3"><strong>Message:</strong>' . $pending_message . ' </p>
            </div>
            ';
                            }
                        }

                        ?>


                        <?php
                        $sql5 = mysqli_query($connect, "SELECT * FROM `approved_project` WHERE student_name = '$fullname'");


                        if (mysqli_num_rows($sql5) > 0) {
                            while ($fetch4 = mysqli_fetch_assoc($sql5)) {

                                $approved_project_tittle = $fetch4["project_tittle"];
                                $approved_project_description = $fetch4["project_description"];
                                echo '
        <div class="status-badge approved d-block"> 
            <i class="fas fa-check-circle"></i> Approved 
        </div>
        <div class="status-badge  w-100 d-block" style="border:3px solid white;"> 
            <p class="rounded-5 text-break p-3"><strong>Project Description:</strong>' . $approved_project_description . ' </p>
            <p class="d-flex justify-content-end w-100"><strong>Project Title:</strong>' . $approved_project_tittle . '</p>
        </div>
        
        ';
                            }
                        }

                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function logout() {
            if (confirm("You are about to logout!")) {
                window.location.href = "logout.php";
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