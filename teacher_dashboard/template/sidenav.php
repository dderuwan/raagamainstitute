<?php
if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
}

$InstID = $_SESSION['id'];

$profileImgSQL = "SELECT * FROM instructors WHERE id = $InstID";
$profileResult = mysqli_query($connection, $profileImgSQL);
$profileRow = mysqli_fetch_array($profileResult);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Sidebar</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 260px;
            overflow-y: auto;
            z-index: 1000;
        }


        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 260px;
            z-index: 1000;
        }

        .page-body-wrapper {
            margin-left: 260px;
            padding-top: 60px;
        }

        .page-body-wrapper.collapsed {
            margin-left: 60px !important;
            padding-top: 30px !important;
        }
        .profile-pic.collapsedimg {
            width: 60px !important;
            height: 60px !important;

        }

        #profilePicLabel.collapsedimgnew { 
            position: relative;
            right: 10px;
            width: 50px !important;
        }

        #messageModal{
            height: auto;
            margin-top: -15px !important;
        }

        .viewed-new{
            color: #7c0303;
            background-color: #FFF;
            padding-top: 10px;
            padding-left: 10px;
            font-weight: 800;
        }

        @media (max-width: 940px) {
            .sidebar {
                position: relative;
                width: 100%;
                display: none;
            }

            .sidebar.active {
                display: block;
            }

            .navbar {
                left: 0;
            }

            .page-body-wrapper {
                margin-left: 0;
                padding-top: 0;
            }
            .page-body-wrapper.collapsed {
            margin-left: 0 !important;
            padding-top: 0 !important;
        }

            #messageModal{
                transform: scale(.98);
            }
            
            #important-msg{
                margin: 10px !important;
            }
            .create-new-button {
                display: none;
            }

            .create-new-button-mobile {
                display: block;
                text-decoration: none !important;


            }
        }

        .viewed-message {
            color: black;
            background-color: #b7b7b7; /* Change to desired color */
        }
    </style>
</head>  

<body>

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="../../index.php"><img style="width: 80%; height: 20%"
                    src="assets/images/v3_66.png" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini" href="../../index.php"><img src="assets/images/logo-mini.svg"
                    alt="logo" /></a>
        </div>

        <!-- Account Settings -->
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <label id="profilePicLabel" class="position-relative" >
                            <?php
                            if (empty($profileRow['profile_image'])) {
                                echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" />';
                            } else {
                                $decoded_image = base64_decode($profileRow['profile_image']);
                                if ($decoded_image !== false) {
                                    echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" />';
                                } else {
                                    echo '<img style="width:50px; height:50px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" />';
                                }
                            }
                            ?>
                            <span class="count bg-success"></span>
                        </label>

                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">
                                <?php
                                if (isset($row['FirstName']) && isset($row['LastName'])) {
                                    echo $row['FirstName'] . ' ' . $row['LastName'];
                                } else {
                                    echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                                }
                                ?>
                            </h5>
                            <span>Instructor</span>
                        </div>
                    </div>

                    <!-- Change Settings -->
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                        aria-labelledby="profile-dropdown">
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">
                                    Account settings
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">
                                    Change Password
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <!-- <span class="nav-link">Navigation</span> -->
                <hr style="background-color: white;color: white;">
            </li>

            <!-- Dashboard -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="index.php">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <!-- Courcess -->
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                    </span>
                    <span class="menu-title">Courses</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400"
                                href="createcource.php">Create Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400"
                                href="viewdetails.php">Manage Courses</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400"
                            href="#">Update Courses</a>
                    </li> -->
                    </ul>
                </div>
            </li>
            <!-- profile -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="profile.php">
                    <span class="menu-icon">
                        <i class="mdi mdi-playlist-play"></i>
                    </span>
                    <span class="menu-title">Profile</span>
                </a>
            </li>

            <!-- Anousments -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="announcement.php">
                    <span class="menu-icon">
                        <i class="mdi mdi-playlist-play"></i>
                    </span>
                    <span class="menu-title">Annoucement</span>
                </a>
            </li>
            <!-- <li class="nav-item menu-items">
                <a class="nav-link" href="#">
                    <span class="menu-icon">
                        <i class="mdi mdi-table-large"></i>
                    </span>
                    <span class="menu-title">Progress</span>
                </a>
            </li> -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="assignments.php">
                    <span class="menu-icon">
                        <i class="mdi mdi-chart-bar"></i>
                    </span>
                    <span class="menu-title">Assignment</span>
                </a>
            </li>

            <!-- Student Answers -->
            <li class="nav-item menu-items">
                <a class="nav-link" href="assignment_answers.php">
                    <span class="menu-icon">
                        <i class="mdi mdi-chart-bar"></i>
                    </span>
                    <span class="menu-title">Student Answers</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Upper Navbar -->
    <div class="container page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <!-- Toggle Button -->
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span style="color: rgb(255, 255, 255)" class="mdi mdi-menu"></span>
                </button>

                <!-- search Bar -->
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products" />
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">
                    <!-- Create Project Tab -->
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                            href="./createcource.php">+ Create New Course</a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="createbuttonDropdown">
                            <h6 class="p-3 mb-0">Course Categories</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-file-outline text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">
                                        Software Development
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-web text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">
                                        UI Development
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-layers text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">
                                        Software Testing
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">See all projects</p>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                            href="./calendar.php">Calendar</a>
                    </li>
                    <li class="nav-item dropdown d-lg-none">
                        <a class="create-new-button-mobile"  id="createbuttonDropdownMobile" href="../../event_calendar/calendar.php">
                        <i class="mdi mdi-calendar" style="color: #fff; font-size: 20px; font-wedgth: bold; margin-right: 12px;"></i>
                        </a>
                    </li>
                    
                    <!-- Four Box -->
                    

