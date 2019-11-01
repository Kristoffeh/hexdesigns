<!DOCTYPE html>
<html>

<?php
require 'includes/vars.php';

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Bestilling"; ?></title>
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

$_bedrift = "";
$_funksjoner = "";
$_annet = "";
$_kommentar = "";

$_error = false;
$_errMSG = "";
$_succMSG = "";

$_sender = $userRow['userName'];
$_senderId = $userRow['userId'];
$_dato = date("d/m/Y H:i");

if (isset($_POST['btn-finishny'])){

    $_bedrift = trim($_POST['_bedrift']);
    $_bedrift = strip_tags($_bedrift);
    $_bedrift = htmlspecialchars($_bedrift);

    $_funksjoner = trim($_POST['_funksjoner']);
    $_funksjoner = strip_tags($_funksjoner);
    $_funksjoner = htmlspecialchars($_funksjoner);

    $_annet = trim($_POST['_annet']);
    $_annet = strip_tags($_annet);
    $_annet = htmlspecialchars($_annet);

    $_kommentar = trim($_POST['_kommentar']);
    $_kommentar = strip_tags($_kommentar);
    $_kommentar = htmlspecialchars($_kommentar);

    if (empty($_bedrift)){
        $_error = true;
        $_errMSG = "Første felt kan ikke være tomt!";
    }

    if (!$_error){
        $query = "INSERT INTO bestillingernettsider (nettBedrift,nettFunksjoner,nettAnnet,nettKommentar,nettDesignlink,nettSender,nettDato,nettStatus,nettSenderid)
                    VALUES ('$_bedrift','$_funksjoner','$_annet','$_kommentar','$_designlink','$_sender','$_dato','aktiv','$_senderId')";
        $res = mysqli_query($conn, $query);

        if ($res){
            $_succMSG = "Bestillingen din har blitt sendt, du hører fra oss snarest.";
        }
        else{
            $_errMSG = "Noe gikk galt, prøv igjen senere.";
        }
    }
    else{
        $_errMSG = "En feil har oppstått, kontakt administrator!";
    }
}
?>

    <form>
        <div class="form-group">
            <div class="form-row" style="margin-bottom:50px;">
                <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                    <h1 class="text-center text-primary">Send en bestilling</h1>
                    <h5 class="text-center text-muted" style="font-family:ABeeZee, sans-serif;">Så snart vi mottar bestillingen din, tar vi kontakt med deg og starter planleggingen.</h5>
                    <h5 class="text-center text-success"><?php echo $_succMSG; ?></h5>
                    <h5 class="text-center text-danger"><?php echo $_errMSG; ?></h5>

                </div>
            </div>

            <div class="form-row" style="margin-bottom:0px;">
                <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                    <section class="kp-section">
                        <select class="form-control" name="slbes" id="slbes">
                            <option value="null" selected="">Vennligst velg et alternativ</option>
<!--                             <optgroup label="Tjenester">
                                <option value="Bestill Supportavtale">Bestill Supportavtale</option>
                                <option value="Avbestill Supportavtale">Avbestill Supportavtale</option>
                            </optgroup> -->
                            <optgroup label="Nettsider">
                                <option value="Opprett ny nettside">Opprett nettside</option>
                                <!-- <option value="Opprett ny nettside">Endre nettside</option> -->
                                <!-- <option value="Endring på nettside">Be om endring</option> -->
                            </optgroup>
                        </select>
                    </section>
                </div>
            </div>
        </div>
    </form>
