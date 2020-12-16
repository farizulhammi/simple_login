<?php
session_start();
require("config.php");

//mengecek apakah submit sudah di tekan
if (isset($_POST['submit'])) {
    $username = protek($_POST['username']);
    $password = protek($_POST['password']);

    //menjalankan fungsi validasi
    validasi($username,$password);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="assets/style.css">
<script src="assets/sweetalert.js"></script>
</head>
<body>
<div class="wrapper">
<div class="profile-card js-profile-card">
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
  
<?php 
//sweetalert
if (isset($_SESSION['respon'])) {
    $respon =  $_SESSION['respon']; 
    ?>
    <script>swal("<?= $respon['title']; ?>","<?= $respon['isi']; ?>","<?= $respon['type']; ?>")</script>
<?php    
}
//end
?>

    <div class="profile-card__cntttt">
<form action="" method="post" class="form" enctype="multipart/form-data">
    <h2>Log in  </h2>
                <label for="uname" >Username </label>
                <input type="text" name="username" class="form-content" id="uname" >
                <div class="form-border"></div>
                <br> 
                <label for="pass" >Password </label>
                <input type="password" name="password" class="form-content" id="pass" >
                <div class="form-border"></div>
                <br>
                <br>
                <input type="submit" value="Log in" name="submit" class="profile-card__button button--blue">   
</form>
       


</div>
</div>
</div>
</body>
<script  src="assets/script.js"></script>
</html>

