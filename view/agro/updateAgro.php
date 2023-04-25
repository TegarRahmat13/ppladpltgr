<?php

include '../../linkconfig.php';
require PATH_CONTROLLER . "controller.php";
$qry = new Query();
session_start();
$user_id = $_SESSION['id_agro'];
// $userUpdater = new UserUpdater($conn, $user_id);
// $userUpdater->updateProfile($user_id);
// $messages = $userUpdater->getMessages();
// error_reporting(E_ALL ^ E_NOTICE);

if (isset($_POST['submit'])) {
   // $update_name =  $_POST['update_name'];
   // $update_email = $_POST['update_email'];
   // $update_namausaha =$_POST['update_namausaha'];
   // $update_deskripsi =$_POST['update_deskripsi'];
   // echo "User ID: ".$user_id."<br>";
   // echo "Name: ".$update_name."<br>";
   // echo "Email: ".$update_email."<br>";
   // echo "Nama Usaha: ".$update_namausaha."<br>";
   // echo "Deskripsi: ".$update_deskripsi."<br>";
   $qry->updateProfile($user_id);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../logsign_style.css">

</head>

<body>

   <div class="update-profile shadow p-3 mb-5 bg-body rounded" style="margin: auto;width: 50%;margin-top:5%;margin-bottom:5%">

      <?php
      $conn =  mysqli_connect("localhost", "root", "", "ppl");
      $select = mysqli_query($conn, "SELECT * FROM `pelakuagro` WHERE id_agro = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

      <form method="post" enctype="multipart/form-data">
         <?php
         if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
         } else {
            echo'<img src="../../upimage/' . $fetch['image'] . '" class="rounded" style="width: 150px;"
  alt="Avatar" />';
            // echo '<img src="../../upimage/' . $fetch['image'] . '">';
         }
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input name="update_name" type="text" class="form-control" value="<?php echo $fetch['name']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
         </div>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="update_email" type="email" class="form-control" value="<?php echo $fetch['email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
         </div>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Usaha</label>
            <input name="update_namausaha" type="text" class="form-control" value="<?php echo $fetch['namausaha']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
         </div>
         <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
            <input name="update_deskripsi" type="text" class="form-control" value="<?php echo $fetch['deskripsi']; ?>" id="exampleInputPassword1">
         </div>
         <label for="exampleInputPassword1" class="form-label">Update Image</label>
         <div class="mb-3 form-check">

            <input name="update_image" type="file" accept="image/jpg, image/jpeg, image/png" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1"></label>
         </div>
         <button type="submit" value="update profile" name="submit" class="btn btn-primary">Submit</button>
      </form>


   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>