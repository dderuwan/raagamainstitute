<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .footer-social-icon span {
            color: #fff;
            display: block;
            font-size: 20px !important;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-social-icon a {
            color: #fff;
            font-size: 16px;
            margin-right: 15px;
        }

        .footer-social-icon i {
            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 38px;
            border-radius: 50%;
        }

        .facebook-bg {
            background: #3B5998;
        }

        .instagram-bg {
            background: #e1306c;
        }

        .twitter-bg {
            background: #55ACEE;
        }

        .youtube-bg {
            background: #CD201F;
        }

        @media screen and (max-width: 550px) {
            .footer {
                background-color: #002b44 !important;
            }

            .footer-social-icon a {
                font-size: 14px;
                margin-right: 0px;
            }

            .footer-social-icon i {
                height: 25px;
                width: 25px;
                line-height: 25px;
                margin-left: 1px;
            }

            .d-sm-flex span {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>
    <footer class="footer" style="background-color: black; width: 100%; margin: 0;">
        <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="d-block text-center text-sm-left d-sm-inline-block" style="color: white;">Copyright ©
                    RaagamaInstitute.com
                    2024</span>
            </div>

            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <div class="footer-social-icon">
                    <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                    <a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
                    <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                    <a href="#"><i class="fab fa-youtube youtube-bg"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>