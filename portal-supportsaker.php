<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEX Designs - Mine saker</title>
    <link rel="stylesheet" href="assets-support/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="assets-support/css/w3.css">
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<?php 
include 'includes/portal-menu.php';
include 'includes/ifnot_loggedin.php';

$userId = $userRow['userId'];
$isAdmin = $userRow['userType'];
?>

    <div class="row">
        <div class="col" style="text-align:center;">
            <label class="col-form-label" style="font-family:ABeeZee, sans-serif;font-size:28px; margin-bottom: 20px;">Mine supportsaker</label></div>
    </div>

    <div class="col-8 col-sm-5 col-md-6 col-lg-7 offset-2 offset-sm-1 offset-md-1 offset-lg-1" style="margin-bottom:10px;">
        <a class="btn btn-primary btn-clean-grey" role="button" href="portal-supportny.php">Opprett ny sak</a></div>
    </div>

    <div class="row" style="margin-bottom:50px;margin-top:20px;">
        <div class="col-8 col-sm-10 col-md-10 col-lg-10 offset-2 offset-sm-1 offset-md-1 offset-lg-1" style="margin-bottom:30px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="background-color:#f1f1f1;">Fra</th>
                            <th style="background-color:#f1f1f1;">Emne</th>
                            <th style="background-color:#f1f1f1;">Tidspunkt</th>
                            <th style="background-color:#f1f1f1;">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            if ($isAdmin == "admin"){
                                $resultadmin = mysqli_query($conn, "SELECT * FROM supportsaker ORDER BY supportStatus ASC");
                                while($row = mysqli_fetch_array($resultadmin)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['supportEier'] . "</td>";
                                    echo "<td><font color='#4286f4'><a href=portal-supportview.php?sak=" . $row['supportId'] . ">" . "[#" .  $row['supportId'] . "] " . $row['supportEmne'] .  "</a></font></td>";

                                    
                                    echo "<td>" . $row['supportOpprettet'] . "</td>";

                                    if ($row['supportStatus'] == "Aktiv"){
                                        echo "<td>" ."<span class='span-success'>" . $row['supportStatus'] . "</span>" . "</td>";
                                    }
                                    else if ($row['supportStatus'] == "Lukket"){
                                        echo "<td>" ."<span class='span-danger'>" . $row['supportStatus'] . "</span>" . "</td>";
                                    }
                                    echo "</tr>";
                                }
                            }

                            $result = mysqli_query($conn, "SELECT * FROM supportsaker WHERE supportOppretterId='$userId' AND supportStatus='aktiv' ORDER BY supportStatus ASC");
                            while($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['supportEier'] . "</td>";
                                    echo "<td><font color='#4286f4'><a href=portal-supportview.php?sak=" . $row['supportId'] . ">" . $row['supportEmne'] . "</a></font></td>";

                                    
                                    echo "<td>" . $row['supportOpprettet'] . "</td>";

                                    if ($row['supportStatus'] == "Aktiv"){
                                        echo "<td>" ."<span class='span-success'>" . $row['supportStatus'] . "</span>" . "</td>";
                                    }
                                    else if ($row['supportStatus'] == "Lukket"){
                                        echo "<td>" ."<span class='span-danger'>" . $row['supportStatus'] . "</span>" . "</td>";
                                    }
                                    echo "</tr>";
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                <?php
                if (mysqli_num_rows($result) == 0){
                    echo "<center>";
                    echo "<Ingen resultater ble funnet.";
                    echo "</center>";
                }
                ?>
            </div>
        </div>
    <script src="assets-support/js/jquery.min.js"></script>
    <script src="assets-support/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets-support/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets-support/js/Sidebar-Menu.js"></script>
    <script src="assets-support/js/test.js"></script>
</body>

</html>