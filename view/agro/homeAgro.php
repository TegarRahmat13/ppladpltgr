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

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
   <style>
      img {
         width: 200px;
         height: 200px;
      }
      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  color:  black;
  text-align: center;
  padding: 14px 50px;
  text-decoration: none;
}

li a:hover {
  background-color: rgba(116, 255, 253, 0.455);
}
#nav{
   display: flex;
   justify-content:space-around;
}
.nav_item{
   display: flex;
   
   align-items: center;
}
#nav img{
   width: 200px !important;
   height: 200px !important;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

   </style>
</head>
<body>

<div id="mySidenav" class="sidenav shadow p-3 mb-5 bg-body rounded">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="profile">
      
      <div style="margin: 15px;display:flex"> 
      <?php
      $conn =  mysqli_connect("localhost", "root", "", "ppl");
         $select = mysqli_query($conn, "SELECT * FROM `pelakuagro` WHERE id_agro = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img class="rounded-circle" style="width: 70px;height:70px;margin: 15px;" src="../../upimage/'.$fetch['image'].'">';
         }
      ?>
      <div>
      <h3 ><?php echo $fetch['name']; ?></h3>
      <p ><?php echo $fetch['email']?></p>
      </div>

      </div>
      <div>
      <a style="margin: 15px;text-align:left;font-size:20px" href="updateAgro.php" class="btn">update profile</a>
      <a style="margin: 15px;text-align:left;font-size:20px" href="../mitrapage/mitra_home.php" class="btn">kemitraan</a>
      <form action="" method="POST"  style="margin: 15px;margin-top:60px;color:white;text-align:left">
                    <button style="background: none;border:none;" class="dashboard-nav-item" name="logout" type="submit">Logout</button>
                    <!-- <a href="#" class="dashboard-nav-item" ><i class="fas fa-sign-out-alt"></i> Logout </a> -->
      </form>
      </div>

   </div>
   
</div>


<div id="nav">
<img style="width: 40px !important;height: 40px !important;margin-top:10px" src="../../image/Logo.png" >
   <div class="nav_item">
   <ul>
      <li><a href="#">Home</a></li>
      <li><a href="../mitra/homeMitra.php">kemitraan</a></li>
      <li><a href="#">Pencatatan</a></li>
   </ul>
   </div>
   <div style="width: 20px;height: 20px;">
      <img style="width: 40px !important;height: 40px !important;margin-top:10px;cursor:pointer" src="../../image/user.png" onclick="openNav()">
   </div>
</div>



<div class="container">
         <div class="maincontent" style="display: flex;">
            <img src="../../image/dashboard_img.png" style="width: 600px !important;height:600px !important">
            <div style="text-align: center;margin-top:20%">
               <h1 >Selamat Datang</h1>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            </div>
            
         </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "400px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>