<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['editcourse'])) {
    $course_id = mysqli_real_escape_string($connection, $_POST['course_id']);
    $instructor_id = $_SESSION['id'];
    $instructor_name = $_SESSION['firstname'];
    $instructor_email = $_SESSION['email'];
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    $course_title = mysqli_real_escape_string($connection, $_POST['course_title']);
    $s_description = mysqli_real_escape_string($connection, $_POST['s_description']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $level = mysqli_real_escape_string($connection, $_POST['level']);
    $language = mysqli_real_escape_string($connection, $_POST['language']); 
    $price = isset($_POST['price']) ? mysqli_real_escape_string($connection, $_POST['price']) : 0;
    $keywords = mysqli_real_escape_string($connection, $_POST['keywords']);

    $combinedarray = $_POST['combinedarray']; // get combine array
    $data = json_decode($combinedarray, true); // Decode the JSON string into an array

    $target_dir = "../course/";
    $image = "";
    if (!empty($_FILES['imagePath']["name"])) {
        $target_file = $target_dir . basename($_FILES['imagePath']["name"]);
        if (move_uploaded_file($_FILES['imagePath']["tmp_name"], $target_file)) {
            $image = $target_file; 
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    }

    $sql = "UPDATE `courses` SET `status`=?, `instructor_id`=?, `instructor_name`=?, `instructor_email`=?, `course_title`=?, `s_description`=?, `description`=?, `category`=?, `level`=?, `language`=?, `keywords`=?";
    if ($image !== "") {
        $sql .= ", `imagePath`=?";
    }
    $sql .= " WHERE `id`=?";

    if ($stmt = mysqli_prepare($connection, $sql)) {
        if ($image !== "") {
            mysqli_stmt_bind_param($stmt, "sissssssssssi", $status, $instructor_id, $instructor_name, $instructor_email, $course_title, $s_description, $description, $category, $level, $language, $keywords, $image, $course_id);
        } else {
            mysqli_stmt_bind_param($stmt, "sisssssssssi", $status, $instructor_id, $instructor_name, $instructor_email, $course_title, $s_description, $description, $category, $level, $language, $keywords, $course_id);
        }

        if (mysqli_stmt_execute($stmt)) {
            $query = "DELETE FROM `course_options` WHERE `cou_id`=?";
            if ($stmt2 = mysqli_prepare($connection, $query)) {
                mysqli_stmt_bind_param($stmt2, "i", $course_id);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_close($stmt2);
            }

            foreach ($data as $result) {
                $price = $result['price'];
                $inid = $result['inid'];
                $typid = $result['typid'];
                $checkarray = json_encode($result['check']);
                
                $query = "INSERT INTO `course_options`(`cou_id`,`techer_id`, `package_type`,`price`, `pack_op_id`) VALUES (?, ?, ?, ?, ?)";

                if ($stmt1 = mysqli_prepare($connection, $query)) {
                    mysqli_stmt_bind_param($stmt1, 'iisds', $course_id, $inid, $typid, $price, $checkarray);
                    mysqli_stmt_execute($stmt1);
                    mysqli_stmt_close($stmt1);
                } else {
                    echo "Error preparing statement: " . mysqli_error($connection);
                }
            }
            
            echo "<script>alert('Course Updated Successfully');</script>";
            echo "<script>window.history.back()</script>";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Something went Wrong...Please try again');</script>";
        echo "<script>window.history.back()</script>";
    }
    mysqli_close($connection);
} else {
    echo "<script>alert('Invalid access method.');</script>";
    echo "<script>window.history.back()</script>";
}
?>