<!-- messages -->
<li class="nav-item dropdown border-left">
    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <i class="mdi mdi-email"></i>
        <?php
            $StatusSQL = "SELECT status FROM student_message WHERE status = 'pending'";
            $StatusResult = mysqli_query($connection, $StatusSQL);

            $adminstatusSQL = "SELECT status FROM admin_message WHERE status = 'pending' AND instructuerNo = '$InstID'";
            $adminstatusResult = mysqli_query($connection, $adminstatusSQL);

            if (($StatusResult && mysqli_num_rows($StatusResult) > 0) || ($adminstatusResult && mysqli_num_rows($adminstatusResult) > 0)) {
                echo '<span class="count bg-success"></span>';
            }
        ?>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
        <h6 class="p-3 mb-0">Messages</h6>
        <div class="dropdown-divider"></div>

        <?php 
            $SQL = "SELECT * FROM instructors WHERE id = $InstID";
            $RESULT = mysqli_query($connection, $SQL);
            $Row = mysqli_fetch_array($RESULT);
            $InsEmail = $Row['Email'];

            // Select unique student numbers
            $NewSQL = "SELECT DISTINCT studentNo, studentName FROM student_message WHERE instructuerEmail ='$InsEmail'";
            $NewResult = mysqli_query($connection, $NewSQL);

            // Select unique admin numbers
            $adminSQL = "SELECT DISTINCT adminId, adminName FROM admin_message WHERE instructuerEmail ='$InsEmail'";
            $adminResult = mysqli_query($connection, $adminSQL);

            $adminTopics = [];
            if (mysqli_num_rows($adminResult) > 0) {
                while ($adminRow = mysqli_fetch_array($adminResult)) {
                    // Fetch unique topics for each admin
                    $topicSQL = "SELECT DISTINCT topic FROM admin_message WHERE adminId = '".$adminRow['adminId']."' AND instructuerEmail = '$InsEmail'";
                    $topicResult = mysqli_query($connection, $topicSQL);
                    $topics = [];
                    while ($topicRow = mysqli_fetch_assoc($topicResult)) {
                        $topics[] = $topicRow['topic'];
                    }
                    $adminTopics[$adminRow['adminId']] = $topics;

                    // Fetch the latest message timestamp for the admin
                    $adminTimestampSQL = "SELECT MAX(sendedTime) as adminlatestTimestamp FROM admin_message WHERE adminId = '".$adminRow['adminId']."' AND instructuerEmail = '$InsEmail'";
                    $adminTimestampResult = mysqli_query($connection, $adminTimestampSQL);
                    $adminTimestampRow = mysqli_fetch_assoc($adminTimestampResult);
                    $adminMessageTimestamp = $adminTimestampRow['adminlatestTimestamp'];

                    // Fetch the status of the latest message
                    $statusSQL = "SELECT status FROM admin_message WHERE adminId = '".$adminRow['adminId']."' AND instructuerEmail = '$InsEmail' ORDER BY sendedTime DESC LIMIT 1";
                    $statusResult = mysqli_query($connection, $statusSQL);
                    $statusRow = mysqli_fetch_assoc($statusResult);
                    $status = $statusRow['status'];
        ?>
        <!-- message data -->
            <a class="dropdown-item preview-item <?php echo $status === 'viewed' ? 'viewed-message' : ''; ?>" href="#" data-toggle="modal" data-target="#messageModal"
            data-adminid="<?php echo $adminRow['adminId']; ?>" data-adminname="<?php echo $adminRow['adminName']; ?>" data-instructorname="<?php echo $InsName; ?>">
                <div class="preview-thumbnail">
                    <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                        <img class="rounded-circle profile-pic" src="assets/images/faces/user-gear.png" alt="default image" />
                    </label>
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">
                        <?php echo $adminRow['adminName']; ?> sent you a message
                    </p>
                    <p class="text-muted mb-0" data-timestamp="<?php echo $adminMessageTimestamp; ?>"></p>
                </div>
            </a>
        <?php
                }
            }
            if (mysqli_num_rows($NewResult) > 0) {
                while ($NewRow = mysqli_fetch_array($NewResult)) {
                    $studentNo = $NewRow['studentNo'];
                    $studentName = $NewRow['studentName'];

                    // Select student profile image
                    $studentSQL = "SELECT DISTINCT profile_image FROM student WHERE id = $studentNo";
                    $studentResult = mysqli_query($connection, $studentSQL);
                    $studentRow = mysqli_fetch_array($studentResult);
                    $proimage = $studentRow['profile_image'];  

                    // Fetch the latest message timestamp for the student
                    $timestampSQL = "SELECT MAX(startedTime) as latestTimestamp FROM student_message WHERE studentNo = '$studentNo' AND instructuerEmail = '$InsEmail'";
                    $timestampResult = mysqli_query($connection, $timestampSQL);
                    $timestampRow = mysqli_fetch_assoc($timestampResult);
                    $messageTimestamp = $timestampRow['latestTimestamp'];

                    // Fetch unique topics for each student
                    $topicSQL = "SELECT DISTINCT topic FROM student_message WHERE studentNo = '$studentNo' AND instructuerEmail = '$InsEmail'";
                    $topicResult = mysqli_query($connection, $topicSQL);
                    $topics = [];
                    while ($topicRow = mysqli_fetch_assoc($topicResult)) {
                        $topics[] = $topicRow['topic'];
                    }
                    $studentTopics[$studentNo] = $topics;

                    // Fetch the status of the latest message
                    $statusSQL = "SELECT status FROM student_message WHERE studentNo = '$studentNo' AND instructuerEmail = '$InsEmail' ORDER BY startedTime DESC LIMIT 1";
                    $statusResult = mysqli_query($connection, $statusSQL);
                    $statusRow = mysqli_fetch_assoc($statusResult);
                    $status = $statusRow['status'];
        ?>
        <!-- message data -->
            <a class="dropdown-item preview-item <?php echo $status === 'viewed' ? 'viewed-message' : ''; ?>" href="#" data-toggle="modal" data-target="#messageModal"
            data-studentno="<?php echo $studentNo; ?>" data-studentname="<?php echo $studentName; ?>" data-instructorname="<?php echo $InsName; ?>">
                <div class="preview-thumbnail">
                    <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                        <?php                               
                        if (empty($proimage)) {
                            echo '<img class="rounded-circle profile-pic" src="assets/images/faces/face16.jpg" alt="default image" />';
                        } else {                                   
                            $decoded_image = base64_decode($proimage);                                                         
                            if ($decoded_image !== false) {                                     
                                echo '<img class="rounded-circle profile-pic" src="data:image/jpeg;base64,'.base64_encode($decoded_image).'" alt="profile image" />';
                            } else {
                                echo '<img class="rounded-circle profile-pic" src="assets/images/faces/face16.jpg" alt="default image" />';
                            }
                        }
                        ?>
                    </label>
                </div>
                <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1">
                        <?php echo $studentName; ?> sent you a message
                    </p>
                    <p class="text-muted mb-0" data-timestamp="<?php echo $messageTimestamp; ?>"></p>
                </div>
            </a>
        <?php
                }
            } else {
                echo '<div style="padding: 15px; font-family: "Rubik", sans-serif; ">No messages</div>';
            }
        ?>
    </div>

    <script>
        function setStartedTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var day = ("0" + now.getDate()).slice(-2);
            var hours = ("0" + now.getHours()).slice(-2);
            var minutes = ("0" + now.getMinutes()).slice(-2);
            var seconds = ("0" + now.getSeconds()).slice(-2);
            var formattedDateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
            document.getElementById('sendedTime').value = formattedDateTime;
            console.log("sendedTime:", formattedDateTime); // Add this line for debugging
        }

        document.addEventListener("DOMContentLoaded", function() {
            function timeAgo(date) {
                const now = new Date();
                const seconds = Math.floor((now - date) / 1000);
                let interval = Math.floor(seconds / 31536000);

                if (interval >= 1) {
                    return interval + (interval === 1 ? " year ago" : " years ago");
                }
                interval = Math.floor(seconds / 2592000);
                if (interval >= 1) {
                    return interval + (interval === 1 ? " month ago" : " months ago");
                }
                interval = Math.floor(seconds / 86400);
                if (interval >= 1) {
                    return interval + (interval === 1 ? " day ago" : " days ago");
                }
                interval = Math.floor(seconds / 3600);
                if (interval >= 1) {
                    return interval + (interval === 1 ? " hour ago" : " hours ago");
                }
                interval = Math.floor(seconds / 60);
                if (interval >= 1) {
                    return interval + (interval === 1 ? " minute ago" : " minutes ago");
                }
                return Math.floor(seconds) + (Math.floor(seconds) === 1 ? " second ago" : " seconds ago");
            }

            function updateTimes() {
                const timeElements = document.querySelectorAll('.text-muted.mb-0[data-timestamp]');
                timeElements.forEach(function(element) {
                    const timestamp = element.getAttribute('data-timestamp');
                    const date = new Date(timestamp);
                    element.textContent = timeAgo(date);
                });
            }

            updateTimes();
            setInterval(updateTimes, 60000);

            $('#messageModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                const studentNo = button.data('studentno');
                const adminId = button.data('adminid');
                const studentName = button.data('studentname');
                const adminName = button.data('adminname');

                const modal = $(this);

                const data = <?php 
                    $messageSQL = "SELECT * FROM student_message WHERE instructuerEmail ='$InsEmail'";
                    $messageResult = mysqli_query($connection, $messageSQL);
                    $messages = [];
                    while ($messageRow = mysqli_fetch_array($messageResult)) {
                        $messages[$messageRow['studentNo']]['messages'][] = [
                            'studentName' => $messageRow['studentName'],
                            'topic' => $messageRow['topic'],
                            'message' => $messageRow['message'],
                            'startedTime' => $messageRow['startedTime'],
                            'id' => $messageRow['id'],
                            'status' => $messageRow['status']
                        ];
                    }

                    $replySQL = "SELECT * FROM instructor_reply WHERE instructuerEmail ='$InsEmail'";
                    $replyResult = mysqli_query($connection, $replySQL);
                    while ($replyRow = mysqli_fetch_array($replyResult)) {
                        $messages[$replyRow['studentNo']]['replies'][] = [
                            'topic' => $replyRow['topic'],
                            'reply' => $replyRow['reply'],
                            'sendedTime' => $replyRow['sendedTime']
                        ];
                    }

                    $adminMessageSQL = "SELECT * FROM admin_message WHERE instructuerEmail ='$InsEmail'";
                    $adminMessageResult = mysqli_query($connection, $adminMessageSQL);
                    while ($adminMessageRow = mysqli_fetch_array($adminMessageResult)) {
                        $messages[$adminMessageRow['adminId']]['messages'][] = [
                            'adminName' => $adminMessageRow['adminName'],
                            'topic' => $adminMessageRow['topic'],
                            'message' => $adminMessageRow['message'],
                            'sendedTime' => $adminMessageRow['sendedTime'],
                            'id' => $adminMessageRow['id'],
                            'status' => $adminMessageRow['status']
                        ];
                    }

                    $adminReplySQL = "SELECT * FROM admin_reply WHERE instructuerEmail ='$InsEmail'";
                    $adminReplyResult = mysqli_query($connection, $adminReplySQL);
                    while ($adminReplyRow = mysqli_fetch_array($adminReplyResult)) {
                        $messages[$adminReplyRow['adminId']]['replies'][] = [
                            'topic' => $adminReplyRow['topic'],
                            'reply' => $adminReplyRow['reply'],
                            'sendedTime' => $adminReplyRow['sendedTime']
                        ];
                    }

                    echo json_encode($messages);
                ?>;

                const studentTopics = <?php echo json_encode($studentTopics); ?>;
                const adminTopics = <?php echo json_encode($adminTopics); ?>;

                let messageContent = '';
                if (data[studentNo]) {
                    studentTopics[studentNo].forEach(function(topic) {
                        const combinedMessages = [];

                        if (data[studentNo].messages) {
                            data[studentNo].messages.forEach(msg => {
                                if (msg.topic === topic) {
                                    combinedMessages.push({
                                        type: 'student',
                                        name: msg.studentName,
                                        content: msg.message,
                                        time: msg.startedTime,
                                        status: msg.status,
                                        id: msg.id
                                    });
                                }
                            });
                        }

                        if (data[studentNo].replies) {
                            data[studentNo].replies.forEach(reply => {
                                if (reply.topic === topic) {
                                    combinedMessages.push({
                                        type: 'instructor',
                                        name: 'Your Reply',
                                        content: reply.reply,
                                        time: reply.sendedTime,
                                        status: '',
                                        id: ''
                                    });
                                }
                            });
                        }

                        combinedMessages.sort((a, b) => new Date(a.time) - new Date(b.time));

                        combinedMessages.forEach(msg => {
                            const viewedClass = msg.status === 'pending' ? 'viewed-new' : '';
                            const msgTypeClass = msg.type === 'instructor' ? 'text-primary' : '';
                            messageContent += `<div class="${viewedClass} ${msgTypeClass}"><h4 style="font-size: 18px;">${msg.name}</h4><h4 style="font-size: 16px;">${topic}</h4><p>${msg.content}</p><p>${msg.time}</p><hr></div>`;
                            if (msg.type === 'student') {
                                modal.find('#messageId').val(msg.id);
                            }
                        });
                    });
                } else if (data[adminId]) {
                    adminTopics[adminId].forEach(function(topic) {
                        const combinedMessages = [];

                        if (data[adminId].messages) {
                            data[adminId].messages.forEach(msg => {
                                if (msg.topic === topic) {
                                    combinedMessages.push({
                                        type: 'admin',
                                        name: msg.adminName,
                                        content: msg.message,
                                        time: msg.sendedTime,
                                        status: msg.status,
                                        id: msg.id
                                    });
                                }
                            });
                        }

                        if (data[adminId].replies) {
                            data[adminId].replies.forEach(reply => {
                                if (reply.topic === topic) {
                                    combinedMessages.push({
                                        type: 'instructor',
                                        name: 'Your Reply',
                                        content: reply.reply,
                                        time: reply.sendedTime,
                                        status: '',
                                        id: ''
                                    });
                                }
                            });
                        }

                        combinedMessages.sort((a, b) => new Date(a.time) - new Date(b.time));

                        combinedMessages.forEach(msg => {
                            const viewedClass = msg.status === 'pending' ? 'viewed-new' : '';
                            const msgTypeClass = msg.type === 'instructor' ? 'text-primary' : '';
                            messageContent += `<div class="${viewedClass} ${msgTypeClass}"><h4 style="font-size: 18px;">${msg.name}</h4><h4 style="font-size: 16px;">${topic}</h4><p>${msg.content}</p><p>${msg.time}</p><hr></div>`;
                            if (msg.type === 'admin') {
                                modal.find('#messageId').val(msg.id);
                            }
                        });
                    });
                }

                modal.find('#messageContent').html(messageContent);

                if (studentNo) {
                    modal.find('#studentNo').val(studentNo);
                } else {
                    modal.find('#studentNo').val('');
                }

                const topicDropdown = modal.find('#topicDropdown');
                topicDropdown.empty();
                if (studentTopics[studentNo]) {
                    studentTopics[studentNo].forEach(function(topic) {
                        topicDropdown.append(`<option value="${topic}">Regarding, ${topic}</option>`);
                    });
                } else if (adminTopics[adminId]) {
                    adminTopics[adminId].forEach(function(topic) {
                        topicDropdown.append(`<option value="${topic}">Regarding, ${topic}</option>`);
                    });
                }

                // Set form action based on message type
                const form = modal.find('form');
                if (adminId) {
                    form.attr('action', '../../handlers/adminreplyHandler.php');
                } else {
                    form.attr('action', '../../handlers/replyHandler.php');
                }

                // Set hidden input for studentNo or adminId
                if (adminId) {
                    $('<input>').attr({
                        type: 'hidden',
                        id: 'adminId',
                        name: 'adminId',
                        value: adminId
                    }).appendTo(form);
                } else {
                    $('<input>').attr({
                        type: 'hidden',
                        id: 'studentNo',
                        name: 'studentNo',
                        value: studentNo
                    }).appendTo(form);
                }

                // Update status based on message type
                const updateUrl = adminId ? '../../handlers/adminreplyHandler.php' : '../../handlers/replyHandler.php';
                $.post(updateUrl, { updateStatus: true, studentNo: studentNo, adminId: adminId }, function(response) {
                    if (response.success) {
                        button.closest('.preview-item').addClass('viewed-message');
                    }
                }, 'json');
            });
        });
    </script>
