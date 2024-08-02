<?php
include ('./Databsase/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/v3_66.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <style>
        /* .header-row {
            margin-bottom: 20px;
        } */

        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Quicksand !important;
        }

        .btn-outline-primary {
            --bs-btn-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-border-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: rgba(44, 43, 103, 255) !important;
            --bs-btn-hover-border-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-focus-shadow-rgb: 13, 110, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: rgba(44, 43, 103, 255) !important;
            --bs-btn-active-border-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: rgba(44, 43, 103, 255) !important;
            --bs-gradient: none;
        }

        .toppart {
            height: 35px;
            width: 100%;
            background-color: #FFF;
            display: flex;
            align-items: center;
            justify-content: end;

        }

        .topicons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-right: 30px;
        }

        .topicons h6 {
            font-style: normal;
            font-weight: lighter;
            /* font-family: serif; */
        }

        .topicons i {
            color: rgba(44, 43, 103, 255);
        }

        .topicons i:hover {
            transform: scale(1.3);
            color: black;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .text-right {
            text-align: right;
        }

        .imagelogoheader {
            width: 100%;
            height: auto;
            display: block;
        }

        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
        }

        .nav-link {
            display: inline-block;
            padding: 10px 20px !important;
            margin: 0 0.125rem;
            border: none;
            border-radius: 0.375rem;
            color: rgba(44, 43, 103, 255);
            text-decoration: none;
            font-size: 17.5px;
            font-weight: 300;
        }

        .nav-link:hover {
            background-color: #e2e6ea;
            color: #0056b3;
            padding: 10px 20px;
        }

        .search-container {
            position: relative;
            display: flex;
            border-radius: 15px;
        }

        .search-input {
            padding: 10px 40px 10px 20px;
            border: 1px solid rgba(44, 43, 103, 255) !important;
            border-radius: 20px;
            outline: none;
            font-size: 16px;
            background: url('search-icon.svg') no-repeat;
            background-position: 10px center;
            background-size: 20px;
        }

        .search-input:focus {
            border-color: rgba(44, 43, 103, 255) !important;
        }

        .search-input::placeholder {
            color: #aaa;
        }

        .search-input:focus::placeholder {
            color: transparent;
        }

        @media (max-width: 768px) {
            .header-nav {
                flex-direction: column;
            }

            .nav-link {
                margin-bottom: 0.5rem;
                text-align: end;
            }

            .search-container {
                margin-bottom: 0.5rem;
                border-radius: 15px;
            }
        }

        .offcanvas-header {
            padding: 1rem;
        }

        .offcanvas-body {
            padding: 1rem;
        }

        .offcanvas-title {
            font-size: 1.25rem;
        }

        .custom-login-button {
            width: auto;
            margin-right: 10px;
        }

        .container {
            width: 100%;
            overflow-x: hidden;
        }

        .container-fluid-main {
            width: 100%;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 15px;
        }

        .logo {
            height: auto;
            width: 100%;
        }

        .search-input {
            flex-grow: 1;
            border-radius: 20px;
            padding: 8px 10px;
            height: 40px;
        }

        .search-btn {
            margin-left: -45px;
        }

        .btn-info {
            height: 40px;
            /* Adjust as needed */
            color: white;
            --bs-btn-bg: rgba(44, 43, 103, 255) !important;
            --bs-btn-border-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-hover-border-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-active-bg: rgba(44, 43, 103, 255) !important;
            --bs-btn-active-border-color: rgba(44, 43, 103, 255) !important;
            --bs-btn-disabled-bg: rgba(44, 43, 103, 255) !important;
            --bs-btn-disabled-border-color: rgba(44, 43, 103, 255) !important;
        }

        .btn-info {
            --bs-btn-hover-bg: rgba(44, 43, 103, 255) !important;
        }

        .btn.btn-info {
            background-color: white;
            color: black;
            /* Text color */
            border-color: white;
            /* Border color */
            border-color: rgba(44, 43, 103, 255) !important;
            border: 1px solid rgba(44, 43, 103, 255) !important;
        }

        #show-list {
            position: absolute;
            z-index: 999;
            width: 24%;
            background-color: #fff;

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navigation {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: end;
        }

        .nav-item {
            /* padding: 0 10px; */
            color: #000000;
            font-size: medium;
            text-decoration: none;
        }

        .search-icon:hover {
            color: white !important;
        }

        @media (max-width: 768px) {
            .container-fluid-main {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .imagelogoheader {
                display: none;
            }
        }

        @media (max-width: 1120px) {
            .search-container {
                display: none;
            }
        }

        @media (max-width: 768px) {

            .col-2,
            .col-8 {
                flex: 0 0 auto;
                width: auto;
            }

            .d-md-none {
                display: block;
            }

            .text-right {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .custom-login-button {
                width: auto;
                padding: 5px 10px;
            }
        }

        .nav-link.active {
            color: #FFF !important;
            background-color: rgba(44, 43, 103, 255);
            padding: 10px 20px;
        }

        .nav-link:hover {
            color: #0056b3;
        }

        @media (max-width: 768px) {
            .navigation {
                flex-direction: column;
            }

            .nav-item {
                margin: 5px 0;
            }
        }

        @media (max-width: 966px) and (min-width: 769px) {
            .about-us-nav-link {
                display: none;
            }

            .topicons-aboutus {
                display: inline-block !important;
            }
        }

        .floating {
            position: fixed;
            width: 60px !important;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .float-button {
            margin-top: 16px;
        }
    </style>

</head>

<body>

    <div class="toppart">
        <div class="topicons">
            <h6 style="font-weight: bold;color: rgba(44,43,103,255) !important; margin: 0px;">Find us on</h6>
            <a href="https://www.facebook.com/people/RaagamaInstitute/61556215625398/ "><i
                    class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/RaagamaInstitute_com/ "><i class="fa-brands fa-instagram"></i></a>
            <i class="fa-brands fa-twitter"></i>
            <a href="https://www.linkedin.com/company/RaagamaInstitute-com/"><i class="fa-brands fa-linkedin"></i></a>
            <i class="fa-brands fa-youtube"></i>
        </div>
        <div class="topicons-aboutus" style="display: none;margin-right: 20px;">
            <a href="aboutus.php" style="text-decoration: none;"> <span
                    style="font-size: 16px;font-weight: bold;color: rgba(44,43,103,255) !important;">About Us</span></a>
        </div>

    </div>

    <div class="container-fluid-main">
        <div class="row align-items-center justify-content-between">
            <!-- Logo -->
            <div class="col-md-2">
                <a href="index.php">
                    <img src="images/v3_66.png" class="img-fluid logo" />
                </a>
            </div>

            <!-- Search Box -->
            <div class="col-md-3" style="height: 40px;">
                <form action="allCourses.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control search-input"
                            placeholder="Search..." autocomplete="off" required>
                        <div class="input-group-append">
                            <button type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-1"
                                style="padding: 8px;border-top-left-radius: 0px !important;border-bottom-left-radius: 0px !important;">
                                <i class="bi bi-search search-icon"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="list-group" id="show-list"></div>
            </div>

            <!-- Navigation Links -->
            <div class="col-md-5" style="padding: 0px;">
                <nav>
                    <ul class="navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allCourses.php">Courses</a>
                        </li>
                        <li class="nav-item about-us-nav-link">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ContactUs.php">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Cart Icon and User Profile or Login Button -->
            <div class="col-md-2 text-right d-flex justify-content-end align-items-center gap-4">
                <a href="cart.php" class="btn btn-outline-primary position-relative">
                    <i class="bi bi-cart"></i>
                    <?php
                    if (isset($_SESSION['id'])) {
                        ?>
                        <?php
                        $studentId = $_SESSION['id'];
                        $SQLS = "SELECT COUNT(*) AS countStudent FROM `cart` WHERE student_id = $studentId";

                        $resultS = mysqli_query($connection, $SQLS);

                        $rowS = mysqli_fetch_array($resultS);
                        ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo $rowS['countStudent'] ?>
                        </span>
                        <?php
                    } else {
                        ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                        </span>
                        <?php
                    }
                    ?>
                </a>
                <?php if (isset($_SESSION['id'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item"
                                    href="student_dashboard/template/index.php?id=<?php echo $_SESSION['id']; ?>">Dashboard</a>
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <button class="btn btn-primary" id="loginButtonDesktop"
                        style="background-color: rgba(44, 43, 103, 255) !important;border: none;padding: 10px 15px;">Login</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center justify-content-between header-row">
            <!-- Side Drawer Button -->
            <div class="col-2 d-md-none">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    style="background-color: rgba(44, 43, 103, 255) !important;border: none;padding: 10px 15px;">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Logo -->
            <div class="col-7 col-md-2 mx-auto text-center">
                <a href="index.php">
                    <img src="images/v3_66.png" class="img-fluid imagelogoheader" />
                </a>
            </div>

            <!-- Login Button -->
            <div class="col-2 text-right d-md-none">





                <!-- Cart Icon and User Profile or Login Button for the mobile responsive -->
                <div class="col-md-2 text-right d-flex justify-content-end align-items-center gap-4">
                    <?php if (isset($_SESSION['id'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="student_dashboard/template/index.php">Dashboard</a></li>
                                <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <button class="btn btn-primary" id="loginButtonMobile"
                            style="background-color: rgba(44, 43, 103, 255) !important; border: none;padding: 10px 15px;">Login</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>








        <div class="col-1 text-right d-md-none">
        </div>
    </div>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allCourses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    </div>

    <a href="https://api.whatsapp.com/send?phone=012345678&text=Hello%21%20." class="floating" target="_blank">
        <i class="fa fa-whatsapp float-button"></i>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginBtnDesktop = document.getElementById('loginButtonDesktop');
            const loginBtnMobile = document.getElementById('loginButtonMobile');

            [loginBtnDesktop, loginBtnMobile].forEach(btn => {
                btn.addEventListener('click', function () {
                    Swal.fire({
                        title: 'Login as',
                        html: `
                            <div style="margin: 1rem 0;">
                                <a href="Teacher_Signin.php" class="col-12 col-md-4 mt-2 mx-1 mt-md-0 btn btn-info" style=" color: black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';" >Teacher</a>
                                <a href="Student_Signin.php" class="col-12 col-md-4 mt-2 mt-md-0 btn btn-primary">Student</a>
                            </div>`,
                        showConfirmButton: false,
                    });
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll('.nav-link');
            const currentUrl = window.location.pathname.split('/').pop();

            links.forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="search_script.js"></script>


</body>

</html>