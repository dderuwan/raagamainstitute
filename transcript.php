<?php
session_start();
include('./Databsase/connection.php')
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        body{
            height: 100vh;
        }
        .trascript-container{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 60%;
            margin: auto;
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 100px;
            font-family: Arial, sans-serif;
            font-size: 20px;
            color: #333;
            transition: box-shadow 0.3s ease-in-out;
            margin-bottom: 60px;
        }

        .logo{
            width: 60%;
        }

    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Transcript</title>
</head>

<body>
    <?php require "header.php"; ?>
    <?php require "header2.php"; ?>

    <div class="trascript-container">
        <div class="logo">
            <img src="./images/v3_66.png" alt="">
        </div>
    </div>

    <section id="footer">
        <?php
        require "footer.php";
        ?>
    </section>
</body>
</html>