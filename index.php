<?php
session_start();
require("config.php");
//mengecek apakah sudah login atau belum
if ( empty($_SESSION['username']) OR empty($_SESSION['data']) ) {
    header("Location: login.php");
}else{
    $data = $_SESSION['data'];
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
<div class="profile-card__cntttt">
<h3>Hai <?= $data['nama'];?></h3>
<h3>Last Login <?= $data['lastlogin'];?></h3>
</div>


</div>
</div>
   </body>
<script  src="assets/script.js"></script>
</html>