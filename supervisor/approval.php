<?php
session_start();
include "../include/connect.php";
$photos = null;
if (isset($_SESSION["supervisor_id"])) {
    $user_id = $_SESSION["supervisor_id"];
    $sql = mysqli_query($connect, "SELECT * FROM `supervisor` WHERE id = $user_id");

    if ($sql) {
        $fetch = mysqli_fetch_assoc($sql);
        $firstname = $fetch["firstname"];
        $lastname = $fetch["lastname"];
        $othername = $fetch["othername"];
        $email = $fetch["email"];
        if (isset($fetch["photos"])) {
            $photos = $fetch["photos"];
        }


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
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $firstname . " " . $lastname; ?></p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
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
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel ">
                <div class="content-wrapper">

                    <div class="container mt-5">
                        <h1>Project Approval</h1>
                        <?Php
                        $supervisor_fullname = $firstname . " " . $lastname;
                        $sql2 = mysqli_query($connect, "SELECT * FROM `project_suggestion` where `supervisor's_email` = '$email' or `supervisor's_name` = '$supervisor_fullname'");
                        while ($fetch2 = mysqli_fetch_assoc($sql2)) {
                            $project_id = $fetch2["project_id"];
                            $student_name = $fetch2["student_name"];
                            $project_title = $fetch2["project_tittle"];
                            $project_description = $fetch2["project_description"];
                            $supervisors_name = $fetch2["supervisor's_name"];
                            $supervisors_email = $fetch2["supervisor's_email"];
                            $upload_time = $fetch2["upload_time"];

                            echo '
                    <!-- Include TinyMCE script -->
                        <script src="../tinymce/tinymce.min.js"></script>

                        <!-- Initialize TinyMCE on your textarea -->
                        <script>
                        tinymce.init({
                            selector: ".project-description", // Change to the appropriate class or ID for your textarea
                            height: 300,
                            plugins: "link image code fontselect",
                            toolbar: "undo redo | formatselect | bold italic underline strikethrough | fontselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | fontsizeselect | forecolor backcolor",
                            menubar: "file edit view insert format tools table help", // Display specific menu items
                            branding: false, // Hide the TinyMCE branding
                            powerpaste_allow_local_images: false, // Disable powerpaste plugin
                            powerpaste_word_import: "clean", // Disable powerpaste plugin
                            powerpaste_html_import: "clean", // Disable powerpaste plugin
                            content_style: "body { font-family: Arial, sans-serif; }", // Default font style
                            setup: function (editor) {
                                editor.on("change", function () {
                                    // Update the hidden input field with the editor"s content
                                    document.getElementById("decline_reason").value = editor.getContent();
                                });
                            }
                        });
                        </script>
                    
                    
                    <div class="project-card mb-3">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $project_title; ?></h5>
                          <p class="card-text">STUDENT: ' . $student_name . '</p>
                          <p class="card-text">PROJECT TITLE: ' . $project_title . '</p>
                          
                          <p class="card-text">PROJECT DESCRIPTION: ' . $project_description . '</p>

                          <a href="approve-suggestion.php?project_id=' . $project_id . '" class="btn btn-success approve-btn">Approve</a>
                          <button type="button" class="btn btn-danger decline-btn">Decline</button>
                          <form action="decline-suggestion.php?project_id=' . $project_id . '" method="POST">
                          <div class="reason-input" style="display:none;">
                            <label for="reason">Reason for Decline:</label>
                            <!-- Replace the standard textarea with TinyMCE -->
                            <div class="project-description" name="project_description"></div> 
                            <!-- Inside your form -->
                            <input type="hidden" name="decline_reason" id="decline_reason">
                            <button name="submit" type="submit" class="btn btn-primary mt-2 submit-btn">Submit</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                ';
                        }


                        ?>

                        <!-- Add more project cards as needed -->
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        // JavaScript to handle button clicks

                    tinymce.init({
                        // ... (your existing configuration)
                        
                    });



                        document.querySelectorAll('.decline-btn').forEach(function(button) {
                            button.addEventListener('click', function() {
                                // Show reason input when declining
                                var reasonInput = button.parentElement.querySelector('.reason-input');
                                reasonInput.style.display = 'block';

                                // Handle decline logic here
                                document.querySelector('.submit-btn').addEventListener('click', function() {
                                    var reason = reasonInput.querySelector('#reason').value;
                                    if (reason.trim() !== '') {
                                        alert('Project Declined. Reason: ' + reason);
                                        // Handle further actions with the reason here
                                    } else {
                                        alert('Please provide a reason for declining the project.');
                                    }
                                });
                            });
                        });
                    </script>

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