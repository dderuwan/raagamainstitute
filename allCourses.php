<?php
session_start();
include ('./Databsase/connection.php');

//variables
$search = "";
$selected_language = isset($_GET['language']) ? $_GET['language'] : '';
$Selected_grade = isset($_GET['duration']) ? $_GET['duration'] : '';
$syllabus = isset($_GET['syllabus']) ? $_GET['syllabus'] : '';
$displayMessage = "";

// Construct the base query
$query = "SELECT * FROM courses WHERE status = 'Approved'";

// Add search conditions. search bar(box) from header.php
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $terms = explode(" ", $search);
    $conditions = array();
    foreach ($terms as $term) {
        $conditions[] = "course_title LIKE '%$term%' OR instructor_name LIKE '%$term%'";
    }
    $query .= " AND (" . implode(" AND ", $conditions) . ")";
    $displayMessage = "Search Results for <strong>\"$search\"</strong>";
}

// Add grade filter from index.php(explore courses buttons).
if (isset($_GET['level']) && $_GET['level'] !== 'all') {
    $level = $_GET['level'];
    $gradeConditions = array();
    if (strpos($level, '-') !== false) {
        list($start, $end) = explode('-', $level);
        for ($i = $start; $i <= $end; $i++) {
            $gradeConditions[] = "level = 'grade$i'";
        }
        $query .= " AND (" . implode(' OR ', $gradeConditions) . ")";
        $displayMessage = "Courses for Grades <strong>$start</strong> to <strong>$end</strong>";
    } else {
        $query .= " AND level = 'grade$level'";
        $displayMessage = "Courses for Grade <strong>$level</strong>l";
    }
}

// Add syllabus filter from index file 
if ($syllabus && $syllabus !== 'all') {
    $query .= " AND syllabus = ?";
    $displayMessage = "Courses for <strong>" . ucfirst($syllabus) . "</strong>";
}

// Add language filter (language dropdown list- allcourses.php)
if ($selected_language && $selected_language !== 'all') {
    $query .= " AND language = ?";
    $displayMessage = "Courses for language <strong>$selected_language</strong> ";
}
//for All language button in language selection part-allcourses.php
if ($selected_language && $selected_language == 'all') {
    $query = "SELECT * FROM courses WHERE status = 'Approved'";
    $displayMessage = "Courses for language <strong>all language</strong> ";
}


// Add grades filter (Grades radio button list- allcourses.php)
if ($Selected_grade && $Selected_grade !== 'all') {
    $query .= " AND level = ?";
    $displayMessage = "Courses for Grade <strong>$Selected_grade</strong>";
}
//for all Grades button in Grade selection part
if ($Selected_grade && $Selected_grade == 'all') {
    $query = "SELECT * FROM courses WHERE status = 'Approved'";
    $displayMessage = "Courses for <strong>All Grades</strong>";
}


// Complete the query
$query .= " ORDER BY id DESC";

// Prepare and execute the query
$stmt = $connection->prepare($query);

// Bind parameters if filters are applied
$bindTypes = '';
$params = array();

if ($syllabus && $syllabus !== 'all') {
    $bindTypes .= 's';
    $params[] = $syllabus;
}

if ($selected_language && $selected_language !== 'all') {
    $bindTypes .= 's';
    $params[] = $selected_language;
}

if ($Selected_grade && $Selected_grade !== 'all') {
    $bindTypes .= 's';
    $params[] = $Selected_grade;
}

