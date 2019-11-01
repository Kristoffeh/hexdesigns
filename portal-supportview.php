<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEX Designs - Sak</title>
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
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<?php
    include 'includes/portal-menu.php';  // month calculation
    include 'includes/ifnot_loggedin.php';
    require 'includes/loadadmin-link.php';

    $ress=mysqli_query($conn, "SELECT * FROM supportsaker WHERE supportId=".$_GET['sak']);
    $getRow=mysqli_fetch_array($ress);

    $options = "";
    $respStatus = $getRow['supportStatus'];

    $sakId = $_GET['sak'];
    $errMSG = "";
    $errMSGinst = "";
    $sender = $userRow['userName'];
    $senderId = $userRow['userId'];
    $senderImage = $userRow['userImage'];
    $senderTitle = $userRow['userTitle'];

    $resss=mysqli_query($conn, "SELECT * FROM supportsaker WHERE supportId='$sakId'");
    $getId=mysqli_fetch_array($resss);

    if ($userRow['userType'] != "admin"){
        if ($userRow['userId'] != $getId['supportOppretterId']){
            header("Location: permission_fail.php");
            exit();
        }
    }

    $dato = date("d") . ". " . calcMonth(date("m")) . " " . date("Y H:i"); /*SELECT userId FROM users WHERE userId='$senderId'*/

    function showProperTitle($ttl){
        if ($ttl == "Utvikler"){
            return "<span class='span-danger span-sm' style='margin-left:15px;'>Utvikler</span>";
        }
        else if ($ttl == "Admin"){
            return "<span class='span-orange span-sm' style='margin-left:15px;'>Admin</span>";
        }
        else if ($ttl == "Moderator"){
            return "<span class='span-success span-sm' style='margin-left:15px;'>Moderator</span>";
        }
    }

    if (isset($_POST['btn-publish'])){

        $kommentar = trim($_POST['kommentar']);
        $kommentar = strip_tags($kommentar);
        $kommentar = htmlspecialchars($kommentar);

        if ($getRow['supportStatus'] == "Lukket"){
            $announce = "INSERT INTO supportkommentar(skommentarTekst, skommentardato, skommentarSakid) VALUES('Saken har blitt åpnet.','$dato','$sakId')";
            mysqli_query($conn, $announce);

            $query = "INSERT INTO supportkommentar(skommentarTekst,skommentardato,skommentarNavn,skommentarImage,skommentarTittel,skommentarSakid)
            VALUES('$kommentar','$dato','$sender','$senderImage','$senderTitle','$sakId')";
            $res = mysqli_query($conn, $query);

            $updstatus = "UPDATE supportsaker SET supportStatus='Aktiv' WHERE supportId='$sakId'";
            mysqli_query($conn, $updstatus);

            if ($res){
                $respStatus = "Aktiv";
                $kommentar = "";
                $errMSG = "Du har åpnet saken på nytt, og publisert kommentar.";
            }
            else{
                $errMSG = "fatal error, ta kontakt med kundeservice.";
            }
        }
        else{
            $query = "INSERT INTO supportkommentar(skommentarTekst,skommentardato,skommentarNavn,skommentarImage,skommentarTittel,skommentarSakid)
            VALUES('$kommentar','$dato','$sender','$senderImage','$senderTitle','$sakId')";
            $res = mysqli_query($conn, $query);

            if ($res){
                $kommentar = "";
                $errMSG = "Kommentaren din har blitt publisert.";
            }
            else{
                $errMSG = "fatal error, ta kontakt med kundeservice.";
            }
        }
    }

    if (isset($_POST['btn-save'])){

        $options = trim($_POST['options']);
        $options = strip_tags($options);
        $options = htmlspecialchars($options);

        if ($options == "lukk"){
            $announc = "INSERT INTO supportkommentar(skommentarTekst, skommentardato, skommentarSakid) VALUES('Saken har blitt lukket.','$dato','$sakId')";
            mysqli_query($conn, $announc);

            $optquery = "UPDATE supportsaker SET supportStatus='Lukket' WHERE supportId='$sakId'";
            $src = mysqli_query($conn, $optquery);

            if ($src){
                $respStatus = "Lukket";
                $errMSGinst = "Saken har blitt lukket.";
            }
            else{
                $errMSGinst = "fatal error, ta kontakt med kundeservice.";
            }
        }

        if ($options == "apne"){
            $announc = "INSERT INTO supportkommentar(skommentarTekst, skommentardato, skommentarSakid) VALUES('Saken har blitt åpnet.','$dato','$sakId')";
            mysqli_query($conn, $announc);

            $optquery = "UPDATE supportsaker SET supportStatus='Aktiv' WHERE supportId='$sakId'";
            $src = mysqli_query($conn, $optquery);

            if ($src){
                $respStatus = "Aktiv";
                $errMSGinst = "Saken har blitt åpnet.";
            }
            else{
                $errMSGinst = "fatal error, ta kontakt med kundeservice.";
            }
        }


    }
