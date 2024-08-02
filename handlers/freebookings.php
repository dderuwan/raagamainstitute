<?php
include ('../Databsase/connection.php');

if (isset($_POST['btnSubmit'])) {
    $name = htmlspecialchars($_POST['name']);
    $contactNumber = htmlspecialchars($_POST['Cnumber']);
    $email = htmlspecialchars($_POST['address']);
    $country = htmlspecialchars($_POST['country']);

    if (empty($name) || empty($contactNumber) || empty($email) || empty($country)) {
        echo "<script> alert('All fields are required.'); </script>";
        echo "<script> window.history.back(); </script>";
    } else {
        // Check if the email already exists
        $stmt = $connection->prepare("SELECT COUNT(*) FROM bookings WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($emailCount);
        $stmt->fetch();
        $stmt->close();

        if ($emailCount > 0) {
            echo "<script> alert('This email address has already been used for booking.'); </script>";
            echo "<script> window.history.back(); </script>";
        } else {
            // Insert new booking
            $stmt = $connection->prepare("INSERT INTO bookings (name, contact_number, email, country) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $contactNumber, $email, $country);

            if ($stmt->execute()) {
                echo "<script> alert('Free Booking Details Submitted.'); </script>";
                echo "<script> window.history.back(); </script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

$connection->close();
?>
