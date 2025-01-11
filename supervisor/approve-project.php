<?php
include "../include/connect.php";

if (isset($_GET["id"])) {
    $project_id = $_GET["id"];

    $sql = mysqli_query($connect, "SELECT * FROM `pending_project` WHERE `project_id` = $project_id");

    if ($sql) {
        $fetch = mysqli_fetch_assoc($sql);

        if ($fetch) {
            $student_name = $fetch["student_name"];
            $project_tittle = $fetch["project_tittle"];
            $project_description = $fetch["project_description"];
            $project_file = $fetch["project_file"];
            $supervisors_name = $fetch["supervisor's_name"];
            $supervisors_email = $fetch["supervisor's_email"];

            $sql2 = mysqli_query($connect, "INSERT INTO `approved_project` (student_name, project_tittle, project_description, project_file, `supervisor's_name`, `supervisor's_email`) VALUES ('$student_name', '$project_tittle', '$project_description', '$project_file', '$supervisors_name', '$supervisors_email')");

            if ($sql2) {
                $sql3 = mysqli_query($connect, "DELETE FROM `pending_project` WHERE `project_id` = $project_id");

                if ($sql3 = true) {
                    echo '
                        <script>
                            alert("Project Approved!");
                            window.location.href="final-copy.php";
                        </script>';
                    die();
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
