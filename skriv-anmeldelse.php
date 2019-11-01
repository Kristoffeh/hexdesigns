<!DOCTYPE html>
<html>

<?php require 'includes/vars.php'; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Send Anmeldelse"; ?></title>
    <link rel="stylesheet" href="assets-portal/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
</head>

<?php 
include 'includes/portal-menu.php'; 
include 'includes/ifnot_loggedin.php';
?>

    <form>
        <div class="form-group">
            <div class="form-row" style="margin-bottom:50px;">
                <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                    <h1 class="text-center text-primary">Skriv en anmeldelse</h1>
                    <h5 class="text-center text-muted" style="font-family:ABeeZee, sans-serif;">Anmeldelsen din vil være offentlig</h5>
                </div>
            </div>
            <div class="form-row" style="margin-bottom:50px;">
                <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                    <section class="kp-section"><label>Emne</label><input class="form-control" type="text" style="margin-bottom:25px;"><label>Skriv en anmeldelse</label><textarea class="form-control" style="margin-bottom:25px;height:120px;"></textarea><label>Vurdering</label>
                        <select
                            class="form-control" style="margin-bottom:25px;">
                            <option value="null" selected="">Vennligst velg en vurdering</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select><label class="d-flex justify-content-center" style="font-family:ABeeZee, sans-serif;color:rgb(111,111,111);margin-bottom:15px;"><strong>NB!</strong>&nbsp;Anmeldelsen din blir først sendt inn til godkjenning</label><button class="btn btn-primary btn-block"
                                type="button">SEND INN</button></section>
                </div>
            </div>
        </div>
    </form>
    <script src="assets-portal/js/jquery.min.js"></script>
    <script src="assets-portal/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets-portal/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets-portal/js/Sidebar-Menu.js"></script>
    <script src="assets-portal/js/test.js"></script>
</body>

</html>