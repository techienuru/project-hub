<?php
include "include/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Project MS</title>
   <link rel="shortcut icon" href="./images/NSUK_logo.jpeg" />
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- owl carousel style -->
   <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-nvtiD+XDQCSL+b/6E4MWKeTdP6qUs6W2cv/vIv/yCMCJcMwx7c/MV1cPVw+oW42+qWvQYbSEHo1iIYdNY8DfFA==" crossorigin="anonymous" />

   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <style>
      .container .feedback-form {
         max-width: 400px;
         margin: 0 auto;
         padding: 40px;
         border: 1px solid #ccc;
         border-radius: 10px;
      }

      .feedback-form .form-group {
         margin-bottom: 20px;
      }



      .feedback-form .btn-primary {
         background-color: #007bff;
         color: #fff;
         border: none;
         border-radius: 5px;
         padding: 10px 20px;
         cursor: pointer;
      }

      .feedback-form .btn-primary:hover {
         background-color: #0056b3;
      }



      .pagination {
         margin-top: 20px;
      }

      .pagination a {
         padding: 8px 12px;
         margin: 0 4px;
         background-color: #f1f1f1;
         border: 1px solid #ddd;
         text-decoration: none;
         color: #333;
      }

      .pagination a.active {
         background-color: #fcce2d;
         /* Adjust the color to match your design */
      }

      .pagination a:hover {
         background-color: #ddd;
      }
   </style>

</head>

<body>
   <!--header section start -->
   <div class="header_section">
      <div class="header_bg">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="logo navbar-brand" href="index.php">
                  <h1>PROJECT HUB</h1>
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#guide">Guide</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                     </li>
                  </ul>

                  <div class="about_bt active p-3"><a href="./login.php">Login</a> </div>
                  <!-- Example single danger button -->
                  <div class="btn-group">
                     <button type="button" class="quote_bt btn btn-primary ml-5 p-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Signup
                     </button>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./signup.php">Student</a></li>
                        <li>
                           <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./supervisor-signup.php">Supervisor</a></li>
                     </ul>
                  </div>


               </div>
            </nav>
         </div>
      </div>
      <!--banner section start -->
      <div class="banner_section layout_padding">
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="banner_taital_main">
                        <div class="row">
                           <div class="col-md-6">
                              <h1 class="banner_taital">Welcome to our Project hub</h1>
                              <p class="banner_text">Unlocking Creativity, Empowering Innovation, where students and teachers converge to shape the future!</p>
                           </div>
                           <div class="col-md-6">
                              <div class="image_1"><img src="./images/Humaaans - 2 Characters.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="banner_taital_main">
                        <div class="row">
                           <div class="col-md-6">
                              <h1 class="banner_taital">Seamlessly Connect with Your Ideas</h1>
                              <p class="banner_text">Connect with your project ideas seamlessly! Our hub is a vibrant space where inspiration meets innovation</p>
                           </div>
                           <div class="col-md-6">
                              <div class="image_1"><img src="./images/Humaaans - 3 Characters.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="banner_taital_main">
                        <div class="row">
                           <div class="col-md-6">
                              <h1 class="banner_taital">Showcase Your Success</h1>
                              <p class="banner_text">It's your time to shine! Showcase your success and inspire the next generation of innovators. Your projects matter, and so does your journey.</p>
                           </div>
                           <div class="col-md-6">
                              <div class="image_1"><img src="./images/Happy Bunch - Chat.png" class="img-fluid"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left" style="font-size:24px"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right" style="font-size:24px"></i>
            </a>
         </div>
      </div>
      <!--banner section end -->
   </div>


   <!--header section end -->
   <!-- services section start -->
   <div class="services_section layout_padding">
      <div class="container">
         <h1 class="services_taital" id="projects"><span style="color: #fcce2d">Available</span> Projects</h1>
         <div class="services_section_2 mb-5" style="background-image: url(./images/banner-bg.png);">
            <form action="search.php" method="get" class="nav-link ml-auto w-50 my-4 d-flex">
               <input type="text" name="s" class="form-control text-dark" placeholder="Search projects" required>
               <button type="submit" class="btn bg-primary text-white">
                  <i class="fa fa-search"></i>
               </button>
            </form>
            <div class="row p-3 ">


               <?php
               $search = isset($_GET["s"]) ? $_GET["s"] : null;
               // Number of projects to display per page
               $projectsPerPage = 8;

               // Determine the current page
               $page = isset($_GET['page']) ? $_GET['page'] : 1;

               // Calculate the offset for the SQL query
               $offset = ($page - 1) * $projectsPerPage;

               // SELECTING PROJECTS WITH PAGINATION
               $sql2 = mysqli_query($connect, "SELECT * FROM `approved_project` WHERE project_tittle LIKE '%$search%' OR project_description LIKE '%$search%'");
               while ($fetch = mysqli_fetch_assoc($sql2)) {
                  $project_id = $fetch["project_id"];
                  $student_name = $fetch["student_name"];
                  $project_tittle = $fetch["project_tittle"];
                  $project_description = $fetch["project_description"];
                  $project_file = $fetch["project_file"];
                  $upload_time = $fetch["approval_time"];


                  echo '
   <!-- Sample Project Card 1-->
   <div class="col-lg-3 col-md-6 mb-4">
       <!-- Project Card -->
       <div class="card h-100" id="project-card">
           <div class="card-body ">
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
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title " id="projectModalLabel' . $project_tittle . '"></h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <p>' . $project_description . '</p>
                       <p><small>Uploaded by: ' . $student_name . '</small></p>
                       
                       <!-- Embed PDF Viewer -->
                       <div class="embed-responsive embed-responsive-4by3">
                           <iframe class="embed-responsive-item" src="./student/' . $project_file . '" allowfullscreen ></iframe>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>';
               }
               ?>


            </div>
            <!-- Pagination Links -->
            <div class="pagination px-5 py-3">
               <?php
               $totalProjects = mysqli_num_rows(mysqli_query($connect, "SELECT project_id FROM `approved_project`"));
               $totalPages = ceil($totalProjects / $projectsPerPage);

               // Display previous button
               if ($page > 1) {
                  echo '<a href="?page=' . ($page - 1) . '">Previous</a>';
               }

               // Display pagination links
               for ($i = 1; $i <= $totalPages; $i++) {
                  echo '<a href="?page=' . $i . '" class="' . (($page == $i) ? 'active' : '') . '">' . $i . '</a>';
               }

               // Display next button
               if ($page < $totalPages) {
                  echo '<a href="?page=' . ($page + 1) . '">Next</a>';
               }
               ?>
            </div>

         </div>
      </div>
      <!-- services section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2023 - <?php echo date("Y"); ?> All Rights Reserved. <a href="#">El-Nur/Sidi</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript -->
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <!-- Bootstrap JS (Bootstrap 5) -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>