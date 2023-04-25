<?php

include '../../linkconfig.php';
require PATH_CONTROLLER . "controller.php";



$qry = new Query();
session_start();
if(isset($_SESSION['email'])) {
    
    header("Location: dashboardAdmin.php");
    
    }
if(isset($_POST['submit'])){
   $cnt = $qry-> checkadmindata();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="stylesheet" href="../logsign_style.css">

</head>
<body>

<div class="login__container container">
    <div class="login__left">
        <!-- <img src="../../image/bg.png" alt=""> -->
        <h1 class="text-1">Agrocorp</h1>
        <p class="text-2">Membangun komoditas agroindustri bersama kami</p>       
    </div>
    <div class="login__right">
        <img src="../../image/logo_login.png" alt="home image" class="home__img">
            <div class="title__header">
                <h2>Login</h2>
                <p>Bersama kami memajukan pertanian indonesia</p>
            </div>
        <form method="POST">
        <div class="log__input">
            <div class="input__box">
                <i class="ri-mail-line"></i>
                <input type="email" name="email" placeholder="enter your email" required class="box">
            </div>
            <div class="input__box">
                <i class="ri-lock-2-line"></i>
                <input type="password" name="password" placeholder="enter your password" required class="box">
            </div>
            <a href="#" class="forgot">Forgot Password? </a>
            <button  class="log__in button" type="submit" name="submit" >
            Login Now
            </button> 
            <div class="text__sign-up">Don't have an account? <a href="registerAdmin.php" class="reg__now">register now</a></div>
        </div>
        </form>
    </div>
</div> 

</body>
</html>
