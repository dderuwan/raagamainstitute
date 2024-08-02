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

    $sql = "UPDATE Instructors SET Status = 'Blocked' WHERE id = ?";

    $sqlemail = "SELECT * FROM Instructors WHERE `id`='" . $instructorId . "'";
    $resultemail = mysqli_query($connection, $sqlemail);

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
            <p>We hope this message finds you well. Thank you for taking the time to apply for access to our Teacher
                Portal. We understand the anticipation and effort that goes into such applications and appreciate
                your interest in joining our educational community.</p>
            <p>After a careful review of your application, we regret to inform you that we are unable to approve
                your registration at this time. Our decision is based on [specific reason for rejection, e.g.,
                'incomplete application details', 'eligibility criteria not met', 'verification of credentials
                pending', etc.]. We aim to maintain a high standard of collaboration and resource sharing among
                educators, and as such, we adhere strictly to our registration guidelines.</p>
            <p>Please do not be disheartened, as this is not a reflection of your qualifications or your passion for
                education. We encourage you to review the following steps, which may improve the chances of your
                application being successful in the future:</p>
            <ul>
                <li>Review Eligibility: Ensure that you meet all the necessary eligibility criteria outlined on our
                    registration page.</li>
                <li>Complete Application: Verify that all fields in the application form are filled out accurately
                    and that no required information is missing.</li>
                <li>Documentation: If applicable, please provide all necessary and verifiable documentation that
                    supports your credentials as an educator.</li>
                <li>Reapply: Once you have vaddressed the reasons for your application's rejection, we welcome you to
                    reapply for access to the Teacher Portal.</li>
            </ul>
            <p>We understand that this news may be disappointing, and we are here to provide you with any assistance
                or clarification you may need regarding this process. For further inquiries or support, please feel
                free to contact our support team at RaagamaInstitute2024@gmail.com or +94775842121.</p>
     
            <p>For further assistance, please feel free to contact our support team at support@RaagamaInstitute.com or
                +94112345688.</p>
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
mysqli_close($connection);
?>