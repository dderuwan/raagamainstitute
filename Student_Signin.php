<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="./css/main.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <title>RaagamaInstitute Student Sign In</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            });
        }

        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                const error = urlParams.get('error');
                if (error === 'invalid_email') {
                    showAlert("Invalid or incorrect Email.");
                } else if (error === 'invalid_password') {
                    showAlert("Invalid or incorrect password.");
                }
            }
        }
    </script>

    <style>
        #background-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: fit-content;

        }

        html,
        body {
            height: 100%;
            /* Make sure the page fills the whole screen */
            margin: 0;
            /* Remove default margin */
            padding: 0;
            /* Remove default padding */
            display: flex;
            flex-direction: column;
            /* Ensures content is organized vertically */
        }

        .container-fluid {
            flex: 1;
            /* Allows the container to expand and fill available space */
            display: flex;
            flex-direction: column;
        }

        .container-fluid {
            position: relative;

        }

        #studentsignin {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            width: 90%;
            max-width: 500px;
            margin: auto;
            padding: 20px;
        }

        footer {
            /* Example background color */
            padding: 20px 0;
            /* Example padding */
            text-align: center;
            /* Center the text */
            width: 100%;
            /* Ensures it stretches across the screen */
        }

        @media only screen and (max-width: 600px) {
            #background-video {
                bottom: 29%;
            }

            footer {
                padding: 0;
            }
        }
    </style>
</head>

<body>

    <video autoplay muted loop id="background-video">
        <source src="./videos/studentRG.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>
            <?php
            require "header2.php";
            ?>

            <div class="col-12 mt-2 mt-md-4">
                <div class="row">
                    <div class="col-1 col-md-4"></div>
                    <div class="col-10 col-md-4">
                        <form action="./handlers/studentLoginHandler.php" method="post"
                            enctype="application/x-www-form-urlencoded" class="w-100 w-md-75 mb-3 " id="studentsignin">
                            <div class="col-12">
                                <h2 class="fw-bold text-center">Sign In Now</h2>
                            </div>

                            <div class="form-group mt-2 mb-2">
                                <label for="exampleDropdownFormEmail2">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2"
                                    placeholder="email@example.com">
                            </div>
                            <div class="form-group mb-2">
                                <label for="exampleDropdownFormPassword2">Password</label>
                                <input type="password" name="password" class="form-control"
                                    id="exampleDropdownFormPassword2" placeholder="Password">
                            </div>
                            <!-- <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                <label class="form-check-label" for="dropdownCheck2">
                                    Remember me
                                </label>
                            </div> -->
                            <button type="submit" name="signin" style="margin-top: 5px;" class="btn btn-primary">Sign
                                in</button>
                            <hr />
                            <div class="row">
                                <div class="col-6"> <label class="signindecoration">No Account ? &nbsp;<a
                                            href="Student_Register.php" class="signindecoration text-danger">Sign
                                            Up</a></label>
                                </div>
                                <div class="col-6"><label><a href="#" class="signindecoration">Lost Password</a></label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-1 col-md-4"></div>

                </div>
            </div>


        </div>
    </div>
    <footer>
        <?php
        require "footer.php";
        ?>
    </footer>

    <script src="script.js"></script>
    <!-- 
    reason for the bug in the menu bar in the mobile responsive mode
    <script src="bootstrap.js"></script> -->
</body>

</html>