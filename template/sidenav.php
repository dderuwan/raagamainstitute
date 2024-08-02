<?php
// session_start();
if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Sidebar</title>
    <link rel="stylesheet" href="styles.css">

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

        @media (max-width: 768px) {
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
    }

    </style>
</head>

<body>

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="../../index.php"><img style="width: 80%; height: 20%" src="assets/images/v3_66.png" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini" href="../../index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>

        <!-- Account Settings -->
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <!-- <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="" />
                        <span class="count bg-warning"></span>
                    </div> -->
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></h5>
                            <span>Instructor</span>
                        </div>
                    </div>

                    <!-- Change Settings -->
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
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
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">
                                    To-do list
                                </p>
                            </div>
                        </a>
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
                            <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400" href="createcource.php">Create Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: rgb(185, 185, 185); font-weight: 400" href="viewdetails.php">Manage Courses</a>
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
        </ul>
    </nav>

    <!-- Upper Navbar -->
    <div class="container-fluid page-body-wrapper">
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
                        <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="./createcource.php">+ Create New Course</a>
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
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-view-grid"></i>
                        </a>
                    </li>

                    <!-- messages -->
                    <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-email"></i>
                            <span class="count bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                            <h6 class="p-3 mb-0">Messages</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic" />
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">
                                        Mark send you a message
                                    </p>
                                    <p class="text-muted mb-0">1 Minutes ago</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic" />
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">
                                        Cregh send you a message
                                    </p>
                                    <p class="text-muted mb-0">15 Minutes ago</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic" />
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1">
                                        Profile picture updated
                                    </p>
                                    <p class="text-muted mb-0">18 Minutes ago</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">4 new messages</p>
                        </div>
                    </li>

                    <!-- Bell Icon -->
                    <li class="nav-item dropdown border-left">
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
                    </li>

                    <!-- Profile Managment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                    <?php echo $_SESSION['lastname'] ?>
                                </p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="teacherLogout.php" style="text-decoration: none; color: inherit; display: flex; align-items: center;">
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
                            <p class="p-3 mb-0 text-center">Advanced settings</p>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>

</body>

</html>
