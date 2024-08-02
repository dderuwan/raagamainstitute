<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>RaagamaInstitute - Student</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="icon" href="images/v3_66.png" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- Left Side Navbar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <?php
            require "sidenav.php";
            ?>
        </nav>

        <!-- Upper Navbar -->
        <!-- Upper Navbar -->
        <?php
        require "studentheader.php";
        ?>

        <!-- Inside The Dashboard -->
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Pink Background -->

                <!-- Transactions and Project -->
                <div class="row">


                    <div class="col-md-12 grid-margin stretch-card card">
                        <div class="row">
                            <!-- my cources -->
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">My Payment History</h4>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-1">
                                        <div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Cource</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Duration</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Java Cource</td>
                                                        <td>Java Basic Understand</td>
                                                        <td>4 Months</td>
                                                        <td class="text-success">Paid</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Java Cource</td>
                                                        <td>Java Basic Understand</td>
                                                        <td>4 Months</td>
                                                        <td class="text-danger">Fail</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Java Cource</td>
                                                        <td>Java Basic Understand</td>
                                                        <td>4 Months</td>
                                                        <td class="text-success">Paid</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>

                </div>



            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php
            require "studentfooter.php";
            ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>