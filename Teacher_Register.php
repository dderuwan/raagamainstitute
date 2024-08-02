<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');  // Redirect to home if the email isn't set in the session
    exit;
}

$email = isset($_GET['email']) ? $_GET['email'] : ''; // Check if 'email' exists in $_GET
$token = isset($_GET['token']) ? $_GET['token'] : ''; // Check if 'token' exists in $_GET

$email = $_SESSION['email'];
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
        function checkPassword() {
            let pw = document.getElementById("txtPassword").value;
            let cpw = document.getElementById("txtConfimPassword").value;
            if (pw != cpw) {
                alert("Password and confirm password should be the same");
                event.preventDefault();
            } else {
                toggleFormFields(true);
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
    </style>
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
                        <form action="./handlers/registerHandler.php" method="post" enctype="multipart/form-data"
                            class="form first w-100 w-md-75 mb-3">
                            <div class="" id="formFirst">
                                <div class="col-12">
                                    <h2 class="fw-bold text-primary text-center">Register Now - Teacher</h2>
                                </div>
                                <div class="Personal Details mt-2">
                                    <span style="font-size:20px"> <b>Personal Details </b></span>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="col mt-4">
                                                        <label for="">First Name</label>
                                                        <input name="firstName" type="text" class="form-control"
                                                            placeholder="First name" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="col mt-4">
                                                        <label for="">Last Name</label>
                                                        <input name="lastName" type="text" class="form-control"
                                                            placeholder="Last name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="inputAddress">Address</label>
                                        <input name="address" type="text" class="form-control" id="inputAddress"
                                            placeholder="1234 Main St" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="inputAddress2">Address 2</label>
                                        <input name="address2" type="text" class="form-control" id="inputAddress2"
                                            placeholder="Apartment, studio, or floor" required>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="exampleDropdownFormCCountry">Country</label>
                                        <input name="country" type="text" class="form-control"
                                            id="exampleDropdownFormCCountry" placeholder="Country" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="inputCity">City</label>
                                                        <input name="city" type="text" class="form-control"
                                                            id="inputCity" placeholder="City" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for=" inputZip">Zip</label>
                                                        <input name="zipcode" type="text" class="form-control"
                                                            id="inputZip" placeholder="Zip" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mb-2 mt-2">
                                        <label for="" class="col-12">Contact</label>
                                        <input class="form-control" name="phone" id="phone" type="tel"
                                            style="width:500px;" required>
                                    </div>
                                </div>

                                <!-- <div class="mt-3">
                                    <label for="image">Profile Picture</label><br>
                                    <input type="file" name="imageFile" id="imageFile" class="form-control-file" required>
                                </div> -->

                                <div class="form-group mt-3">
                                    <label for="exampleDropdownFormEmail2">Email address</label>
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo htmlspecialchars($email);
                                        session_destroy(); ?>" readonly>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="exampleDropdownFormPassword2">Password</label>
                                    <input name="password" type="password" class="form-control" id="txtPassword"
                                        placeholder="Password" required>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="exampleDropdownFormPassword2">Confirm Password</label>
                                    <input name="txtConfimPassword" type="password" class="form-control"
                                        id="txtConfimPassword" placeholder="Confirm #Password" required>
                                </div>

                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                    <label class="form-check-label" for="dropdownCheck2">
                                        Remember me
                                    </label>
                                </div>
                                <button type="button" class="btn btn-primary" id="nextButton"
                                    onclick="checkPassword()">Next</button>

                                <div class="row">
                                    <div class="col-6"> <label class="signindecoration">Have Account ? &nbsp;<a
                                                href="Teacher_Signin.php" class="signindecoration text-danger">SignIn
                                                Now</a></label>
                                    </div>
                                    <div class="col-6"><label><a href="#" class="signindecoration">Lost
                                                Password</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class=" w-100 form-second w-md-75 mb-3" id="formSecond">

                                <div class="col-12">
                                    <h2 class="fw-bold text-primary text-center">Register Now</h2>
                                </div>

                                <div class="Personal Details mt-2">
                                    <span style="font-size:20px"> <b>Education Details </b></span>

                                    <div>
                                        <label class="mt-4" for="exampleDropdownFormEducation">Highest Education
                                            Level</label>
                                        <select name="educationL" class="form-control" id="education-level"
                                            name="education-level" required>
                                            <option value="">--Select Education Level--</option>
                                            <option value="none">None</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="bachelors">Bachelor's Degree</option>
                                            <option value="masters">Master's Degree</option>
                                            <option value="doctorate">Doctorate</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-2 mb-2">
                                        <label for="exampleDropdownFormDegree">Your Degree Path</label>
                                        <input name="degreeP" type="text" class="form-control"
                                            id="exampleDropdownFormDegree" placeholder="Bsc(Hons)example" required>
                                    </div>

                                    <div class="form-group mt-2 mb-2">
                                        <label for="exampleDropdownFormSubject">Your Subject Stream</label>
                                        <input name="streem" type="text" class="form-control"
                                            id="exampleDropdownFormSubject" placeholder="example Stream" required>
                                    </div>

                                    <div>
                                        <label class="mt-2" for="exampleDropdownFormExperience">Your Experience
                                        </label>
                                        <select name="Experience" class="form-control" id="Experience-level"
                                            name="Experience-level" required>
                                            <option value="">--Select Experience Level--</option>
                                            <option value="none">None</option>
                                            <option value=">1">Less than 5 year</option>
                                            <option value="5<">Above 5 years</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="mt-2" for="exampleDropdownFormExperience">Teaching Grades
                                        </label>
                                        <select name="ExperienceLevel" class="form-control" id="Experience-level"
                                            name="Experience-level" required>
                                            <option value="">--Select Grade--</option>
                                            <option value="none">None</option>
                                            <option value="pre">Pre Schools</option>
                                            <option value="Primary">Primary Schools</option>
                                            <option value="Ordinary">Ordinary Levels</option>
                                            <option value="Advanced">Advanced Levels</option>
                                            <option value="Undergraduates">Undergraduates</option>
                                            <option value="Postgraduates">Postgraduates</option>
                                            <option value="Other">Other</option>

                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="image">Upload Your Resume as PDF</label><br>
                                        <input type="file" name="resumeFile" id="resumeFile" class="form-control-file"
                                            accept=".pdf,.doc,.docx" required>
                                    </div>

                                    <!-- <div class="col-12">
                                        <div class="row">
                                            <div class="col-12"></div>
                                            <label class="mt-3" for=""> Teaching Stream</label>

                                            <div class="col-12">
                                                <div class="col-6">
                                                    <div>
                                                        <div class="form-check mx-3">
                                                            <input class="form-check-input " type="checkbox" value="" id="onlineCheckbox">
                                                            <label class="form-check-label" for="onlineCheckbox">
                                                                Online
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6"> 
                                                        <div class="form-check mx-3">
                                                            <input class="form-check-input" type="checkbox" value="" id="physicalCheckbox">
                                                            <label class="form-check-label" for="physicalCheckbox">
                                                                Physical
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> -->

                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                        <label class="form-check-label" for="dropdownCheck2">
                                            Remember me
                                        </label>
                                    </div>
                                    <button type="button" class="btn btn-secondary" id="backButton">Back</button>
                                    <button name="regNext" type="submit" class="btn btn-primary">Sign Up</button>

                                    <hr />
                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <label class="signindecoration"> Have Account ?&nbsp;<a
                                                    href="Teacher_Signin.php"
                                                    class="signindecoration text-danger">SignIn Now</a></label>
                                        </div>

                                        <div class="col-6 mt-4">
                                            <label><a href="#" class="signindecoration">Lost Password</a></label>
                                        </div>
                                    </div>
                                </div>

                        </form>

                    </div>



                </div>
                <div class="col-1 col-md-4"></div>

            </div>
        </div>



        <div>

            <?php
            require "footer.php";
            ?>

        </div>
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