<?php
session_start();
include ('../Databsase/connection.php');

if (isset($_POST["regNext"])) {
    $firstName = mysqli_real_escape_string($connection, $_POST["fName"]);
    $lastName = mysqli_real_escape_string($connection, $_POST["lName"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $Gender = mysqli_real_escape_string($connection, $_POST["gender"]);
    $Pname = mysqli_real_escape_string($connection, $_POST["pName"]);
    $Pphone = mysqli_real_escape_string($connection, $_POST["pContact"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);
    $country = mysqli_real_escape_string($connection, $_POST["country"]);
    $city = mysqli_real_escape_string($connection, $_POST["city"]);
    $zipcode = mysqli_real_escape_string($connection, $_POST["zip"]);
    $phone = mysqli_real_escape_string($connection, $_POST["contact"]);
    $education = mysqli_real_escape_string($connection, $_POST["grade"]);

    $course_id = mysqli_real_escape_string($connection, $_POST["course_id"]);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $status = "Active";

    // Check if email already exists
    $sql_check_email = "SELECT email FROM student WHERE email = ?";
    if ($stmt_check_email = mysqli_prepare($connection, $sql_check_email)) {
        mysqli_stmt_bind_param($stmt_check_email, "s", $email);
        mysqli_stmt_execute($stmt_check_email);
        mysqli_stmt_store_result($stmt_check_email);

        if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
            echo "<script>alert('Email address is already used. Please try again!');</script>";
            echo "<script>window.history.back()</script>";
            mysqli_stmt_close($stmt_check_email);
        } else {
            mysqli_stmt_close($stmt_check_email);

            $sql = "INSERT INTO student (id, status, firstName, lastName, email, password, Gender, Pname, Pphone, address, country, city, zipcode, phone, education) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($connection, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssssssssssss", $status, $firstName, $lastName, $email, $hashed_password, $Gender, $Pname, $Pphone, $address, $country, $city, $zipcode, $phone, $education);

                if (mysqli_stmt_execute($stmt)) {
                    $student_id = mysqli_insert_id($connection);
                    if ($_SESSION['idAdmin']) {
                        echo "<script>
                            alert('Student Account has Created.');
                        </script>";
                    } else {
                        echo "<script>
                            alert('RaagamaInstitute Account is Created. Please Log Now!');
                            window.location.href = '../Student_Signin.php';
                        </script>";
                    }
                } else {
                    echo "Error: " . mysqli_error($connection);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing statement: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "Invalid access method.";
}
