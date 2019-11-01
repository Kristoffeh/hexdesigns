<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teastsat</title>
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

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

$emne = "";
$besk = "";
$prio = "";

$emneMSG = "";
$beskMSG = "";
$prioMSG = "";

$errMSG = "";
$error = false;

$emneLimit = 3;
$beskLimit = 8;


$creatorID = $_SESSION['user'];
$creatorName = $userRow['userName'];
$creatorImg = $userRow['userImage'];
$dato = date("d") . ". " . calcMonth(date("m")) . " " . date("Y H:i");

if (isset($_POST['btn-create'])){

    $emne = trim($_POST['emne']);
    $emne = strip_tags($emne);
    $emne = htmlspecialchars($emne);

    $besk = trim($_POST['besk']);
    $besk = strip_tags($besk);
    $besk = htmlspecialchars($besk);

    $prio = trim($_POST['prio']);
    $prio = strip_tags($prio);
    $prio = htmlspecialchars($prio);

    // requirements
    if (strlen($emne) < 3){
        $error = true;
        $emneMSG = "Emne må inneholde minst " . $emneLimit . " bokstaver.";
    }

    if (strlen($besk) < 8){
        $error = true;
        $beskMSG = "Beskrivelsen må inneholde minst " . $beskLimit . " bokstaver.";
    }

    if (empty($prio)){
        $error = true;
        $beskMSG = "Vennligst velg prioritering.";
    }

    if (!$error){
        $query = "INSERT INTO supportsaker
        (supportEmne, supportBeskrivelse, supportPrio, supportOppretterId, supportOpprettet, supportEier, supportEierimg, supportStatus)
        VALUES('$emne', '$besk', '$prio', '$creatorID', '$dato', '$creatorName', '$creatorImg', 'Aktiv')";
        $res = mysqli_query($conn, $query);

        if ($res){
            $emne= "";
            $besk = "";
            $errMSG = "Din sak har blitt opprettet på <font color='#448cff'><a href='portal-supportsaker.php'>Mine saker</a></font>";
        }
        else{
            $errMSG = "fatal error, ta kontakt med kundeservice.";
        }
    }


}
?>

    <div class="row">
        <div class="col" style="text-align:center;">
            <label class="col-form-label" style="font-family:ABeeZee, sans-serif;font-size:20px;">Opprett ny sak</label><br/>
            <label class="col-form-label text-primary" style="font-family:ABeeZee, sans-serif;font-size:16px;"><a href="javascript:history.go(-1)">&larr; Gå tilbake til Mine saker</a></label>
        </div>


    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div class="row" style="margin-top:20px;">
            <div class="col-8 col-sm-8 col-md-5 col-lg-6 offset-2 offset-sm-2 offset-md-4 offset-lg-3" style="margin-bottom:5px;">
                <div class="form-group">
                    <label>Emne</label>
                    <input class="form-control" type="text" placeholder="Et navn som beskriver hva saken omhandler" autofocus="" name="emne" value="<?php echo $emne; ?>" required="">

                    <?php 
                    if ($emneMSG != ""){
                        echo "<label style='margin-top: 8px;'>" . $emneMSG . "</label>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Beskrivelse</label>
                    <textarea class="form-control" rows="8" placeholder="En detaljert beskrivelse om problemstillingen din" name="besk" value="<?php echo $besk; ?>" required=""></textarea>

                    <?php 
                    if ($beskMSG != ""){
                        echo "<label style='margin-top: 8px;'>" . $beskMSG . "</label>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Prioritet</label>
                    <select class="form-control" name="prio">
                        <option value="1" selected="">Velg en prioritet (lav er standard)</option>
                        <option value="1">1 - Lav</option>
                        <option value="2">2 - Medium</option>
                        <option value="3">3 - Høy</option>
                        <option value="4">4 - Kritisk</option>
                    </select>

                    <?php 
                    if ($prioMSG != ""){
                        echo "<label style='margin-top: 8px;'>" . $prioMSG . "</label>";
                    }
                    ?>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-clean-grey" type="submit" name="btn-create">Opprett ny sak</button>
                    <?php 
                    if ($errMSG != ""){
                        echo "<label style='margin-top: 8px; margin-left:10px;'><font color='green'>" . $errMSG . "</font></label>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>
    <script src="assets-support/js/jquery.min.js"></script>
    <script src="assets-support/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets-support/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets-support/js/Sidebar-Menu.js"></script>
    <script src="assets-support/js/test.js"></script>
</body>

</html>