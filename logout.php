<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index.php");
 }
 else if(isset($_SESSION['user'])!="") {
  header("Location: portal-index.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
 }
?>