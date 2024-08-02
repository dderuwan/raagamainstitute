<?php
session_start();
include ('../../Databsase/connection.php');

if (!isset($_SESSION["id"])) {
  header("location:../../Teacher_Signin.php");
  exit();
}

$instructor_id = $_SESSION['id'];
$query = "SELECT * FROM courses WHERE instructor_id = ? ORDER BY id DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param('i', $instructor_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
  die("Query failed: " . $connection->error);
}

$teacherID = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>RaagamaInstitute - Instructor</title>
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
    function updateDateTime() {
      const now = new Date();
      const options = {
        year: 'numeric',
        month: 'short',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
      };
      const formattedDateTime = now.toLocaleString('en-US', options).replace(',', '');

      document.getElementById('current-date-time').innerText = formattedDateTime;
      document.getElementById('current-date-timeY').innerText = formattedDateTime;
    }

    window.onload = updateDateTime;
  </script>

  <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css' rel='stylesheet' /> -->



  <style>
    .custom-card {
      background-color: #ffffff;
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .custom-card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transform: scale(1.05);
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


    .custom-cardstd.card-body {
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
      color: #ffffff;
      font-size: 20px;
    }

    .card-body {
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    #calendar {
      flex: 1;
      max-width: 100%;
      height: 100%;
      /* Adjust the height as needed */
      margin: 0 auto;
    }

    .course-list-container {
      max-height: 400px;
      /* Adjust the height as needed */
      overflow-y: auto;
    }


    .course-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      /* Adjust gap between courses as needed */
    }

    .course-item {
      display: flex;
      align-items: center;

      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 8px;
      transition: box-shadow 0.3s;
      cursor: pointer;
    }

    .course-item:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .course-icon {
      flex-shrink: 0;
    }

    .course-image {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 4px;
    }

    .course-details {
      margin-left: auto;
      /* Align details to the right with a margin */
      text-align: right;
      /* Align text to the right */

    }

    .course-title {
      margin: 0;
      color: #333;
      font-size: 1rem;
    }

    .course-category {
      font-size: 0.9rem;
      color: #666;
    }

    #message {
      position: absolute;
      display: none;
      background-color: #FEF8DD;
      color: black;
      padding: 2px 10px;
      border-radius: 5px;
      pointer-events: none;
      font-size: 12px;
    }
  </style>

  <script>
    function showMessage(msg) {
      var messageElement = document.getElementById('message');
      messageElement.innerHTML = msg;
      messageElement.style.display = 'block';

      // Position the message near the cursor
      document.addEventListener('mousemove', moveMessage);
    }

    function hideMessage() {
      var messageElement = document.getElementById('message');
      messageElement.style.display = 'none';

      // Remove the event listener when hiding the message
      document.removeEventListener('mousemove', moveMessage);
    }

    function moveMessage(event) {
      var messageElement = document.getElementById('message');
      var xOffset = -850; // Offset from cursor along X-axis
      var yOffset = -200; // Offset from cursor along Y-axis

      messageElement.style.left = (event.pageX + xOffset) + 'px';
      messageElement.style.top = (event.pageY + yOffset) + 'px';
    }
  </script>
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
      <div class="content-wrapper" style="background-color: #F9F6F1;">
        <!-- Pink Background -->

        <!-- Income and other details -->
        <div class="row">
          <!-- Number of students -->
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <?php
                      $SQLStu = "SELECT COUNT(*) AS NumStudents FROM `payedstudent` WHERE instructor_ID = $teacherID";
                      $ResultStu = mysqli_query($connection, $SQLStu);
                      $RowStu = mysqli_fetch_array($ResultStu);
                      ?>
                      <h3 class="mb-0"><?php echo $RowStu['NumStudents'] ?> Students</h3>
                      <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success">
                      <span class="mdi mdi-arrow-top-right icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Number of Students</h6>
              </div>
            </div>
          </div>



          <!-- Number of courses -->
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <?php
                      $SQLCount = "SELECT COUNT(id) AS total FROM `courses` WHERE instructor_id = $teacherID";
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
                      <p class="text-success ml-2 mb-0 font-weight-medium"></p>
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


          <!-- Daily Income -->
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <?php
                      $TotalIncome = 0;

                      $SQL = "SELECT * FROM `payedstudent` WHERE instructor_id = $teacherID";
                      $Result = mysqli_query($connection, $SQL);

                      if (mysqli_num_rows($Result) > 0) {
                        while ($Row = mysqli_fetch_array($Result)) {

                          $PriceO = $Row['price'];

                          $TotalIncome = $TotalIncome + $PriceO;
                        }
                      } else {
                        $TotalIncome = 0;
                      }
                      ?>
                      <h3 class="mb-0"><?php echo "RS " . $TotalIncome ?></h3>
                      <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-danger">
                      <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Income</h6>
              </div>
            </div>
          </div>


          <!-- Expences -->
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">Rs 0</h3>
                      <p class="text-success ml-2 mb-0 font-weight-medium">
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
                  Final Income
                </h6>
              </div>
            </div>
          </div>
        </div>

        <!-- Transactions and Project -->
        <div class="row">
          <!-- Transaction History -->
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card custom-card">
              <div class="card-body">
                <h4 class="card-title">Transaction History</h4>

                <!-- Pie Graph -->
                <canvas id="transaction-history" class="transaction-chart"></canvas>

                <div style="background-color: #002b45"
                  class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                  <div class="text-md-center text-xl-left">
                    <h6 class="mb-1" style="color: white">
                      Total Income From Courses
                    </h6>
                    <p class="text-muted mb-0">Updated : <span id="current-date-time"></span></p>
                  </div>
                  <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                    <h6 class="font-weight-bold mb-0" style="color: white">
                      LKR <?php echo $TotalIncome ?>
                    </h6>
                  </div>
                </div>

                <div style="background-color: #002b45"
                  class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                  <div class="text-md-center text-xl-left">
                    <h6 class="mb-1" style="color: white">
                      Tranfer to Bank Account
                    </h6>
                    <p class="text-muted mb-0">Updated : <span id="current-date-timeY"></span></p>
                  </div>
                  <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                    <h6 class="font-weight-bold mb-0" style="color: white">
                      LKR 0
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8 grid-margin stretch-card">
            <div class="card  custom-card">
              <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                  <h1 class="text-center mb-4">Recent Courses</h1>
                </div>
                <div class="course-list-container">
                  <div class="course-list">
                    <?php if ($result->num_rows > 0): ?>
                      <?php while ($row = $result->fetch_assoc()): ?>
                        <?php if ($row['status'] == "Approved") { ?>
                          <div class="course-item" style="background-color: #ACD589;"
                            onmouseover="showMessage('Course is Activated')" onmouseout="hideMessage()"
                            onclick="location.href='../../insideCourse.php?id=<?php echo htmlspecialchars($row['id']); ?>'">
                            <div id="message"></div>
                            <div class="course-icon">
                              <img src="<?php echo '../../uploads/' . htmlspecialchars($row['imagePath']); ?>"
                                alt="<?php echo htmlspecialchars($row['course_title']); ?>" class="course-image">
                            </div>
                            <div class="course-details">
                              <h5 class="course-title"><?php echo htmlspecialchars($row['course_title']); ?></h5>
                              <p class="course-category"><?php echo htmlspecialchars($row['category']); ?> |
                                <?php echo htmlspecialchars($row['language']); ?></p>
                            </div>
                          </div>
                        <?php } else { ?>
                          <div class="course-item" style="background-color: #F8A19A;"
                            onmouseover="showMessage('Course is in pending statement')" onmouseout="hideMessage()"
                            onclick="location.href='../../insideCourse.php?id=<?php echo htmlspecialchars($row['id']); ?>'">
                            <div class="course-icon">
                              <img src="<?php echo '../../uploads/' . htmlspecialchars($row['imagePath']); ?>"
                                alt="<?php echo htmlspecialchars($row['course_title']); ?>" class="course-image">
                            </div>
                            <div class="course-details">
                              <h5 class="course-title"><?php echo htmlspecialchars($row['course_title']); ?></h5>
                              <p class="course-category"><?php echo htmlspecialchars($row['category']); ?> |
                                <?php echo htmlspecialchars($row['language']); ?></p>
                            </div>
                          </div>
                        <?php } ?>
                      <?php endwhile; ?>
                    <?php else: ?>
                      <p class="text-center w-100">No courses available.</p>
                    <?php endif; ?>
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
                <h4 class="card-title">Students Details</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Profile</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Price</th>
                        <th>Package Type</th>
                        <th>Start Date</th>
                        <!-- <th> Payment Status </th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $InsID = $_SESSION['id'];
                      $SQLPay = "SELECT * FROM `payedstudent` WHERE instructor_ID = $InsID";
                      $ResultPay = mysqli_query($connection, $SQLPay);

                      if (mysqli_num_rows($ResultPay) > 0) {
                        while ($RowPay = mysqli_fetch_array($ResultPay)) {
                          $studentID = $RowPay['studentID'];
                          $courseID = $RowPay['course_id'];
                          $courseOptionID = $RowPay['course_optionsID'];
                          $package_type = $RowPay['packageType'];
                          $price = $RowPay['price'];

                          $SQLStudent = "SELECT * FROM `student` WHERE id = $studentID";
                          $ResultStudent = mysqli_query($connection, $SQLStudent);
                          $RowStudent = mysqli_fetch_array($ResultStudent);

                          $SQLCourse = "SELECT * FROM `courses` WHERE id = $courseID";
                          $ResultCourse = mysqli_query($connection, $SQLCourse);
                          $RowCourse = mysqli_fetch_array($ResultCourse);
                          ?>
                          <tr>
                            <td>
                              <?php
                              if (empty($RowStudent['profile_image'])) {
                                echo '<center><img  style="width: 40px; Height: 40px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                              } else {
                                $decoded_image = base64_decode($RowStudent['profile_image']);
                                if ($decoded_image !== false) {
                                  echo '<center><img  style="width: 40px; Height: 40px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" /></center>';
                                } else {
                                  echo '<center><img  style="width: 40px; Height: 40px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                }
                              }
                              ?>
                            </td>
                            <td>

                              <span
                                class="pl-2"><?php echo $RowStudent['firstName'] . " " . $RowStudent['lastName'] ?></span>
                            </td>
                            <td><?php echo $RowCourse['course_title'] ?></td>
                            <td><?php echo $price ?></td>
                            <td>Dashboard</td>
                            <td>04 Dec 2019</td>
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

        <!-- Calendar Section -->
        <!-- <div class="row">
          <div class="col-12 grid-margin">
            <div class="card custom-cardstd">
              <div class="card-body calendar">
                  <h4 class="card-title">Calendar</h4>
                  <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div> -->


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
      <footer class="footer">
        <?php
        require "teacherfooter.php";
        ?>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>

  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
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
  <!-- FullCalendar JS -->
  <!-- <script src='https://unpkg.com/@fullcalendar/core@4.3.0/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
  <script src='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js'></script> -->

  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid'],
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        selectable: true,
        select: function(info) {
          var title = prompt('Event Title:');
          var eventData;
          if (title) {
            eventData = {
              title: title,
              start: info.startStr,
              end: info.endStr
            };
            calendar.addEvent(eventData);
          }
          calendar.unselect();
        },
        eventClick: function(info) {
          if (confirm("Are you sure you want to delete this event?")) {
            info.event.remove();
          }
        },
        events: []
      });
      calendar.render();
    });
  </script> -->
  <!-- End custom js for this page -->

</body>

</html>