</li>
                
                    <!-- Bell Icon -->
                    <!-- <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                            <span class="count bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Event today</p>
                                    <p class="text-muted ellipsis mb-0">
                                        Just a reminder that you have an event today
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                    <p class="text-muted ellipsis mb-0">Update dashboard</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-link-variant text-warning"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Launch Admin</p>
                                    <p class="text-muted ellipsis mb-0">New admin wow!</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">See all notifications</p>
                        </div>
                    </li> -->

                    <!-- Profile Managment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <div class="profile-pic1" style="width: 40px; position: relative; top: 5px;">
                                <label id="profilePicLabel" class="position-relative" >
                                    <?php
                                        if (empty($profileRow['profile_image'])) {
                                            echo '<img style="width:40px; height:40px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" />';
                                        } else {
                                            $decoded_image = base64_decode($profileRow['profile_image']);
                                            if ($decoded_image !== false) {
                                                echo '<img style="width:40px; height:40px; object-fit: cover;" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" />';
                                            } else {
                                                echo '<img style="width:40px; height:40px; object-fit: cover;"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" />';
                                            }
                                        }
                                    ?>
                                    <span class="count bg-success"></span>
                                </label>
                                </div>
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                    <?php echo $_SESSION['lastname'] ?>
                                </p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="teacherLogout.php"
                                style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="mb-0">Log out</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
            
        </nav>

