<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include ('./Databsase/connection.php');



if (isset($_GET['e'])) {

    $email = filter_input(INPUT_GET, 'e', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        echo "Please enter your email address.";
    } else {
        $_SESSION['email'] = $email;

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
        $mail->Subject = 'RaagamaInstitute Email Verification';
        $bodyContent = " <!DOCTYPE html>
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
                    <div><img src='images/v3_66.png' alt='Teacher Portal Logo'/></div>	
                        <h1>Welcome to RaagamaInstitute</h1>
                        <h2>Your Gateway to Empowering Education!</h2>
                    </td>
                </tr>
                <tr>
                    <td class='content'>
        
                        <p style='color:black;'>Please proceed to your next step</p>
                        <div style='text-align: center;'>
                            <a href='http://localhost/RaagamaInstitute/Teacher_Register.php' class='button'
                                style='color:white;'>Verify your Email</a>
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

        //email code


    }
} else {
    echo "Please enter your email address";
    ?>
    <br /><br />
    <a href="index.php">go back</a>
    <?php
}

// if (isset($_GET["e"])) {
//     $email = $_GET["e"];
//     if(empty($email)) {
//         echo "Please enter your email address";
//     }else{

//     }
//     try {
//         $mail = new PHPMailer(true); // Passing `true` enables exceptions
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'RaagamaInstitute2024@gmail.com';
//         $mail->Password = 'njowhfeflqnagirq';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 587;
//         $mail->setFrom('RaagamaInstitute@gmail.com', 'RaagamaInstitute');
//         $mail->addReplyTo('RaagamaInstitute@gmail.com', 'RaagamaInstitute');
//         $mail->addAddress($email);
//         $mail->isHTML(true);
//         $mail->Subject = 'Welcome to RaagamaInstitute';
//         $mail->Body = $bodyContent;
//         $bodyContent = "
//         <!DOCTYPE html>
//     <html>

//     <head>
//     <title>Welcome to the Teacher Portal</title>
//     <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'>
//     <style>
//     body {
//     font-family: Arial, sans-serif;
//     margin: 0;
//     padding: 0;
//     background-color: #f4f4f4;
//     }

//     .email-container {
//     background-color: #ffffff;
//     margin: 0 auto;
//     padding: 20px;
//     width: 600px;
//     }

//     .header {
//     background-color: #0367CC;
//     color: white;
//     padding: 20px;
//     text-align: center;
//     }

//     .header img {
//     max-width: 100px;
//     /* Adjust based on your logo's size */
//     }

//     .content {
//     padding: 20px;
//     color: #333333;
//     }

//     .footer {
//     background-color: #f8f8f8;
//     padding: 20px;
//     text-align: center;
//     font-size: 12px;
//     }

//     .social-icons a {
//     margin: 0 10px;
//     }

//     .social-icons svg {
//     fill: #333;
//     /* Social icons color */
//     }

//     .button {
//     background-color: #0367CC;
//     color: white;
//     padding: 12px 50px;
//     text-align: center;
//     text-decoration: none;
//     display: inline-block;
//     margin-top: 20px;
//     }

//     .button:hover {
//     background-color: #024978;
//     }

//     li {
//     margin-bottom: 20px;
//     /* Adjust the value as needed */
//     }
//     </style>
//     </head>

//     <body>
//     <table align='center' class='email-container'>
//     <tr>
//     <td class='header'>
//     <img src='../images/v3_66.png' alt='Teacher Portal Logo' />
//     <h1>Welcome to the Teacher Portal – Your Gateway to Empowering Education!</h1>
//     </td>
//     </tr>
//     <tr>
//     <td class='content'>

//     <p>Dear ,</p>

//     <h3 style='text-align:center' ;>Welcome to the Teacher Portal!</h3>


//     <div>
//     <p style='color:red;'>Your verification Code: '$code'</p>
//     <div style='text-align: center;'>
//     <a href='https://RaagamaInstitute.com/registerverify.php' class='button' style='color:white;'>Verify
//         Email Address</a>
//     </div>

//     </div>
//     <p>Please do not hesitate to reach out if you have any questions or need further assistance getting
//         started.
//         Welcome aboard, and let's make education extraordinary together!</p>
//     </div>


//     </td>
//     </tr>
//     <tr>
//     <td class='footer'>
//     <div class='social-icons'>
//     <p>Follow us for updates and more information:</p>
//     <p>
//         <a href='https://www.facebook.com/profile.php?id=61556215625398'>Facebook</a> |
//         <a href=''>Twitter</a> |
//         <a href='https://www.linkedin.com/company/RaagamaInstitute-com/?viewAsMember=true'>LinkedIn</a> |
//         <a href=''>Instagram</a>
//     </p>
//     </div>
//     <p style='text-align: center;font-size: 12px;'>RaagamaInstitute2024@gmail.com</p>
//     </td>
//     </tr>
//     </table>
//     </body>

//     </html>
//         ";
//         $mail->send();
//         echo 'Success';
//     } catch (Exception $e) {
//         echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
//     }


// } else {
//     echo 'error';
// }
?>