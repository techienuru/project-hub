<?php
session_start();
include "../include/connect.php";

$file_error = null;

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
    }

    if (isset($_POST["submit"])) {
        $supervisor_fullname = mysqli_real_escape_string($connect, $_POST["supervisor_fullname"]);
        $supervisor_email = mysqli_real_escape_string($connect, $_POST["supervisor_email"]);
        $project_tittle = mysqli_real_escape_string($connect, $_POST["project_tittle"]);
        $project_description = mysqli_real_escape_string($connect, $_POST["project_description"]);
        $project_file = $_FILES["project_file"];
        $fullname = "{$firstname} {$lastname}";

        $real_file_name = $project_file["name"];
        $temp_file_name = $project_file["tmp_name"];

        $extension = pathinfo($real_file_name, PATHINFO_EXTENSION);
        $target_dir = "projects/" . $real_file_name;


        if (!in_array($extension, ["pdf", "PDF"]) || file_exists($target_dir)) {
            if (!in_array($extension, ["pdf", "PDF"])) {
                $file_error = "Only pdf extension allowed";
            }
            if (file_exists($target_dir)) {
                $file_error = "File already exist, rename or change file name";
            }
        } else {

            // Check for file upload errors
            // Check for file upload errors
            if ($project_file['error'] !== UPLOAD_ERR_OK) {

                switch ($project_file['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        $file_error = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $file_error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $file_error = "The uploaded file was only partially uploaded";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $file_error = "No file was uploaded";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $file_error = "Missing a temporary folder";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $file_error = "Failed to write file to disk";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $file_error = "A PHP extension stopped the file upload";
                        break;
                    default:
                        $file_error = "Unknown upload error";
                        break;
                }

                echo "<script>alert('$file_error');</script>";
                die();
            }

            // CHECKING IF USER'S PROJECT SUGGESTION IS APPROVED
            $selecting3 = mysqli_query($connect, "SELECT * FROM `approved_suggestion` WHERE student_name = '$fullname'");

            if (mysqli_num_rows($selecting3) > 0) {
                $sql = mysqli_query($connect, "INSERT INTO `pending_project`(student_name, project_tittle, project_description, project_file, `supervisor's_name`, `supervisor's_email`) VALUES('$fullname', '$project_tittle', '$project_description', '$target_dir', '$supervisor_fullname', '$supervisor_email')");


                if ($sql) {
                    $move_projects = move_uploaded_file($temp_file_name, $target_dir);

                    if ($move_projects) {
                        echo "<script>alert('Project uploaded successfully');</script>";
                    } else {
                        $error = error_get_last();
                        echo "Move file failed: " . $error['message'];
                        die();
                    }
                } else {
                    echo "SQL query failed. Check for errors: " . mysqli_error($connect);
                    die();
                }
            } else {

                if (!mysqli_num_rows($selecting3) > 0) {
                    echo "<script>alert('Your suggestion was not approved');</script>";
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
    <link rel="shortcut icon" href="../images/NSUK_logo.jpeg" />
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.php-->
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

                    <div class="container mt-5">
                        <h2>Upload Your Project</h2>
                        <form action="upload.php" method="POST" enctype="multipart/form-data">



                            <!-- SUPERVISOR'S FULLNAME -->
                            <select class="form-control bg-white mb-3" name="supervisor_fullname" required>
                                <option selected>--- Supervisor's Full Name---</option>
                                <?php
                                $select_supervisor = mysqli_query($connect, "SELECT * FROM `supervisor`");


                                while ($row_supervisor = mysqli_fetch_assoc($select_supervisor)) {
                                    $supervisorFullname = $row_supervisor["firstname"] . " " . $row_supervisor["lastname"] . " " . $row_supervisor["othername"];

                                    echo '
                                        <option value="' . $supervisorFullname . '">' . $supervisorFullname . '</option>
                                    ';
                                }

                                ?>
                            </select>

                            <!-- SUPERVISOR'S EMAIL -->
                            <select class="form-control bg-white mb-5" name="supervisor_email" required>
                                <option selected>--- Supervisor's Email Address---</option>
                                <?php
                                $select_supervisor = mysqli_query($connect, "SELECT * FROM `supervisor`");


                                while ($row_supervisor = mysqli_fetch_assoc($select_supervisor)) {
                                    $supervisorEmail = $row_supervisor["email"];

                                    echo '
                                        <option value="' . $supervisorEmail . '">' . $supervisorEmail . '</option>
                                    ';
                                }

                                ?>
                            </select>

                            <div class="form-group">
                                <label for="projectTitle">Project Title</label>
                                <input type="text" name="project_tittle" class="form-control text-light" placeholder="Enter project title" required>
                            </div>
                            <div class="form-group">
                                <label for="projectDescription">Project Description</label>
                                <textarea class="form-control text-light" name="project_description" id="projectDescription" rows="4" placeholder="Enter project description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="projectFile">Upload Project File</label>
                                <input type="file" name="project_file" class="form-control-file" id="projectFile" required>
                                <p class="text-danger"><?php echo $file_error; ?></p>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                        </form>
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