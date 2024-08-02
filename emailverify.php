<?php
session_start();
include ('./Databsase/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="StudentRegister.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="./css/main.css" rel="stylesheet" />
    <link href="./css/TeacherRegister.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet"
        media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="StudentRegister.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="./css/main.css" rel="stylesheet" />
    <title>RaagamaInstitute Teacher Registration</title>

    <script>
        function emailverify(event) {
            event.preventDefault();
            let email = document.getElementById("exampleDropdownFormEmail2").value;
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if (re.test(email)) {
                var r = new XMLHttpRequest();
                r.onreadystatechange = function () {
                    if (r.readyState == 4 && r.status == 200) {
                        var text = r.responseText;
                        if (text == 'Success') {
                            alert("Verification email sent. Please check your inbox.");
                            window.location.href = 'waiting.php'; // Correct redirection
                        } else {
                            alert(text);
                        }
                    }
                };
                r.open("GET", "verifyemail.php?e=" + email, true);
                r.send();
            } else {
                alert("Please enter a valid email");
                return false;
            }
        }
    </script>
    <style>
        body {
            background-image: url('./images/TeacherRegBG\ \(2\).jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: #2DB089 !important;
            --bs-btn-border-color: #2DB089 !important;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #2DB089 !important;
            --bs-btn-hover-border-color: #2DB089 !important;
            --bs-btn-focus-shadow-rgb: 45, 176, 137;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #2DB089 !important;
            --bs-btn-active-border-color: #2DB089 !important;
            --bs-btn-active-shadow: inset 0 3px 5px rgb(45, 176, 137, 0.5);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #2DB089 !important;
            --bs-btn-disabled-border-color: #2DB089 !important;
        }

        .btn-primary:hover {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row">
            <?php
            require "header.php";
            ?>
            <div class="col-12 mt-2 mt-md-4">
                <div class="row">
                    <div class="col-1 col-md-4"></div>
                    <div class="col-10 col-md-4">
                        <form action="" method="post" enctype="multipart/form-data"
                            class="form first w-100 w-md-75 mb-3">
                            <div class="" id="formFirst">
                                <div class="col-12">
                                    <h2 class="fw-bold text-primary text-center" style="color: #2C2B67 !important;">
                                        Register Now - Teacher</h2>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="exampleDropdownFormEmail2" style="font-weight: bold;">Email
                                                address</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" style="border: 1px solid #2C2B67;" name="email"
                                                class="form-control" id="exampleDropdownFormEmail2"
                                                placeholder="email@example.com" required>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-primary w-100" onclick="emailverify(event);">Verify
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="col-1 col-md-4"></div>
            </div>
        </div>
    </div>
    <div>
        <footer>
            <?php
            require "footer.php";
            ?>
        </footer>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="TeachersRegister.js"></script>
    <script src="StudentRegister.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
</body>

</html>