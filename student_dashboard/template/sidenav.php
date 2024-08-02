<?php
if (!isset($_SESSION["id"])) {
    header("location:../../Student_Signin.php");
}

include('../../Databsase/connection.php');


$student_id = $_SESSION['id'];

$query = "SELECT * FROM student WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

?>

<style>
   
    .profile_image {
        width: 100%; 
    }

    .count {
        display: block;
        width: 10px; 
        height: 10px; 
        border-radius: 50%;
    }

    .viewed-message {
            color:black ;
            background-color: #b7b7b7; 
        }

    .viewed-new{
        color: #7c0303;
        background-color: #FFF;
        padding-top: 10px;
        padding-left: 10px;
        font-weight: 800;
    }

    #messageModal{
        height: auto;
        margin-top: -15px !important;
    }

    @media (max-width: 768px) {
        #messageModal{
            transform: scale(.98);
        }
        #important-msg{
            margin: 10px !important;
        }
    }

</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="../../index.php"><img style="width: 80%; height: 20%" src="assets/images/v3_66.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="../../index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>

    <!-- Account Settings -->
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
            <div class="profile-pic" style="width: 120px;">
                    <label id="profilePicLabel" class="position-relative">
                        <?php
                        if (empty($row['profile_image'])) {
                            echo '<img style="width: 40px; Height: 40px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" />';
                        } else {
                            $decoded_image = base64_decode($row['profile_image']);
                            if ($decoded_image !== false) {
                                echo '<img style="width: 40px; Height: 40px; object-fit: cover" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" />';
                            } else {
                                echo '<img style="width: 40px; Height: 40px; object-fit: cover" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" />';
                            }
                        }
                        ?>
                        <span class="count bg-success"></span>
                    </label>
                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">
                        <?php echo htmlspecialchars($row['firstName']); ?>
                    </h5>
                    <span>Student</span>
                </div>
            </div>


                <!-- Change Settings -->
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical" style="color: white"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="./profile.php" class="dropdown-item preview-item">
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
            <span class="nav-link">Navigation</span>
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
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Courses</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400" href="myCourses.php">My
                            Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400" href="assignment.php">Assignmets</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400"
                            href="viewdetails.php">Manage Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400" href="#">Update
                            Cource</a>
                    </li> -->
                </ul>
            </div>
        </li>
        <!-- profile -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="profile.php?id=<?php echo $_SESSION['id']; ?>">
                <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Profile</span>
            </a>
        </li>

        <!-- Anousments -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="stdAnnouncement.php">
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
            <a class="nav-link" href="payments.php">
                <span class="menu-icon">
                    <i class="mdi mdi-cash-multiple"></i> <!-- changed icon to cash symbol -->
                </span>
                <span class="menu-title">Student Payment</span>
            </a>
        </li>

        <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="assignments.php">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">Assignment</span>
            </a>
        </li> -->
    </ul>
</nav>

