<?php
session_start();
include('./Databsase/connection.php'); // Include database connections

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $payment_method = $_POST['paymentMethod'];
    $cc_name = $_POST['cc_name'];
    $cc_number = $_POST['cc_number'];
    $cc_expiration = $_POST['cc_expiration'];
    $cc_cvv = $_POST['cc_cvv'];

    $cart_items = [];
    if (isset($_SESSION['student_id'])) {
        $student_id = $_SESSION['student_id'];
        $query = "SELECT * FROM cart WHERE student_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $cart_items[] = $row;
        }
    } else {
        $cart_items = $_SESSION['cart'] ?? [];
    }

    if (count($cart_items) === 0) {
        die("No items in the cart for checkout.");
    }

    // Here, you would typically process the payment and save the order details to the database
    // For demonstration, let's assume the payment is processed and save the order

    $query = "INSERT INTO orders (student_id, first_name, last_name, username, email, address, address2, country, state, zip, payment_method, cc_name, cc_number, cc_expiration, cc_cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("isssssssssssssss", $student_id, $first_name, $last_name, $username, $email, $address, $address2, $country, $state, $zip, $payment_method, $cc_name, $cc_number, $cc_expiration, $cc_cvv);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    foreach ($cart_items as $item) {
        $query = "INSERT INTO order_items (order_id, course_id, package_type, title, price, imagePath, s_description) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("iisssss", $order_id, $item['course_id'], $item['package_type'], $item['title'], $item['price'], $item['imagePath'], $item['s_description']);
        $stmt->execute();
    }

    // Clear the cart
    if (isset($_SESSION['student_id'])) {
        $query = "DELETE FROM cart WHERE student_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
    } else {
        unset($_SESSION['cart']);
    }

    echo "<script>alert('Order placed successfully!'); window.location.href='thank_you.php';</script>";
}
?>
