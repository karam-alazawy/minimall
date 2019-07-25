<?php
include 'config.php';
if (!isset($_SESSION['token'])) {
    # code...
        echo '<script type="text/javascript">window.location.href = "login.php";</script>';

}
?>
<!DOCTYPE html>
<html style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
      <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a data-bs-hover-animate="pulse" style="font-size: 0px;margin: 0px 20px 0px 10px;color: #20a1ab;" class="far fa-arrow-alt-circle-left" href="MiniMall.php"></a>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                      <a class="btn btn-light action-button" role="button" data-bs-hover-animate="pulse" href="logout.php">Log Out</a></div>
                </div>
            </nav>
<body style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
     <div class="features-boxed" style="background: linear-gradient(135deg, #172a74, #21a9af);height: 100%;">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="    color: white;">Features </h2>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="facebook.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fa fa-facebook bounce animated icon"></i>
                            <h3 class="name">Facebook</h3>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="minimall.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fa fa-shopping-cart bounce animated icon"></i>
                            <h3 class="name">Minimall</h3></div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="master.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fa fa-cc-mastercard bounce animated icon"></i>
                            <h3 class="name">MasterCard</h3>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="shipping.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fas fa-shipping-fast bounce animated icon"></i>
                            <h3 class="name">Shipping</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>