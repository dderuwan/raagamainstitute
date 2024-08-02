<?php
session_start();
include ('./Databsase/connection.php');

if (!isset($_SESSION["id"])) {
    header("location:../../Teacher_Signin.php");
    exit;
}

$instructor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $instructor_id = intval($_POST['instructor_id']);
    $first_name = htmlspecialchars($_POST['fName']);
    $last_name = htmlspecialchars($_POST['lName']);
    $address = htmlspecialchars($_POST['address']);
    $address2 = htmlspecialchars($_POST['address2']);
    $country = htmlspecialchars($_POST['country']);
    $city = htmlspecialchars($_POST['city']);
    $zip = htmlspecialchars($_POST['zip']);
    $phone = htmlspecialchars($_POST['contact']);

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $imgData = file_get_contents($_FILES['profile_image']['tmp_name']);
        $imgData = base64_encode($imgData);

        $query = "UPDATE instructors 
                SET FirstName = ?, LastName = ?, Address = ?, Address2 = ?, Country = ?, City = ?, ZipCode = ?, Phone = ? ,profile_image = ? 
                WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssssssssi", $first_name, $last_name, $address, $address2, $country, $city, $zip, $phone, $imgData, $instructor_id);
    } else {
        $query = "UPDATE instructors 
                SET FirstName = ?, LastName = ?, Address = ?, Address2 = ?, Country = ?, City = ?, ZipCode = ?, Phone = ? 
                WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssssssssi", $first_name, $last_name, $address, $address2, $country, $city, $zip, $phone, $instructor_id);
    }

    if ($stmt->execute()) {
        header("Location: teacher_dashboard/template/profile.php?id=$instructor_id");
        exit;
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch the instructor details
$query = "SELECT FirstName, LastName, Address, Address2, Country, City, ZipCode, Phone, profile_image FROM instructors WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $instructor_id);
$stmt->execute();
$result = $stmt->get_result();
$instructor = $result->fetch_assoc();

if (!$instructor) {
    die('Instructor not found.');
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet"
        media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="StudentRegister.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="./css/main.css" rel="stylesheet" />
    <title>RaagamaInstitute Update Teacher Profile</title>

    <style>
        #background-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .container-fluid {
            position: relative;
            z-index: 1;
        }

        .custom-form-control {
            font-weight: 600 !important;
            color: rgba(0, 0, 0, 0.5) !important;
        }

        @media (min-width: 769px) and (max-width: 1400px) {
            .row {
                display: flex;
                justify-content: center;
            }

            .col-md-4 {
                flex: 0 0 auto !important;
                width: 50.33333333% !important;
            }
        }
    </style>
</head>

<body>
    <!-- <video autoplay muted loop id="background-video">
        <source src="./videos/studentRG.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video> -->
    <div class="container-fluid" style="background-color:rgba(0, 0, 0, 0.24)">
        <div class="row">
            <?php require "header.php"; ?>
            <div class="col-12 mt-2 mt-md-4">
                <div class="row">
                    <div class="col-1 col-md-4"></div>
                    <div class="col-10 col-md-4">
                        <form id="updateForm" action="" method="post" enctype="multipart/form-data"
                            class="w-100 w-md-75 mb-3 rounded p-4 text-light custom-form" id="studentsignin"
                            style="background-color: rgba(255, 255, 255, 0.3); border-radius: 24px !important;margin-bottom: 25px !important;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <div class="col-12">
                                <h1 class="fw-bold text-light text-center">Update Teacher Profile</h1>
                            </div>

                            <!-- Profile Picture Section -->
                            <div class="form-row text-center mb-3" id="profilePicContainer">
                                <label for="profilePicInput" id="profilePicLabel" class="position-relative">
                                    <?php
                                    if (empty($row['profile_image'])) {
                                        echo '<center><img width="100%;" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="student_dashboard/template/assets/images/faces/face16.jpg" alt="default image" /></center>';
                                    } else {
                                        $decoded_image = base64_decode($row['profile_image']);
                                        if ($decoded_image !== false) {
                                            echo '<center><img width="100%;" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="data:image/jpeg;base64,' . base64_encode($decoded_image) . '" alt="profile image" /></center>';
                                        } else {
                                            echo '<center><img width="100%;" id="profilePicPreview" class="img-fluid rounded-circle profile_image" src="student_dashboard/template/assets/images/faces/face16.jpg" alt="default image" /></center>';
                                        }
                                    }
                                    ?>
                                </label>
                                <input type="file" id="profilePicInput" class="d-none" name="profile_image"
                                    accept="image/*">
                            </div>
                            <!-- input profile image -->
                            <script>
                                document.getElementById('profilePicInput').addEventListener('change', function (event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        const reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById('profilePicPreview').src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                });
                            </script>


                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col mt-4">
                                                <label for="fName">First Name</label>
                                                <input type="text" name="fName" class="form-control custom-form-control"
                                                    placeholder="First name"
                                                    value="<?php echo htmlspecialchars($instructor['FirstName']); ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="col mt-4">
                                                <label for="lName">Last Name</label>
                                                <input type="text" name="lName" class="form-control custom-form-control"
                                                    placeholder="Last name"
                                                    value="<?php echo htmlspecialchars($instructor['LastName']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control custom-form-control" id="address"
                                    placeholder="Address"
                                    value="<?php echo htmlspecialchars($instructor['Address']); ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="address2">Address2</label>
                                <input type="text" name="address2" class="form-control custom-form-control"
                                    id="address2" placeholder="Address2"
                                    value="<?php echo htmlspecialchars($instructor['Address2']); ?>">
                            </div>

                            <div class="form-group mb-2">
                                <label for="country">Country</label>
                                <input type="text" name="country" class="form-control custom-form-control" id="country"
                                    placeholder="Country"
                                    value="<?php echo htmlspecialchars($instructor['Country']); ?>">
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" name="city" class="form-control custom-form-control"
                                                    id="city" placeholder="City"
                                                    value="<?php echo htmlspecialchars($instructor['City']); ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="zip">Zip</label>
                                                <input type="text" name="zip" class="form-control custom-form-control"
                                                    id="zip" placeholder="Zip"
                                                    value="<?php echo htmlspecialchars($instructor['ZipCode']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="contact">Contact</label>
                                <input class="form-control custom-form-control" name="contact" id="phone" type="tel"
                                    value="<?php echo htmlspecialchars($instructor['Phone']); ?>">
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                                <label class="form-check-label" for="dropdownCheck2">
                                    Remember me
                                </label>
                            </div>
                            <input type="hidden" name="instructor_id"
                                value="<?php echo htmlspecialchars($instructor_id); ?>">
                            <button type="button" onclick="showConfirmation()" class="btn btn-primary"
                                style="width: 100%; font-weight: 500;">Update</button>
                        </form>
                    </div>
                    <div class="col-1 col-md-4"></div>
                </div>
            </div>
            <div style="padding: 0px;">
                <?php require "footer.php"; ?>
            </div>
        </div>
    </div>
    <script>
        function showConfirmation() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    document.getElementById("updateForm").submit();
                }
            });
        }
    </script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="StudentRegister.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>