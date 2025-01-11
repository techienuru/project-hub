<?php
session_start();
if (isset($_SESSION["supervisor_id"])) {
    $_SESSION["supervisor_id"] = null;
    header("location:../login.php");
}
