<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .teacherimagelogoheader {
            width: 200px;
            height: 200px;
            margin-top: -70px;
        }
    </style>

</head>

<body>
    <div class="container-fluid" style="overflow-x:hidden;height: 60px;overflow-y: hidden;">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <!-- logo RaagamaInstitute -->
                    <div class="col-2">
                        <img src="images/v3_66.png" class="teacherimagelogoheader" />
                    </div>
                    <!-- End logo RaagamaInstitute -->
                    <!-- search section  -->
                    <div class="col-md-6 d-md-block d-none">
                        <div class="row">
                            <div class="col-4 mt-4 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                </svg>
                                <span class="">CATEGORY</span>
                            </div>
                            <div class="col-8 mt-3">
                                <div class="row">
                                    <div class="col-10">
                                        <input class="form-control bg-light" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-outline-success bg-primary text-white" type="submit"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end search section -->

                    <div class="col-4 mt-3  d-md-block d-none ">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-white text-danger w-100"
                                    onclick="window.location.href='Teacher_Signin.php'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                        class="bi bi-person mx-1" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>Login</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100"
                                    onclick="window.location.href='Teacher_Register.php'">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <!-- mobile view signin signup -->
                    <div class="col-6 d-block d-md-none mt-3 headermobviewlogin">
                        <div class="row">
                            <div class="col-6">

                                <button class="btn btn-danger btn-sm mx-4"
                                    onclick="window.location.href='Student_Signin.php'">Login</button>
                            </div>
                            <div class="col-6">

                                <button class="btn btn-primary btn-sm"
                                    onclick="window.location.href='Student_Register.php'">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <!-- end mobile view -->
                </div>
            </div>

        </div>

    </div>
</body>

</html>