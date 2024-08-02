<?php
session_start();
include('../Databsase/connection.php');

if (isset($_POST['addcourse'])) {
    $id = null;
    $instructor_id = $_SESSION['id'];
    $instructor_name = $_SESSION['firstname'];
    $instructor_email = $_SESSION['email'];
    $status = "Pending";
    $course_title = mysqli_real_escape_string($connection, $_POST['course_title']);
    $s_description = mysqli_real_escape_string($connection, $_POST['s_description']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $level = mysqli_real_escape_string($connection, $_POST['level']);
    $syllabus = mysqli_real_escape_string($connection, $_POST['syllabus']);
    $language = mysqli_real_escape_string($connection, $_POST['language']); 
    $price = isset($_POST['price']) ? mysqli_real_escape_string($connection, $_POST['price']) : 0;
    $keywords = mysqli_real_escape_string($connection, $_POST['keywords']);

    $combinedarray = $_POST['combinedarray'];//get combine array
    $json = file_get_contents('php://input');
    $data = json_decode($combinedarray, true); // Decode the JSON string into an array

    $target_dir = "../course/";
    $target_file = $target_dir . basename($_FILES['imagePath']["name"]);

    if (move_uploaded_file($_FILES['imagePath']["tmp_name"], $target_file)) {
        $image = $target_file; 
    } else {
        die("Sorry, there was an error uploading your file.");
    }

    $sql = "INSERT INTO `courses`(`id`, `status`, `instructor_id`, `instructor_name`, `instructor_email`, `course_title`, `s_description`, `description`, `category`, `level`, `syllabus`, `language`,  `keywords`, `imagePath`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "isisssssssssss", $id, $status, $instructor_id, $instructor_name, $instructor_email, $course_title, $s_description, $description, $category, $level, $syllabus, $language,  $keywords, $image);

        if (mysqli_stmt_execute($stmt)) {
            $last_id = mysqli_insert_id($connection);//get last course row id

            foreach($data as $result){//loop combined array 
                $price = $result['price'];
                $inid = $result['inid'];
                $typid = $result['typid'];
                $checkarray = json_encode($result['check']);
                // var_dump( $sendarray);            
                $query = "INSERT INTO `course_options`(`cou_id`,`techer_id`, `package_type`,`price`, `pack_op_id`) VALUES (?, ?, ?, ?, ?)";

                if ($stmt1 = mysqli_prepare($connection, $query)) {
                    // Bind parameters
                    mysqli_stmt_bind_param($stmt1, 'iisds', $last_id, $inid, $typid, $price, $checkarray);

                    // Execute the statement
                    mysqli_stmt_execute($stmt1);

                    // Close the statement
                    mysqli_stmt_close($stmt1);
                } else {
                    // Handle errors
                    echo "Error preparing statement: " . mysqli_error($connection);
                }
            }
            
            echo "<script>alert('Course Created Successfully');</script>";
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

