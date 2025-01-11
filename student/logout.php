<?php
session_start();
if (isset($_SESSION["id"])) {
    $_SESSION["id"] = null;
    header("location:../login.php");
}
