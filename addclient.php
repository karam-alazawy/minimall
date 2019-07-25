<?php
include 'config.php';
if (!isset($_SESSION['token'])) {
    # code...
        echo '<script type="text/javascript">window.location.href = "login.php";</script>';

}
?>
<!DOCTYPE html>
<html style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MiniMall</title>
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

<body style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
    <div style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
        <div class="header-blue" style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
                 <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a data-bs-hover-animate="pulse" style="font-size: 35px;margin: 0px 20px 0px 10px;color: #20a1ab;" class="far fa-arrow-alt-circle-left" href="minimall.php"></a>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                      <a class="btn btn-light action-button" role="button" data-bs-hover-animate="pulse" href="logout.php">Log Out</a></div>
                </div>
            </nav>
            <div class="container text-right hero" style="margin-top: 10px;">
                <div class="row text-right" style="direction: rtl;" direction="rtl;">
                    <div class="col text-right" direction="rtl;">
                        <div class="float-left image-holder" data-bs-hover-animate="pulse" style="background-image: url(&quot;assets/img/businessman-shaking-hands-with-client_1098-3378.jpg&quot;);width: 607px;height: 600px;padding: 0 0 20px;background-size: cover;background-color: #e8ba61;"></div>
                        <div class="text-right" style="width: 607px;height: 381px;text-align: center;padding: 0 0 20px;color: rgb(244,71,107);">
                            <div class="form-group text-center float-left" style="width: 507px;margin-top: 58px;max-width: 461px;/*width: 90%;*/height: 600px;margin: 0 auto;background-color: #ffffff;padding: 40px;border-radius: 4px;color: #505e6c;box-shadow: 1px 1px 5px rgba(0,0,0,0.1);">
                                <div class="bounce animated" style="text-align: center;padding: 0 0 20px;font-size: 100px;color: rgb(244,71,107);height: 109px;margin-bottom: 44px;"><i class="icon ion-person-add bounce animated" style="text-align: center;padding: 0 0 20px;font-size: 100px;color: rgb(244,71,107);"></i></div><input type="text" class="name" name="title" placeholder="ألاسم" data-bs-hover-animate="pulse"
                                    style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;">
                                <input
                                    type="text"  class="address"  name="address" placeholder="العنوان" data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;"><input  class="email"  type="text" name="email" placeholder="البريد الاكتروني" data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;">
                                    <input
                                        type="text"  class="phone"  name="phone" placeholder="رقم الهاتف" data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;"><input type="text"  class="reputation"  name="reputation" placeholder="كيف سمعت عنا" data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;">
                                        <button  onclick="adduser()"  class="btn btn-primary btn-block" type="submit" data-bs-hover-animate="pulse" style="background: #f4476b;border: none;border-radius: 4px;padding: 11px;margin-right: auto;margin-left: auto;width: 271px;box-shadow: none;margin-top: 26px;text-shadow: none;outline: none !important;cursor: pointer;">اضف</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

<script type="text/javascript">
    var token;
    var name;
    var address;
    var email;
    var reputation;
    var phone;
    var balance;
$('#myform').submit(function () {
 return false;
});
    function adduser() {
        // body...
        token = "<?php echo $_SESSION['token'];?>";
        name = $('.name').val();
        address = $('.address').val();
        email = $('.email').val();
        reputation = $('.reputation').val();
        phone = $('.phone').val();
        balance = 0;
        console.log(name);
        console.log(token);
        check();

    }
    function check() {
        // body...
            $.get( "api.php?action=addclient&name="+name+"&address="+address+"&email="+email+"&reputation="+reputation+"&phone="+phone+"&balance="+balance+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);

  if (obj['access']!="0") {
        $(".alert").css("display", "none");

      console.log(obj);
                alert("Success .");

            window.location.href="add-purchase.php?id="+obj['id'];

  }
  else{
          console.log(obj);
          alert("Check Your Information !!");

  }

});
           
    }



    
</script>
</html>