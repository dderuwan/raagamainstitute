<?php
session_start();
include('./Databsase/connection.php');

if (!isset($_SESSION['id'])) {
    header("location:./Student_Signin.php");
    exit();
}

$id = $_GET['id'] ?? null;
if ($id === null) {
    die("Course ID not provided.");
}

$id = $_GET['id'];

$SQL = "SELECT * FROM `courses` WHERE id = $id";
$Result = mysqli_query($connection, $SQL);
$Row = mysqli_fetch_array($Result);

$image_path = $Row["imagePath"];
$image_path = str_replace('../course', './course', $image_path);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/v3_66.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Course</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            overflow: hidden;
        }

        #header {
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
            height: 100%;
            margin: 0px;
            padding: 0px !important;
        }

        .hideZoom{
            display: none;
        }

        .row {
            display: flex;
            flex-direction: row;
            flex: 1;
            margin: 0;
            padding: 0;
        }

        #course-player-curriculum__content {
            overflow: auto;
            scrollbar-width: none;
            background-color: #eef1f7;
            width: 30vw;
            height: 100vh;
            margin: 0;
            padding: 20px;
            position: sticky;
            z-index: 1;
        }

        .scrollable-div {
            /* Other styles */
            width: 100%;
            height: 100%;
        }

        /* Custom scrollbar styles for WebKit browsers */
        .scrollable-div::-webkit-scrollbar {
            width: 12px;
            /* Width of the scrollbar */
        }

        .scrollable-div::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Color of the scrollbar thumb */
            border-radius: 6px;
            /* Rounded corners */
            border: 3px solid #ccc;
            /* Adds space around the thumb */
        }

        .scrollable-div::-webkit-scrollbar-thumb:hover {
            background-color: #555;
            /* Color when hovering over the scrollbar */
        }

        .scrollable-div::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Background of the scrollbar track */
            border-radius: 6px;
            /* Rounded corners */
        }

        #course-player-content__wrapper {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            background: #fff;
            overflow-y: auto;
            position: relative;
            scrollbar-width: none;
            transition: .3s;
            max-height: calc(100vh - 150px);
            width: 70%;
            margin: 0;
            padding: 0px 100px;
        }


        #course-player-header {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #eef1f7;
            height: 50px;
            margin: 0;
            padding: 0;
        }

        #course-player-header__back {
            cursor: pointer;
        }

        #course-player-img {
            display: flex;
            width: 26px;
            height: 26px;
            margin: 0;
            padding: 0;
            object-fit: cover;
            cursor: pointer;
        }

        #course-curriculum {
            display: flex;
            align-items: center;
            width: 135px;
            height: 36px;
            background-color: #4D5E6F1A;
            padding: 6px 123px 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        #course-next {
            /* width: 250px; */
            height: 36px;
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: blue;
            padding: 6px 123px 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        #course-discussion {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 6px 123px 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .custom-span {
            padding-left: 20px;
            color: #4D5E6F;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            white-space: nowrap;
            margin: 0;
            cursor: pointer
        }

        #icon-color {
            color: #4d5e6f;
        }

        #course-span {
            color: #808c98;
            font-size: 12px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            padding-bottom: 1px;
        }

        #course-title-a_tag {
            color: #001931;
            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            border: none;
            text-decoration: none;
        }

        .course-title {
            font-size: 18px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            color: #001931;
            margin: 0 0 0 20px !important;
            padding: 20px !important;
            ;
        }

        #course-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            background: #4d5e6f;
            border-bottom: 1px solid rgba(255, 255, 255, .3);
        }

        #hide-course-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px 15px 0px !important;
            background: #eef1f7;
            border-bottom: 1px solid rgba(255, 255, 255, .3);
            margin: 0 0 0 20px;
        }

        #hide-course-section-item {
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            color: #001931;
            margin: 0 0 0 10px;
            padding: 0;
        }

        #course-section-item {
            color: #fff;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin: 0 0 0 20px;
            padding: 0 !important;
        }

        #course-curriculum-item {
            font-size: 15px;
            font-weight: 500;
            line-height: 20px;
            color: #4d5e6f;
            font-style: normal;
            margin: 0 0 0 20px;
            padding: 0;
        }

        #section-list {
            display: flex;
            align-items: center;
            flex-shrink: 0;
            font-size: 13px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin: 0 10px;
            padding: 0;
            color: rgba(255, 255, 255, .7);
        }

        #hide-section {
            display: none;
            flex-direction: column;
        }

        #arrow-icon {
            cursor: pointer;
            color: white;
        }

        #course-next {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #227AFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;

            position: absolute;
            right: 90px;
            bottom: 10px;
        }

        #course-next:hover {
            background-color: #45a049;
        }

        #course-next span {
            margin-right: 10px;
        }

        #course-next i {
            margin-left: 10px;
        }


        .button-container {
            position: fixed;
            bottom: 0px;
            right: 0px;
            background-color: #ffffff;
            width: 100vw;
            height: 50px;
            border-top: 0.5px solid #eef1f7;
        }


        #customCurriculum {
            display: none !important;
        }

        .content {
            font-size: 17px;
            font-style: normal;
            line-height: 28px;
            color: #4d5e6f;
            padding: 0 50px 50px 50px !important;
            font-size: 17px;
            font-style: normal;
            line-height: 28px;
            color: #4d5e6f;
        }

        .text-content {
            margin-top: 20px;
        }

        .iframe-container {
            position: relative;
            width: 100%;
            height: 100%;
            padding-bottom: 60%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            border-radius: 5px;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 5px;
            object-fit: cover;
            object-position: center;
        }

        .completeNextBtn {
            font-size: 14px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .paddingZero {
            padding: 0 !important;
        }

        /****************
        --Media Queries--
        ****************/

        @media (min-width: 1025px) {
            #course-player-header {
                display: block;
            }
        }

        @media (max-width: 1024px) {
            #course-player-header {
                display: none;
            }

            .content {
                padding-bottom: 60px !important;
            }

            #course-player-curriculum__content {
                width: 100%;
                padding: 0;
            }

            .custom-span {
                padding-left: 20px;
            }

            #customCurriculum {
                display: flex !important;
                align-items: center;
                align-items: center;
                justify-content: space-between;
                padding: 15px 20px;
                border-bottom: 1px solid #ddd;
            }

            .custom-style {
                width: 50vw;
                font-size: 14px;
                font-weight: 500;
                line-height: 20px;
                color: #4d5e6f;
                font-style: normal;
                margin: 0;
                padding: 0;
            }

            .topicCourse a:hover{
                color: #227AFF;
            }
        }
    </style>

    <script>
        function Details(lessonId) {
            // AJAX request to fetch data from server
            $.ajax({
                url: 'fetch_lesson_details.php',
                type: 'GET',
                data: {
                    lessonId: lessonId
                },
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    let lesson_type = data.type;

                    // Update DOM elements with fetched data
                    document.getElementById("type").textContent = data.type; // Assuming type contains the lesson type
                    document.getElementById("title").textContent = data.lesson_name; // Assuming lesson_name is equivalent to title
                    document.querySelector(".content").textContent = data.s_description; // Assuming s_description is equivalent to description
                    document.getElementById("zoomName").textContent = data.lesson_name; // Assuming s_description is equivalent
                    document.getElementById("zLink").href  = data.lesson_link; // Assuming duration is equivalent to duration
                    document.getElementById("ZoomID").textContent = data.zoom_id;
                    document.getElementById("ZoomPass").textContent = data.meetingPassword; // Assuming topic is equivalent to topic
                    document.getElementById("StartDate").textContent = data.start_date; // Assuming next_lesson_link is equivalent to next_lesson_link
                    document.getElementById("StartTime").textContent = data.start_time;
                    document.getElementById("EndDate").textContent = data.end_date;
                    document.getElementById("EndTime").textContent = data.end_time;

                    var iframeContainer = document.getElementById("courseVideo");
                    var iframe = iframeContainer.querySelector("iframe");

                    if (lesson_type == "Video Lesson") {
                        // Extract video ID from the YouTube URL
                        var youtubeLink = data.youtubeLink;
                        var videoId = youtubeLink.split('v=')[1] || youtubeLink.split('youtu.be/')[1];
                        var ampersandPosition = videoId.indexOf('&');
                        if (ampersandPosition !== -1) {
                            videoId = videoId.substring(0, ampersandPosition);
                        }

                        // Update YouTube iframe src
                        iframe.src = "https://www.youtube.com/embed/" + videoId;

                        // Show iframe container
                        iframeContainer.style.display = "block";
                        zoomdetails.style.display = "none";
                        title.style.display = "block";
                        content.style.display = "block";
                    }
                    else if(lesson_type == "Zoom Lesson"){
                        zoomdetails.style.display = "block";
                        iframeContainer.style.display = "none";
                        title.style.display = "none";
                        content.style.display = "none";
                    }
                    else if(lesson_type == "Text Lesson"){
                        zoomdetails.style.display = "none";
                        iframeContainer.style.display = "none";
                        title.style.display = "block";
                        content.style.display = "block";
                    }
                    
                    else {
                        // Hide iframe container
                        iframeContainer.style.display = "none";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching lesson details:', error);
                }
            });
        }
    </script>
