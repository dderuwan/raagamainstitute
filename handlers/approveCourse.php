<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include ('../Databsase/connection.php');

if (isset($_GET['id'])) {
    $CourseId = $_GET['id'];

    $sql = "UPDATE courses SET status = 'Approved' WHERE id = ?";
    $sqlemail = "SELECT * FROM courses WHERE `id`='" . $CourseId . "'";
    $resultemail = mysqli_query($connection, $sqlemail);


    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $CourseId);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_num_rows($resultemail) > 0) {
                while ($row = mysqli_fetch_array($resultemail)) {

                    $email = $row["instructor_email"];
                    $tname = $row["	instructor_name"];
                    $coures = $row["course_title"];


                    $code = uniqid();
                    $mail = new PHPMailer;
                    $mail->IsSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'walallawitad@gmail.com';
                    $mail->Password = 'jbmpnprdokcwuudp';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->setFrom('wpqpzp@gmail.com', 'RaagamaInstitute');
                    $mail->addReplyTo('wpqpzp@gmail.com', 'RaagamaInstitute');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Course Successfully Created';
                    $bodyContent = "
                    <html>
                      
                        <body>
                            <p>Dear $tname,</p>
                            <table>
                            <tr>
                            </tr>
                            <tr>
                                    <td>
                                    We hope this message finds you well.
                                    We Approved your $course course. Now you can start working with your course.
                                    </td>
                                     </tr>
                
                                <tr>
                                    <td>
                                    <p>please feel free to contact our support team at support@RaagamaInstitute.com or +94112345688.
                                    </p>
                                    </td>
                                </tr>
                
                            </table>
                        </body>
                    </html>
                    ";
                    $mail->Body = $bodyContent;

                    if (!$mail->send()) {
                        echo 'varification code sending fail';
                    } else {
                        echo 'Success';

                    }
                    header("Location:../Admin/approvedCourses.php");
                }
            }



        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($connection);
?>