<!--     <div id="bestillsupport" style="display:none;">
        <form>
            <div class="form-group">
                <div class="form-row" style="margin-bottom:50px;">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                        <section class="kp-undersection">
                            <h2 class="text-center text-primary" style="margin-bottom:40px;">Bestill supportavtale</h2>
                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Bedrift eller navn
                                <br>
                            </label>

                            <input class="form-control" type="text" style="margin-bottom:25px;">
                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">E-post eller telefon nummer
                            <br></label>
                            <input class="form-control" type="text" style="margin-bottom:25px;">
                            <button class="btn btn-primary btn-block" type="button">FULLFØR BESTILLING</button>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="avbestillsupport" style="display:none;">
        <form>
            <div class="form-group">
                <div class="form-row" style="margin-bottom:50px;">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                        <section class="kp-undersection">
                            <h2 class="text-center text-primary" style="margin-bottom:40px;">Avbestill Supportavtale</h2><label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Bestillingsansvarlig</label><input class="form-control" type="text" style="margin-bottom:25px;"><label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Bedrift <strong>(kun for bedrifter)</strong><br></label>
                            <input
                                class="form-control" type="text" style="margin-bottom:25px;"><label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Organisasjonsnummer <strong>(kun for bedrifter)</strong><br></label><input class="form-control" type="text" style="margin-bottom:25px;"><button class="btn btn-primary btn-block"
                                    type="button">FULLFØR BESTILLING</button></section>
                    </div>
                </div>
            </div>
        </form>
    </div> -->
    <div id="nynettside" style="display:none;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="contact_form" class="well form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row" style="margin-bottom:50px;">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                        <section class="kp-undersection">
                            <h2 class="text-center text-primary" style="margin-bottom:10px;">Opprett ny nettside</h2>
                            <h5 class="text-center text-muted" style="margin-bottom:30px;">NB! Med dette skjema gir du nødvendig informasjon til utvikler. Side blir ikke opprettet umiddelbart. Først trenger vi informasjon fra deg, så blir den laget senere av en av våre utviklere.</h5>
                            <!-- <h5 class="text-center text-muted" style="margin-bottom:30px;">For å fylle ut feltene under, burde du ha en generell kompetanse om nettsider. <br/><strong><a href="dokumentasjon.php" style="color:#5e9bff;">Sjekk ut vår dokumentasjon</a></strong></h5> -->

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Bedrift eller navn<br></label>
                            <input class="form-control" type="text" maxlength="74" style="margin-bottom:25px;" name="_bedrift" value="<?php echo $_bedrift ?>">

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Trenger du noen spesifikke funksjoner? Nyheter? Administrasjonsside? Bildegalleri?<br></label>
                            <textarea class="form-control" maxlength="499" style="margin-bottom:25px;height:110px;" name="_funksjoner" value="<?php echo $_funksjoner ?>"></textarea>

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Annen nyttig informasjon til dem som utvikler nettsiden?<br></label>
                            <textarea class="form-control" maxlength="499" style="margin-bottom:25px;height:110px;" name="_annet" value="<?php echo $_annet ?>"></textarea>

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Kommentar<br></label>
                            <textarea class="form-control" maxlength="249" style="margin-bottom:25px;height:110px;" name="_kommentar" value="<?php echo $_kommentar ?>"></textarea>

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109); padding-bottom: 10px;">Vennligst fyll ut planleggingsskjema på <font color="blue"><a href="www.designgapp.com/">DesignGapp.com</a></font> og legg til link under eller send til oss på <font color="blue">post@hexdesigns.no</font></label>
                            <textarea class="form-control" maxlength="250" style="margin-bottom:25px;height:110px;" name="_designlink" value="<?php echo $_designlink ?>"></textarea>

                            <button class="btn btn-primary btn-block" type="submit" name="btn-finishny">FULLFØR BESTILLING</button>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </div>
<!--     <div id="endringnettside" style="display:none;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="contact_form" class="well form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row" style="margin-bottom:50px;">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-1 offset-sm-1 offset-md-1 offset-lg-3">
                        <section class="kp-undersection">
                            <h2 class="text-center text-primary" style="margin-bottom:10px;">Endre nettside</h2>
                            <h5 class="text-center text-muted" style="margin-bottom:30px;">NB! Med dette skjema gir du nødvendig informasjon til utvikler. Side blir ikke opprettet umiddelbart. Først trenger vi informasjon fra deg, så blir den laget senere av en av våre utviklere.</h5>
                            <h5 class="text-center text-muted" style="margin-bottom:30px;">For å fylle ut feltene under, burde du ha en generell kompetanse om nettsider. <br/><strong><a href="dokumentasjon.php" style="color:#5e9bff;">Sjekk ut vår dokumentasjon</a></strong></h5>

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Bedrift eller navn<br></label>
                            <input class="form-control" type="text" maxlength="74" style="margin-bottom:25px;" name="_bedrift" value="<?php echo $_bedrift ?>">

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Hva ønsker du å endre? <i>(Skriv så detaljert du kan)</i><br></label>
                            <textarea class="form-control" maxlength="999" style="margin-bottom:25px;height:110px;" name="_endring" value="<?php echo $_endring ?>"></textarea>

                            <label style="font-family:ABeeZee, sans-serif;color:rgb(109,109,109);">Annen nyttig informasjon?<br></label>
                            <textarea class="form-control" maxlength="249" style="margin-bottom:25px;height:110px;" name="_einfo" value="<?php echo $_einfo ?>"></textarea>

                            <button class="btn btn-primary btn-block" type="submit" name="btn-finishendre">FULLFØR BESTILLING</button>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </div> -->

    <script src="assets-portal/js/jquery.min.js"></script>
    <script src="assets-portal/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets-portal/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets-portal/js/Sidebar-Menu.js"></script>
    <script src="assets-portal/js/test.js"></script>
</body>

</html>