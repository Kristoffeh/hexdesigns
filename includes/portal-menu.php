<?php
ob_start();
session_start();
require 'includes/vars.php';
require 'dbconnect.php';

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

?>
<link rel="stylesheet" href="assets-portal/css/w3.css">

<body style="background-color:rgb(242,242,242);">

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hover-blue" onclick="w3_close()">Lukk vindu &times;</button>
  <a href="index.php" class="w3-bar-item w3-button w3-hover-blue">Tilbake til hovedsiden</a>
  <a href="portal-support.php" class="w3-bar-item w3-button w3-hover-blue">Brukerstøtte</a>
  <a href="bestill.php" class="w3-bar-item w3-button w3-hover-blue">Bestill</a>
  
  <?php
  if ($userRow['userType'] == "admin"){
    echo "<a href='admin-index.php' class='w3-bar-item w3-button w3-hover-red w3-red'>Admin Panel</a>";
    echo "<a href='/phpmyadmin' class='w3-bar-item w3-button w3-hover-red w3-red'>PhpMyAdmin</a>";
  }
  ?>

  <!-- <a href="skriv-anmeldelse.php" class="w3-bar-item w3-button w3-hover-blue">Skriv anmeldelse</a> -->
</div>

<!-- Page Content -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

<div class="w3-blue">
  <button class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button>

  <div class="w3-container">
        <div class="col d-flex flex-row justify-content-end" style="margin-right:15px;margin-left:40px;margin-top:-47px;margin-bottom:0px;">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color:rgba(0,0,0,0);color:#efefef;border:0px; margin-right:30px;">
          <img class="rounded-circle" src="<?php echo $userRow['userImage']; ?>" width="30" height="30" style="margin-right:10px;"><?php echo $userRow['userName']; ?></button>
      <div class="dropdown-menu" role="menu">
          <a class="dropdown-item" role="presentation" href="konto.php">Konto</a>
          <a class="dropdown-item" role="presentation" href="innstillinger.php">Innstillinger</a>
          <a class="dropdown-item" role="presentation" href="logout.php?logout">Logg ut</a></div>
      </div>
</div>
  </div>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

<br/>
<br/>
<br/>

<?php
function calcMonth ($m){
    if ($m == "01"){
        return "Januar";
    }
    else if ($m == "02"){
        return "Februar";
    }
    else if ($m == "03"){
        return "Mars";
    }
    else if ($m == "04"){
        return "April";
    }
    else if ($m == "05"){
        return "Mai";
    }
    else if ($m == "06"){
        return "Juni";
    }
    else if ($m == "07"){
        return "Juli";
    }
    else if ($m == "08"){
        return "August";
    }
    else if ($m == "09"){
        return "September";
    }
    else if ($m == "10"){
        return "Oktober";
    }
    else if ($m == "11"){
        return "November";
    }
    else if ($m == "12"){
        return "Desember";
    }
}?>