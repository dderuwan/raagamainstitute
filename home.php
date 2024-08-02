<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Vaathi Home</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <section id="header">
        <?php
        require "header.php";
        ?>

        <?php
        require "header2.php";
        ?>
    </section>

    <div class="col-12 container-home">
        <div class="row">
            <div class="col-6 home-topic">
                <h1>RaagamaInstitute</h1>
                <h4>A Brain Bridge Powered by Globle Tech Chain</h4>
            </div>

            <div class="col-6">
                <div id="carouselExampleSlidesOnly" class="mx-0 carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/student-sharing-her-knowledge-with-her-colleagues.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/graduation-take-black-yellow-tassel-front-bokeh-blurry-background.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/young-students-studying-with-laptop-books.jpg" class="d-block w-100"
                                alt="...">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 popular">
        <div class="row popular-topic">
            <h1>Our Popular Courses</h1>
        </div>

        <div class="row courses-p">
            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/246154_d8b0_3-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Web Design</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/752950_b773-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">GitHub Ultimate</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/919872_ed54_6-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Android Java</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/1561458_7f3b-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CSS Styles</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/1208228_d61c_4-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Color Effects</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/1253188_58f7_2-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">The Complete iOS</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- notice board -->
    <div class="col-12 my-4">
        <div class="row">

            <div class="col-4 notice" style="margin-bottom: 10px;margin-top: 10px; ">
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
            </div>

            <!-- Library -->
            <div class="col-4 ">
                <div class="row">
                    <div class="col-12 library-container mb-1"
                        style="margin-bottom: 20px;margin-top: 20px;width: 95%;margin-left: 20px;">
                        <div class="col-12">
                            <h2>Library</h2>
                        </div>

                        <div class="col-12 ddd">
                            <img class="library" src="./images/R.png" alt="">
                        </div>
                    </div>

                    <div class="col-12 mt-1 library-container"
                        style="margin-bottom: 20px;margin-top: 30px;width: 95%;margin-left: 20px;">
                        <div class="col-12">
                            <h2>Assignments</h2>
                        </div>

                        <div class="col-12 ddd">
                            <img class="library" src="./images/Assignment.png" alt="">
                        </div>
                    </div>
                </div>

            </div>

            <!-- Process -->
            <div class="col-4  process-container">
                <div class="row">
                    <div class="col-12 quick-container"
                        style="margin-bottom: 20px;margin-top: 20px;width: 95%;margin-left: 10px;">
                        <div class="col-12">
                            <h2>Quick Access</h2>
                        </div>

                        <div class="col-12 quick my-4">
                            <img src="" alt="">
                            <img src="" alt="">
                            <img src="" alt="">
                        </div>
                    </div>

                    <div class="col-12 mt-2 quick-container"
                        style="margin-bottom: 20px;margin-top: 20px;width: 95%;margin-left: 10px;">
                        <div class="col-12">
                            <h2>In Progress</h2>
                        </div>

                        <div class="col-12 ppp">
                            <h1>5 Courses</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-12 popular">
        <div class="row popular-topic">
            <h1>Recent Courses</h1>
        </div>

        <div class="row">
            <div class="col-12 recent my-4">
                <h2>Newest</h2>
                <h2>Oldest</h2>
                <h2>Price High</h2>
                <h2>Price Low</h2>
                <h2>Overall Rating</h2>
                <h2>Most Viewed</h2>
            </div>
        </div>

        <div class="row courses-p">
            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 1rem;">
                    <img src="./images/python.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Web Design</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/japan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">GitHub Ultimate</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/programming.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Android Java</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/react.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CSS Styles</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/c.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Color Effects</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-4 col-lg-3 col-xl-2">
                <div class="card" style="width: 18rem;">
                    <img src="./images/1253188_58f7_2-300x225.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">The Complete iOS</h5>
                        <p class="card-text">Some quick examale text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
</body>

</html>