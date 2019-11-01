<?php
    ob_start();
    session_start();
    require_once 'dbconnect.php';
    include('includes/language.php');
    include('includes/getlang.php');
    include('includes/translate.php');

    // it will never let you open index(login) page if session is set
    if ( isset($_SESSION['user']) != "" ) {
        header("Location: portal-index.php");
        exit;
    }

    $error = false;
    $errTyp = "";
    $errMSG = "";

    $email = "";
    $emailError = "";
    $password = "";
    $passwordError = "";

    if( isset($_POST['btn-logginn']) ) {

        // Prevent SQL Injections
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $password = trim($_POST['password']);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

        if(empty($email)){
            $error = true;
            $emailError = "Vennligst skriv inn en e-post adresse.";
        }
        else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Vennligst bruk en eksisterende e-post adresse.";
        }

        // if password field is empty
        if(empty($password)){
            $error = true;
            $passwordError = "Vennligst skriv inn et passord.";
        }

        // if there's no error, continue to login
        if (!$error) {
            
            $password_decr = hash('sha256', $password); // password hashing using SHA256
        
            $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
            $row=mysqli_fetch_array($res);
            $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
            
            if( $count == 1 && $row['userPass']==$password_decr) {
                $_SESSION['user'] = $row['userId'];
                header("Location: portal-index.php");
            } else {
                $errTyp = "danger";
                $errMSG = "Innlogging feilet, prøv igjen..";
            }  
        }
    }
?>

<!DOCTYPE html>
<html>

<?php require 'includes/vars.php'; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Logg inn"; ?></title>
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
        <section class="clean-block clean-info" style="margin-top:-75px;">
            <div class="container">
                <div data-aos="slide-down" data-aos-duration="950" data-aos-once="true" class="block-heading" style="padding-top:130px;">
                    <h2 class="text-info"><?php print t('login_title'); ?></h2>
                    <p><?php print t('login_subtitle'); ?></p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 col-lg-6" data-aos="slide-down" data-aos-duration="950" data-aos-once="true">
                        <div class="clean-pricing-item">
                        	
                        	<!-- action below refreshes page, loads in new values and redirects to portal if successful. -->
                        	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . "?l=" . $_SESSION['lang']); ?>" autocomplete="off">
			                    <?php
			                        if ($errTyp != ""){?>
			                            <div class="alert alert-<?php echo $errTyp; ?>">
			                            <?php echo $errMSG; ?>
			                            </div>
			                        <?php
			                        }
			                    ?>




			                    <div class="form-group">
			                        <label for="email"><?php print t('login_email'); ?></label>

			                        <input class="form-control item" type="text" id="email" name="email" style="margin-bottom:5px;" value="<?php echo $email; ?>">

			                        <?php
			                            echo "<font color='red'>" . $emailError . "</font>";
			                        ?>
			                    </div>

			                    <div class="form-group">
			                        <label for="password"><?php print t('login_pass'); ?></label>
			                        <input class="form-control" type="password" id="password" name="password" style="margin-bottom:5px;">
			                        <?php
			                            echo "<font color='red'>" . $passwordError . "</font>";
			                        ?>
			                    </div>

			                    <!--                     
			                    <div class="form-group">
			                        <div class="form-check">
			                            <input class="form-check-input" type="checkbox" id="checkbox">
			                            <label class="form-check-label" for="checkbox">Husk meg</label>
			                        </div>
			                    </div> -->

			                    <button class="btn btn-primary btn-block" type="submit" style="margin-bottom:15px;" name="btn-logginn"><?php print t('login_loginbtn'); ?></button>
			                    <p class="text-muted" style="text-align: left;"><?php print t('login_btnlabel'); ?></p>
			                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require 'includes/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/calc.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>