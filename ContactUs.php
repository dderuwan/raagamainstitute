<?php
session_start();
require_once "Databsase/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RaagamaInstitute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="images/v3_66.png" />

    <!-- navbar dropdown is not working becoure of this script link 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            padding-top: 20px;
            background-image: url('images/contact bg.png') !important;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .icon svg {
            width: 100%;
            max-width: 30px;
        }

        @media (min-width: 1253px) {
            .your-contact {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .contact-details {
                flex: 1;
            }
        }

        .contact-image img {
            width: 100%;
            height: auto;
        }

        .feedback-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
        }

        .contactus-title {
            font-weight: 550;
            font-size: 40px;
        }

        /**********contact us form start*/
        /* Contact  us */

        .contact-us-container {
            display: flex;
            flex-direction: row;
            align-items: center !important;
            background-color: rgba(44, 43, 103, 255);
            padding-bottom: 40px;
            margin: 430px 20px 20px 20px;
        }

        .contact-us-container .container {
            color: white;
        }

        .google-map {
            flex: 1;
            margin-right: 40px !important;
            height: 100% !important;
        }

        .google-map iframe {
            height: 600px;
        }

        .contact-us {
            flex: 1;
            padding: 50px 50px 0px 50px;
        }

        .contact-us h3 {
            color: white;
            margin: 2px;
        }

        .contact-us p {
            color: #b7b7b7;
            margin: 2px;
            font-size: 14px;
            font-weight: lighter;
            padding-top: 10px;
        }

        .contact-us .container input[type="text"],
        .contact-us .container input[type="email"],
        .contact-us .container input[type="tel"],
        select,
        textarea {
            color: rgba(44, 43, 103, 255);
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        label {
            color: #b7b7b7;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #036fc1;
            color: white;
            padding: 12px 60px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type="submit"]:hover {
            background-color: white;
            border: 1px solid #036fc1;
            color: #036fc1;
            font-weight: bold;
        }

        .container {
            border-radius: 5px;
            background-color: transparent;
            padding: 20px;
        }

        .row-container {
            display: flex;
            justify-content: space-between;
        }

        .row-container>* {
            flex: 1;
            margin-right: 10px;
        }

        .row-container>*:last-child {
            margin-right: 0;
        }

        .contact-us-container-gap {
            display: flex;
            justify-content: row;
            /* Adjust as needed */
            background-color: rgba(44, 43, 103, 255);
            padding: 50px;
        }

        .error {
            color: red;
            font-size: 12px;
            position: relative;
            bottom: 0;
            padding-top: 5px;
            display: flex;
            justify-content: center;
        }

        @media screen and (max-width: 480px) {
            .google-map {
                margin: 20px !important;
                padding: 20px;
                width: 100% !important;
            }

            .contactus-title {
                font-size: 35px !important;
            }
        }

        @media screen and (max-width: 820px) {
            .contact-us-container {
                display: flex;
                flex-direction: column;
                background-color: rgba(44, 43, 103, 255);
            }

            .contact-us {
                padding: 20px;
            }

            .google-map {
                margin: 20px !important;
                padding: 50px;
                width: 100% !important;
            }

            .google-map iframe {
                width: 100%;
            }
        }

        @media screen and (max-width: 768px) {
            .custom-col-md-6 {
                display: block !important;
            }
        }

        /**********contact us form end */
    </style>
</head>

<body>
    <?php require "header.php"; ?>
    <div class="container-fluid p-0">
        <div class="container">

            <!-- <div class="row mt-5">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="contactus-title">Contact Info:</h4>
                            <div class="contact-info">
                                <table class="comparison-table">
                                    <tbody>
                                        <tr style="height: 35px; ">
                                            <td style="text-align: left;"><span
                                                    style="font-weight: bold;font-size: 18px;">Address: &nbsp; &nbsp;
                                                </span></td>
                                            <td> No 15, Kuruppu road , Colombo 08.</td>
                                        </tr>
                                        <tr style="height: 35px; ">
                                            <td style="text-align: left;"><span
                                                    style="font-weight: bold;font-size: 18px;">Phone: &nbsp; &nbsp;
                                                </span></td>
                                            <td> +94 115 810 810</td>
                                        </tr>
                                        <tr style="height: 35px; ">
                                            <td style="text-align: left;"><span
                                                    style="font-weight: bold;font-size: 18px;">Email: &nbsp; &nbsp;
                                                </span></td>
                                            <td> info@RaagamaInstitute.com</td>
                                        </tr>
                                        <tr style="height: 35px; ">
                                            <td style="text-align: left;"><span
                                                    style="font-weight: bold;font-size: 18px;">LinkedIn: &nbsp; &nbsp;
                                                </span></td>
                                            <td> <a
                                                    href="https://www.linkedin.com/company/RaagamaInstitute-com/">linkedin.com/company/RaagamaInstitute</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 custom-col-md-6" style="display: none;height: 20px;">

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-5" style="width: 35% !important">
                                            <img src="images/contact-1-1-qh6kv7h4kztbxuaxdd2msoz8cat4ojvs1o9p8xhfuw.jpg"
                                                alt="" width="124px;" height="124px;" style="object-fit: cover;">
                                        </div>
                                        <div class="col-7" style="margin-left: 20px;">
                                            <div>
                                                <span style="font-size:18px;font-weight: bold;">Mr.Vikas</span><br>
                                            </div>
                                            <div>
                                                <span style="font-size:16px;">Head of communications</span>
                                            </div>
                                            <div>
                                                <span style="font-size:16px;">Phone: 212 386 5575</span>
                                            </div>
                                            <div>
                                                <span style="font-size:16px;">Email: info@RaagamaInstitute.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-12 mt-5">
                                        <div class="row">
                                            <div class="col-5" style="width: 35% !important">
                                                <img src="images/contact-2-1-qh6kv6jae5s1m8caiuo0877rqwxrgus1pjm7rniu14.jpg""
                                                alt="" width=" 124px;" height="124px;" style="object-fit: cover;">
                                            </div>
                                            <div class="col-7" style="margin-left: 20px;">
                                                <div>
                                                    <span
                                                        style="font-size:18px;font-weight: bold;">Mr.Morrison</span><br>
                                                </div>
                                                <div>
                                                    <span style="font-size:16px;">Head of communications</span>
                                                </div>
                                                <div>
                                                    <span style="font-size:16px;">Phone: 212 386 5575</span>
                                                </div>
                                                <div>
                                                    <span style="font-size:16px;">Email: info@RaagamaInstitute.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="contact-us-container">
            <div class="contact-us">
                <div>
                    <h3 style="color: white;" class="contactus-title">Get in Touch With Us</h3>
                    <p style="color: white;">Want to get in touch? We'd love to hear from you. Here's how you can reach
                        us...</p>
                </div>
                <div class="container">
                    <?php
                    $name = $email = $message = "";
                    $name_err = $email_err = $message_err = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty(trim($_POST["name"]))) {
                            $name_err = "Please enter your name.";
                        } else {
                            $name = trim($_POST["name"]);
                        }

                        if (empty(trim($_POST["email"]))) {
                            $email_err = "Please enter your email address.";
                        } else {
                            $email = trim($_POST["email"]);
                        }

                        if (empty(trim($_POST["message"]))) {
                            $message_err = "Please enter your message.";
                        } else {
                            $message = trim($_POST["message"]);
                        }

                        if (empty($name_err) && empty($email_err) && empty($message_err)) {
                            $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";

                            if ($stmt = mysqli_prepare($connection, $sql)) {
                                mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_message);

                                $param_name = $name;
                                $param_email = $email;
                                $param_message = $message;

                                if (mysqli_stmt_execute($stmt)) {
                                    echo '<script>
                                                    $(document).ready(function(){
                                                        Swal.fire({
                                                            icon: "success",
                                                            title: "Success",
                                                            text: "Successfully submitted!",
                                                            confirmButtonText: "OK"
                                                        });
                                                    });
                                                </script>';
                                } else {
                                    echo '<script>
                                            $(document).ready(function(){
                                                Swal.fire({
                                                    icon: "error",
                                                    title: "Error",
                                                    text: "Something went wrong. Please try again later.",
                                                    confirmButtonText: "OK"
                                                });
                                            });
                                            </script>';
                                }

                                mysqli_stmt_close($stmt);
                            }
                        }
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="name" style="color: white;">Name *</label>
                        <input type="text" id="name" name="name" required
                            class="<?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $name; ?>" />
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>

                        <label for="email" style="color: white;">Email *</label>
                        <input type="email" id="email" name="email" required
                            class="<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $email; ?>" />
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>

                        <span id="mobileError" class="error"></span>
                        <label for="message" style="color: white;">Message</label>
                        <textarea id="message" name="message" style="height: 200px"
                            class="<?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                        <span class="invalid-feedback"><?php echo $message_err; ?></span>

                        <input type="submit" value="Submit" style="margin-top: 20px;" />
                    </form>
                </div>
            </div>
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.835164555162!2d79.9100085!3d7.1020363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f1dcc489a4fb%3A0xa819a59f56faad2c!2sEkala%20Orex%20City%20RaagamaInstitute!5e0!3m2!1sen!2slk!4v1706262022621!5m2!1sen!2slk"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
    <!-- 
    reason for the bug in the menu bar in the mobile responsive mode
    <script src="bootstrap.js"></script> -->
</body>

</html>