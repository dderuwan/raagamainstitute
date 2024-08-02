<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        .scrollable-div {
            /* Other styles */
            width: 100%;
            height: 60%;
            overflow-y: scroll;
            overflow-x: hidden;
            padding: 10px;
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

<body>
    <div id="course-player-content__wrapper" style="padding-top:20px !important;position: relative;display: none">
        <span style="padding-left:50px !important;font-size: 14px;font-style: normal;font-weight: 500;line-height: normal;color: #4d5e6f !important;padding: 0;margin: 0 0 7px;margin-top: 20px !important;">Text
            lesson</span>
        <h1 style="padding-left:50px !important;font-size: 30px;font-style: normal;font-weight: 700;line-height: 35px;color: #001931;margin-bottom: 20px;padding: 0;">
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
</body>

</html>