<?php
ob_start();
session_start();

require 'dbconnect.php';

include('includes/language.php');
include('includes/getlang.php');
include('includes/translate.php');

$navn = "";
$epost = "";
$navnError = "";
$epostError = "";
$error = false;
$password_1 = "";
$password_2 = "";
$password_1Error = "";
$password_2Error = "";
$errTyp = "";
$errMSG = "";

if ( isset($_POST['btn-opprett']) ) {

    $navn = trim($_POST['navn']);
    $navn = strip_tags($navn);
    $navn = htmlspecialchars($navn);

    $epost = trim($_POST['epost']);
    $epost = strip_tags($epost);
    $epost = htmlspecialchars($epost);

    $password_1 = trim($_POST['password_1']);
    $password_1 = strip_tags($password_1);
    $password_1 = htmlspecialchars($password_1);

    $password_2 = trim($_POST['password_2']);
    $password_2 = strip_tags($password_2);
    $password_2 = htmlspecialchars($password_2);
    
    // Name validation
    if (empty($navn)){
        $error = true;
        $navnError = "Vennligst skriv inn navnet ditt eller bedriften din.";
    }    
    else if (strlen($navn) < 3){
        $error = true;
        $navnError = "Navn må inneholde minst 3 bokstaver.";
    }    
    else if (!preg_match("/^[a-zA-Z ]+$/", $navn)){
        $error = true;
        $navnError = "Navn må inneholde norske bokstaver og mellomrom.";
    }

    // Email validation
    if ( !filter_var($epost,FILTER_VALIDATE_EMAIL) ) {
        $error = true;
        $epostError = "Vennligst oppgi en gyldig e-post adresse";
    }
    else {
        // check email exist or not
        $query = "SELECT userEmail FROM users WHERE userEmail='$epost'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

        if($count!=0){
            $error = true;
            $epostError = "Oppgitt e-post adresse finnes allerede.";
        }
    }

    // Password and re-enter password validation
    if (empty($password_1)){
        $error = true;
        $password_1Error = "Vennligst fyll ut passord.";
    }
    
    if (empty($password_2)){
        $error = true;
        $password_2Error = "Vennligst valider passordet ditt.";
    }
    else if (strlen($password_1) < 3){
        $error = true;
        $passmsg = "Passord må inneholde minst 3 bokstaver/tegn";
        $password_1Error = $passmsg;
        $password_2Error = $passmsg;
    }
    else if ($password_1 !== $password_2){
        $error = true;
        $passmsg = "Passordene dine matcher ikke, prøv på nytt.";
        $password_1Error = $passmsg;
        $password_2Error = $passmsg;
    }

    // Encrypt password with sha-256
    $real_password = hash('sha256', $password_1);

    $date = date("d/m/Y H:i");

    // if there's no error, continue to account registration
    if (!$error){
        $query = "INSERT INTO users(userName,userEmail,userPass,userType,userTitle,userDate,userImage)
        VALUES('$navn', '$epost', '$real_password','user','Medlem','$date','image-uploads/def.png')";
        $res = mysqli_query($conn, $query);

        if ($res){
            $errTyp = "success";
            $errMSG = "Fullført! Din brukerkonto har blitt lagt til.";
        }
        else{
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later. ";
        }
    }
    else{
        $errTyp = "danger";
        $errMSG = "En error har oppstått, rett opp og prøv igjen.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEX Designs - Registrering</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
</head>

<body>
    <?php
    require 'includes/navbar.php';
    navbar("false", "false"); // Parameterne velger om HJEM og NYHETER skal være 'active' eller ikke, HJEM er aktiv.
    ?>

    <main class="page landing-page" style="padding-top:75px;">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div data-aos="slide-down" data-aos-duration="950" data-aos-once="true" class="block-heading" style="padding-top:50px;">
                    <h2 class="text-info"><?php print t('reg_title'); ?></h2>
                    <p><?php print t('reg_subtitle'); ?></p>
                </div>
                <div data-aos="slide-down" data-aos-duration="950" data-aos-once="true" class="block-heading" style="padding-top:0px; text-align: left;">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?l=" . $_SESSION['lang']); ?>" autocomplete="off">
                        <div class="form-group" >

                            <?php
                            if ($errTyp != ""){?>
                                <div class="alert alert-<?php echo $errTyp; ?>">
                                <?php echo $errMSG; ?> <?php if ($errTyp == "success"){ echo "<a href='innlogging.php'>Trykk her for å logge inn</a>"; } ?>
                                </div>
                            <?php
                            }
                            ?>

                            <label for="name" style="margin-bottom:0px;"><?php print t('reg_navn'); ?></label>
                            <!-- <p class="text-muted" style="font-size:13px;margin-bottom:11px; text-align: left;">Kan være ditt navn eller bedriftens navn</p> -->
                            <input class="form-control item" type="text" id="navn" name="navn" style="margin-bottom:5px;"
                            value="<?php echo $navn ?>">
                            <font color="red">
                                <?php
                                if ($error == true){
                                    if ($navnError != ""){
                                        echo $navnError;
                                    }
                                }
                                ?>
                            </font>
                        </div>

                        <div class="form-group">
                            <label for="epost" style="margin-bottom:0px;"><?php print t('reg_email'); ?></label>
                            <!-- <p class="text-muted" style="font-size:13px;margin-bottom:11px; text-align: left;">E-post adressen vil også være brukernavnet ditt</p> -->
                            <input class="form-control item" type="text" id="epost" name="epost" style="margin-bottom:5px;"
                            value="<?php echo $epost ?>">
                            <font color="red">                            
                                <?php
                                if ($error == true){
                                    if ($epostError != ""){
                                        echo $epostError;
                                    }
                                }
                                ?> 
                            </font>
                        </div>

                        <div class="form-group"><label for="password" style="margin-bottom:0px;"><?php print t('reg_pass'); ?></label>
                            <!-- <p class="text-muted" style="font-size:13px;margin-bottom:11px; text-align: left;">Skriv inn et passord du vil bruke på kontoen din</p> -->
                            <input class="form-control item" type="password" id="password_1" name="password_1" style="margin-bottom:5px;"
                            value="<?php echo $password_1 ?>">
                            <font color="red">                            
                                <?php
                                if ($error == true){
                                    if ($password_1Error != ""){
                                        echo $password_1Error;
                                    }
                                }
                                ?> 
                            </font>
                        </div>

                        <div class="form-group"><label for="password" style="margin-bottom:0px;"><?php print t('reg_veripass'); ?></label>
                            <!-- <p class="text-muted" style="font-size:13px;margin-bottom:11px; text-align: left;">Skriv passordet på nytt for å forsikre deg om rett passord</p> -->
                            <input class="form-control item" type="password" id="password_2" name="password_2" style="margin-bottom:5px;"
                            value="<?php echo $password_2 ?>">
                            <font color="red">                            
                                <?php
                                if ($error == true){
                                    if ($password_2Error != ""){
                                        echo $password_2Error;
                                    }
                                }
                                ?> 
                            </font>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" name="btn-opprett"><?php print t('reg_create'); ?></button>
                        <p class="text-muted" style="margin-top:10px; text-align: left;"><?php print t('reg_createlbl'); ?></p></form>
                    </div>

            </div>
        </section>
    </main
>
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/calc.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>