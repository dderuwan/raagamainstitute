<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include ('../Databsase/connection.php');

// untill payment gatway are connecting uses payment button name for insert data to table 
if (isset($_POST['payment'])) {

    $instructorId = $_POST['instructorId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $total_payment = $_POST['total_payment'];
    $paid_Time = $_POST['paidTime'];

    $selectSQL = "SELECT * FROM instructor_payment WHERE instructorId = '$instructorId'";
    $selectResult = mysqli_query($connection, $selectSQL);

    $status = 'paid'; // Default status
    $full_name = $firstName . ' ' . $lastName;

    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        // Update the existing record
        $updateSQL = "UPDATE instructor_payment 
                      SET fullname = '$full_name', email = '$email', totalpayment = '$total_payment', paidTime = '$paid_Time', status = '$status' 
                      WHERE instructorId = '$instructorId'";
        mysqli_query($connection, $updateSQL);
    } else {
        // Insert a new record
        $insertSQL = "INSERT INTO instructor_payment (instructorId, fullname, email, totalpayment, paidTime, status)
                      VALUES ('$instructorId', '$full_name', '$email', '$total_payment', '$paid_Time', '$status')";
        mysqli_query($connection, $insertSQL);
    }

    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);
        $email = $row["email"];
        $tname = $row["fullname"];
        $totalpayment = $row["totalpayment"];
        $paidTime = $row["paidTime"];

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dderuwan1000@gmail.com';
        $mail->Password = 'hhyfylwwusevfizl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('wpqpzp@gmail.com', 'RaagamaInstitute');
        $mail->addReplyTo('wpqpzp@gmail.com', 'RaagamaInstitute');
        $mail->addAddress('malsrimanaram7878@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Monthly Payment';

        $bodyContent = "
                <html>
                    <body>
                        <p>Dear $tname,</p>
                        <p>We are pleased to inform you that your monthly payment has been processed.</p>
                        <p>Payment Details:</p>
                        <ul>
                            <li>Total Payment: $totalpayment</li>
                            <li>Paid Time: $paidTime</li>
                        </ul>
                        <p>Thank you for your continued dedication and hard work.</p>
                        <p>Sincerely,</p>
                        <p>RaagamaInstitute Team</p>
                    </body>
                </html>
                ";

        $mail->Body = $bodyContent;

        if ($mail->send()) {
            echo "<script>alert('payment Sented Successfully.');</script>";
            echo "<script>window.location.href = '../Admin/teacherPaymentpending.php';</script>";

        } else {
            echo "<script>alert('Error: Could not send payment.');</script>";
            echo "<script>window.location.href = '../Admin/teacherPaymentpending.php';</script>";

        }
        exit();
    }

}



if (isset($_POST['requestdetails'])) {
    $instructorId = $_POST['instructorId'];

    // Fetch instructor details from the database
    $query = "SELECT Email, FirstName FROM instructors WHERE id = '$instructorId'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row["Email"];
        $tname = $row["FirstName"];

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dderuwan1000@gmail.com';
        $mail->Password = 'hhyfylwwusevfizl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('wpqpzp@gmail.com', 'RaagamaInstitute');
        $mail->addReplyTo('wpqpzp@gmail.com', 'RaagamaInstitute');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Requesting Bank Details';

        $link = "https://RaagamaInstitute.com/teacher_dashboard/template/profile.php";
        $bodyContent = "
        <html>
            <body>
                <p>Dear $tname,</p>
                <p>We are requesting your bank details for payment processing.</p>
                <p>Please use the following link to submit your details:</p>
                <h3 style='color:red;'><a href='$link'>Submit Bank Details</a></h3>
                <p>Thank you,</p>
                <p>RaagamaInstitute Team</p>
            </body>
        </html>
        ";

        $mail->Body = $bodyContent;

        if ($mail->send()) {
            echo "<script>alert('Request Sent Successfully.');</script>";
            echo "<script>window.location.href = '../Admin/teacherPaymentpending.php';</script>";

        } else {
            echo "<script>alert('Error: Could not send email.');</script>";
            echo "<script>window.location.href = '../Admin/teacherPaymentpending.php';</script>";

        }
        exit();
    }
}







?>