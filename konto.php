<!DOCTYPE html>
<html>

<?php
require 'includes/vars.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Konto" ?></title>
    <link rel="stylesheet" href="assets-portal/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="assets-portal/css/w3.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
</head>

<?php
include 'includes/portal-menu.php'; 
include 'includes/ifnot_loggedin.php';
?>

    <div class="row" style="margin-bottom:50px;">
        <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
            <section class="kp-section">
                <div class="row">
                    <div class="col-7 col-sm-6 col-md-5 col-lg-5 col-xl-4"><img class="rounded" src="<?php echo $userRow['userImage']; ?>" width="150" height="150" style="margin-bottom:10px;"></div>
                    <div class="col-5 col-sm-6 col-md-7 col-xl-8">
                        <p class="text-right text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">
                            <?php echo "Registrert " . $userRow['userDate']; ?>
                        </p>
                    </div>
                </div>
                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">
                    <?php echo $userRow['userName'] . ", " . $userRow['userTitle'] . "." ?>
                    </p>
                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:15px;">
                    <?php echo $userRow['userCompany']; ?>
                    </p>

                <p style="font-family:Advent+Pro, sans-serif;font-size:14px;margin-bottom:-10px;">
                    <a href="innstillinger.php"><font color="#59b1ff">Rediger konto</font></a>
                    </p>
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