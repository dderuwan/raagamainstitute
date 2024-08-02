<?php
session_start();
include('./Databsase/connection.php');

if (!isset($_SESSION['id'])) {
    header("location:./Student_Signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Vaathi Home</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="icon" href="images/v3_66.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<body>

    <section id="header">
        <?php require "header.php"; ?>
    </section>

    <div class="container py-5">
        <div class="row">
            <!-- First Row: Cart and Summary -->
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <?php
                                $studentId = $_SESSION['id'];
                                $SQL = "SELECT COUNT(*) AS countStudent FROM `cart` WHERE student_id = $studentId";

                                $result = mysqli_query($connection, $SQL);

                                $row = mysqli_fetch_array($result);
                                ?>
                                <h5 class="mb-0">Cart - <?php echo $row['countStudent'] ?> items</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $totalCart = 0;
                                $SQL2 = "SELECT * FROM `cart` WHERE student_id = $studentId";

                                $result2 = mysqli_query($connection, $SQL2);

                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        $image_path = $row2["imagePath"];
                                        $image_path = str_replace('../course', './course', $image_path);
                                        $totalCart = $totalCart + $row2['price'];
                                ?>
                                        <div class="row mb-4">
                                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                    <img src="<?php echo $image_path ?>" class="w-100" alt="<?php echo $row2['title'] ?>" />
                                                    <a href="#!">
                                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                <p><strong><?php echo $row2['title'] ?></strong></p>
                                                <p><?php echo $row2['s_description'] ?></p>
                                                <p>Package: <?php echo $row2['package_type'] ?></p>
                                                <button type="button" class="btn btn-primary btn-sm me-1 mb-2" title="Move to the wish list">Wish List <i class="fas fa-heart"></i></button>
                                                <form method="post" action="./handlers/deleteCart.php" style="display:inline;">
                                                    <input type="hidden" name="id" value="<?php echo $row2['id'] ?>">
                                                    <button type="submit" name="remove" class="btn btn-danger btn-sm mb-2" title="Remove item">Delete <i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 d-flex gap-4">
                                                <div class="mb-4 text-center mx-1" style="max-width: 300px;">
                                                    <p class="text-start text-md-center"><strong>Rs.<?php echo $row2['price'] ?></strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                <?php
                                    }
                                } else {
                                    echo "<p>You have no course in your cart</p>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Products
                                        <span>Rs.<?php echo $totalCart ?></span>
                                    </li>
                                    <hr>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                            <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong>
                                        </div>
                                        <span><strong>Rs.<?php echo $totalCart ?></strong></span>
                                    </li>
                                </ul>
                                <a href="checkOut.php"><button type="button" class="btn btn-primary btn-lg btn-block">Go to checkout</button></a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>Promotions</h4>
                                <input type="text" placeholder="Enter Coupon" class="px-4 py-2 w-full outline-none" />
                                <button class="text-white px-4 py-2 text-center btn-primary rounded">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>
                        <img class="me-2" width="45px" src="./uploads/visa.png" alt="Visa" />
                        <img class="me-2" width="45px" src="./uploads/american-express.png" alt="American Express" />
                        <img class="me-2" width="45px" src="./uploads/card.png" alt="Mastercard" />
                        <img class="me-2" width="45px" src="./uploads/paypal.png" alt="PayPal acceptance mark" />
                    </div>
                </div>
            </div>

            <!-- Second Row: You might also like -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="text-center">You might also like</h2>
                        <div class="d-flex my-5 gap-5 justify-content-center">
                            <?php if ($result->num_rows > 0) : ?>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <div class="card" style="width: 12rem;">
                                        <img src="<?php echo "./uploads/" . htmlspecialchars($row['imagePath']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['course_title']); ?>">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title"><?php echo htmlspecialchars($row['course_title']); ?></h5>
                                                <p class="card-text"><?php echo htmlspecialchars($row['s_description']); ?></p>
                                            </div>
                                            <a href="Single_Page_View.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-primary mt-auto">Learn More</a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <p class="text-center w-100">No courses available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="footer">
        <?php require "footer.php"; ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>