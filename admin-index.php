<!DOCTYPE html>
<html>

<?php
require 'includes/vars.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Admin"; ?></title>
    <link rel="stylesheet" href="assets-portal/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<?php

include 'includes/portal-menu.php';

$errMSG = "";
$selstatus = "";
$radioId = "";
$error = false;

if (isset($_POST['btn_sendstatus'])){
    $selstatus = trim($_POST['selstatus']);
    $selstatus = strip_tags($selstatus);
    $selstatus = htmlspecialchars($selstatus);

    $listId = trim($_POST['listId']);
    $listId = strip_tags($listId);
    $listId = htmlspecialchars($listId);

    if (empty($listId)){
        $error = true;
        $errMSG = "Vennligst fyll ut opplysninger.";
    }
    else if (empty($selstatus)){
        $error = true;
        $errMSG = "Vennligst fyll ut opplysninger.";
    }
    else{
        $qr = "UPDATE bestillingernettsider SET nettStatus='$selstatus' WHERE nettId='$listId'";
        $r = mysqli_query($conn, $qr);
    }

    if ($r){
        $errMSG = "Fullført! Endringene har blitt lagret.";
    }
    else{
        $errMSG = "En feil har oppstått. Ta kontakt med administrator.";
    }
}
?>

<center>
<p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:18px;">
    <a href="portal-index.php">Portal</a>
</p>
</center>

<?php
if ($userRow['userType'] == "user"){
    header("Location: portal-index.php");
    exit;
}
?>

    <div class="row" style="margin-bottom:50px;">
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 offset-1 offset-sm-1 offset-md-1 offset-lg-1">
            <section class="kp-section">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#hjem">Hjem</a></li>
                    <!-- <li><a data-toggle="tab" href="#anmeldelser">Anmeldelser</a></li> -->
                    <li><a data-toggle="tab" href="#bestillinger">Bestillinger</a></li>
                    <li><a data-toggle="tab" href="#brukere">Brukere</a></li>
                    <!-- <li><a data-toggle="tab" href="#grupper">Grupper</a></li> -->
                </ul>

            </br>

            <div class="tab-content">
                <div id="hjem" class="tab-pane fade in active">
                  <h3>Hjem</h3>
                  <p>Her har vi hjem, velkommen til admin panelet ditt.</p>
                </div>

