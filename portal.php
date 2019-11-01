<!DOCTYPE html>
<html>

<?php require 'includes/vars.php'; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Portal"; ?></title>
    <link rel="stylesheet" href="assets-portal/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<?php 
include 'includes/portal-menu.php';
include 'includes/ifnot_loggedin.php';
?>

    <div class="row" style="margin-bottom:50px;">
        <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
            <section class="kp-section">
                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;">Heisann!</p>
                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;">Velkommen til kontrollpanelet ditt. Her vil det legges til moduler etter hvert.</p>
                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;">Trykk på de 3 strekene til venstre, så vil det komme opp en meny fra venstre. Derfra kan du bestille/avbestille tjenester.</p>
            </section>
        </div>
    </div>

    <script src="assets-portal/js/jquery.min.js"></script>
    <script src="assets-portal/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets-portal/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets-portal/js/Sidebar-Menu.js"></script>
    <script src="assets-portal/js/test.js"></script>
</body>

</html>