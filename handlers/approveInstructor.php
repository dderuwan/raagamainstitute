<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include ('../Databsase/connection.php');

if (isset($_GET['id'])) {
    $instructorId = $_GET['id'];

    $sql = "UPDATE Instructors SET Status = 'Approved' WHERE id = ?";
    $sqlemail = "SELECT * FROM Instructors WHERE `id`='" . $instructorId . "'";
    $resultemail = mysqli_query($connection, $sqlemail);
    $code = substr(preg_replace("/[^0-9]/", "", uniqid()), -6);
    $vericode = "UPDATE `Instructors` SET `verification`='" . $code . "' WHERE `id`='" . $instructorId . "'";

    if (mysqli_query($connection, $vericode)) {
        if ($stmt = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $instructorId);

            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_num_rows($resultemail) > 0) {
                    while ($row = mysqli_fetch_array($resultemail)) {

                        $email = $row["Email"];
                        $tname = $row["FirstName"];
                        $mail = new PHPMailer;
                        $mail->IsSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'RaagamaInstitute2024@gmail.com';
                        $mail->Password = 'njowhfeflqnagirq';
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;
                        $mail->setFrom('RaagamaInstitute@gmail.com', 'RaagamaInstitute');
                        $mail->addReplyTo('RaagamaInstitute@gmail.com', 'RaagamaInstitute');
                        $mail->addAddress($email);
                        $mail->isHTML(true);
                        $mail->Subject = 'Welcome to RaagamaInstitute ';
                        $bodyContent = "
                        <!DOCTYPE html>
<html>

<head>
    <title>Welcome to the Teacher Portal</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .email-container {
            background-color: #ffffff;
            margin: 0 auto;
            padding: 20px;
            width: 600px;
        }

        .header {
            background-color: #0367CC;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 100px;
            /* Adjust based on your logo's size */
        }

        .content {
            padding: 20px;
            color: #333333;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }

        .social-icons a {
            margin: 0 10px;
        }

        .social-icons svg {
            fill: #333;
            /* Social icons color */
        }

        .button {
            background-color: #0367CC;
            color: white;
            padding: 12px 50px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #024978;
        }

        li {
            margin-bottom: 20px;
            /* Adjust the value as needed */
        }
    </style>
</head>

<body>
    <table align='center' class='email-container'>
        <tr>
            <td class='header'>
                <img src='../images/v3_66.png' alt='Teacher Portal Logo' />
                <h1>Welcome to the Teacher Portal – Your Gateway to Empowering Education!</h1>
            </td>
        </tr>
        <tr>
            <td class='content'>

                <p>Dear $tname,</p>

                <h3 style='text-align:center' ;>Welcome to the Teacher Portal!</h3>
                <p>We are thrilled to have you join our vibrant community of educators who are dedicated to nurturing
                    minds and shaping the future.
                    Your decision to register with our portal is the first step toward accessing a wealth of resources,
                    tools, and collaborations designed to enhance your teaching experience and student engagement.</p>
                <p>Getting started:</p>
                <ol>
                    <li>Log In Credentials: You have been assigned a unique username and temporary password.
                        Please log in at [Teacher Portal URL] and follow the prompts to create a new, secure password.
                    </li>
                    <li>Profile Setup: Complete your profile by adding a brief biography, your areas of expertise,
                        and any other relevant information that will help us tailor your experience to your needs.</li>
                    <li>Resource Library: Discover our extensive library of lesson plans, multimedia content, and
                        interactive teaching aids available at your fingertips.
                        These resources are continuously updated to ensure you have the latest information and
                        methodologies in education.</li>
                    <li>Professional Development: Explore a variety of professional development courses and webinars
                        that can help you enhance your skills and stay current with educational trends and best
                        practices.</li>
                    <li>Community Forums: Connect with fellow educators in our forums to share insights, seek advice,
                        and collaborate on innovative projects.
                        Your voice is valuable, and we encourage you to engage actively with your peers.</li>
                    <li>Support Services: Our dedicated support team is available to assist you with any questions or
                        technical issues.
                        Please feel free to reach out via [Support Email] or [Support Contact Number].</li>
                </ol>
                <div>

                </div>
                <div>
                    <p>P.S. Stay connected! Follow us on [Social Media Links] for the latest updates, tips, and stories
                        from fellow educators.</p>
                        
                <div>
                <p style='color:red;'>Your verification Code: '$code'</p>
                <div style='text-align: center;'>
                    <a href='https://RaagamaInstitute.com/registerverify.php' class='button' style='color:white;'>Verify
                        Email Address</a>
                </div>
              
            </div>
                    <p>Please do not hesitate to reach out if you have any questions or need further assistance getting
                        started.
                        Welcome aboard, and let's make education extraordinary together!</p>
                </div>


            </td>
        </tr>
        <tr>
            <td class='footer'>
                <div class='social-icons'>
                    <p>Follow us for updates and more information:</p>
                    <p>
                        <a href='https://www.facebook.com/profile.php?id=61556215625398'>Facebook</a> |
                        <a href=''>Twitter</a> |
                        <a href='https://www.linkedin.com/company/RaagamaInstitute-com/?viewAsMember=true'>LinkedIn</a> |
                        <a href=''>Instagram</a>
                    </p>
                </div>
                <p style='text-align: center;font-size: 12px;'>RaagamaInstitute2024@gmail.com</p>
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
                        header("Location:../Admin/pendingTeacher.php");
                    }
                }



            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($connection);
?>