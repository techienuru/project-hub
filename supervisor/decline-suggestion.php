<?php
include "../include/connect.php";

if (isset($_GET["project_id"])) {
    $project_id = $_GET["project_id"];
    $declined_message = $_POST["decline_reason"];
    $declined_message = filter_var($declined_message, FILTER_SANITIZE_STRING);


    $sql = mysqli_query($connect, "SELECT * FROM `project_suggestion` WHERE `project_id` = '$project_id'");

    if ($sql) {
        $fetch = mysqli_fetch_assoc($sql);

        if ($fetch) {
            $project_id = $fetch["project_id"];
            $student_name = $fetch["student_name"];
            $project_title = $fetch["project_tittle"];
            $project_description = $fetch["project_description"];
            $supervisors_name = $fetch["supervisor's_name"];
            $supervisors_email = $fetch["supervisor's_email"];
            $upload_time = $fetch["upload_time"];

            $sql2 = mysqli_query($connect, "INSERT INTO `declined_suggestion` (student_name, project_tittle, project_description, `supervisor's_name`, `supervisor's_email`, upload_time, `declined_message`) VALUES ('$student_name', '$project_title', '$project_description','$supervisors_name', '$supervisors_email', '$upload_time', '$declined_message')");

            if ($sql2) {
                $sql3 = mysqli_query($connect, "DELETE FROM `project_suggestion` WHERE `student_name` = '$student_name' AND `project_id` = $project_id");
                if ($sql3) {
                    echo '
                    <script>
                        alert("Message sent!");
                        window.location.href="approval.php";
                    </script>';
                } else {
                    echo 'Error deleting from pending_project: ' . mysqli_error($connect);
                }
            } else {
                echo 'Error inserting into approved_project: ' . mysqli_error($connect);
            }
        } else {
            echo 'No data found for student: ' . $student_name;
        }
    } else {
        echo 'Error fetching data from pending_project: ' . mysqli_error($connect);
    }
}
