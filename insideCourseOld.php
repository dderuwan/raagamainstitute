<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/v3_66.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            height: 400px;
            max-height: 400px;
            overflow-y: auto;
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
        }
    </style>
</head>
<section id="header">
    <?php require "header.php"; ?>
</section>
<div class="container-fluid">
    <div id="course-player-header">
        <div class="row" style="flex-wrap: nowrap;display: flex; align-items: center !important;">
            <div id="course-player-header__back" class="col-1">
                <i class="fas fa-arrow-left" style="padding: 20px"></i>
            </div>
            <div class="col-1">
                <img id="course-player-img"
                    src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/uploads/sites/29/2023/10/icon-150x150.png"
                    alt="">
            </div>
            <div class="col-1" id="course-curriculum" onclick="toggleSidebar()">
                <i id="icon-color" class="fas fa-xmark"></i>
                <span style="position: fixed" class="custom-span">Curriculum</span>
            </div>
            <div class="col-4" style="margin-left: 20px">
                <div style="margin: 0; padding: 0;">
                    <span id="course-span">Course</span>
                </div>
                <div style="margin: 0; padding: 0;">
                    <a id="course-title-a_tag" href="#">Concept Art Printing on 3d Printer</a>
                </div>
            </div>
            <div class="col-1" style="display: flex;flex-direction: row;align-items: center;">
                <i id="icon-color" class="fas fa-sun"></i>
            </div>
            <div class="col-1" id="course-discussion">
                <div>
                    <i id="icon-color" class="fas fa-comments"></i>
                </div>
                <span class="custom-span">Discussions</span>
            </div>
        </div>
    </div>

    <div class="row">

        <!--        SLIDE BAR     -->
        <div id="course-player-curriculum__content" style="padding-right: 0px !important">

            <div id="customCurriculum" class="row" onclick="toggleSidebar()"
                style="padding-right: 0px !important;margin-right: 0px !important">
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
                <p class="course-title">Concept Art Printing on 3d Printer</p>
            </div>

            <!-- SECTION 1 START-->
            <div id="course-section" class="row" style="padding-right: 0px !important;margin-right: 0px !important">
                <div class='col-6 paddingZero'>
                    <p id="course-section-item" onclick="OpenDetails()">Week 01</p>
                </div>
                <div class='col-1'>
                    <span id="section-list">0/2</span>
                </div>
                <div class='col-1' style="margin-right: 10px;">
                    <i id="arrow-icon" style="color: white" class="fa-solid fa-circle-chevron-down"></i>
                </div>
            </div>

            <div id="hidet-section">
                <div id="hide-course-section" class="row"
                    style="padding-right: 0px !important;margin-right: 0px !important;border-bottom: 1px solid white">
                    <div class='col-6  paddingZero'>
                        <p id="hide-course-section-item" onclick="OpenDetails()">Starting Course</p>
                    </div>
                    <div class='col-1' style="margin-right: 10px;">
                        <i style="color: white" class="fa-solid fa-circle"></i>
                    </div>
                    <div class="col-12 d-flex align-items-center">
                        <img src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/text.svg"
                            alt="video" style="margin-right: 7px;">
                        <span id="course-span">13 min</span>
                    </div>
                </div>
                <div id="hide-course-section" class="row"
                    style="padding-right: 0px !important;margin-right: 0px !important;">
                    <div class='col-6  paddingZero'>
                        <p id="hide-course-section-item" onclick="OpenDetails()">Getting Started</p>
                    </div>
                    <div class='col-1' style="margin-right: 10px;">
                        <i style="color: white" class="fa-solid fa-circle"></i>
                    </div>
                    <div class="col-12 d-flex align-items-center">
                        <img src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/video.svg"
                            alt="video" style="margin-right: 7px;">
                        <span id="course-span">10 min</span>
                    </div>
                </div>
            </div>
            <!-- SECTION 1 END-->

            <!-- SECTION 2 START-->
            <div id="course-section" class="row" style="padding-right: 0px !important;margin-right: 0px !important">
                <div class='col-6  paddingZero'>
                    <p id="course-section-item" >After Into</p>
                </div>
                <div class='col-1'>
                    <span id="section-list">0/4</span>
                </div>
                <div class='col-1' style="margin-right: 10px;">
                    <i id="arrow-icon" style="color: white" class="fa-solid fa-circle-chevron-down"></i>
                </div>
            </div>
            
                <div id="hide-sectiont">
                    <div id="hide-course-section" class="row"
                        style="padding-right: 0px !important;margin-right: 0px !important;">
                        <div class='col-6'>
                            <p id="hide-course-section-item">Simplify3D for 3D Printing</p>
                        </div>
                        <div class='col-1' style="margin-right: 10px;">
                            <i style="color: white" class="fa-solid fa-circle"></i>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <img src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/video.svg"
                                alt="video" style="margin-right: 7px;">
                            <span id="course-span">10 min</span>
                        </div>
                    </div>
                    <div id="hide-course-section" class="row"
                        style="padding-right: 0px !important;margin-right: 0px !important;">
                        <div class='col-6'>
                            <p id="hide-course-section-item">Slicer Settings</p>
                        </div>
                        <div class='col-1' style="margin-right: 10px;">
                            <i style="color: white" class="fa-solid fa-circle"></i>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <img src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/video.svg"
                                alt="video" style="margin-right: 7px;">
                            <span id="course-span">Video lesson</span>
                        </div>
                    </div>
                    <div id="hide-course-section" class="row"
                        style="padding-right: 0px !important;margin-right: 0px !important;border-bottom: 1px solid white">
                        <div class='col-6'>
                            <p id="hide-course-section-item">Getting Your File Ready to Print</p>
                        </div>
                        <div class='col-1' style="margin-right: 10px;">
                            <i style="color: white" class="fa-solid fa-circle"></i>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <img src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/stream.svg"
                                alt="video" style="margin-right: 7px;">
                            <span id="course-span">Stream lesson</span>
                        </div>
                    </div>
                    <div id="hide-course-section" class="row"
                        style="padding-right: 0px !important;margin-right: 0px !important;">
                        <div class='col-6'>
                            <p id="hide-course-section-item">Types of Filament</p>
                        </div>
                        <div class='col-1' style="margin-right: 10px;">
                            <i style="color: white" class="fa-solid fa-circle"></i>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <img src="https://masterstudy.stylemixthemes.com/classic-lms-elementor/wp-content/plugins/masterstudy-lms-learning-management-system/_core//assets/icons/lessons/video.svg"
                                alt="video" style="margin-right: 7px;">
                            <span id="course-span">22 min</span>
                        </div>
                    </div>
                </div>
            <!-- SECTION 2 END-->

        </div>

        <div id="course-player-content__wrapper" style="padding-top:20px !important;position: relative;display: none">
            <span
                style="padding-left:50px !important;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;color: #4d5e6f !important;padding: 0;margin: 0 0 7px;margin-top: 20px !important;">Text
                lesson</span>
            <h1
                style="padding-left:50px !important;font-size: 30px;font-style: normal;font-weight: 700;line-height: 35px;color: #001931;margin-bottom: 20px;padding: 0;">
                3D Printing Overview</h1>
            <div class="content">
                <?php
                $lessonContent = "
                     <p>Text is the primary and one of the common resources when it comes to studying. A functional editor lets you
        design the lesson in the fastest and most convenient way. You will see that even text lessons can be
        interesting, good-looking and interactive.</p>

    <ul>
        <li>Comprehensive text editor</li>
        <li>Ability to insert media files</li>
        <li>Online preview mode</li>
    </ul>

    <p>Don’t stick to the one type of lesson. Take advantage of the options provided. We developed Masterstudy LMS with
        a well-defined approach in mind. And the main point of this was to make it diverse.</p>

    <p>As a result, you have three variations of lessons to work with: video, slides, and text.</p>

    <p>Add any media files to the lesson so your students could get the quality and interactive learning material.
        Upload images, videos and slides and find an approach to every student. Write a description and add lesson
        content, set featured image and specify the duration.</p>
        ";

                echo $lessonContent;
                ?>
            </div>
            <div class="button-container">
                <button id="course-next" onclick="toggleSidebar()">
                    <span class="completeNextBtn">Complete & Next</span>
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div id="course-player-content__wrapper" style="padding-top:20px !important;position: relative;">
            <span
                style="padding-left:50px !important;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;color: #4d5e6f;padding: 0;margin: 0 0 7px;margin-top: 20px !important;">Video
                lesson</span>
            <h1
                style="padding-left:50px !important;font-size: 30px;font-style: normal;font-weight: 700;line-height: 35px;color: #001931;margin-bottom: 20px;padding: 0;">
                Getting Started</h1>
            <div class="content">
                <div class="iframe-container">
                    <iframe src="https://www.youtube.com/embed/xcJtL7QggTI?si=dVIO1Ym0_-FJPwKR" height="80vh"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
        </div>

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

    document.addEventListener('DOMContentLoaded', function () {
        const hideSection = document.getElementById('hide-section');
        const arrowIcon = document.getElementById('arrow-icon');

        arrowIcon.addEventListener('click', function () {
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
    window.addEventListener('resize', function (event) {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            window.location.reload();
        }, 1500);
    });
</script>


</body>

</html>