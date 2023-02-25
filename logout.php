<?php
  session_start();
  //unset($_SESSION['sita_user_name']);
  //unset($_SESSION['sita_user_nik']);
  session_destroy();
  header("Location:index.php");
?>