<!-- Upper Navbar -->
<div style="height: fit-content;">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
                    <!-- <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                        data-toggle="dropdown" aria-expanded="false" href="createcource.php">+ Create New Course</a> -->
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
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

                <!-- Four Box -->


                       <!-- messages -->
                       <li class="nav-item dropdown border-left">
    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <i class="mdi mdi-email"></i>         
        <?php
            $StatusSQL = "SELECT status FROM instructor_reply WHERE status = 'pending' AND studentNo = '$student_id'";
            $StatusResult = mysqli_query($connection, $StatusSQL);

            if ($StatusResult && mysqli_num_rows($StatusResult) > 0) {
                echo '<span class="count bg-success"></span>';
            }
        ?>  
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
        <h6 class="p-3 mb-0">Messages</h6>
        <div class="dropdown-divider"></div>

        <?php 
            $SQL = "SELECT * FROM student_message WHERE studentNo = $student_id";
            $RESULT = mysqli_query($connection, $SQL);
            
            if(mysqli_num_rows($RESULT) > 0){
                $Row = mysqli_fetch_array($RESULT);
                $InsEmail = $Row['instructuerEmail'];

                // Select unique instructor numbers
                $NewSQL = "SELECT DISTINCT instructuerNo, instructuerName FROM instructor_reply WHERE instructuerEmail ='$InsEmail'";
                $NewResult = mysqli_query($connection, $NewSQL); 
                $studentTopics = [];
                if(mysqli_num_rows($NewResult) > 0){
                    while($NewRow = mysqli_fetch_array($NewResult)){
                        $instructuerNo = $NewRow['instructuerNo']; 
                        $instructuerName = $NewRow['instructuerName']; 

                        // Select instructor profile image
                        $studentSQL = "SELECT DISTINCT profile_image FROM instructors WHERE id = $instructuerNo";
                        $studentResult = mysqli_query($connection, $studentSQL);
                        $studentRow = mysqli_fetch_array($studentResult);
                        $proimage = $studentRow['profile_image'];  

                        // Fetch the latest message timestamp for the instructor
                        $timestampSQL = "SELECT MAX(sendedTime) as latestTimestamp FROM instructor_reply WHERE instructuerNo = '$instructuerNo'";
                        $timestampResult = mysqli_query($connection, $timestampSQL);
                        $timestampRow = mysqli_fetch_assoc($timestampResult);
                        $messageTimestamp = $timestampRow['latestTimestamp'];

                        // Fetch unique topics for each instructor
                        $topicSQL = "SELECT DISTINCT topic FROM instructor_reply WHERE instructuerNo = '$instructuerNo'";
                        $topicResult = mysqli_query($connection, $topicSQL);
                        $topics = [];
                        while($topicRow = mysqli_fetch_assoc($topicResult)){
                            $topics[] = $topicRow['topic'];
                        }
                        $studentTopics[$instructuerNo] = $topics;

                        // Fetch the status of the latest message
                        $statusSQL = "SELECT status FROM instructor_reply WHERE instructuerNo = '$instructuerNo' ORDER BY sendedTime DESC LIMIT 1";
                        $statusResult = mysqli_query($connection, $statusSQL);
                        $statusRow = mysqli_fetch_assoc($statusResult);
                        $status = $statusRow['status'];
                ?>
                <!-- message data -->
                    <a class="dropdown-item preview-item <?php echo $status === 'viewed' ? 'viewed-message' : ''; ?>" href="#" data-toggle="modal" data-target="#messageModal"
                    data-instructuertno="<?php echo $instructuerNo; ?>" data-instructuername="<?php echo $instructuerName; ?>">
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
                                <?php echo $instructuerName ?> sent you a message
                            </p>
                            <p class="text-muted mb-0" data-timestamp="<?php echo $messageTimestamp; ?>"></p>
                        </div>
                    </a>
                <?php
                        }
                    }else{
                        echo '<div style="padding: 15px; font-family: "Rubik", sans-serif; ">No messages</div>'; 
                    }

                } else{
                    echo '<div style="padding: 15px; font-family: "Rubik", sans-serif; ">No messages</div>'; 
                }
                ?>

            </div>

            <script>
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

                    // Update times initially
                    updateTimes();

                    // Update times every minute
                    setInterval(updateTimes, 60000);

                    // Modal handling
                    $('#messageModal').on('show.bs.modal', function (event) {
                        const button = $(event.relatedTarget);
                        const instructuerNo = button.data('instructuertno');
                        const instructuerName = button.data('instructuername');

                        const modal = $(this);

                        // Fetch all messages and replies for the selected instructor
                        const data = <?php 
                            $messageSQL = "SELECT * FROM instructor_reply WHERE instructuerEmail ='$InsEmail'";
                            $messageResult = mysqli_query($connection, $messageSQL);
                            $messages = [];
                            while($messageRow = mysqli_fetch_array($messageResult)){
                                $messages[$messageRow['instructuerNo']]['messages'][] = [
                                    'instructuerName' => $messageRow['instructuerName'],
                                    'topic' => $messageRow['topic'],
                                    'reply' => $messageRow['reply'],
                                    'sendedTime' => $messageRow['sendedTime'],
                                    'id' => $messageRow['id'],
                                    'status' => $messageRow['status']
                                ];
                            }

                            $replySQL = "SELECT * FROM student_message WHERE instructuerEmail ='$InsEmail'";
                            $replyResult = mysqli_query($connection, $replySQL);
                            while($replyRow = mysqli_fetch_array($replyResult)){
                                $messages[$replyRow['instructuerNo']]['replies'][] = [
                                    'studentName' => $replyRow['studentName'],
                                    'topic' => $replyRow['topic'],
                                    'message' => $replyRow['message'],
                                    'startedTime' => $replyRow['startedTime']
                                ];
                            }

                            echo json_encode($messages);
                        ?>;

                        const studentTopics = <?php echo json_encode($studentTopics); ?>;

                        let messageContent = '';
                        if (data[instructuerNo]) {
                            studentTopics[instructuerNo].forEach(function(topic) {
                                // Combine messages and replies, then sort by time
                                const combinedMessages = [];

                                // Instructor messages
                                if (data[instructuerNo].messages) {
                                    data[instructuerNo].messages.forEach(msg => {
                                        if (msg.topic === topic) {
                                            combinedMessages.push({
                                                type: 'instructor',
                                                name: `Instructor, ${msg.instructuerName}`,
                                                content: msg.reply,
                                                time: msg.sendedTime,
                                                status: msg.status,
                                                id: msg.id
                                            });
                                        }
                                    });
                                }

                                // Student replies
                                if (data[instructuerNo].replies) {
                                    data[instructuerNo].replies.forEach(reply => {
                                        if (reply.topic === topic) {
                                            combinedMessages.push({
                                                type: 'student',
                                                name: 'Your Reply',
                                                content: reply.message,
                                                time: reply.startedTime,
                                                status: '',
                                                id: ''
                                            });
                                        }
                                    });
                                }

                                // Sort combined messages by time
                                combinedMessages.sort((a, b) => new Date(a.time) - new Date(b.time));

                                // Build the message content
                                combinedMessages.forEach(msg => {
                                    const viewedClass = msg.status === 'pending' ? 'viewed-new' : '';
                                    const msgTypeClass = msg.type === 'student' ? 'text-primary' : '';
                                    messageContent += `<div class="${viewedClass} ${msgTypeClass}"><h4 style="font-size: 18px;">${msg.name}</h4><h4 style="font-size: 16px;">Regarding, ${topic}</h4><p>${msg.content}</p><p>${msg.time}</p><hr></div>`;
                                    if (msg.type === 'instructor') {
                                        modal.find('#messageId').val(msg.id);
                                    }
                                });
                            });
                        }

                        modal.find('#messageContent').html(messageContent);

                        // Populate the instructuerNo hidden field
                        modal.find('#instructuerNo').val(instructuerNo);
                        
                        // Populate the topic dropdown
                        const topicDropdown = modal.find('#topicDropdown');
                        topicDropdown.empty();
                        if (studentTopics[instructuerNo]) {
                            studentTopics[instructuerNo].forEach(function(topic) {
                                topicDropdown.append(`<option value="${topic}">Regarding, ${topic}</option>`);
                            });
                        }

                        // Mark messages as viewed
                        $.post('../../handlers/studentrpyHandler.php', { studentupdateStatus: true, instructuerNo: instructuerNo }, function(response) {
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
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
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
                            <div class="profile-pic1" style="width: 40px;">
                            <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                                <?php                               
                                    if (empty($row['profile_image'])) {
                                        echo '<center><img style="width:40px; height:40px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                        } else {                                   
                                            $decoded_image = base64_decode($row['profile_image']);                                                         
                                            if ($decoded_image !== false) {                                     
                                            echo '<center><img style="width:40px; height:40px; object-fit: cover"  class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,'.base64_encode($decoded_image).'" alt="profile image" /></center>';
                                            } else {                                       
                                            echo '<center><img style="width:40px; height:40px; object-fit: cover" class="img-fluid rounded-circle profile_image" src="assets/images/faces/face16.jpg" alt="default image" /></center>';
                                            }
                                        }
                                ?>
                            </label>
                            </div>
                            <p class="mb-0 d-none d-sm-block navbar-profile-name">
                             <?php echo htmlspecialchars($row['lastName']); ?>
                            </p>
                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                        <h6 class="p-3 mb-0">Profile</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item" href="stdLogout.php" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
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
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>

    


        <!-- popup container of the message function -->
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: white; color: black;">
                    <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                        <h1 class="modal-title" id="messageModalLabel" style="font-size: 24px;">Message Details</h1>
                        <button type="button" class="close" data-dismiss="modal" style="position: relative; right: 10px;" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../../handlers/studentrpyHandler.php" onsubmit="setStartedTime()" method="post">
                        <div class="modal-body">
                            <h4 style="font-size: 18px;">Message History</h4>
                            <div class="message-container" style="overflow-y: auto; scrollbar-width: thin; max-height:300px !important; background-color: #f8f8f8 !important; padding:10px; border-width:1px !important;">
                                <div id="messageContent" style="font-size: 14px;"></div>
                            </div>
                            <hr style="background-color:black;">

                            <label for="topic">Topic:</label>
                            <select name="topic" id="topicDropdown" sendedTime class="form-control" style="background-color: white; color: black; border: 1px solid black; padding:10px;">
                                <!-- Options will be populated dynamically -->
                            </select><br>
                            
                            <label for="Reply">Reply:</label>
                            <textarea name="message" class="form-control" style="background-color: white; color: black;" id="exampleFormControlInput1" placeholder="Type Here" required></textarea>
                            <input type="hidden" id="startedTime" name="startedTime">
                            <input type="hidden" id="messageId" name="messageId">
                            <input type="hidden" id="instructuerNo" name="instructuerNo">
                            
                            <p class="text-danger" id="important-msg" style="width:70%; position: absolute; bottom: -30px; font-size: 11px;">Important! This Message will be Automatically Deleted after 15 days.</p>
                            <button type="submit" name="studentreplyMessage" class="btn btn-success" style="float:right; margin-top: 5px; margin-bottom: 5px;">Send</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
