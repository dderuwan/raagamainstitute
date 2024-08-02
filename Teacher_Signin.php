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
    <title>RaagamaInstitute Teacher Sign In</title>
    <style>
        body {
            background-image: url('./images/TeacherRegBG\ \(2\).jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
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

                // Remove the error parameter from the URL
                urlParams.delete('error');
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + urlParams.toString();
                window.history.replaceState({}, document.title, newUrl);
            }
        }
    </script>
</head>

<body>

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
                        <form action="./handlers/loginHandler.php" method="post"
                            enctype="application/x-www-form-urlencoded" class="w-100 w-md-75 mb-3 " id="studentsignin">
                            <div class="col-12">
                                <h2 class="fw-bold text-center text-primary">Sign In Now</h2>
                            </div>
                            <div class="col-12 bg-light">
                                <div class="row">
                                </div>


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
                            <button type="submit" name="signin" class="btn btn-primary" style="margin-top: 5px;">Sign
                                in</button>
                            <hr />
                            <div class="row" style="margin-bottom: 80px;">
                                <div class="col-6"> <label class="signindecoration">No Account ? &nbsp;<a
                                            href="emailverify.php" class="signindecoration text-danger">Register
                                            Now</a></label>
                                </div>
                                <div class="col-6"><label><a href="#" class="signindecoration">Lost Password</a></label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-1 " style="margin-bottom: 20px;"></div>
                    <?php
                    require "footer.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <!-- 
    reason for the bug in the menu bar in the mobile responsive mode
    <script src="bootstrap.js"></script> -->

</body>

</html>