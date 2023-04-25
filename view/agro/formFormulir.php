<?php

include '../../linkconfig.php';

require PATH_CONTROLLER . "controller.php";

$qry = new Query();
session_start();
$user_id = $_SESSION['id_agro'];

// if(!isset($user_id)){
//    header('location:loginAgro.php');
// };

if(isset($_POST['logout'])){

   session_destroy();
   header('location: loginAgro.php');
}

$data= new Query();
$data = $data ->showform($_GET)[0];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="agro_style.css">
</head>
<section class="kemitraanDetail_section container">
    <div class="back__tombol">
        <i class="ri-arrow-left-circle-fill"></i>
        <a href="tampilFormulirAgro.php">
            <h1>Halaman Kemitraan</h1>
        </a>
    </div>
    <div class="kemitraan_detail">
        <div class="kemitraanDetail grid">
            <div class="detail__left">
                <div class="kemitraan__img">
                    <img src="../../image/profile.JPG" alt="">
                </div>
                <div class="kemitraan__box nama">
                    <p><?php echo $data['nama']?> </p>
                </div>
                <div class="kemitraan__box umur">
                    <p><?php echo $data['nomertlp']?></p>
                </div>
                <div class="kemitraan__form grid">
                    <a href="#formulir">
                    <div class="form__icon">
                        <i class="ri-file-text-fill"></i>
                    </div>
                    </a>
                    <div class="action__icon">
                        <a href="#jikasetuju">
                            <i class="ri-check-fill"></i>
                        </a>
                        <a href="#jikatidak">
                            <i class="ri-close-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="detail__right">
                <div class="kemitraan__usaha grid">
                    <img src="../../image/profile.JPG" alt="">
                    <img src="../../image/profile.JPG" alt="">
                    <img src="../../image/profile.JPG" alt="">
                </div>
                <div class="kemitraan__box lokasi">
                    <p><?php echo $data['alamat']?></p>
                </div>
                <div class="kemitraan__box usaha">
                    <p>U<?php echo $data['alasan']?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>