<!--                 <div id="anmeldelser" class="tab-pane fade">
                  <h3>Anmeldelser til godkjenning</h3>
                  <p>Anmeldelser som skal til godkjenning kommer her.</p>
                </div> -->

                <div id="brukere" class="tab-pane fade">
                    <h3>Brukere</h3>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color:#f1f1f1;">##</th>
                                    <th style="background-color:#f1f1f1;">Navn</th>
                                    <th style="background-color:#f1f1f1;">Epost adresse</th>
                                    <th style="background-color:#f1f1f1;">Bedrift</th>
                                    <th style="background-color:#f1f1f1;">--</th>
                                    <th style="background-color:#f1f1f1;">--</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM users ORDER BY userId DESC");
                                while($row = mysqli_fetch_array($result)) {
                                    if ($row['userType'] != "admin"){
                                        echo "<tr>";
                                        echo "<td>" . $row['userId'] . "</td>";
                                        echo "<td>" . $row['userName'] . "</td>";
                                        echo "<td>" . $row['userEmail'] . "</td>";
                                        echo "<td>" . $row['userCompany'] . "</td>";
                                        echo "<td>" . "<a href='edit-user.php?id=" . $row['userId'] . "'><font color='#59b1ff'>" . "Rediger" . "</a>" . "</font></td>";
                                        echo "<td>" . "<a href='del-user.php?id=" . $row['userId'] . "'><font color='#59b1ff'>" . "Slett" . "</a>" . "</font></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                
                <div id="bestillinger" class="tab-pane fade">
                    <div class="row">
                        <div class='col-12 col-sm-12 col-md-12 col-lg-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0' style='padding-bottom: 0px;'>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                                <div class='card' style="margin-bottom: 30px;">
                                    <div class='card-body'>
                                            <div class="row">
                                                <div class='col-12 col-sm-12 col-md-12 col-lg-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0'>
                                                        <div class='form-group form-inline' style="padding-bottom: 0px; margin-bottom: 0px;">

                                                            <select class='form-control' name='listId' style="margin-right:10px; width:12%;">
                                                                <option value="" selected="">Velg ID</option>
                                                                <?php
                                                                $result = mysqli_query($conn, "SELECT * FROM bestillingernettsider ORDER BY nettId ASC LIMIT 25");
                                                                $rows=mysqli_num_rows($result);
                                                                while($row = mysqli_fetch_array($result)) {
                                                                    echo "<option value=" . $row['nettId'] . ">[" . $row['nettId'] . "] " . $row['nettBedrift'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>

                                                            <select class='form-control' id='sel1' name='selstatus' style="margin-right:10px; width:12%;">
                                                                <option value="" selected="">Vennligst velg</option>
                                                                <option value="avventer">Avventer</option>
                                                                <option value="utlevert">Utlevert</option>
                                                                <option value="kansellert">Kansellert</option>
                                                            </select>

                                                            <button class="btn btn-success" type="submit" name="btn_sendstatus">Lagre</button>
                                                            <h5 class="text-muted" style="margin-left:10px;"><?php echo $errMSG; ?></h5>
                                                        </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
                        <div>
                    <div>

                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM bestillingernettsider ORDER BY nettId DESC");
                    $rows=mysqli_num_rows($result);
                    echo "<h3>Bestilte nettsider (" . $rows . ")</h3>";
                    ?>

                    <div class="row">
<!--                         <div class="col-4 col-sm-4 col-md-4 col-lg-4 offset-0 offset-sm-0 offset-md-0 offset-lg-0">
                            <div class="card" style="background-color: #ededed; color: #aaaaaa;">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </div> -->



                        <?php
                        while($row = mysqli_fetch_array($result)) {
                            if ($row['nettStatus'] == "avventer" OR $row['nettStatus'] == "aktiv"){
                                echo "<div class='col-4 col-sm-4 col-md-4 col-lg-4 offset-0 offset-sm-0 offset-md-0 offset-lg-0' style='padding-bottom: 25px;'>";
                                echo "<div class='card'>";
                                echo "<div class='card-body'>";

/*                                    echo "<div class='radio' style='padding-bottom:15px;'>";
                                echo "<label><input type='radio' name='radioId' value=" . $row['nettId'] . ">" . "Velg" . "</label>";
                                echo "</div>";*/

                                echo "<h5 class='card-title'>ID: " . $row['nettId'] . "</h5>";
                                echo "<h5 class='card-title'>" . $row['nettBedrift'] . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettDato'] . "</h6>";

                                echo "<h5 class='card-title'>" . "Sendt av" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettSender'] . "</h6>";
                         
                                echo "<h5 class='card-title'>" . "Funksjoner" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettFunksjoner'] . "</h6>";

                                echo "<h5 class='card-title'>" . "Annet" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettAnnet'] . "</h6>";

                                echo "<h5 class='card-title'>" . "Kommentar" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettKommentar'] . "</h6>";

                                echo "<h5 class='card-title'>" . "DesignGapp" . "</h5>";
                                echo "<a target='_blank' href=" . $row['nettDesignlink'] . ">" . $row['nettDesignlink'] . "</a>";

                                echo "<h5 class='card-title'>" . "Status" . "</h5>";

                                if ($row['nettStatus'] == "aktiv" OR $row['nettStatus'] == "avventer"){
                                    echo "<span class='span-orange'>" . ucfirst($row['nettStatus']) . "</span>";
                                }
                                else if ($row['nettStatus'] == "utlevert"){
                                    echo "<span class='span-success'>" . ucfirst($row['nettStatus']) . "</span>";
                                }
                                else if ($row['nettStatus'] == "kansellert"){
                                    echo "<span class='span-danger'>" . ucfirst($row['nettStatus']) . "</span>";
                                }


                                /*echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . ucfirst($row['nettStatus']) . "</h6>";*/

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                            
                            if ($row['nettStatus'] == "kansellert" OR $row['nettStatus'] == "utlevert"){

                                echo "<div class='col-4 col-sm-4 col-md-4 col-lg-4 offset-0 offset-sm-0 offset-md-0 offset-lg-0' style='padding-bottom: 25px;'>";
                                echo "<div class='card' style='background-color: #ededed; color: #aaaaaa;'>";
                                echo "<div class='card-body'>";

                                /*echo "<div class='radio' style='padding-bottom:15px;'>";
                                echo "<label><input type='radio' name='optradio' value=" . $row['nettId'] . ">" . "Velg" . "</label>";
                                echo "</div>";*/

                                echo "<h5 class='card-title'>ID: " . $row['nettId'] . "</h5>";
                                echo "<h5 class='card-title'>" . $row['nettBedrift'] . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettDato'] . "</h6>";

                                echo "<h5 class='card-title'>" . "Sendt av" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettSender'] . "</h6>";
                            
                                echo "<h5 class='card-title'>" . "Funksjoner" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettFunksjoner'] . "</h6>";

                                echo "<h5 class='card-title'>" . "Annet" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettAnnet'] . "</h6>";

                                echo "<h5 class='card-title'>" . "Kommentar" . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted' style='padding-bottom:15px;'>" . $row['nettKommentar'] . "</h6>";

                                echo "<h5 class='card-title'>" . "DesignGapp" . "</h5>";
                                echo "<a target='_blank' href=" . $row['nettDesignlink'] . ">" . $row['nettDesignlink'] . "</a>";

                                echo "<h5 class='card-title'>" . "nettStatus" . "</h5>";

                                if ($row['nettStatus'] == "aktiv" OR $row['nettStatus'] == "avventer"){
                                    echo "<span class='span-orange'>" . ucfirst($row['nettStatus']) . "</span>";
                                }
                                else if ($row['nettStatus'] == "utlevert"){
                                    echo "<span class='span-success'>" . ucfirst($row['nettStatus']) . "</span>";
                                }
                                else if ($row['nettStatus'] == "kansellert"){
                                    echo "<span class='span-danger'>" . ucfirst($row['nettStatus']) . "</span>";
                                }

                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>

                    </div>
                </div>
                </div>

<!--                 <div id="grupper" class="tab-pane fade">
                  <h3>Grupper</h3>
                  <p>Her kommer grupper som kan administreres.</p>
                </div> -->
            </div>

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