<!-- popup container of the message function -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true" style="overflow: auto;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: white; color: black;">
            <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                <h1 class="modal-title" id="messageModalLabel" style="font-size: 24px;">Message Details</h1>
                <button type="button" class="close" data-dismiss="modal" style="position: relative; right: 10px;" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form onsubmit="setStartedTime()" method="post">
                <div class="modal-body">
                    <h4 style="font-size: 18px;">Message History</h4>
                    <div class="message-container" style="overflow-y: auto; scrollbar-width: thin; max-height:300px !important; background-color: #f8f8f8 !important; padding:10px; border-width:1px !important;">
                        <div id="messageContent" style="font-size: 14px;"></div>
                    </div>
                    <hr style="background-color:black;">

                    <label for="topic">Topic:</label>
                    <select name="topic" id="topicDropdown" class="form-control" style="background-color: white; color: black; border: 1px solid black; padding:10px;">
                        <!-- Options will be populated dynamically -->
                    </select><br>
                    
                    <label for="Reply">Reply:</label>
                    <textarea name="Reply" class="form-control" style="background-color: white; color: black;" id="exampleFormControlInput1" placeholder="Type Here" required></textarea>
                    <input type="hidden" id="sendedTime" name="sendedTime">
                    <input type="hidden" id="messageId" name="messageId">
                    <input type="hidden" id="studentNo" name="studentNo">

                    <p class="text-danger" id="important-msg" style="width:70%; position: absolute; bottom: -30px; font-size: 11px;">Important! This Message will be Automatically Deleted after 45 days.</p>
                    <button type="submit" name="replyMessage" class="btn btn-success" style="float:right; margin-top:10px; margin-bottom: 10px;">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>