</head>
<section id="header">
    <?php require "header.php"; ?>
</section>
<div class="container-fluid">
    <div id="course-player-header">
        <div class="row" style="flex-wrap: nowrap;display: flex; align-items: center !important;">


            <div class="col-1" id="course-curriculum" style="margin-left: 2%;" onclick="toggleSidebar()">
                <i id="icon-color" class="fas fa-xmark"></i>
                <span style="position: fixed" class="custom-span">Curriculum</span>
            </div>
            <div class="col-4" style="margin-left: 20px">
                <div style="margin: 0; padding: 0;">
                    <span id="course-span">Course</span>
                </div>
                <div class="topicCourse" style="margin: 0; padding: 0;">
                    <a id="course-title-a_tag" href="#"><?php echo $Row['course_title'] ?></a>
                </div>
            </div>
            <!-- <div class="col-1" style="display: flex;flex-direction: row;align-items: center;">
                <i id="icon-color" class="fas fa-sun"></i>
            </div> -->
            <!-- <div class="col-1" id="course-discussion">
                <div>
                    <i id="icon-color" class="fas fa-comments"></i>
                </div>
                <span class="custom-span">Discussions</span>
            </div> -->
        </div>
    </div>

    <div class="row">
        <!--        SLIDE BAR     -->
        <div id="course-player-curriculum__content" style="padding-right: 0px !important">

            <div id="customCurriculum" class="row" onclick="toggleSidebar()" style="padding-right: 0px !important;margin-right: 0px !important">
                <div class="col-6 paddingZero">
                    <h4 id="course-curriculum-item">Curriculum</h4>
                </div>
                <div class="col-1">

                </div>
                <div class='col-1' style="margin-right: 10px;">
                    <i style="color: #4d5e6f;cursor: pointer" class="fas fa-xmark"></i>
                </div>
            </div>

            <div class="row">
                <p class="course-title"><?php echo $Row['course_title'] ?></p>
            </div>

            <div class="scrollable-div">
                <?php
                $SQLSection = "SELECT * FROM `sections` WHERE courseID = $id AND courseName = '" . $Row['course_title'] . "' AND InstructorName = '" . $Row['instructor_name'] . "' AND instructorID = " . $Row["instructor_id"] . " ORDER BY id ASC";

                $ResultSection = mysqli_query($connection, $SQLSection);

                if (mysqli_num_rows($ResultSection) > 0) {
                    while ($RowSection = mysqli_fetch_array($ResultSection)) {
                ?>

                        <!-- SECTION 1 START-->
                        <div id="course-section" class="row" style="padding-right: 0px !important;margin-right: 0px !important">
                            <div class='col-6 paddingZero'>
                                <p id="course-section-item" onclick="OpenDetails()"><?php echo $RowSection['sectionName'] ?></p>
                            </div>
                            <div class='col-1'>
                                <!-- <span id="section-list">0/2</span> -->
                            </div>
                            <div class='col-1' style="margin-right: 10px;">
                                <!-- <i id="arrow-icon" style="color: white" class="fa-solid fa-circle-chevron-down"></i> -->
                            </div>
                        </div>


                        <div id="hide-sectionT">
                            <?php
                            $SQLQuestion = "SELECT * FROM lessons WHERE sectionName = '" . $RowSection['sectionName'] . "' AND courseName = '" . $RowSection['courseName'] . "' AND InstructorID = " . $RowSection['InstructorID'] . "";
                            $ResultQuestion = mysqli_query($connection, $SQLQuestion);

                            if (mysqli_num_rows($ResultQuestion) > 0) {
                                while ($RowQuestion = mysqli_fetch_array($ResultQuestion)) {
                            ?>
                                    <div id="hide-course-section" class="row" style="padding-right: 0px !important;margin-right: 0px !important;border-bottom: 1px solid white">
                                        <div class='col-6  paddingZero'>
                                            <p id="hide-course-section-item" onclick="Details(<?php echo $RowQuestion['id'] ?>)"><?php echo $RowQuestion['lesson_name'] ?></p>
                                        </div>

                                        <div class="col-12 d-flex align-items-center">
                                            <?php
                                            if ($RowQuestion['type'] == 'Text Lesson') {
                                            ?>
                                                <img class="myimage" src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/text.svg" alt="video" style="margin-right: 7px;">
                                            <?php
                                            } else if ($RowQuestion['type'] == 'Video Lesson') {
                                            ?>
                                                <img class="myimage" src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/video.svg" alt="video" style="margin-right: 7px;">
                                            <?php
                                            } else if ($RowQuestion['type'] == 'Zoom Lesson') {
                                            ?>
                                                <img class="myimage" src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/zoom_conference.svg" alt="video" style="margin-right: 7px;">
                                            <?php
                                            }
                                            ?>
                                            <span id="course-span"><?php echo $RowQuestion['lesson_duration'] . " minutes" ?></span>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No sections found.</p>";
                }
                ?>
            </div>
        </div>

        <div id="course-player-content__wrapper" style="padding-top:50px !important; margin-bottom: 50px; position: relative; padding-bottom: 50px;">
            <span id="type" style="padding-left:50px !important;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;color: #4d5e6f !important;padding: 0;margin: 0 0 7px;margin-top: 20px !important;"><?php echo "Instructor ".$Row['instructor_name'] ?></span>

            <h1 id="title" style="padding-left:50px !important;font-size: 30px;font-style: normal;font-weight: 700;line-height: 35px;color: #001931;margin-bottom: 20px;padding: 0;">
                Welcome to <?php echo $Row['course_title'] ?></h1>

            <div class="iframe-container" id="courseVideo" style="background-color: white;">
                <iframe style="margin-left: 60px;" src="<?php echo $image_path ?>" height="80vh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="content my-5" id="content">
                <p id="content"></p>

            </div>

            <div class="zoomdetails hideZoom" id="zoomdetails">
                <div class="zoomImg" style="display: flex; align-items:center; justify-content: center;">
                    <img src="./images/Zoom-Logo-Download.png" alt="">
                </div>

                <div class="textZ" style="display: flex; align-items: center; justify-content: center; flex-direction: column; gap:10px;">
                    <div class="topicZ mt-5" style="background-color: #EEF1F7; padding: 0.2% 20% 0.2% 20%; border-radius: 25px;">
                        <h2 id="zoomName">First Zoom Meeting</h2>
                    </div>

                    <div class="detailsZ mt-3">
                        <h5>Meeting Link - <a id="zLink" href="">Click Here to Join</a></h5>
                        <h5>Meeting ID - <span id="ZoomID">ergge</span></h5>
                        <h5>Meeting Password - <span id="ZoomPass">eggege</span></h5>
                    </div>

                    <div class="startZ" style="display: flex; align-items: center;justify-content: center; gap: 5%; width: 100%;">
                        <div class="startZD" style="background-color: #EEF1F7; display: flex; align-items:center; justify-content: center; padding: 5px; border-radius:10px;">
                            <h5>Start Date - <span id="StartDate">2024-07-12</span></h5>
                        </div>

                        <div class="startZT" style="background-color: #EEF1F7; display: flex; align-items:center; justify-content: center; padding: 5px; border-radius:10px;">
                            <h5>Start Time - <span id="StartTime">12.50 PM</span></h5>
                        </div>
                    </div>

                    <div class="middle">
                        <h5>--------------- to ---------------</h5>
                    </div>

                    <div class="endZ" style="display: flex; align-items: center;justify-content: center; gap: 5%; width: 100%;">
                        <div class="endZD" style="background-color: #EEF1F7; display: flex; align-items:center; justify-content: center; padding: 5px; border-radius:10px;">
                            <h5>End Date - <span id="EndDate">2024-07-12</span></h5>
                        </div>

                        <div class="endZT" style="background-color: #EEF1F7; display: flex; align-items:center; justify-content: center; padding: 5px; border-radius:10px;">
                            <h5>End Time - <span id="EndTime">14.50 PM</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div id="course-player-content__wrapper" style="padding-top:20px !important;position: relative;">
            
            <span style="padding-left:50px !important;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;color: #4d5e6f;padding: 0;margin: 0 0 7px;margin-top: 20px !important;">Video
                lesson</span>
            <h1 style="padding-left:50px !important;font-size: 30px;font-style: normal;font-weight: 700;line-height: 35px;color: #001931;margin-bottom: 20px;padding: 0;">
                Getting Started</h1>
            <div class="content">
                <div class="iframe-container">
                    <iframe src="https://www.youtube.com/embed/xcJtL7QggTI?si=dVIO1Ym0_-FJPwKR" height="80vh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="text-content">
                    <?php
                    $lessonContent = "
                     <p>Learning by video lessons is considered effective and interactive. With MasterStudy you can create lessons with video content by using such resources as YouTube and Vimeo for embedding the links, or upload video files from your computer.</p>

    <ul>
        <li>Comprehensive text editor</li>
        <li>Ability to insert media files</li>
        <li>Online preview mode</li>
    </ul>";

                    echo $lessonContent;
                    ?>
                </div>
            </div>
            <div class="button-container">
                <button id="course-next" onclick="toggleSidebar()">
                    <span class="completeNextBtn">Complete & Next</span>
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div> -->

    </div>
</div>

<script>
    if ($(window).width() > 1024) {

        let isSidebarVisible = true;

        function toggleSidebar() {
            const sidebar = document.getElementById('course-player-curriculum__content');
            const mainContent = document.getElementById('course-player-content__wrapper');
            const icon = document.getElementById('icon-color');

            if (isSidebarVisible) {
                sidebar.style.display = 'none';
                mainContent.style.width = '100%';
                mainContent.style.padding = '0 20px';
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                sidebar.style.display = 'block';
                mainContent.style.width = '70%';
                mainContent.style.padding = '0';
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }

            isSidebarVisible = !isSidebarVisible;
        }

        function OpenDetails() {
            var contentWrapper = document.getElementById('course-player-content__wrapper');
            if (contentWrapper.style.display === 'none' || contentWrapper.style.display === '') {
                contentWrapper.style.display = 'block';
            } else {
                contentWrapper.style.display = 'none';
            }
        }
    } else {

        let isSidebarVisible = true;

        function toggleSidebar() {
            const sidebar = document.getElementById('course-player-curriculum__content');
            const mainContent = document.getElementById('course-player-content__wrapper');
            const icon = document.getElementById('icon-color');
            const mainHeader = document.getElementById('course-player-header');

            if (isSidebarVisible) {
                mainHeader.style.display = 'block';
                sidebar.style.display = 'none';
                mainContent.style.width = '100%';
                mainContent.style.padding = '0 20px';
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                mainHeader.style.display = 'none';
                sidebar.style.display = 'block';
                mainContent.style.width = '70%';
                mainContent.style.padding = '0';
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }

            if (mainHeader.style.display === 'block') {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }

            isSidebarVisible = !isSidebarVisible;
        }

        function OpenDetails() {
            var contentWrapper = document.getElementById('course-player-content__wrapper');
            const sidebar = document.getElementById('course-player-curriculum__content');
            const mainHeader = document.getElementById('course-player-header');
            if (contentWrapper.style.display === 'none' || contentWrapper.style.display === '') {
                mainHeader.style.display = 'block';
                contentWrapper.style.display = 'block';
                sidebar.style.display = 'none';
            } else {
                contentWrapper.style.display = 'none';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const hideSection = document.getElementById('hide-section');
        const arrowIcon = document.getElementById('arrow-icon');

        arrowIcon.addEventListener('click', function() {
            // Toggle visibility of hide-section
            hideSection.style.display = hideSection.style.display === 'none' ? 'flex' : 'none';

            // Toggle icon class based on visibility
            arrowIcon.classList.toggle('fa-circle-chevron-down');
            arrowIcon.classList.toggle('fa-circle-chevron-up');
        });

        // Hide the section initially
        hideSection.style.display = 'none';
    });

    var resizeTimeout;
    window.addEventListener('resize', function(event) {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            window.location.reload();
        }, 1500);
    });
</script>


</body>

</html>