<?php
session_start();
include ('../../Databsase/connection.php');

if (!isset($_SESSION["id"])) {
  header("location:../../Student_Signin.php");
}

$studentID = $_SESSION['id'];
?>
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
  <link rel="icon" href="../images/v3_66.png" />
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

  <script>
    function checkCourse(id) {
      window.location.href = '../../insideCourse.php?id=' + id;
    }
  </script>

  <style>
    .footer {
      background-color: black;
    }

    .custom-card {
      background-color: #ffffff;
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .custom-card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transform: scale(1.01);
      transition: 300ms;
    }

    .custom-cardstd:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transform: scale(1.01);
      transition: 300ms;
    }

    .custom-card .card-body {
      padding: 20px;
    }

    .custom-card h3 {
      font-size: 24px;
      color: #002B45;
      margin-bottom: 5px;
    }

    .custom-card p {
      font-size: 14px;
      color: #6c757d;
    }

    .custom-card h6 {
      font-size: 14px;
      color: #6c757d;
      margin-top: 10px;
    }

    .icon-box-success {
      background-color: #55c16d;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .icon-item {
      color: #ffffff;
      font-size: 20px;
    }


    .custom-cardstd {
      background-color: #ffffff;
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }


    .custom-cardstd .card-body {
      padding: 20px;
    }

    .custom-cardstd h3 {
      font-size: 24px;
      color: #002B45;
      margin-bottom: 5px;
    }

    .custom-cardstd p {
      font-size: 14px;
      color: #6c757d;
    }

    .custom-cardstd h6 {
      font-size: 14px;
      color: #6c757d;
      margin-top: 10px;
    }

    .icon-box-success {
      background-color: #55c16d;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .icon-item {
      color: #DEE1FF;
      font-size: 20px;
    }

    .teacherBtn {
      background-color: white;
    }

    .teacherBtn:hover {
      background-color: #002B45;
      color: white;
      transform: scale(1.09);
      transition: 300ms;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- Left Side Navbar -->
    <nav style="background-color: #002B45;">
      <?php
      require "sidenav.php";
      ?>
    </nav>

    <!-- Inside The Dashboard -->
    <div class="main-panel">
      <div class="content-wrapper" style="background-color: white;">
        <!-- Pink Background -->

        <!-- Income and other details -->
        <div class="row">
          <!-- Number of courses -->
          <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <?php
                      $SQLCount = "SELECT COUNT(id) AS total FROM `payedstudent` WHERE `studentID` = $studentID";
                      $resultCount = mysqli_query($connection, $SQLCount);

                      if (mysqli_num_rows($resultCount) > 0) {
                        $rowCount = mysqli_fetch_array($resultCount);
                        ?>
                        <h3 class="mb-0"><?php echo $rowCount['total'] ?> Courses</h3>
                        <?php
                      } else {
                        ?>
                        <h3 class="mb-0">No Courses</h3>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success">
                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Number of Courses</h6>
              </div>
            </div>
          </div>


          <!-- Expences -->
          <!-- <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">$31.53</h3>
                      <p class="text-success ml-2 mb-0 font-weight-medium">
                        +3.5%
                      </p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success">
                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">
                  Expense current
                </h6>
              </div>
            </div>
          </div> -->
        </div>

        <!-- Transactions and Project -->
        <div class="row">
          <!-- Transaction History -->


          <div class="col-md-12 grid-margin stretch-card">
            <div class="card  custom-card">
              <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                  <h4 class="card-title mb-1">My Course</h4>
                  <p class="text-muted mb-1">Course data status</p>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="preview-list">
                      <?php
                      $SQL = "SELECT * FROM `payedstudent` WHERE `studentID` = $studentID";
                      $result = mysqli_query($connection, $SQL);
                      while ($row = mysqli_fetch_array($result)) {

                        $courseOptionID = $row['course_optionsID'];

                        $courseOptionSQL = "SELECT * FROM `course_options` WHERE `id` = $courseOptionID";
                        $courseOptionResult = mysqli_query($connection, $courseOptionSQL);

                        $courseOptionRow = mysqli_fetch_array($courseOptionResult);
                        $courseID = $courseOptionRow['cou_id'];

                        $coursSQL = "SELECT * FROM `courses` WHERE id = $courseID";
                        $courseResult = mysqli_query($connection, $coursSQL);
                        $courseRow = mysqli_fetch_array($courseResult);

                        $image_path = $courseRow["imagePath"];
                        $image_path = str_replace('../course', '../../course', $image_path);
                        ?>
                        <div class="preview-item border-bottom" style="cursor: pointer;"
                          onclick="checkCourse(<?php echo $courseRow['id'] ?>)">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary">
                              <img src="<?php echo $image_path ?>" alt="">
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">
                                <?php echo $courseRow['course_title'] ?>
                              </h6>
                              <p class="text-muted mb-0">
                                <?php
                                $packageType = $row['packageType'];

                                if ($packageType == '1') {
                                  $packageName = 'Individual';
                                } elseif ($packageType == '2') {
                                  $packageName = 'Group';
                                } else {
                                  $packageName = 'Master';
                                }
                                ?>
                                <?php echo $courseRow['category'] . " | " . $courseRow['language'] . " | " . $packageName ?>
                              </p>
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">Published | 02 Jul 2024</p>
                              <p class="text-muted mb-0">
                                5 Sessions
                              </p>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Revenue</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$32123</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Sales</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$45850</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Purchase</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$2039</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

        <div class="row">
          <div class="col-12 grid-margin">
            <div class="card custom-cardstd">
              <div class="card-body">
                <h4 class="card-title">Course Details</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <!-- <th>
                          <div class="form-check form-check-muted m-0">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" />
                            </label>
                          </div>
                        </th> -->
                        <th>Cource Name</th>
                        <th>Instructor</th>
                        <th>Email</th>
                        <th>Cource fee</th>
                        <th>Payment Mode</th>
                        <th>Start Date</th>
                        <!-- <th> Payment Status </th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $NewSQL = "SELECT * FROM `payedstudent` WHERE studentID = $studentID";
                      $NewResult = mysqli_query($connection, $NewSQL);
                      if (mysqli_num_rows($NewResult) > 0) {
                        while ($NewRow = mysqli_fetch_array($NewResult)) {

                          $CourseOpID = $NewRow['course_optionsID'];

                          $NewCourseOpSQL = "SELECT * FROM `course_options` WHERE id = $CourseOpID";
                          $NewCourseOpResult = mysqli_query($connection, $NewCourseOpSQL);
                          $NewCourseOpRow = mysqli_fetch_array($NewCourseOpResult);

                          $courseID = $NewCourseOpRow['cou_id'];

                          $NewCourseSQL = "SELECT * FROM `courses` WHERE id = $courseID";
                          $NewCourseResult = mysqli_query($connection, $NewCourseSQL);
                          $NewCourseRow = mysqli_fetch_array($NewCourseResult);
                          ?>
                          <tr>
                            <!-- <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" />
                                </label>
                              </div>
                            </td> -->
                            <td>
                              <!-- <img src="assets/images/faces/face1.jpg" alt="image" /> -->
                              <span class="pl-2"><?php echo $NewCourseRow['course_title'] ?></span>
                            </td>
                            <td><?php echo $NewCourseRow['instructor_name'] ?></td>
                            <td><button style="padding: 10px; border-radius: 15px;" class="teacherBtn" data-toggle="modal"
                                data-target="#myModal"><?php echo $NewCourseRow['instructor_email'] ?></button></td>
                            <td><?php echo $NewCourseOpRow['price'] ?></td>
                            <td>Credit card</td>
                            <td>06 Jun 2024</td>

                            <!-- <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td> -->
                          </tr>
                          <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- popup for the Course Details -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">

              <form action="../../handlers/messageHandler.php" onsubmit="setStartedTimenew()" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                  <h1 style="font-size: 24px;">Send Messege</h1>
                </div>

                <div class="modal-body">
                  <label for="TopicName">Topic:</label>
                  <input name="TopicName" type="text" class="form-control"
                    style="background-color: white; color: black;" placeholder="Type Here" require>
                  <label for="message" style="padding-top: 10px;">Message:</label>
                  <textarea name="message" class="form-control" style="background-color: white; color: black;"
                    placeholder="Type Here" require></textarea>
                  <input type="hidden" id="newstartedTime" name="newstartedTime">
                </div>
                <div class="modal-footer">
                  <button type="submit" name="NewsendMessage" class="btn btn-success">Send Messege</button>
                </div>
              </form>

            </div>

          </div>
        </div>

        <script>
          // current time for the Course Details popup 
          function setStartedTimenew() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var day = ("0" + now.getDate()).slice(-2);
            var hours = ("0" + now.getHours()).slice(-2);
            var minutes = ("0" + now.getMinutes()).slice(-2);
            var seconds = ("0" + now.getSeconds()).slice(-2);
            var formattedDateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
            document.getElementById('newstartedTime').value = formattedDateTime;
            console.log("newstartedTime:", formattedDateTime); // Add this line for debugging
          }
        </script>

        <div class="row">
          <!-- <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                  <h4 class="card-title">Messages</h4>
                  <p class="text-muted mb-1 small">View all</p>
                </div>
                <div class="preview-list">
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
                    </div>
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">Leonard</h6>
                          <p class="text-muted text-small">5 minutes ago</p>
                        </div>
                        <p class="text-muted">
                          Well, it seems to be working now.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face8.jpg" alt="image" class="rounded-circle" />
                    </div>
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">Luella Mills</h6>
                          <p class="text-muted text-small">
                            10 Minutes Ago
                          </p>
                        </div>
                        <p class="text-muted">
                          Well, it seems to be working now.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face9.jpg" alt="image" class="rounded-circle" />
                    </div>
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">Ethel Kelly</h6>
                          <p class="text-muted text-small">2 Hours Ago</p>
                        </div>
                        <p class="text-muted">Please review the tickets</p>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face11.jpg" alt="image" class="rounded-circle" />
                    </div>
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">Herman May</h6>
                          <p class="text-muted text-small">4 Hours Ago</p>
                        </div>
                        <p class="text-muted">
                          Thanks a lot. It was easy to fix it .
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Portfolio Slide</h4>
                <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                  <div class="item">
                    <img src="assets/images/dashboard/Rectangle.jpg" alt="" />
                  </div>
                  <div class="item">
                    <img src="assets/images/dashboard/Img_5.jpg" alt="" />
                  </div>
                  <div class="item">
                    <img src="assets/images/dashboard/img_6.jpg" alt="" />
                  </div>
                </div>
                <div class="d-flex py-4">
                  <div class="preview-list w-100">
                    <div class="preview-item p-0">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face12.jpg" class="rounded-circle" alt="" />
                      </div>
                      <div class="preview-item-content d-flex flex-grow">
                        <div class="flex-grow">
                          <div class="d-flex d-md-block d-xl-flex justify-content-between">
                            <h6 class="preview-subject">CeeCee Bass</h6>
                            <p class="text-muted text-small">4 Hours Ago</p>
                          </div>
                          <p class="text-muted">
                            Well, it seems to be working now.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="text-muted">Well, it seems to be working now.</p>
                <div class="progress progress-md portfolio-progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-md-12 col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">To do list</h4>
                <div class="add-items d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="enter task.." />
                  <button class="add btn btn-primary todo-list-add-btn">
                    Add
                  </button>
                </div>
                <div class="list-wrapper">
                  <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                    <li>
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" /> Create
                          invoice
                        </label>
                      </div>
                      <i class="remove mdi mdi-close-box"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" /> Meeting
                          with Alita
                        </label>
                      </div>
                      <i class="remove mdi mdi-close-box"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked />
                          Prepare for presentation
                        </label>
                      </div>
                      <i class="remove mdi mdi-close-box"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" /> Plan
                          weekend outing
                        </label>
                      </div>
                      <i class="remove mdi mdi-close-box"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" /> Pick up
                          kids from school
                        </label>
                      </div>
                      <i class="remove mdi mdi-close-box"></i>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="row">
          <!-- <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Visitors by Countries</h4>
                <div class="row">
                  <div class="col-md-5">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-us"></i>
                            </td>
                            <td>USA</td>
                            <td class="text-right">1500</td>
                            <td class="text-right font-weight-medium">
                              56.35%
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-de"></i>
                            </td>
                            <td>Germany</td>
                            <td class="text-right">800</td>
                            <td class="text-right font-weight-medium">
                              33.25%
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-au"></i>
                            </td>
                            <td>Australia</td>
                            <td class="text-right">760</td>
                            <td class="text-right font-weight-medium">
                              15.45%
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-gb"></i>
                            </td>
                            <td>United Kingdom</td>
                            <td class="text-right">450</td>
                            <td class="text-right font-weight-medium">
                              25.00%
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-ro"></i>
                            </td>
                            <td>Romania</td>
                            <td class="text-right">620</td>
                            <td class="text-right font-weight-medium">
                              10.25%
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <i class="flag-icon flag-icon-br"></i>
                            </td>
                            <td>Brasil</td>
                            <td class="text-right">230</td>
                            <td class="text-right font-weight-medium">
                              75.00%
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div id="audience-map" class="vector-map" style="background-color: #002b45"></div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->

      <!-- partial -->
    </div>

    <!-- main-panel ends -->
  </div>
  <footer class="footer">
    <?php
    require "studentfooter.php";
    ?>
  </footer>

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