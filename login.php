<?php
include 'config.php';
?>
<!DOCTYPE html>

<html>
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

<body class="text-center text-secondary">
    <div class="text-center text-dark login-clean" style="background: linear-gradient(135deg, #172a74, #21a9af);background-repeat: no-repeat;background-position: center;background-size: cover;padding: 86px;height: -webkit-fill-available;background-color: rgb(232,186,97);">
        <form id="myform" method="post" style="width: 380px;max-width: 429px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="bounce animated illustration"><i class="icon ion-ios-navigate" data-bs-hover-animate="pulse"></i></div>
            <div class="form-group text-center" style="width: 327px;"><input id='username' class="form-control d-xl-flex align-items-xl-start" type="text" name="text" placeholder="Text" data-bs-hover-animate="pulse" style="width: 290px;filter: blur(0px);"></div>
            <div class="form-group d-xl-flex align-items-xl-center"><input class="form-control" type="password" name="password" placeholder="Password" id='password' data-bs-hover-animate="pulse" style="width: 290px;"></div>
            <div class="form-group"><button onclick="login()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" type="submit" data-bs-hover-animate="pulse">Log In</button></div><a href="#" data-bs-hover-animate="pulse" class="forgot">Forgot your email or password?</a>
<div class="alert alert-danger" role="alert">
	Check Your Information !!</div>
        </form>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>
<style type="text/css">
	.alert{
		    margin: 15px;
    display: none;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
	var username;
	var password;
$('#myform').submit(function () {
 return false;
});
	function login() {
		// body...
		username = $('#username').val();
		password = $('#password').val();
		console.log(username);
		console.log(password);
		check(username,password);

	}
	function check(user,pass) {
		// body...
			$.get( "api.php?action=login&username="+user+"&password="+password, function( data ) {
		var obj = $.parseJSON(data);

  if (obj['access']!="0") {
  		$(".alert").css("display", "none");

  	  console.log(obj);
  	  window.location.href="index.php";
  }
  else{
	$(".alert").css("display", "initial");
  }

});
	}
</script>
</html>