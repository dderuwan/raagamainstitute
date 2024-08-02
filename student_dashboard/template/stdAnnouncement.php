<?php
session_start();
require '../../Databsase/connection.php';

if (!isset($_SESSION["id"])) {
    header("location:../../Student_Signin.php");
}

$studentNo = $_SESSION['id'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements - Student View</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="../images/favicon.png">
    <style>
        .content-wrapper {
            padding: 20px;
            background-color: white;
            min-height: 100vh;
        }

        .announcement-card {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .announcement-card.read {
            background-color: #e7f4e7;
        }

        .announcement-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .announcement-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .announcement-title {
            color: #333;
            font-size: 20px;
            font-weight: bold;
        }

        .announcement-info {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .announcement-content {
            margin-top: 10px;
            line-height: 1.6;
            color: #444;
        }

        .read-button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
        }

        .read-button:hover {
            background-color: #45a049;
        }

        .footer {
            background-color: black;
        }

        /* message send button */

        .send-button {

            background-color: #28a745; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            cursor: pointer;
            width: 15%;
            border-radius: 5px;
            float: right !important;
        }
        .send-button:hover {
            background-color: #218838; 
        }

        .done-text {
            display: inline-block;
            margin-right: 10px;
            font-weight: bold;
            color: #5a5a5a; 
        }
        .send-button {
            margin-top: 10px;
        }

    </style>
</head>

<body>
    <div class="container-scroller">
        <nav style="background-color: #002B45;">
            <?php include 'sidenav.php'; ?>
        </nav>

        <div class="main-panel" style="background-color: white;">
            <div class="row">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; padding: 15px; ">
                    <h1 style="font-size: 32px; color: #002B45; font-family: Georgia, 'Times New Roman', Times, serif;">My Class Announcements</h1>
                </div>
            </div>
            <div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <?php
            $SQL = "SELECT * FROM `announcements`";
            $Result = mysqli_query($connection, $SQL);

            if (mysqli_num_rows($Result) > 0) {
                while ($row = mysqli_fetch_assoc($Result)) {
            ?>
            <div class="announcement-card" id="card-<?php echo $row['id']; ?>">
                <div class="announcement-header">
                    <div class="announcement-title">
                        <?php echo htmlspecialchars($row['announcement']); ?>
                    </div>
                    <button class="read-button btn btn-primary" onclick="markAsRead(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['announcement']); ?>')">Mark as Read</button>
                </div>
                <h5 class="announcement-content" style="background-color: #88CAD2; padding:15px; border-radius: 15px; font-size:18px;"><?php echo nl2br(htmlspecialchars($row['message'])); ?></h5>
                <div class="announcement-info">
                    <?php
                    $courseID = $row['course'];
                    $SQLC = "SELECT * FROM `courses` WHERE id = $courseID";
                    $RESULTC = mysqli_query($connection, $SQLC);
                    $ROWC = mysqli_fetch_array($RESULTC);
                    ?>
                    <h5 style="margin-top: 12px; margin-bottom: 0;">Course - <?php echo htmlspecialchars($ROWC['course_title']); ?></h5>
                    <br>
                    <?php
                    $InsID = $row['instructor_id'];
                    $SQLI = "SELECT * FROM `instructors` WHERE id = $InsID";
                    $RESULTI = mysqli_query($connection, $SQLI);
                    $ROWI = mysqli_fetch_array($RESULTI);
                    ?>
                    <h5 style="margin-top: 0;">Instructor - <?php echo htmlspecialchars($ROWI['FirstName'] ." ". $ROWI['LastName']); ?></h5>
                </div>
            </div>
            
                <!-- popup container of the message function -->
                <div class="modal fade" id="messageModalnew-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="annomessageModalLabel-<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="background-color: white; color: black;">
                            <div class="modal-header" style="display: flex; justify-content: center; align-items: center;">
                                <h1 class="modal-title" id="annomessageModalLabel-<?php echo $row['id']; ?>" style="font-size: 24px;">Send Message</h1>
                                <button type="button" class="close" data-dismiss="modal" style="position: relative; right: 10px;" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="../../handlers/announcementHandler.php" onsubmit="annosetStartedTime()" method="post">
                                <div class="modal-body">
                                    <label for="topic">Topic:</label>
                                    <input type="text" id="annotopic-<?php echo $row['id']; ?>" style="background-color: white; color: black;" name="annotopic" class="form-control" value="<?php echo htmlspecialchars($row['announcement']); ?>" readonly>
                                    <label for="Reply">Reply:</label>
                                    <textarea name="annomessage" class="form-control" style="background-color: white; color: black;" id="exampleFormControlInput1" placeholder="Type Here" required></textarea>
                                    <input type="hidden" id="annostartedTime" name="annostartedTime">
                                    <input type="hidden" id="annoinstructuerNo-<?php echo $row['id']; ?>" name="annoinstructuerNo"  value="<?php echo htmlspecialchars($row['instructor_id']); ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="annosendMessage" class="btn btn-success" style="float:right; margin-top: 5px; margin-bottom: 5px;">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else { ?>
                <p class="text-center">No announcements found.</p>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<footer class="footer">
    <?php include './studentfooter.php'; ?>
</footer>

<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Check the state from localStorage
        var cards = document.querySelectorAll('.announcement-card');
        cards.forEach(function (card) {
            var id = card.id;
            if (localStorage.getItem(id) === 'read') {
                applyReadState(card);
            }
        });
    });

    function markAsRead(id, announcement) {
        var card = document.getElementById('card-' + id);
        card.classList.add('read');

        // Save the state to localStorage
        localStorage.setItem('card-' + id, 'read');

        // Apply the read state changes
        applyReadState(card, announcement);
    }

    function applyReadState(card, announcement) {
        // Remove the existing button
        var button = card.querySelector('.read-button');
        if (button) {
            button.remove();
        }

        // Add a new text label
        var doneText = document.createElement('span');
        doneText.className = 'done-text';
        doneText.innerHTML = 'Done';
        card.querySelector('.announcement-header').appendChild(doneText);

        // Create a new button
        var newButton = document.createElement('button');
        newButton.className = 'send-button btn';
        newButton.innerHTML = 'Send Message';
        newButton.setAttribute('data-toggle', 'modal');
        newButton.setAttribute('data-target', '#messageModalnew-' + card.id.split('-')[1]);
        newButton.setAttribute('data-announcement', announcement);

        // Append the new button to the card
        card.appendChild(newButton);
    }

    // current time for the Course Details popup
    function annosetStartedTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var day = ("0" + now.getDate()).slice(-2);
        var hours = ("0" + now.getHours()).slice(-2);
        var minutes = ("0" + now.getMinutes()).slice(-2);
        var seconds = ("0" + now.getSeconds()).slice(-2);
        var formattedDateTime = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
        document.getElementById('annostartedTime').value = formattedDateTime;
        console.log("annostartedTime:", formattedDateTime); // Add this line for debugging
    }
</script>










</body>

</html>