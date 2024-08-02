<?php
session_start();
include ('./Databsase/connection.php'); // Include database connections

$total = 0;
if (!isset($_SESSION['id'])) {
    header("location: ./Student_Signin.php");
}

$studentID = $_SESSION['id'];

$SQL = "SELECT * FROM `student` WHERE id = $studentID";
$Result = mysqli_query($connection, $SQL);
$row = mysqli_fetch_array($Result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>

    <script>
        function formatDateTime(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const year = date.getFullYear();
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
            return `${day}-${month}-${year} ${hours}.${minutes}.${seconds}`;
        }

        function displayDateTime() {
            const now = new Date();
            const formattedDateTime = formatDateTime(now);
            document.getElementById('transaction-date-time').innerText = formattedDateTime;
        }

        window.onload = displayDateTime;
    </script>

    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .bill-container {
            width: 80%;
            max-width: 600px;
            margin: 120px auto;
            background: url('/RaagamaInstitute/images/bill_bg.png') center/cover no-repeat;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: 'inter';
            position: relative;
        }

        .header {
            text-align: center;
        }

        .logo {
            margin: 5px 0 0 0;
            padding: 0px;
            width: 400px;
            height: auto;

        }

        .header p {
            color: #5E6470;
            font-size: 12px;
            margin: 0 0 10px 0;
        }

        .online-payment {
            border-bottom: 3px solid #7E7E7E;
        }

        .online-payment h3,
        .payment-details h3 {
            text-align: center;
            font-weight: 800;
            margin-bottom: 10px;

        }

        .company-info,
        .employee-info {
            border-bottom: 2px solid #DCDCDC;
            margin: 0 20px 0 20px;
            padding-bottom: 20px;

        }

        .company-info h3,
        .employee-info h3 {
            font-size: 17px;
            font-weight: 800;
            margin: 15px 0 5px 25px;

        }

        .company-info .h-details,
        .employee-info .h-details {
            margin: 0 0 0 35px;
            font-weight: 700;
            font-size: 14px;
            line-height: 25px;
            display: inline-block;
            width: 280px;
            vertical-align: top;
        }


        .company-info .s-details,
        .employee-info .s-details {
            color: #5E6470;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            width: calc(80% - 280px);
            line-break: anywhere;
        }


        .payment-details .h-details {
            margin: 0 0 0 45px;
            font-size: 15px;
            font-weight: 900;
            line-height: 25px;
            display: inline-block;
            width: 280px;
            vertical-align: top;

        }

        .payment-details .s-details {
            font-size: 15px;
            font-weight: 700;
            display: inline-block;
            width: calc(85% - 280px);
        }

        strong {
            color: #009900;
            font-size: 16px;
        }

        .t-details {
            display: flex;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: #5E6470;
            padding-top: 20px;
            margin-bottom: -30px;
        }


        .footer {
            border-top: 3px solid #7E7E7E;
            text-align: center;
            font-size: 12px;
            padding-top: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 600;
            color: #5E6470;
        }


        .button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #45a049;
        }

        .d-button {
            border-bottom: 3px solid #7E7E7E;
            padding-bottom: 10px;
            position: relative;
            bottom: 80px;

        }

        /* Adjustments for smaller screens */
        @media (max-width: 630px) {
            * {
                transition: .1s;
            }

            .company-info,
            .employee-info {
                margin: 0 10px;
            }

            .company-info .h-details,
            .employee-info .h-details,
            .payment-details .h-details {
                width: 250px;
                margin-left: 5px;
            }

            .company-info .s-details,
            .employee-info .s-details,
            .payment-details .s-details {
                width: calc(80% - 250px);
                margin-bottom: 5px;
                line-break: anywhere;
            }
        }

        @media (max-width: 540px) {
            * {
                transition: .1s;
            }

            .logo {
                width: 100%;
                max-width: 300px;
            }

            .company-info,
            .employee-info {
                margin: 0 10px;
            }

            .company-info .h-details,
            .employee-info .h-details,
            .payment-details .h-details {
                width: 170px;
                margin-left: 5px;
            }

            .company-info .s-details,
            .employee-info .s-details,
            .payment-details .s-details {
                width: calc(80% - 170px);
                margin-bottom: 5px;
                line-break: anywhere;
            }
        }


        @media (max-width: 470px) {
            * {
                transition: .1s;
            }

            .bill-container {
                padding: 10px;
            }

            .logo {
                width: 100%;
                max-width: 200px;
            }

            .company-info .h-details,
            .employee-info .h-details,
            .payment-details .h-details {
                width: 130px;
                margin-left: 2px;
                transform: scale(0.9);
            }

            .company-info .s-details,
            .employee-info .s-details,
            .payment-details .s-details {
                width: calc(80% - 100px);
                line-break: anywhere;
                transform: scale(0.9);

            }
        }
    </style>

</head>

<body>



    <div class="bill-container">

        <div class="d-button">
            <button onclick="downloadPDF()" class="button">Download PDF</button>
        </div>

        <div class="header">
            <img src="/RaagamaInstitute/images/v3_66.png" alt="Company Logo" class="logo">
            <p>No 15, Kuruppu road, Colombo 08. (+94) 115 810 810</p>
        </div>

        <div class="online-payment">
            <h3>ONLINE PAYMENT</h3>
        </div>

        <div class="company-info">
            <h3>COMPANY INFORMATION</h3>
            <span class="h-details">Company Name:</span><span class="s-details"> RaagamaInstitute</span></br>
            <span class="h-details">Company Email:</span><span class="s-details"> RaagamaInstitute@info.com</span></br>
            <span class="h-details">Company Contact No:</span><span class="s-details"> (+94) 115 810 811</span></br>
        </div>
        <div class="employee-info">
            <h3>STUDENT INFORMATION</h3>
            <span class="h-details">Student Name:</span><span
                class="s-details"><?php echo $row['firstName'] . " " . $row['lastName'] ?></span></br>
            <span class="h-details">Student Email:</span><span class="s-details"><?php echo $row['email'] ?></span></br>
            <span class="h-details">Student Contact No:</span><span
                class="s-details"><?php echo $row['phone'] ?></span></br>
        </div>
        <div class="payment-details">
            <h3>PAYMENT DETAILS</h3>
            <span class="h-details">Transaction Date & Time:</span><span class="s-details"
                id="transaction-date-time"></span></br>
            <span class="h-details">Status: </span><span class="s-details"> Successfully Completed</span></br>
            <span class="h-details">Transfer Amount:</span><span class="s-details"> <strong>LKR
                    <?php $_SESSION['total'] ?></strong></span></br>
        </div>

        <span class="t-details">Thank you for the business!</span></br>
        <div class="footer">
            <span class="h-details">RaagamaInstitute.com | (+94) 115 810 810 | Example@gmail.com</span>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        // Function to trigger PDF generation and hide the download button
        function downloadPDF() {
            const element = document.querySelector('.bill-container');
            const opt = {
                margin: 0.3,
                filename: 'bill.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            // Start PDF generation
            html2pdf().from(element).set(opt).save();

            // Hide the download button after clicking
            document.querySelector('.d-button').style.display = 'none';
        }
    </script>

</body>

</html>