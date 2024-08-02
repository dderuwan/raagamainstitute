<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About-Us</title>
    <link rel="icon" href="images/v3_66.png" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link href="./css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .btn-active-aboutus {
        background-color: #036fc1 !important;
        color: white !important;
    }

    .btn-click-aboutus {
        background-color: #f8f8f8 !important;
        color: #273044 !important;
        border-top: 2px solid #036fc1 !important;
    }

    .custom-h2-aboutus {
        font-weight: 700;
        color: #273044;
        font-size: 32px;
        letter-spacing: -0.7px;
    }

    .custom-h4-aboutus {
        text-align: center;
        margin-top: 34px;
        font-size: 16px;
        color: #273044;
    }
</style>

<body>
    <?php
    require "header.php";
    ?>
    <?php
    require "header2.php";
    ?>
    <div class="container-fluid">
        <div class="container" style="padding-left: 0; padding-right: 0;">
            <!-- first row -->
            <div class="row" style="display: flex; justify-content: center; margin-left: 0; margin-right: 0;">
                <div class="col-8" style="width: 100% !important">
                    <!-- second row -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="row mb-5">
                                <!-- Text Content Column -->
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="custom-h2-aboutus">Welcome to RaagamaInstitute!</h2>
                                        </div>
                                        <div class="col-12 mt-3" style="color: #555555;">
                                            Online studies are designed for students whose scheduling commitments
                                            would
                                            otherwise make it difficult to enroll in a full-time higher education
                                            program.
                                            Offered for individual courses, diplomas, associateu2019s degrees and
                                            certificate programs, online studies are a valuable option. The
                                            resulting
                                            qualification a graduate receives after successfully completing.
                                        </div>
                                        <div class="col-12 mt-5">
                                            <h4 style="font-weight: 400;font-style: normal;font-size: 18px">
                                                Unordered &
                                                Ordered Lists</h4>
                                            <ul
                                                style="color: #555555;font-size: 14px; padding-left: 0px; opacity: 0.6;">
                                                <p><i class="fa-regular fa-thumbs-up"
                                                        style="color: #eab830;margin-right: 15px"></i>Online Courses
                                                    with full discount systems.</p>
                                                <p><i class="fa-regular fa-thumbs-up"
                                                        style="color: #eab830;margin-right: 15px"></i>Online
                                                    Certificates which can be used worldwide.</p>
                                                <p><i class="fa-regular fa-thumbs-up"
                                                        style="color: #eab830;margin-right: 15px"></i>An online
                                                    leadership development program.</p>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Image Column -->
                                <div class="col-md-6 col-12">
                                    <img src="images/col1img2.jpg"
                                        style="width: 100%; height: 100%;object-fit: cover" />
                                </div>
                            </div>
                            <div class="row mb-5">
                                <!-- about 2nd col -->
                                <div class="col-md-6 col-12">
                                    <img src="images/col1img1.jpg"
                                        style="width: 100%; height: 340px;object-fit: cover; padding-bottom: 20px;margin-bottom: 20px;" />
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div class="btn-group shadow-0" role="group" id="skillaboutus">
                                            <button id="skillsButton" type="button" class="btn rounded-0"
                                                data-mdb-ripple-init data-mdb-color="dark"
                                                style="font-weight: 600;color: white; background-color:#036fc1;box-shadow: none; padding: 14px 20px;">SKILLS</button>
                                            <button id="aboutusButton" type="button" class="btn rounded-0"
                                                data-mdb-ripple-init data-mdb-color="dark"
                                                style="font-weight: 600;color: #273044;box-shadow: none;  border-top: 2px solid #036fc1;padding: 14px 20px;">ABOUT
                                                US</button>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 12px;padding-right: 12px">
                                        <div id="skills" style="padding: 40px 0px 0px 0px;display: none;">
                                            <h3 style="color: #273044;letter-spacing: -0.7px;font-size: 18px;">
                                                Professional Certificate Courses (Online)</h3>
                                            <ul
                                                style="color: #555555;font-size: 14px; padding-left: 0px; opacity: 0.6;">
                                                <p style="margin-left: 10px"><i class="fa-regular fa-hand-point-right"
                                                        style="color: #eab830;margin-right: 15px"></i>Online
                                                    certificates can be obtained in a range of specialized areas.
                                                </p>
                                                <p style="margin-left: 10px"><i class="fa-regular fa-hand-point-right"
                                                        style="color: #eab830;margin-right: 15px"></i>Online
                                                    diplomas are awarded for one to two years of study with LMS.
                                                </p>
                                                <p style="margin-left: 10px"><i class="fa-regular fa-hand-point-right"
                                                        style="color: #eab830;margin-right: 15px"></i>Online
                                                    associate degrees usually take approximately two years then.
                                                </p>
                                                <p style="margin-left: 10px"><i class="fa-regular fa-hand-point-right"
                                                        style="color: #eab830;margin-right: 15px"></i>Online
                                                    preparatory year programs are an opportunity for students.
                                                </p>
                                                <p style="margin-left: 10px"><i class="fa-regular fa-hand-point-right"
                                                        style="color: #eab830;margin-right: 15px"></i>Online Summer
                                                    courses are a great way to gain qualifications.</p>
                                                <p style="margin-left: 10px"><i class="fa-regular fa-hand-point-right"
                                                        style="color: #eab830;margin-right: 15px"></i>Online
                                                    associate degrees usually take approximately two years then.
                                                </p>
                                            </ul>
                                        </div>
                                        <div id="aboutus" style="padding: 40px 0px; color: #555555; opacity: 0.6;">
                                            <p>Online studies are designed for students whose scheduling commitments
                                                would otherwise make it difficult to enroll in a full-time higher
                                                education program. Offered for individual courses, diplomas,
                                                associate’s
                                                degrees and certificate programs, online studies are a valuable
                                                option.
                                                The resulting qualification a graduate receives after successfully
                                                completing.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <!-- <div class="col-12">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h2 class="custom-h2-aboutus">Certifications</h2>
                                </div>
                                <div class="col-12 mb-5">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-md-3 col-6 mb-3">
                                            <img src="images/certificate.png" alt="" class="img-fluid">
                                            <h4 class="custom-h4-aboutus">Google Certified</h4>
                                        </div>
                                        <div class="col-md-3 col-6 mb-3">
                                            <img src="images/certificate.png" alt="" class="img-fluid">
                                            <h4 class="custom-h4-aboutus">Microsoft Certified</h4>
                                        </div>
                                        <div class="col-md-3 col-6 mb-3">
                                            <img src="images/certificate.png" alt="" class="img-fluid">
                                            <h4 class="custom-h4-aboutus">Apple Certified</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require "footer.php";
    ?>
    <script src="script.js"></script>
    <!-- 
    reason for the bug in the menu bar in the mobile responsive mode
    <script src="bootstrap.js"></script> -->

    <script>
        document.getElementById("skillsButton").addEventListener("click", function () {
            document.getElementById("skills").style.display = "block";
            document.getElementById("aboutus").style.display = "none";

            document.getElementById("skillsButton").classList.add("btn-click-aboutus");
            document.getElementById("aboutusButton").classList.remove("btn-click-aboutus");
            document.getElementById("aboutusButton").classList.add("btn-active-aboutus");
        });

        document.getElementById("aboutusButton").addEventListener("click", function () {
            document.getElementById("skills").style.display = "none";
            document.getElementById("aboutus").style.display = "block";

            document.getElementById("aboutusButton").classList.add("btn-click-aboutus");
            document.getElementById("skillsButton").classList.remove("btn-click-aboutus");
            document.getElementById("skillsButton").classList.remove("btn-active-aboutus");
        });
    </script>
</body>

</html>