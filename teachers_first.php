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
    <title>Teach Online -Share Your Knowledge</title>
    <style>
        .divsec1 {
            height: 350px;
        }

        .divsec1secimg {
            /* background-image: url("img/female.png");
            width: 100%;
            background-repeat: no-repeat; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btnsec4 {
            color: grey;
        }

        .btnsec4:hover {
            color: black;
            text-decoration: underline;
        }
    </style>
    <script>
        function sectiondiv(show) {
            var sec1 = document.getElementById('sec1');
            var sec2 = document.getElementById('sec2');
            var sec3 = document.getElementById('sec3');

            if (show) {
                sec1.style.display = 'block';
                sec2.style.display = 'none';
                sec3.style.display = 'none';
            }
        }
        function sectiondiv1(show) {
            var sec1 = document.getElementById('sec1');
            var sec2 = document.getElementById('sec2');
            var sec3 = document.getElementById('sec3');

            if (show) {
                sec1.style.display = 'none';
                sec2.style.display = 'block';
                sec3.style.display = 'none';
            }
        }
        function sectiondiv2(show) {
            var sec1 = document.getElementById('sec1');
            var sec2 = document.getElementById('sec2');
            var sec3 = document.getElementById('sec3');

            if (show) {
                sec1.style.display = 'none';
                sec2.style.display = 'none';
                sec3.style.display = 'block';
            }
        }
    </script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "teacherheader.php";
            ?>


            <div class="col-12 mt-2 mt-md-4">
                <div class="row">
                    <div class="col-12 mb-2 bg-white shadow divsec1 ">
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                                <div class="row">
                                    <div class="col-12 mx-3 mt-5 ">
                                        <div class="col-12">
                                            <h1><b>Come teach with us</b></h1>
                                        </div>
                                        <div class="col-12 mt-2 mb-3 ">
                                            <span><b>Become an instructor and change lives-including your
                                                    down</b></span>
                                        </div>
                                        <div class="col-12 ">
                                            <button class="text-center btn btn-primary text-white w-100">Get
                                                Start</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-5">
                                <div class="divsec1secimg"><img src="img/female.png" alt=""></div>
                            </div>
                        </div>
                    </div>

                    <!-- second section     -->
                    <div class="col-12 mt-4 mb-4 ">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1><b>So many reason to start</b></h1>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                            </div>
                                            <div class="col-12 text-center mb-1 mt-2 ">
                                                <h4><b>Teach Your Way</b></h4>
                                            </div>
                                            <div class="col-12  text-center">
                                                <p>Publish the course you want, in the way you want , and always hve
                                                    control of your own content</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-steam" viewBox="0 0 16 16">
                                                    <path
                                                        d="M.329 10.333A8.01 8.01 0 0 0 7.99 16C12.414 16 16 12.418 16 8s-3.586-8-8.009-8A8.006 8.006 0 0 0 0 7.468l.003.006 4.304 1.769A2.2 2.2 0 0 1 5.62 8.88l1.96-2.844-.001-.04a3.046 3.046 0 0 1 3.042-3.043 3.046 3.046 0 0 1 3.042 3.043 3.047 3.047 0 0 1-3.111 3.044l-2.804 2a2.223 2.223 0 0 1-3.075 2.11 2.22 2.22 0 0 1-1.312-1.568L.33 10.333Z" />
                                                    <path
                                                        d="M4.868 12.683a1.715 1.715 0 0 0 1.318-3.165 1.7 1.7 0 0 0-1.263-.02l1.023.424a1.261 1.261 0 1 1-.97 2.33l-.99-.41a1.7 1.7 0 0 0 .882.84Zm3.726-6.687a2.03 2.03 0 0 0 2.027 2.029 2.03 2.03 0 0 0 2.027-2.029 2.03 2.03 0 0 0-2.027-2.027 2.03 2.03 0 0 0-2.027 2.027m2.03-1.527a1.524 1.524 0 1 1-.002 3.048 1.524 1.524 0 0 1 .002-3.048" />
                                                </svg>
                                            </div>
                                            <div class="col-12 text-center mb-1 mt-2 ">
                                                <h4><b>Inspire learners</b></h4>
                                            </div>
                                            <div class="col-12  text-center">
                                                <p>Teach what you know and help learners explore their interests, gain
                                                    new skills, and advance their careers.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                    fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935M3.504 1q.01.775.056 1.469c.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.5.5 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667q.045-.694.056-1.469z" />
                                                </svg>
                                            </div>
                                            <div class="col-12 text-center mb-1 mt-2 ">
                                                <h4><b>Get rewarded</b></h4>
                                            </div>
                                            <div class="col-12 text-center">
                                                <p>Expand your professional network, build your expertise, and earn
                                                    money on each paid enrollment.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- third section -->
                    <div class="col-12 bg-primary mb-5 mt-5">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-2 text-center text-white mt-3">
                                <h2><b>50M</b></h2>
                                <p><b>Student</b></p>
                            </div>
                            <div class="col-2 text-center text-white mt-3">
                                <h2><b>75+</b></h2>
                                <p><b>Languages</b></p>
                            </div>
                            <div class="col-2 text-center text-white mt-3">
                                <h2><b>100M</b></h2>
                                <p><b>Enrollments</b></p>
                            </div>
                            <div class="col-2 text-center text-white mt-3">
                                <h2><b>180+</b></h2>
                                <p><b>Countries</b></p>
                            </div>
                            <div class="col-2 text-center text-white mt-3">
                                <h2><b>15,000</b></h2>
                                <p><b>Enterprise Customers</b></p>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <!-- forth section -->
                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-12 text-center  justify-content-center align-items-center">
                                <h1><b>How to Begin</b></h1>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="row">

                                    <div class="col-8 offset-2 text-center">
                                        <div class="row">
                                            <div class="col-4">
                                                <button class="btn btn-white btnsec4" onclick="sectiondiv(true);">
                                                    <h5><b>Plan your curriculum</b></h5>
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-white btnsec4" onclick="sectiondiv1(true);">
                                                    <h5><b>Record Your Video</b></h5>
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-white btnsec4" onclick="sectiondiv2(true);">
                                                    <h5><b>Launch your Cource</b></h5>
                                                </button>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-12 mt-3 mb-5 bg-light" id="sec1">
                                <div class="row">
                                    <div class="col-8 offset-2 mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-8 mt-5">
                                                <p>You start with your passion and knowledge. Then choose a promising
                                                    topic with the help of our Marketplace Insights tool.</p>
                                                <p>The way that you teach — what you bring to it — is up to you.</p>
                                                <p><b>How we help you</b></p>
                                                <p>We offer plenty of resources on how to create your first course. And,
                                                    our instructor dashboard and curriculum pages help keep you
                                                    organized.</p>
                                            </div>
                                            <div class="col-4">
                                                <img src="img/study.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- record video -->
                            <div class="col-12 mt-3 mb-5 bg-light" id="sec2" style="display: none;">
                                <div class="row">
                                    <div class="col-8 offset-2 mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-8 mt-5">
                                                <p>Use basic tools like a smartphone or a DSLR camera. Add a good
                                                    microphone and you’re ready to start.</p>
                                                <p>If you don’t like being on camera, just capture your screen. Either
                                                    way, we recommend two hours or more of video for a paid course.</p>
                                                <p><b>How we help you</b></p>
                                                <p>Our support team is available to help you throughout the process and
                                                    provide feedback on test videos</p>
                                            </div>
                                            <div class="col-4">
                                                <img src="img/voice-message.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- launch cource -->
                            <div class="col-12 mt-3 mb-5 bg-light" id="sec3" style="display: none;">
                                <div class="row">
                                    <div class="col-8 offset-2 mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-8 mt-5">
                                                <p>Gather your first ratings and reviews by promoting your course
                                                    through social media and your professional networks.</p>
                                                <p>Your course will be discoverable in our marketplace where you earn
                                                    revenue from each paid enrollment.</p>
                                                <p><b>How we help you</b></p>
                                                <p>Our custom coupon tool lets you offer enrollment incentives while our
                                                    global promotions drive traffic to courses. There’s even more
                                                    opportunity for courses chosen for Udemy Business.</p>
                                            </div>
                                            <div class="col-4">
                                                <img src="img/online-education.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- firth section -->
                    <div class="col-12 mt-5 mb-5 text-center">
                        <div class="row">
                            <div class="col-8 offset-2">
                                <div class="row">
                                    <div class="col-12">
                                        <h1><b> Become an instructor today</b></h1>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <h6>Join one of the indian largest online learning marketplaces.</h6>
                                    </div>
                                    <div class="col-6 mt-2 offset-3">
                                        <button class="btn btn-primary w-100">Get Started</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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