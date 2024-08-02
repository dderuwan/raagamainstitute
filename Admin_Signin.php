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
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>

            <div class="col-12 mt-2 mt-md-4">
                <div class="row">
                    <div class="col-1 col-md-4"></div>
                    <div class="col-10 col-md-4">
                        <form action="./handlers/adminLogin.php" method="post"
                            enctype="application/x-www-form-urlencoded" class="w-100 w-md-75 mb-3 " id="studentsignin">
                            <div class="col-12">
                                <h6 class="fw-bold">Sign In Now</h6>
                            </div>
                            <div class="col-12 bg-light">
                                <div class="row">
                                    <div class="col-4 mt-1">
                                        <label>Login for :</label>
                                    </div>
                                    <div class="col-8 mt-1">
                                        <label>Admin</label>
                                    </div>
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
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                <label class="form-check-label" for="dropdownCheck2">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" name="signin" class="btn btn-primary">Sign in</button>
                            <hr />

                        </form>
                    </div>
                    <div class="col-1 col-md-4"></div>

                </div>
            </div>





            <?php
            require "footer.php";
            ?>

        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>