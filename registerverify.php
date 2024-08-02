<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function verify() {
            var verificationcode = document.getElementById("verificode123").value;

            var r = new XMLHttpRequest();

            r.onreadystatechange = function () {
                if (r.readyState == 4 && r.status == 200) {
                    var t = r.responseText;
                    if (t == "Success") {
                        Swal.fire({
                            icon: "success",
                            title: "Verification Success",
                            text: "You are now logged in!",
                        }).then(() => {
                            window.location = "Teacher_Signin.php"; // Redirect to index.php after successful verification
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Verification Failed",
                            text: t, // Display the error message from the server
                        });
                    }
                }
            };

            r.open("GET", "./handlers/verificationprocess.php?v=" + verificationcode, true);
            r.send();

        }
    </script>
    <title> Teacher Verification Process</title>
</head>

<body>
    <section id="header">
        <?php
        require "header.php";
        ?>

    </section>
    <div class="container-fluid mb-5 mt-0 mt-md-5">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3> Please Enter Your Verification Code !!! </h3>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <input type="text" class="form-control text-center" id="verificode123"
                                    name="verificode">
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary w-50" onclick="verify();">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
    <section id="footer">
        <?php
        require "footer.php";
        ?>
    </section>
</body>

</html>