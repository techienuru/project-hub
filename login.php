<?php
session_start();
include "include/connect.php";

//DECLARING NULL VARIABLES
$matricno_err = null;
$password_err = null;

if (isset($_POST["submit"])) {
  $matricno = $_POST["matricno"];
  $password = $_POST["password"];

  //SANITIZING USER INPUTS
  $matricno = htmlspecialchars($matricno);
  $password = htmlspecialchars($password);

  //FETCHING  FROM STUDENT TABLE
  $sql = mysqli_query($connect, "SELECT * FROM `student` WHERE matricno = '$matricno' AND password = '$password'");

  $row = mysqli_fetch_assoc($sql);


  //FETCHING  FROM SUPERVISOR TABLE
  $sql2 = mysqli_query($connect, "SELECT * FROM `supervisor` WHERE email = '$matricno' AND password = '$password'");

  $row2 = mysqli_fetch_assoc($sql2);


  if (mysqli_num_rows($sql) >= 1 || mysqli_num_rows($sql2) >= 1) {
    if (mysqli_num_rows($sql) >= 1) {
      $_SESSION["id"] = $row["id"];
      header("location:student/index.php");
    }
    if (mysqli_num_rows($sql2) >= 1) {
      $_SESSION["supervisor_id"] = $row2["id"];
      header("location:supervisor/index.php");
    }
  } else {
    $matricno_err = "Incorrect email or password";
    $password_err = "Incorrect email or password";
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project MS</title>
  <link rel="shortcut icon" href="./images/NSUK_logo.jpeg" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <!-- Navbar section -->
  <nav class="navbar bg-body-light mb-5" id="navbar">
    <div class="container-fluid px-5">
      <a class="navbar-brand" href="./index.php">
        <img src="images/NSUK_LOGO_NO_BG-.png" class="rounded rounded-circle" width="40px" alt="nsuk">
        NSUK
      </a>
    </div>
  </nav>
  <!-- End of Navbar section  -->

  <div class="row">
    <div class="col-10 col-md-6 col-lg-4 m-auto">
      <div class="card mb-5" id="logincard">
        <div class="card-body">

          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h5 class="card-title text-center my-3">Login</h5>

            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Matric Number or email" name="matricno" required>
              <p class="text-danger">Note! Login with Matric No. & password for students, and email & password for supervisors</p>
              <p class="text-danger"><?php echo $matricno_err; ?></p>
            </div>

            <div class="mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <p class="text-danger"><?php echo $password_err; ?></p>
            </div>

            <p class="mt-4">Don't have an account? <a href="signup.php">Signup</a></p>

            <input type="submit" name="submit" class="btn btn-primary float-end" value="Login">
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Signup section  -->




  <!-- End of signupsection  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>