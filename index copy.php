<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Vaathi Home</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        .swiper-container {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .swiper-wrapper {
            align-items: center;
            /* Center slides vertically */
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            /* Center slides horizontally */
        }

        .card {
            display: flex;
            /* Ensures the card contents are flex items */
            margin: 0 auto;
            /* Center card in the slide */
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            height: 300px;
            /* Fixed height for the card */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            border-top-left-radius: 16px;
            /* Match card border-radius */
            height: 100%;
            /* Full height of the card */
            width: auto;
            /* Width can be auto since height is fixed */
            object-fit: cover;
            /* Cover the height of the parent, may cut off the image */
        }

        .card-body {
            padding: 15px;
            /* Add some padding inside the card body */
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Center content vertically */
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .card-text {
            color: #666;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 5px 10px;
            /* Smaller padding to reduce button size */
            font-size: 0.8rem;
            /* Smaller font size */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .featured-course .card {
            width: calc(100% - 30px);
            /* Adjust width as needed, with some padding */
            max-width: none;
            /* Override max-width if set previously */
            margin: 15px;
            height: auto;
            /* Let the height be determined by the content */
        }

        /* Ensure this class is added to your image element */
        .featured-card-img-top {
            height: 400px;
            /* You may adjust this as needed */
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .featured-course .card {
                width: calc(100% - 5px);
                /* Smaller padding on smaller screens */
            }
        }

        @media (min-width: 768px) {
            .main-content {
                padding-left: 30px;
                /* increase padding for larger screens */
                padding-right: 30px;
                /* increase padding for larger screens */
            }
        }

        @media (min-width: 992px) {
            .main-content {
                padding-left: 50px;
                /* even more padding for larger screens */
                padding-right: 50px;
                /* even more padding for larger screens */
            }
        }

        @media (min-width: 1200px) {
            .main-content {
                padding-left: 100px;
                /* more padding for the largest screens */
                padding-right: 100px;
                /* more padding for the largest screens */
            }
        }


        .main-content {
            padding-left: 15px;
            padding-right: 15px;
            margin-left: auto;
            margin-right: auto;
            max-width: 1800px;
        }
    </style>
</head>

<body>

    <section id="header">
        <?php
        require "header.php";
        ?>
    </section>
    <div class="container">
        <div class="main-content">
            <div class="col-12 container-home">
                <div class="row">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="150">
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img src="./images/RaagamaInstitutestudent.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Login or Signup</h5>
                                    <p>Click below to login or signup to access more features.</p>
                                    <a href="Student_Signin.php" class="btn btn-light w-25 mr-2" role="button">Login</a>
                                    <a href="Student_Register.php" class="btn btn-info w-25 mr-2"
                                        role="button">Signup</a>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="./images/smrtvaathi teacher.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Login or Signup</h5>
                                    <p>Click below to login or signup to access more features.</p>
                                    <a href="Teacher_Signin.php" class="btn btn-info w-25 mr-2" role="button">Login</a>
                                    <a href="Teacher_Register.php" class="btn btn-light w-25 mr-2"
                                        role="button">Signup</a>
                                </div>
                            </div>

                        </div>

                        <!-- Carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>

                </div>
            </div>



            <div class="col-12 popular">
                <div class="row popular-topic">
                    <h1 class="text-center mb-5">Our Popular Courses</h1>
                </div>

                <div class="swiper-container">
                    <!-- Featured Course -->
                    <div class="swiper-slide featured-course">
                        <div class="card featured-card">
                            <div class="row g-0"> <!-- g-0 to remove any gap between columns -->
                                <div class="col-6">
                                    <img src="./images/1561458_7f3b-300x225.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="col-6">
                                    <div class="card-body">
                                        <h5 class="card-title">CSS Styles</h5>
                                        <p class="card-text">Explore advanced CSS techniques and create stunning designs
                                            with animations and transitions.</p>
                                        <a href="#" class="btn btn-primary">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <!-- Card 1 -->
                            <div class="card" style="width: 18rem;">
                                <img src="./images/246154_d8b0_3-300x225.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Web Design</h5>
                                    <p class="card-text">Learn the fundamentals of web design and create stunning
                                        websites with
                                        HTML, CSS, and JavaScript.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/752950_b773-300x225.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">GitHub Ultimate</h5>
                                    <p class="card-text">Master GitHub with techniques for version control,
                                        collaboration, and
                                        project management.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/919872_ed54_6-300x225.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Android Java</h5>
                                    <p class="card-text">Build powerful Android applications using Java programming
                                        language and
                                        Android SDK.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/1561458_7f3b-300x225.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">CSS Styles</h5>
                                    <p class="card-text">Explore advanced CSS techniques and create stunning designs
                                        with
                                        animations and transitions.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/1561458_7f3b-300x225.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">CSS Styles</h5>
                                    <p class="card-text">Explore advanced CSS techniques and create stunning designs
                                        with
                                        animations and transitions.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/1561458_7f3b-300x225.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">CSS Styles</h5>
                                    <p class="card-text">Explore advanced CSS techniques and create stunning designs
                                        with
                                        animations and transitions.</p>
                                    <a href="#" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other cards -->
                    </div>

                </div>
            </div>
            <!-- notice board -->

            <div class="col-12 my-4">
                <div class="row">

                    <!-- <div class="col-12 col-md-4 notice">
                    <div class="row mx-2">
                        <div class="col-12">
                            <h3>Upcomming Events</h3>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Event</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">01 Jan</th>
                                        <td>Full Moon Poya Day</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">21 Jan</th>
                                        <td>Deepawali Event</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">30 Jan</th>
                                        <td colspan="2">Larry the Bird</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10 Feb</th>
                                        <td colspan="2">Colours Event</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">18 Feb</th>
                                        <td colspan="2">Sport Event</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->

                    <!-- Library -->
                    <!-- <div class="col-12 col-md-4 access">
                    <div class="row">
                        <div class="col-12 library-container mb-1">
                            <div class="col-12">
                                <h2>Library</h2>
                            </div>

                            <div class="col-12 ddd">
                                <img class="library" src="./images/R.png" alt="">
                            </div>
                        </div>

                        <div class="col-12 mt-1 library-container">
                            <div class="col-12">
                                <h2>Assignments</h2>
                            </div>

                            <div class="col-12 ddd">
                                <img class="library" src="./images/Assignment.png" alt="">
                            </div>
                        </div>
                    </div>

                </div> -->

                    <!-- Process -->
                    <!-- <div class="col-12 col-md-4  process-container">
                    <div class="row">
                        <div class="col-12 quick-container">
                            <div class="col-12">
                                <h2>Quick Access</h2>
                            </div>

                            <div class="col-12 quick my-4">
                                <img src="" alt="">
                                <img src="" alt="">
                                <img src="" alt="">
                            </div>
                        </div>

                        <div class="col-12 mt-2 quick-container">
                            <div class="col-12">
                                <h2>In Progress</h2>
                            </div>

                            <div class="col-12 ppp">
                                <h1>5 Courses</h1>
                            </div>
                        </div>
                    </div>

                </div> -->
                </div>
            </div>

            <div class="col-12 popular">
                <div class="row popular-topic">
                    <h1 class="text-center mb-5">Our Recent Courses</h1>
                </div>

                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/python.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Web Design</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/japan.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">GitHub Ultimate</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/programming.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Android Java</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make up the bulk of
                                        the card's content.</p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/python.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Web Design</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/c.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Color Effects</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make up the bulk of
                                        the card's content.</p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 -->
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <img src="./images/japan.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">GitHub Ultimate</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make up the bulk of
                                        the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other cards -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section id="footer">
        <?php
        require "footer.php";
        ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>
        var swiperPopular = new Swiper('.popular .swiper-container', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 10,
            loop: true,
            preloadImages: false,
            lazy: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 25
                    // },
                    // 1200: {
                    //     slidesPerView: 5,
                    //     spaceBetween: 35
                    // }
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            },
        });
    </script>
    <script>
        var swiperRecent = new Swiper('.recent .swiper-container', {
            slidesPerView: 1, // default to 1 slide per view
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // when window width is >= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                // when window width is >= 1024px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25
                }
            }
        });
    </script>





</body>

</html>