?>
    <div class="row">
        <div class="col" style="text-align:center;">
            <label class="col-form-label" style="font-family:ABeeZee, sans-serif;font-size:20px;">
            Sak <?php echo "#" .  str_pad($sakId, 4, '0', STR_PAD_LEFT); ?>
            </label></div>
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?sak=" . $_GET['sak']); ?>" autocomplete="off">
        <div class="form-row" style="margin-bottom:20px;margin-top:10px;">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-6 offset-sm-1 offset-md-1 offset-lg-2 offset-xl-3">
                <div class="card">
                    <label style="margin: 15px;" class="text-primary"><a href="portal-supportsaker.php">&larr; Tilbake til Mine saker</a></label>
                    <div class="card-body" style="padding:50px;">
                        <center>
                            <p style="font-family:ABeeZee, sans-serif;color:green;font-size:17px;">
                                <?php echo $errMSGinst; ?>
                            </p>
                        </center>
                        <div class="form-row" style="margin-bottom:0px;margin-top:0px;">
                            <div class="col-lg-12 offset-lg-0" style="margin-bottom:10px;">
                                <div class="form-group">
                                    <label style="font-size:22px;font-family:ABeeZee, sans-serif;margin-bottom:20px;">
                                        <img class="rounded-circle img-fluid" src="<?php echo $getRow['supportEierimg']; ?>" width="50" height="50" style="margin-right:15px;"><?php echo $getRow['supportEier']; ?></label>
                                    </div>
                            </div>
                            <div class="col-12 col-lg-7 col-xl-7 offset-0 offset-lg-0" style="margin-bottom:10px;">
                                <div class="form-group"><label style="font-family:ABeeZee, sans-serif;font-size:17px;">Emne</label>
                                    <p style="font-family:ABeeZee, sans-serif;color:rgb(115,115,115);font-size:16px;"><?php echo $getRow['supportEmne']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-5 offset-lg-0 offset-xl-0" style="margin-bottom:10px;">
                                <div class="form-group"><label style="font-family:ABeeZee, sans-serif;font-size:17px;">Tidspunkt</label>
                                    <p style="font-family:ABeeZee, sans-serif;color:rgb(115,115,115);font-size:16px;"><?php echo $getRow['supportOpprettet']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-12 offset-lg-0" style="margin-bottom:10px;">
                                <div class="form-group"><label style="font-family:ABeeZee, sans-serif;font-size:17px;">Beskrivelse</label>
                                    <p style="font-family:ABeeZee, sans-serif;color:rgb(115,115,115);font-size:16px;"><?php echo $getRow['supportBeskrivelse']; ?></p>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 col-xl-7 offset-0 offset-lg-0" style="margin-bottom:10px;">
                                <div class="form-group">
                                    <label style="font-family:ABeeZee, sans-serif;font-size:17px;">Prioritet</label><br/>
                                    <!--
                                    Lav     - span-danger
                                    Medium  - span-orange
                                    Høy     - span-warning
                                    Kritisk - span-success
                                    -->
                                    <?php
                                    if ($getRow['supportPrio'] == "1"){
                                        echo "<span class='span-success'>Lav</span>";
                                    }
                                    else if ($getRow['supportPrio'] == "2"){
                                        echo "<span class='span-warning'>Medium</span>";
                                    }
                                    else if ($getRow['supportPrio'] == "3"){
                                        echo "<span class='span-orange'>Høy</span>";
                                    }
                                    else if ($getRow['supportPrio'] == "4"){
                                        echo "<span class='span-danger'>Kritisk</span>";
                                    }
                                    ?>

                                    
                                </div>
                            </div>

                            <div class="col-lg-5 col-xl-5 offset-lg-0 offset-xl-0" style="margin-bottom:10px;">
                                <div class="form-group"><label style="font-family:ABeeZee, sans-serif;font-size:17px;">Status</label>
                                    <p style="font-family:ABeeZee, sans-serif;color:rgb(115,115,115);font-size:16px;">
                                        <?php
                                        if ($respStatus == "Aktiv"){
                                            echo "<span class='span-success'>" . $respStatus . "</span>";
                                        }
                                        else if ($respStatus == "Lukket"){
                                            echo "<span class='span-danger'>" . $respStatus . "</span>";
                                        }
                                        ?>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row" style="margin-bottom:20px;margin-top:0px;">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-6 offset-sm-1 offset-md-1 offset-lg-2 offset-xl-3">
                <div class="card">
                    <div class="card-body" style="padding:35px;">



                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM supportkommentar WHERE skommentarSakid='$sakId' ORDER BY skommentarId ASC");
                            echo "<label style='font-family:ABeeZee, sans-serif;font-size:18px;margin-bottom:15px;'>"
                             . mysqli_num_rows($result) . " kommentarer" . 
                             "</label>";
                            echo "<div class='form-row' style='margin-bottom:0px;margin-top:15px;'>";


                            while($row = mysqli_fetch_array($result)) {
                                echo "<div class='col-lg-12 offset-lg-0' style='margin-top:18px;'>";
                                echo "<div class='form-group'>";
                                echo "<label style='font-size:16px;font-family:ABeeZee, sans-serif;margin-bottom:15px;'>";

                                if ($row['skommentarImage'] != ""){
                                    echo "<img class='rounded-circle img-fluid' width='30px' height='30px' src=" . $row['skommentarImage'] . " style='margin-right:10px;' />";
                                }

                                echo $row['skommentarNavn'];
                                echo "" . showProperTitle($row['skommentarTittel']);
                                echo "</label>";
                                echo "<p style='font-family:ABeeZee, sans-serif;color:rgb(78,78,78);font-size:15px;margin-bottom:6px;'>" . nl2br($row['skommentarTekst']) . "</p>";
                                echo "<p class='text-monospace lead' style='font-family:ABeeZee, sans-serif;color:rgb(115,115,115);font-size:13px;'>" . $row['skommentarDato'] . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row" style="margin-bottom:20px;margin-top:0px;">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-6 offset-sm-1 offset-md-1 offset-lg-2 offset-xl-3">
                <div class="card">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="contact_form" class="well form-horizontal" enctype="multipart/form-data">
                        <div class="card-body" style="padding:35px;">
                            <label style="font-family:ABeeZee, sans-serif;font-size:20px;margin-bottom:2px;">Skriv kommentar</label>
                            <p class="text-muted" style="font-size:14px;margin-bottom:10px;">Maksgrense på 1000 bokstaver</p>
                            <div class="form-row" style="margin-bottom:0px;margin-top:0px;">
                                <div class="col-lg-12 offset-lg-0" style="margin-top:15px;">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="10" required="" maxlength="999" name="kommentar"></textarea>
                                    </div>
                                    <button class="btn btn-success" type="submit" style="font-size:15px;" name="btn-publish">Publiser</button>
                                    <?php
                                    if ($errMSG != ""){
                                        echo "<label style='margin-left:12px; color: green;'>" . $errMSG . "</label>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>

    <?php
    if ($userRow['userType'] == "admin"){?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?sak=" . $_GET['sak']); ?>" autocomplete="off">
        <div class="form-row" style="margin-bottom:20px;margin-top:10px;">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-6 offset-sm-1 offset-md-1 offset-lg-2 offset-xl-3">
                <div class="card">
                    <div class="card-body" style="padding-left: 50px; padding-right: 50px; padding-top: 20px; padding-bottom: 15px;">
                        <div class="form-row">
                            <div class="col-7 col-lg-7 col-xl-7 offset-0 offset-lg-0" style="margin-bottom:0px;">
                                <label style="font-size: 20px;" class="text-primary">
                                    Innstillinger for sak <?php echo "#" .  str_pad($sakId, 4, '0', STR_PAD_LEFT); ?>
                                </label>

                                <div class="form-group">
                                    <label for="options">Innstillinger</label>
                                    <select class="form-control" id="options" name="options">
                                        <option value="null" selected="">Vennligst velg et valg</option>

                                        <?php
                                        if ($respStatus == "Lukket"){
                                            echo "<option value='apne'>Åpne sak</option>";
                                        }
                                        else if ($respStatus == "Aktiv"){
                                            echo "<option value='lukk'>Lukk sak</option>";
                                        }

                                        ?>

                                        <option value="slett">Slett sak</option>
                                        <option value="flytt">Flytt sak</option>
                                    </select>
                                </div>

                                <button type="submit" name="btn-save" class="btn btn-primary">Ferdig</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    }
    ?>
    

    <script src="assets-portal/js/jquery.min.js"></script>
    <script src="assets-portal/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets-portal/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets-portal/js/Sidebar-Menu.js"></script>
    <script src="assets-portal/js/test.js"></script>
</body>

</html>