<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Footer</title>
    <style>
        /*************FOOTER START*****************/

        body {
            font-family: Quicksand !important;
        }

        ul {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }

        .footer-section {
            background: #151414;
            position: relative;
            color: #878787;
        }

        .footer-cta {
            border-bottom: 1px solid #373636;
        }

        .single-cta i {
            color: #036fc1;
            font-size: 30px;
            margin-right: 15px;
            align-self: flex-start;
            margin-top: 5px;
        }

        .cta-text h4 {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .cta-text span {
            color: #757575;
            font-size: 15px;
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer-logo img {
            max-width: 300px;
        }

        .footer-text p {
            margin-bottom: 14px;
            margin-top: 14px;
            font-size: 14px;
            color: #7e7e7e;
            line-height: 28px;
        }

        .footer-social-icon span {
            color: #fff;
            display: block;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-social-icon a {
            color: #fff;
            font-size: 16px;
            margin-right: 15px;
        }

        .footer-social-icon i {
            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 38px;
            border-radius: 50%;
        }

        .facebook-bg {
            background: #3B5998;
        }

        .instagram-bg {
            background: #e1306c;
        }

        .twitter-bg {
            background: #55ACEE;
        }

        .linkedin-bg {
            background: #0077B5;
        }

        .youtube-bg {
            background: #CD201F;
        }

        .useFullLinks {
            display: flex;
            justify-content: center;
        }

        .footer-widget-heading h3 {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 40px;
            position: relative;
        }

        .footer-widget-heading h3::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -15px;
            height: 2px;
            width: 50px;
            background: #036fc1;
        }

        .footer-widget ul li {
            margin-bottom: 12px;
        }

        .footer-widget ul li a:hover {
            color: #036fc1;
        }

        .footer-widget ul li a {
            color: #878787;
            text-transform: capitalize;
        }

        .subscribe-form {
            position: relative;
        }

        .subscribe-form input {
            width: 80%;
            padding: 14px 28px;
            background: #2E2E2E;
            border: 1px solid #2E2E2E;
            color: #fff;
        }

        .subscribe-form input:focus {
            outline: none;
            border-color: #2E2E2E;
        }

        .subscribe-form button {
            height: 53px;
            background: #036fc1;
            padding: 13px 20px;
            border: 1px solid #036fc1;
            color: #fff;
            font-size: 22px;
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        .input-container input {
            flex: 1;
            border-radius: 4px 0 0 4px;
        }

        .input-container input:focus {
            outline: none;
            border-color: transparent;
        }

        .input-container button {
            padding: 10px;
            border: 1px solid #036fc1;
            background: #036fc1;
            border-radius: 0 4px 4px 0;
            color: white;
            font-size: 18px;
        }

        .copyright-area {
            background: #202020;
            padding: 25px 0;
        }

        .copyright-text p {
            margin: 0;
            font-size: 14px;
            color: #878787;
        }

        .copyright-text p a {
            color: #036fc1;
        }

        .footer-menu li {
            display: inline-block;
            margin-left: 20px;
        }

        .footer-menu li a {
            font-size: 14px;
            color: #878787;
        }

        .footer-menu li:hover a {
            color: #036fc1;
        }

        /*************MEDIA QUERIES START*****************/
        /*************************************************/

        /* Mobile Styles (320px — 480px) */
        @media (max-width: 480px) {
            .single-cta {
                margin-bottom: 20px;
            }

            .custom-margin-findus {
                margin-left: 7px;
            }

            .mailus {
                margin: 0px !important;
            }

            .footer-social-icon {
                margin-bottom: 50px;
            }

            .useFullLinks {
                display: block;
                margin-bottom: 50px;
            }
        }

        /* Tablet Styles (481px — 768px) */
        @media (min-width: 481px) and (max-width: 768px) {
            .single-cta {
                margin-bottom: 20px;
            }

            .custom-margin-findus {
                margin-left: 7px;
            }

            .mailus {
                margin: 0px !important;
            }

            .footer-social-icon {
                margin-bottom: 50px;
            }

            .useFullLinks {
                display: block;
                margin-bottom: 50px;
            }
        }

        /* Laptop Styles (769px — 1024px) */
        @media (min-width: 769px) and (max-width: 1024px) {
            .footer-social-icon {
                margin-bottom: 50px;
            }

            .useFullLinks {
                display: block;
            }

            .callUsContainer {
                display: flex;
                justify-content: center;
            }

            .mailUsContainer {
                display: flex;
                justify-content: flex-end;
            }
        }

        @media (min-width: 1025px) {
            .findUsContainer {
                display: flex;
                justify-content: flex-start;
            }

            .callUsContainer {
                display: flex;
                justify-content: center;
            }

            .mailUsContainer {
                display: flex;
                justify-content: flex-end;
            }
        }

        /*************MEDIA QUERIES END*****************/
        /*************************************************/

        /*************FOOTER END*****************/
    </style>
</head>

<body>
    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-30 findUsContainer">
                        <div class="single-cta d-flex align-items-start">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text custom-margin-findus">
                                <h4>Find us</h4>
                                <span>Address : 235, 2nd Floor, Orex City Complex, Ekala, Srilanka.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30 callUsContainer">
                        <div class="single-cta d-flex align-items-start">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>Hot line : 0094 77 1115840</span></br>
                                <span>Land line : 117220201</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30 mailUsContainer">
                        <div class="single-cta d-flex align-items-start mailus">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>info@RaagamaInstitute.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="images/v3_66.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>RaagamaInstitute.com learning platform offers interactive education delivery with
                                    customizable modules and intuitive interfaces, enriching learning experiences for
                                    all users.</p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="https://www.facebook.com/people/RaagamaInstitute/61556215625398/ "><i
                                        class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="https://www.instagram.com/RaagamaInstitute_com/ "><i
                                        class="fab fa-instagram instagram-bg"></i></a>
                                <!-- <a href="#"><i class="fab fa-twitter twitter-bg"></i></a> -->
                                <a href="https://www.linkedin.com/company/RaagamaInstitute-com/"><i
                                        class="fab fa-linkedin linkedin-bg"></i></a>
                                <a href="#"><i class="fab fa-youtube youtube-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30 useFullLinks">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="allCourses.php">Courses</a></li>
                                <li><a href="aboutus.php">About us</a></li>
                                <li><a href="ContactUs.php">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Subscribe to our newsletter to get our news & discounts delivered to you.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <div class="input-container">
                                        <input type="text" placeholder="Email Address">
                                        <button type="submit" style="text-align: center;"><i
                                                class="fab fa-telegram-plane"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2024, All Right Reserved. Built by <a
                                    href="https://esupportlive.com/">eSupport Technologies.</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="allCourses.php">Courses</a></li>
                                <li><a href="aboutus.php">About us</a></li>
                                <li><a href="ContactUs.php">Contact us</a></li>
                                <li><a href="privacy.php">Privacy Policy</a></li>
                                <li><a href="terms.php">Terms & Conditions</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>