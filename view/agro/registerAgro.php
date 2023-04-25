<?php

include '../../linkconfig.php';
require PATH_CONTROLLER . "controller.php";
$qry = new Query();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../upimage/' . $image;

    // $user_form = new register($conn);
    $message = $qry->register($name, $email, $pass, $cpass, $image, $image_size, $image_tmp_name, $image_folder);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <link rel="stylesheet" href="../logsign_style.css">

</head>
<body>

<div class="login__container container">
    <div class="login__left">
        <h1 class="text-1">Agrocorp</h1>
        <p class="text-2">Membangun komoditas agroindustri bersama kami</p>       
    </div>
    <div class="login__right">
        <img src="../../image/logo_login.png" alt="home image" class="home__img">
            <div class="title__header">
                <h2>Register</h2>
                <p>Silahkan Membuat akun terlebih dahulu</p>
            </div>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="log__input">
        <div class="input__box">
                <!-- <i class="ri-mail-line"></i> -->
                <input type="text" name="name" placeholder="enter username" class="box" required>
            </div>
            <div class="input__box">
                <i class="ri-mail-line"></i>
                <input type="email" name="email" placeholder="enter your email" required class="box">
            </div>
            <div class="input__box">
                <i class="ri-lock-2-line"></i>
                <input type="password" name="password" placeholder="enter your password" required class="box">
            </div>
            <div class="input__box">
                <i class="ri-mail-line"></i>
                <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            </div>
            <div class="input__box">
                <i class="ri-mail-line"></i>
                <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            </div>
            <button  class="log__in button" type="submit" name="submit" value="register now" >
            Register
            </button> 
            
        </div>
        </form>
    </div>
</div> 



</body>
</html>