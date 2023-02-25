<?php 
include("connTFH/koneksi.php");
session_start();
if(isset($_SESSION['tfh_user'])){
  header('location:pages/dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login | The Farm Hill</title>
<link rel="icon" type="image/png" href="image/the_farm_hill.ico">
<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="plugins/jquery/jquery.min.js"></script>
</head>
<body>
  <img id="img" src="image/the_farm_hill.png">
  <div id="container">
    <h1>Log In</h1>
    <form action="#" method="post">
      <input type="text" id="username" name="username" placeholder="Username">
      <input type="password" id="pass" name="pass" placeholder="Password">
      <!-- <a href="#" type="submit" id="submit" name="submit">Log in</a> -->
      <button type="submit" id="submit" name="submit" value="Log in">Log in</button>
    </form>
  </div>

  <script type="text/javascript">
    $("#container").fadeIn();
  </script>
  <?php
  if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['pass'];

    $cek  = "SELECT id, nama, status FROM users WHERE id='$username' AND password='$password'";
    $query= pg_query($cek);
    $jml  = pg_num_rows($query);
    while($row=pg_fetch_array($query)){
      $_SESSION['tfh_user'] = $row['id'];
      $_SESSION['tfh_nama'] = $row['nama'];
      $_SESSION['tfh_status'] = $row['status'];
  ?>
      <script type="text/javascript">
        location.href="pages/dashboard";
      </script>
  <?php  
    }

    if($jml==0){ ?>
      <script type="text/javascript">
        alert("Maaf, Anda tidak diperkenankan mengakses web ini!");
        location.href="index.php";
      </script>
  <?php
    }
  }
  ?>
</body>
</html>
