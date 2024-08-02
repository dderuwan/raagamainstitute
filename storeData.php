<?php
session_start();
include('./Databsase/connection.php'); // Include database connection

header('Content-Type: application/json');

$response = array();

if (!isset($_SESSION['id'])) {
    $response['status'] = 'error';
    $response['message'] = 'User not logged in';
    echo json_encode($response);
    exit();
}

$studentID = $_SESSION['id'];

$SQLCourseOption = "SELECT * FROM `cart` WHERE `student_id` = $studentID";
$resultCourseOption = mysqli_query($connection, $SQLCourseOption);

if (!$resultCourseOption) {
    $response['status'] = 'error';
    $response['message'] = 'Database query failed: ' . mysqli_error($connection);
    echo json_encode($response);
    exit();
}

$response['status'] = 'error';
$response['message'] = 'No courses in the cart';

if (mysqli_num_rows($resultCourseOption) > 0) {
    $response['message'] = 'Course(s) not added';
    while ($rowCO = mysqli_fetch_array($resultCourseOption)) {
        $courseID = $rowCO['course_id'];
        $packageType = $rowCO['package_type'];
        $packageNumber = 0;

        if ($packageType === 'Individual') {
            $packageNumber = 1;
        } elseif ($packageType === 'Group') {
            $packageNumber = 2;
        } elseif ($packageType === 'Master') {
            $packageNumber = 3;
        }

        $SQLCourse = "SELECT * FROM `courses` WHERE `id` = $courseID";
        $resultCourse = mysqli_query($connection, $SQLCourse);
        if (!$resultCourse) {
            $response['status'] = 'error';
            $response['message'] = 'Database query failed: ' . mysqli_error($connection);
            echo json_encode($response);
            exit();
        }

        $rowCourse = mysqli_fetch_array($resultCourse);

        $instructorID = $rowCourse['instructor_id'];

        $SQLFinalOption = "SELECT * FROM `course_options` WHERE cou_id = $courseID AND techer_id = $instructorID AND `package_type` = $packageNumber";
        $resultFinalOption = mysqli_query($connection, $SQLFinalOption);
        if (!$resultFinalOption) {
            $response['status'] = 'error';
            $response['message'] = 'Database query failed: ' . mysqli_error($connection);
            echo json_encode($response);
            exit();
        }

        $rowFinalOption = mysqli_fetch_array($resultFinalOption);

        $courseOptionID = $rowFinalOption['id'];
        $price = $rowFinalOption['price'];

        $SQLInsert = "INSERT INTO `payedstudent`(`id`, `instructor_ID`, `studentID`, `course_id`, `course_optionsID`, `packageType`, `price`) VALUES (null, $instructorID, $studentID, $courseID, $courseOptionID, $packageNumber, $price)";
        $result = mysqli_query($connection, $SQLInsert);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Course Added Successfully';

            $SQLDelete = "DELETE FROM `cart` WHERE `student_id` = $studentID AND `course_id` = $courseID";
            $deleteResult = mysqli_query($connection, $SQLDelete);
            if (!$deleteResult) {
                $response['status'] = 'error';
                $response['message'] = 'Failed to remove course from cart: ' . mysqli_error($connection);
                echo json_encode($response);
                exit();
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error adding course: ' . mysqli_error($connection);
            break;
        }
    }
}

echo json_encode($response);
