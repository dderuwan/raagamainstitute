<?php
require_once "../RaagamaInstitute/Databsase/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RaagamaInstitute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* General body styling */
        body {
            font-family: 'Arial', sans-serif;
            /* Consistent font throughout the site */
            padding-top: 20px;
            /* Adds space at the top of the page */
            background: #f4f4f4;
            /* Light grey background */
        }

        /* Responsive adjustments for the contact info icons and text */
        .icon svg {
            width: 100%;
            /* Ensures SVG icons resize within their containers */
            max-width: 30px;
            /* Maximum size to look good on any device */
        }

        /* Improved layout for the contact sections */
        @media (min-width: 768px) {
            .contact-column {
                flex: 1;
                /* Each contact column takes equal space */
                padding: 15px;
                /* Adds spacing around the content */
            }
        }

        /* Making images responsive */
        .contact-image img {
            width: 100%;
            /* Responsive images */
            height: auto;
            /* Maintain aspect ratio */
        }

        /* Additional styles for the feedback form to make it appealing */
        .feedback-form {
            background: white;
            /* White background for the form */
            padding: 20px;
            /* Padding around the form */
            border-radius: 8px;
            /* Rounded corners for the form */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
        }

        /* Responsiveness for form elements */
        .form-control {
            margin-bottom: 15px;
            /* Adds space below each input */
        }

        /* Custom styles for buttons to make them stand out */
        .btn-primary {
            background-color: #0056b3;
            /* Custom color for the primary button */
            border: none;
            /* No border for a cleaner look */
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require "header.php"; ?>

        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Contact Info:</h4>
                        <div class="contact-info">
                            <p><strong>Address:</strong> No.365, third floor, Orex city shopping complex, Ekala,
                                Jaela.11350</p>
                            <p><strong>Phone:</strong> +94776542588</p>
                            <p><strong>Email:</strong> info@RaagamaInstitute.com</p>
                            <p><strong>LinkedIn:</strong> <a
                                    href="https://www.linkedin.com/company/RaagamaInstitute-com/">RaagamaInstitute</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Location Info:</h4>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.969591045915!2d-118.22966062460871!3d34.07029377315024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c660457d8c89%3A0xffc895e583f2e85f!2sEduma!5e0!3m2!1sen!2slk!4v1706262022621!5m2!1sen!2slk"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-8">
                        <h4>Feedback:</h4>
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
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name"
                                    class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                                    value="<?php echo $name; ?>">
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                                    value="<?php echo $email; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message"
                                    class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                                <span class="invalid-feedback"><?php echo $message_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <h4>Your Contact:</h4>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-5">
                                            <img src="images/contact-1-1-qh6kv7h4kztbxuaxdd2msoz8cat4ojvs1o9p8xhfuw.jpg"
                                                alt="">
                                        </div>
                                        <div class="col-7">
                                            <span style="font-size:18px;"><b>Bernard hennan</b></span><br>
                                            <span style="font-size:10px;">Head of communications</span>
                                            <br><br>

                                            <span style="font-size:15px;">Phone: 212 386 5575</span>
                                            <span style="font-size:15px;">Email: bernard@stylemix.net</span>
                                            <span style="font-size:15px;">Skype: johnsonconstruct</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-12 mt-5">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="images/contact-2-1-qh6kv6jae5s1m8caiuo0877rqwxrgus1pjm7rniu14.jpg"
                                                    alt="">
                                            </div>
                                            <div class="col-7">
                                                <span style="font-size:18px;"><b>Bernard hennan</b></span><br>
                                                <span style="font-size:10px;">Head of communications</span>
                                                <br><br>

                                                <span style="font-size:15px;">Phone: 212 386 5575</span>
                                                <span style="font-size:15px;">Email: bernard@stylemix.net</span>
                                                <span style="font-size:15px;">Skype: johnsonconstruct</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require "footer.php"; ?>
    </div>
</body>

</html>