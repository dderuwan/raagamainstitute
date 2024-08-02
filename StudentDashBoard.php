<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/Tdashboard_1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="dashboard.css">
    <link href="./css/main.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- header section -->
    <section id="header">
        <?php
        require "header.php";
        ?>

        <?php
        require "header2.php";
        ?>
    </section>

    <!-- Home Upper -->
    <div class="col-12 upper">
        <h1>Hey, AKILA kASUN &#128520</h1>
    </div>

    <!-- dashboard -->
    <div class="col-12">
        <div class="row">
            <div class=" col-1 col-md-1"></div>
            <div class="col-10 col-md-10">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class=" teachdashdiv">
                            <div class="row">
                                <div class="col-12 col-md-2 mt-3">
                                    <div class="row">
                                        <div class="col-10 mx-2 mb-2 btn btn-success"><a href="Home.php"
                                                style="color:black; text-decoration:none;"><i
                                                    class="bi bi-book"></i>&nbsp; My Learnings</a> <br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-people"></i>&nbsp;My Consultats</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-chat-left-dots-fill"></i>&nbsp;Chat</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-heart"></i>&nbsp;WishList</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-tv"></i>&nbsp;Subscriptions</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-patch-check"></i>&nbsp;Subscription
                                                &nbsp;&nbsp;&nbsp;&nbsp;Plan</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-gear"></i>&nbsp;Profile Settings</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-wallet"></i>&nbsp;My Wallet</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Home.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-info-circle"></i>&nbsp;Help</a><br><br></div>
                                        <div class="col-10 mx-2 mb-2"><a href="Student_Signin.php"
                                                style="color:black;text-decoration:none;"><i
                                                    class="bi bi-box-arrow-right"></i>&nbsp;Logout</a><br><br></div>

                                        <var></var>
                                    </div>
                                </div>
                                <!-- dashboard details -->
                                <div class="col-12 col-md-10 " style="border-radius: 10px;">
                                    <div class="row">
                                        <div class="col-12 col-md-12 ">
                                            <div class="row">
                                                <div class="col-4">Cource</div>
                                                <div class="col-1">Author</div>
                                                <div class="col-1">Price</div>
                                                <div class="col-2">Order ID</div>
                                                <div class="col-1">Validity</div>
                                                <div class="col-2">Prograss</div>
                                                <div class="col-1">Action</div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-12 bg-danger">kk</div>
                                        <div class="row"></div>




                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-1 col-md-1"></div>
        </div>
    </div>
</body>

</html>