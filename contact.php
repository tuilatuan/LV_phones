<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/headnav.css">
    <link rel="stylesheet" href="./css/lib/flickity.css" media="screen">
    <link rel="stylesheet" href="./font/fontawesome-free-6.3.0-web/css/all.min.css" />
    <link rel="stylesheet" href="css/lib/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/popper.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <title>Liên hệ</title>
</head>

<body>
    <?php
    include('inc/load.php');
    include('db/connect.php');
    include('inc/header.php');
    ?>
    <div class="container">
        <div class="form">
            <div class="left">
                <form action="page/xulyfeedback.php" method="post">
                    <input type="text" name="email" placeholder="Email"><br />
                    <input type="text" class="note" name="content" placeholder="Nhập vào nội dung"><br />
                    <input type="submit" class="sbmbtn" name="btnsub" value="Gửi yêu cầu">
                </form>
            </div>
            <div class="right">
                <div class="right-contact">
                    <h6 class="right-contact_header">
                        <i class="fa-solid fa-location-dot"></i>Địa chỉ
                    </h6>
                    <li>CN1: 273 An Dương Vương, Quận 5.</li>
                    <li>CN2: 105 Bà Huyện Thanh Quan, Quận 3.</li>
                    <li>CN3: 04 Tôn Đức Thắng, Quận 1</li>
                    <li>CN4: 20 Ngô Thời Nhiệm, Quận 3.</li>
                    <br>
                    <h6 class="right-contact_header">
                        <i class="fa-solid fa-globe"></i>Liên hệ
                    </h6>
                    <li><i class="fa-solid fa-phone"></i>1800 1234</li>
                    <li><i class="fa-solid fa-envelope"></i>lvphones@gmail.com</li>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('inc/footer.php');
    ?>
</body>

</html>