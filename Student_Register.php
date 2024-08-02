<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet"
        media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="StudentRegister.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="./css/main.css" rel="stylesheet" />
    <title>RaagamaInstitute Student Registration</title>

    <script>
        function checkPassword() {
            let pw = document.getElementById("password").value;
            let cpw = document.getElementById("confirmpassword").value;
            if (pw != cpw) {
                alert("Password and confrim password should be the same");
                event.preventDefault();
            }
            else {
                toggleFormFields(true);
            }
        }
    </script>
    <style>
        #background-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .container-fluid {
            position: relative;
            z-index: 1;
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
            <div class="col-12 mt-2 mt-md-4">
                <div class="row">
                    <div class="col-1 col-md-4"></div>
                    <div class="col-10 col-md-4">
                        <form action="./handlers/studentregisterHandler.php" method="post" enctype="multipart/form-data"
                            class="w-100 w-md-75 mb-3 rounded p-4 text-light" id="studentsignin"
                            style="background-color: rgba(255, 255, 255, 0.5); border-radius: 24px !important">
                            <div class="col-12">
                                <h1 class="fw-bold text-light text-center">Register Now</h1>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col mt-4">
                                                <label for="">First Name</label>
                                                <input type="text" name="fName" class="form-control"
                                                    placeholder="First name">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="col mt-4">
                                                <label for="">Last Name</label>
                                                <input type="text" name="lName" class="form-control"
                                                    placeholder="Last name">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group mt-2 mb-2">
                                <label for="exampleDropdownFormEmail2">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2"
                                    placeholder="email@example.com">
                            </div>

                            <div class="form-group mt-2">
                                <label for="exampleDropdownFormPassword2">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="exampleDropdownFormPassword2">Confirm Password</label>
                                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword"
                                    placeholder="Confirm Password">
                                <br>
                            </div>

                            <!-- <div class="form-group">
                                <label for="Gender">Gender:</label> &nbsp; &nbsp;
                                <input type="radio" id="Gender" name="Gender">
                                <label for="Gender">Male</label> &nbsp; &nbsp;
                                <input type="radio" id="Gender2" name="Gender">
                                <label for="Gender2">Female</label>&nbsp; &nbsp;
                                <input type="radio" id="Gender3" name="Gender">
                                <label for="Gender3">Other</label><br><br>
                            </div> -->

                            <div class="mb-2">
                                <label for="exampleDropdownFormExperience">Gender
                                </label>
                                <select name="gender" class="form-control" id="gender" required>
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- <div>
                                <label for="Age">Age:</label> &nbsp; &nbsp;
                                <input type="radio" id="age1" name="age" value="16" onclick="toggleParentFields(true);">
                                <label for="age1" style="margin-top:10px;">Below 16</label> &nbsp; &nbsp;


                                <input type="radio" id="age2" name="age" value="100" onclick="toggleParentFields(false);">
                                <label for="age2">Above 16</label>
                                <br><br>
                            </div> -->

                            <div class="form-group mb-2" id="parentNameContainer">
                                <label for="exampleDropdownFormParentName">Parent Name</label>
                                <input type="text" name="pName" class="form-control" id="exampleDropdownFormParentName"
                                    placeholder="Parent Name">
                            </div>

                            <div class="form-group mb-2" id="parentEmailContainer">
                                <label for="exampleDropdownFormParentEmail">Parent Contact No</label>
                                <input type="text" name="pContact" class="form-control"
                                    id="exampleDropdownFormParentEmail" placeholder="Parent Contact Details">
                            </div>

                            <div class="form-group mb-2">
                                <label for="exampleDropdownFormAdress">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleDropdownFormAdress"
                                    placeholder="Address">
                            </div>

                            <div class="form-group mb-2">
                                <label for="exampleDropdownFormCCountry">Country</label>
                                <input type="text" name="country" class="form-control" id="exampleDropdownFormCCountry"
                                    placeholder="Country">
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputCity">City</label>
                                                <input type="text" name="city" class="form-control" id="inputCity"
                                                    placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="form-group">
                                                <label for=" inputZip">Zip</label>
                                                <input type="text" name="zip" class="form-control" id="inputZip"
                                                    placeholder="Zip">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="" class="col-12">Contact</label>
                                <input class="form-control" name="contact" id="phone" type="tel" style="100%">
                            </div>

                            <div class="form-group mb-2">
                                <label for="exampleDropdownFormGrade">Grade or university</label>
                                <input type="text" name="grade" class="form-control" id="exampleDropdownFormGrade"
                                    placeholder="Grade">
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                <label class="form-check-label" for="dropdownCheck2">
                                    Remember me
                                </label>
                            </div>
                            <input type="hidden" name="course_id"
                                value="<?php echo isset($_POST['course_id']) ? htmlspecialchars($_POST['course_id']) : ''; ?>">
                            <button type="submit" name="regNext" class="btn btn-primary" onclick="checkPassword()">Sign
                                Up</button>
                            <hr />
                            <div class="row">
                                <div class="col-6"> <label class="signindecoration">Already have an Account ? &nbsp;<a
                                            href="Student_Signin.php" class="signindecoration text-danger">Sign
                                            In</a></label>
                                </div>
                                <div class="col-6"><label><a href="#" class="signindecoration">Lost Password</a></label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-1 col-md-4"></div>

                </div>
            </div>
            <script>
                function toggleParentFields(showParentFields) {
                    var parentNameContainer = document.getElementById("parentNameContainer");
                    var parentEmailContainer = document.getElementById("parentEmailContainer");

                    if (showParentFields) {
                        parentNameContainer.style.display = "block";
                        parentEmailContainer.style.display = "block";
                    } else {
                        parentNameContainer.style.display = "none";
                        parentEmailContainer.style.display = "none";
                    }
                }
            </script>


            <div>

                <?php
                require "footer.php";
                ?>

            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="StudentRegister.js"></script>
    <script></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
</body>

</html>