<?php
session_start();
include('../Databsase/connection.php'); 
if (!isset($_SESSION['idAdmin'])) {
    header('location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instructorId = $_POST['instructorId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $total_payment = $_POST['total_payment'];
    $course = $_POST['coursesTitle'];

    // Selecting bank details
    $bankSQL = "SELECT * FROM bank_details WHERE instructorId = $instructorId";
    $bankResult = mysqli_query($connection, $bankSQL);
    if ($bankResult && mysqli_num_rows($bankResult) > 0) {
        $bankRow = mysqli_fetch_array($bankResult);
        $holderName = $bankRow['hname'];
        $bankName = $bankRow['bname'];
        $branch = $bankRow['branch'];
        $accountNo = $bankRow['anumber'];
        $bankDetailsFound = true;
    } else {
        $holderName = $bankName = $branch = $accountNo = 'Null';
        $bankDetailsFound = false;
    }


} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Bill</title>
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style= "background-color: #f8f9fd;">
    <div class="container" style="margin-top:20px !important;">
        <h1 class="h3 mb-4 text-gray-800">Send Payment for <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?></h1>
        <div class="card shadow mb-4"  >
            <div class="card-body" >
                <form action="../handlers/instructorpayHandler.php" onsubmit="setPaidTime()" method="POST">
                    <input type="hidden" name="instructorId" value="<?php echo htmlspecialchars($instructorId); ?>">
                    <input type="hidden" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
                    <input type="hidden" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    <input type="hidden" name="total_payment" value="<?php echo htmlspecialchars($total_payment); ?>">
                    <input type="hidden" id="paidTime" name="paidTime">
                    <h5>Instructor Details:</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>First Name</th>
                            <td><?php echo htmlspecialchars($firstName); ?></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><?php echo htmlspecialchars($lastName); ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo htmlspecialchars($phone); ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo htmlspecialchars($email); ?></td>
                        </tr>
                        <tr>
                            <th>Total Payment</th>
                            <td><?php echo htmlspecialchars($total_payment); ?></td>
                        </tr>
                    </table>

                    <h5>Bank Details:</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Account Holder Name</th>
                                <th>Bank Name</th>
                                <th>Branch</th>
                                <th>Account Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo htmlspecialchars($holderName); ?></td>
                                <td><?php echo htmlspecialchars($bankName); ?></td>
                                <td><?php echo htmlspecialchars($branch); ?></td>
                                <td><?php echo htmlspecialchars($accountNo); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if ($bankDetailsFound): ?>
                        <button type="submit" class="btn btn-success" style="float:right;" name="payment">Pay</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-warning" style="float:right;" name="requestdetails">Request Bank Details</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <script>
            // current time for the instructuer popup 
            function setPaidTime() {
                var now = new Date();
                var year = now.getFullYear();
                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                var day = ("0" + now.getDate()).slice(-2);
                var hours = ("0" + now.getHours()).slice(-2);
                var minutes = ("0" + now.getMinutes()).slice(-2);
                var seconds = ("0" + now.getSeconds()).slice(-2);
                var formattedDateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
                document.getElementById('paidTime').value = formattedDateTime;
                console.log("paidTime:", formattedDateTime); 
            }
    </script>


</body>

</html>