if ($bindTypes) {
    $stmt->bind_param($bindTypes, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows; //To get the number of courses shown( selected or filterd or searched)

if (!$result) {
    die("Query failed: " . $connection->error);
}

$connection->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <link rel="icon" href="images/sm_logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .main-container {
            display: flex;
            /* flex-wrap: wrap; */
        }

        .container-2 {
            flex: 0 0 30%;
            /* Adjusted to give more width to container-2 */
            padding: 20px;
            box-sizing: border-box;
        }

        .cards-container {
            flex: 0 0 70%;
            /* Adjusted to give more width to cards-container */
            padding: 20px;
            box-sizing: border-box;
        }

        .rating-section,
        .language-selection,
        .video-duration {
            margin-bottom: 20px;
        }

        .rating-title,
        .language-title {
            font-size: 1.2em;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .rating-item,
        .language-option,
        .video-duration-item {
            display: flex;
            /* align-items: center; */
            margin-bottom: 10px;
        }

        .rating-stars {
            font-size: 1.5em;
            color: #f0ad4e;
            margin-right: 10px;
        }

        .rating-text,
        .language-option label,
        .video-duration-item label {
            margin-left: 10px;
        }

        .cards-container .row {
            display: flex;
            flex-wrap: wrap;
            /* gap: 20px; */
        }

        .course-card {
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(44, 43, 103, 255);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            height: 100%;
        }

        .course-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .course-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .course-info {
            padding: 15px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            color: black !important;
        }

        .course-title {
            margin-top: 0;
            font-size: 1.1rem;
            flex-shrink: 0;
            font-weight: bold;
        }

        .course-category {
            font-size: 0.9rem;
            color: black;
            flex-shrink: 0;
        }

        .course-description {
            color: black;
            font-size: 0.95rem;
            margin-top: 5px;
            margin-bottom: 10px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .course-price-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .course-price {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .btn-preview {
            padding: 8px 16px;
            background-color: #036fc1 !important;
            border: 1px solid #036fc1 !important;
            color: white;
            border-radius: 12px;
            cursor: pointer;
        }

        .btn-preview:hover {
            background-color: white !important;
            color: #036fc1 !important;
            border: 1px solid #036fc1 !important;
            font-weight: 600 !important;
        }

        .radio-section {
            display: flex;
            align-items: center;
            /* justify-content: center; 
    height: 100vh;*/
        }

        .radio-item [type="radio"] {
            display: none;
        }

        .radio-item+.radio-item {
            margin-top: 15px;
        }

        .radio-item label {
            display: block;
            padding: 10px 60px;
            background: rgba(44, 43, 103, 255);
            /* border: 2px solid rgba(255, 255, 255, 0.1); */
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 400;
            min-width: 200px;
            white-space: nowrap;
            position: relative;
            transition: 0.4s ease-in-out 0s;
            color: white;
        }

        .radio-item label:after,
        .radio-item label:before {
            content: "";
            position: absolute;
            border-radius: 50%;
        }

        .radio-item label:after {
            height: 19px;
            width: 19px;
            border: 2px solid #2DB089;
            left: 19px;
            top: calc(50% - 12px);
        }

        .radio-item label:before {
            background: #2DB089;
            height: 20px;
            width: 20px;
            left: 21px;
            top: calc(50%-5px);
            transform: scale(5);
            opacity: 0;
            visibility: hidden;
            transition: 0.4s ease-in-out 0s;
        }

        .radio-item [type="radio"]:checked~label {
            border-color: #2DB089;
        }

        .radio-item [type="radio"]:checked~label::before {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
        }

        @media (max-width: 992px) {

            .main-container {
                display: flex;
                flex-wrap: wrap;
            }

            .cards-container {
                flex: 0 0 100%;
            }

            .container-2 {
                display: flex;
                flex-wrap: wrap;
                flex: 0 0 100%;
            }

            .rating-section,
            .language-selection,
            .video-duration {
                width: 33%;
            }

            .rating-item {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 768px) {

            .cards-container {
                flex: 0 0 100%;
            }

            .container-2 {
                display: flex;
                flex-wrap: wrap;
                flex: 0 0 100%;
            }

            .rating-section {
                width: 50%;
            }

            .language-selection {
                width: 50%;
            }

            .language-option,
            .language-title {
                margin-left: 50px;
            }

            .video-duration {
                width: 100%;
            }

            .rating-item {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 580px) {

            .cards-container {
                flex: 0 0 100%;
            }

            .container-2 {
                display: flex;
                flex-wrap: wrap;
                flex: 0 0 100%;
            }

            .rating-section,
            .language-selection {
                width: 100%;
            }

            .video-duration {
                width: 100%;
            }

            .rating-item {
                flex-wrap: wrap;
            }

            .language-option,
            .language-title {
                margin-left: 0px;
            }
        }
    </style>
</head>

<body>
    <section id="header" style="width: 100%;">
        <?php require "header.php"; ?>
    </section>
    <div class="container-fluid" style="margin-top : 20px">
        <!-- <h2 class="text-center my-4"><?php echo $count; ?> <?php echo $displayMessage; ?></h2> -->

        <div class="container-fluid">
            <div class="main-container">
                <div class="container-2">
                    <div class="rating-section">
                        <span class="rating-title" style="font-size: 20px;">Ratings</span>
                        <div class="rating-item radio-item" style="display: flex; align-items: center;">
                            <input type="radio" name="rating" id="rating5" class="rating-radio">
                            <label for="rating5" style="background: none;margin: 0px">
                                <span class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </label>
                        </div>
                        <div class="rating-item radio-item" style="display: flex; align-items: center;">
                            <input type="radio" name="rating" id="rating4" class="rating-radio">
                            <label for="rating4" style="background: none;margin: 0px">
                                <span class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </label>
                        </div>
                        <div class="rating-item radio-item" style="display: flex; align-items: center;">
                            <input type="radio" name="rating" id="rating3" class="rating-radio">
                            <label for="rating3" style="background: none;margin: 0px">
                                <span class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </label>
                        </div>
                        <div class="rating-item radio-item" style="display: flex; align-items: center;">
                            <input type="radio" name="rating" id="rating2" class="rating-radio">
                            <label for="rating2" style="background: none;margin: 0px">
                                <span class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </label>
                        </div>
                        <div class="rating-item radio-item" style="display: flex; align-items: center;">
                            <input type="radio" name="rating" id="rating1" class="rating-radio">
                            <label for="rating1" style="background: none;margin: 0px">
                                <span class="rating-stars">
                                    <i class="fas fa-star"></i>
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="language-selection">
                        <h4 class="language-title" style="font-size: 20px;">Language</h4>
                        <form id="languageForm" method="GET" action="">
                            <section class="radio-section">
                                <div class="radio-list">
                                    <div class="language-option radio-item">
                                        <input type="radio" id="all" name="language" value="all"
                                            onchange="document.getElementById('languageForm').submit();">
                                        <label for="all">All</label>
                                    </div>

                                    <div class="language-option radio-item">
                                        <select
                                            style="padding-left: 15px; margin-left: 10px; background: rgba(44, 43, 103, 255); border-radius: 5px; color: white; height: 50px; width: 200px; font-size:18px;"
                                            id="language" name="language"
                                            onchange="document.getElementById('languageForm').submit();">
                                            <option style="background: #036fc1; color: white;" value="all">Select
                                                Language</option>
                                            <?php
                                            $SQLLang = "SELECT * FROM `languages`";
                                            $ResultLang = mysqli_query($connection, $SQLLang);
                                            if (mysqli_num_rows($ResultLang) > 0) {
                                                while ($Rowlang = mysqli_fetch_array($ResultLang)) {
                                                    ?>
                                                    <option style="background: rgba(44, 43, 103, 255); color: white;"
                                                        value="<?php echo $Rowlang['name'] ?>"><?php echo $Rowlang['name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            } else {
                                                echo "<option>No Languages</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </section>
                        </form>
                    </div>

                    <div class="video-duration">
                        <h4 class="language-title" style="font-size: 20px;">Grades</h4>
                        <form id="GradeForm" method="GET" action="">
                            <section class="radio-section">
                                <div class="radio-list">
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-all" name="duration" value="all"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-all">All</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-1" name="duration" value="grade1"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-1">Grade 1</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-2" name="duration" value="grade2"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-2">Grade 2</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-3" name="duration" value="grade3"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-3">Grade 3</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-4" name="duration" value="grade4"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-4">Grade 4</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-5" name="duration" value="grade5"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-5">Grade 5</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-6" name="duration" value="grade6"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-6">Grade 6</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-7" name="duration" value="grade7"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-7">Grade 7</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-8" name="duration" value="grade8"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-8">Grade 8</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-9" name="duration" value="grade9"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-9">Grade 9</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-10" name="duration" value="grade10"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-10">Grade 10</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-11" name="duration" value="grade11"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-11">Grade 11</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-12" name="duration" value="grade12"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-12">Grade 12</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-13" name="duration" value="grade13"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-13">Grade 13</label>
                                    </div>
                                    <div class="video-duration-item radio-item">
                                        <input type="radio" id="duration-other" name="duration" value="other"
                                            onchange="document.getElementById('GradeForm').submit();">
                                        <label for="duration-other">Other</label>`
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>

                <!-- CARD -->
                <div class="cards-container">
                    <div class="row">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <div class="course-card">
                                        <img src="<?php echo './uploads/' . htmlspecialchars($row['imagePath']); ?>"
                                            alt="<?php echo htmlspecialchars($row['course_title']); ?>" class="course-image">
                                        <div class="course-info">
                                            <h5 class="course-title"><?php echo htmlspecialchars($row['course_title']); ?></h5>
                                            <p class="course-category"><?php echo htmlspecialchars($row['category']); ?> |
                                                <?php echo htmlspecialchars($row['language']); ?>
                                            </p>
                                            <p class="course-description"><?php echo htmlspecialchars($row['s_description']); ?>
                                            </p>
                                            <div class="course-price-button">
                                                <button class="btn-preview"
                                                    data-course-id="<?php echo htmlspecialchars($row['id']); ?>">Preview</button>
                                                <div class="share-button" onclick="shareCourse('<?php echo $row['id']; ?>')">
                                                    <i class="fa-solid fa-share-nodes"
                                                        style="color: #036fc1; margin-right: 15px;cursor: pointer;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p class="no-courses">No courses available.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="footer">
        <?php require "footer.php"; ?>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.btn-preview');
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const courseId = this.getAttribute('data-course-id');
                    window.location.href = 'Single_Page_View.php?id=' + encodeURIComponent(courseId);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectedLanguage = "<?php echo $selected_language; ?>";
            if (selectedLanguage) {
                const radioButton = document.querySelector(`input[name="language"][value="${selectedLanguage}"]`);
                if (radioButton) {
                    radioButton.checked = true;
                }
            }

            const buttons = document.querySelectorAll('.btn-preview');
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const courseId = this.getAttribute('data-course-id');
                    window.location.href = 'Single_Page_View.php?id=' + encodeURIComponent(courseId);
                });
            });
        });
    </script>

    <script>
        async function shareCourse(courseId) {
            const shareData = {
                title: document.title,
                text: 'Check out this course!',
                url: window.location.origin + '/RaagamaInstitute/Single_Page_View.php?id=' + encodeURIComponent(courseId) //this must change accordging to the path in your pc
                /*
                In this window.location.origin is the base URL of the current page :- http://localhost/
                */
            }

            try {
                await navigator.share(shareData)
                console.log('Shared successfully')
            } catch (err) {
                console.error('Error: ' + err)
            }
        }
    </script>



</body>

</html>