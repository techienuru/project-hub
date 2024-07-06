<?php
include "include/connect.php";
$password_error = null;
$email_error = null;
$firstname_err = null;
$lastname_err = null;
$othername_err = null;
$matricno_err = null;
$email_err = null;
$level_err = null;

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $othername = $_POST['othername'];
    $matricno = $_POST['matricno'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //FILTERING USER INPUTS
    $firstname = htmlspecialchars($firstname);
    $lastname = htmlspecialchars($lastname);
    $othername = htmlspecialchars($othername);
    $matricno = htmlspecialchars($matricno);
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($password);
    $cpassword = htmlspecialchars($cpassword);

    // Check if the email already exists in the database
$check_email_query = mysqli_query($connect, "SELECT * FROM `student` WHERE email='$email'");
    

    //CHECKING FOR WRONG INPUTS
    if (!preg_match("/^[a-zA-Z]*$/",$firstname) || !preg_match("/^[a-zA-Z]*$/",$lastname) || !preg_match("/^[a-zA-Z]*$/",$othername) || !preg_match("/^[a-zA-Z0-9]*$/",$matricno) || !filter_var($email,FILTER_VALIDATE_EMAIL) || $level == "---" || mysqli_num_rows($check_email_query) > 0 || $cpassword !== $password)   {

      if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
        $firstname_err = "Only letters accepted";
      }

      if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
        $lastname_err = "Only letters accepted";
      }

      if (!preg_match("/^[a-zA-Z]*$/",$othername)) {
        $othername_err = "Only letters accepted";
      }

      if (!preg_match("/^[a-zA-Z0-9]*$/",$matricno)) {
        $matricno_err = "No special characters required";
      }

      if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_err = "invalid email";
      }

      if ($level == "---") {
        $level_err = "Please select your level";
      }

      if (mysqli_num_rows($check_email_query) > 0) {
        $email_err = "Email already registered!";
    }

    if ($cpassword !== $password) {
      $password_error = "Password mismatch";
    }
    }else{
// Create a prepared statement
$sql = mysqli_query($connect, "INSERT INTO `student` (firstname,lastname,othername,matricno,level,email,password) VALUES ('$firstname','$lastname','$othername','$matricno','$level','$email','$password')");

if ($sql) {
    header("location:login.php");
} else {
    die(mysqli_error($connect));
}
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student sign up | Project Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
<div class="container-fluid">
<!-- Navbar section -->
  <nav class="navbar bg-body-light mb-5" id="navbar">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="#">
        <img src="images/NSUK_LOGO_NO_BG-.png" class="rounded rounded-circle" width="40px" alt="nsuk">
      NSUK
    </a>
  </div>
</nav>
<!-- End of Navbar section  -->

<!-- Signup section  -->
<div class="row">
  <div class="col-10 col-md-6 col-lg-4 m-auto ">
    <div class="card mb-5" id="signup-card">
      <div class="card-body">
        <h5 class="card-title text-center my-3">Signup</h5>

        <form action="" method="post">
        <div class="mb-3">
  <input type="text" class="form-control" placeholder="First name" name="firstname" required>
  <p class="text-danger"><?php echo $firstname_err; ?></p>
      </div>

<div class="mb-3">
  
  <input type="text" class="form-control" placeholder="Last name" name="lastname"  required>
  <p class="text-danger"><?php echo $lastname_err; ?></p>
</div>

<div class="mb-3">
  <input type="text" class="form-control" placeholder="Other name" name="othername" >
  <p class="text-danger"><?php echo $othername_err ?></p>
</div>

<div class="mb-3">
  <input type="text" class="form-control" placeholder="Matric Number" name="matricno"   required>
  <p class="text-danger"><?php echo $matricno_err; ?></p>
</div>

<div class="mb-3">
  <select name="level" id="" class="form-select">
    <option value="500 Level">500 Level</option>
    <option value="400 Level">400 Level</option>
    <option value="---" selected>--Select Level--</option>
  </select>
  <p class="text-danger"><?php echo $level_err; ?></p>
</div>

<div class="mb-3">
  <input type="email" class="form-control" placeholder="Email address" name="email"  required>
  <p class="text-danger"><?php echo $email_err; ?></p>

</div>

<div class="mb-3">
  <input type="password" class="form-control" placeholder="Password" name="password"  required>
  <p class="text-danger"><?php echo $password_error; ?></p>
</div>

<div class="mb-3">
  <input type="password" class="form-control" placeholder="Confirm password" name="cpassword"  required>
  <p class="text-danger"><?php echo $password_error; ?></p>
</div>

    <p class="mt-4">Already have an account? <a href="login.php">Login</a></p>
    <p class="mt-4">Are you a supervisor? <a href="./supervisor-signup.php" class="text-danger">click to sign up as supervisor</a></p>

<input type="submit" class="btn btn-primary float-end" name="submit" value="Signup">
</form>

      </div>
    </div>
  </div>
    </div>

  </div>

<!-- End of signupsection  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>