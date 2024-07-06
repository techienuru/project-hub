<?php
include "../include/connect.php";

if (isset($_GET["id"])) {
    $project_id = $_GET["id"];
    $declined_message = $_POST["decline_reason"];
    $declined_message = filter_var($declined_message,FILTER_SANITIZE_STRING);

    $sql = mysqli_query($connect, "SELECT * FROM `pending_project` WHERE `project_id` = $project_id");

    if ($sql) {
        $fetch = mysqli_fetch_assoc($sql);

        if ($fetch) {
            $project_id = $fetch["project_id"];
            $student_name = $fetch["student_name"];
            $project_title = $fetch["project_tittle"];
            $project_description = $fetch["project_description"];
            $supervisors_name = $fetch["supervisor's_name"];
            $supervisors_email = $fetch["supervisor's_email"];

            $sql2 = mysqli_query($connect, "UPDATE `pending_project` SET project_status = 'DECLINED', decline_message = '$declined_message' WHERE project_id = $project_id");

            if ($sql2) {
                    echo '
                    <script>
                        alert("Project Declined\nMessage sent!");
                        window.location.href="approval.php";
                    </script>';
            } else {
                echo 'Error inserting into approved_project: ' . mysqli_error($connect);
            }
        } else {
            echo 'No data found for student: ' . $student_name;
        }
    } else {
        die('Error fetching data from pending_project: ' . mysqli_error($connect));
    }
}
?>
