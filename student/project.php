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

        $modified_lastname = strtoupper($lastname);
    } else {
        die("Error: " . mysqli_error($connect));
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
    <link rel="stylesheet" href="/styles.css">
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
                            <i class="mdi mdi-speedometer"></i>
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
                    <div class="container mt-5">
                        <h2 class="mb-4">Projects</h2>
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form action="search.php" method="get" class="nav-link my-4 d-flex search">
                                    <input type="text" name="s" class="form-control text-white" placeholder="Search projects" required>
                                    <button type="submit" class="btn bg-primary">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <div class="row">

                            <?php
                            //SELECTING ALL PROJECTS
                            $sql2 = mysqli_query($connect, "SELECT * FROM `approved_project`");
                            while ($fetch = mysqli_fetch_assoc($sql2)) {
                                $project_id = $fetch["project_id"];
                                $student_name = $fetch["student_name"];
                                $project_tittle = $fetch["project_tittle"];
                                $project_description = $fetch["project_description"];
                                $project_file = $fetch["project_file"];
                                $upload_time = $fetch["approval_time"];


                                echo '
                            <!-- Sample Project Card 1-->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <!-- Project Card -->
                                <div class="card" id="project-card">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $project_tittle . '</h5>
                                        <p class="card-text">' . $project_description . '</p>
                                        <p class="card-text text-muted m-0">Uploaded by: ' . $student_name . '</p>
                                        <p class="card-text text-muted">Upload Time: ' . $upload_time . '</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModal' . $project_id . '">View Project</button>
                                    </div>
                                </div>
                            
                                <!-- Modal (Bootstrap 5) -->
                                <div class="modal fade" id="projectModal' . $project_id . '" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg"> <!-- Use modal-dialog-scrollable for a scrollable modal on smaller screens -->
                                        <div class="modal-content bg-light text-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="projectModalLabel' . $project_tittle . '"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>' . $project_description . '</p>
                                                <p><small>Uploaded by: ' . $student_name . '</small></p>
                                                
                                                <!-- Embed PDF Viewer -->
                                                <div class="embed-responsive embed-responsive-4by3">
                                                    <iframe class="embed-responsive-item" src="' . $project_file . '" allowfullscreen ></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>

                        </div>


                    </div>
                    <!-- End of Sample Project Card -->

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

    <!-- Bootstrap JS (Bootstrap 5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>