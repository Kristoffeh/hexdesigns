<!DOCTYPE html>
<html>

<?php
require 'includes/vars.php';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Innstillinger"; ?></title>
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

// globals
$pass_limit = 5;

$error = false;
$errTyp = ""; // error type, 
$errMSG = ""; // error message, if success or fail
$cm = false; // if changes are made

$loadImage = $userRow['userImage'];

// clear fields to prevent injection to SQL
$field_username = $userRow['userName'];
$field_email = $userRow['userEmail'];
$field_company = $userRow['userCompany'];
$field_password = "";
$field_valpassword = "";

// Show title text in title field
$field_title = $userRow['userTitle'];

// clear fields to prevent injection to SQL
$oldfield_username = $userRow['userName'];
$oldfield_email = $userRow['userEmail'];
$oldfield_company = $userRow['userCompany'];

// get user email and show in 
$user = $userRow['userEmail'];

// error list only shows if changes are made
// successlist[0] is username error
// successlist[1] is email error (will not be used until later)
// successlist[2] is company error
// successlist[3] is password
// successlist[4] is password validation
// successlist[5] us fatal error, or other error codes
// successlist[6] is image upload success message
$successlist = array("","","","","","","");

// errorlist[0] is name error
// errorlist[1] is email error (will not be used until later)
// errorlist[2] is company error
// errorlist[3] is password error
// errorlist[4] is password validation error
// errorlist[5] is fatal error
// errorlist[6] is image upload error
$errorlist = array("","","","","","","");

// save new password
if (isset($_POST['btn-passchange'])){

    $field_password = trim($_POST['field_password']);
    $field_password = strip_tags($field_password);
    $field_password = htmlspecialchars($field_password);

    $field_valpassword = trim($_POST['field_valpassword']);
    $field_valpassword = strip_tags($field_valpassword);
    $field_valpassword = htmlspecialchars($field_valpassword);

    if (strlen($field_password) < $pass_limit){
        $error = true;
        $errorlist[3] = "Ditt passord må inneholde minst " . $pass_limit . " bokstaver!";
    }

    if (strlen($field_valpassword) < $pass_limit){
        $error = true;
        $errorlist[3] = "Ditt passord må inneholde minst " . $pass_limit . " bokstaver!";
    }

    if ($field_password != $field_valpassword){
        $error = true;
        $errorlist[4] = "Vennligst bruk samme passord som ble brukt i feltet over!";
    }

    $decrypted_password = hash('sha256', $field_password);

    if (!$error){
        $query = "UPDATE users SET userPass='$decrypted_password' WHERE userEmail='$user'";
        $res = mysqli_query($conn, $query);

        if ($res){
            $cm = true; // to get the message to show (is a requirement)
            $successlist[3] = "Passord har blitt endret.";
            $field_password = "";
            $field_valpassword = "";
        }
        else{
            $cm = true; // to get the message to show (is a requirement)
            $successlist[5] = "Noe gikk galt, prøv igjen senere.";
        }
    }
    else{
        $errTyp = "danger";
        $successlist[5] = "Noe gikk galt, prøv igjen senere.";
    }
}

// Save all fields
if (isset($_POST['btn-save'])){

    $field_username = trim($_POST['field_username']);
    $field_username = strip_tags($field_username);
    $field_username = htmlspecialchars($field_username);

    $field_company = trim($_POST['field_company']);
    $field_company = strip_tags($field_company);
    $field_company = htmlspecialchars($field_company);

    $image = $_FILES['upload']['name'];
    $target = "image-uploads/" . basename($image);

    if ($image != ""){
        $sql = "UPDATE users SET userImage='$target' WHERE userEmail='$user'";
        mysqli_query($conn, $sql); // stores image dir

        if (move_uploaded_file($_FILES['upload']['tmp_name'], $target)){
            $successlist[6] = "Profilbildet ditt har blitt oppdatert";
            $loadImage = $target;
            header("Refresh:0");
        }
        else{
            $errorlist[6] = "Et problem har oppstått med opplastning!";
        }
    }



    if (!$error){
        $query = "UPDATE users SET
        userName='$field_username',
        userEmail='$field_email',
        userCompany='$field_company' WHERE userEmail='$user'";
        $res = mysqli_query($conn, $query);

        if ($res){
            $errTyp = "success";
            $errMSG = "Fullført! Endringene dine har blitt lagret.";

            // changes made on user name (userName)
            if ($field_username != $oldfield_username){
                $cm = true;
                $successlist[0] = "Visningsnavn har blitt endret.";
            }

            // changes made on company (userCompany)
            if ($field_company != $oldfield_company){
                $cm = true;
                $successlist[2] = "Bedriftsnavn har blitt endret.";
            }
        }
        else{
            $errTyp = "danger";
            $successlist[5] = "Noe gikk galt, prøv igjen senere.";
        }
    }
    else{
        $errTyp = "danger";
        $successlist[5] = "Noe gikk galt, prøv igjen senere.";
    }
}

?>

    <div class="row" style="margin-bottom:50px;">
        <div class="col-4 col-sm-4 col-md-4 col-lg-4 offset-4 offset-sm-4 offset-md-4 offset-lg-4">
            <section class="kp-section">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="contact_form" class="well form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-8" style="margin-bottom:20px;margin-top:5px;"><label class="col-form-label" style="font-family:ABeeZee, sans-serif;font-size:25px;color:rgb(20,138,255);margin-bottom:0px;">Rediger kontodetaljer</label>

                            <?php
                            if ($cm == true){
                                echo "<font color='green'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $successlist[0] . "</p></font>";
                                echo "<font color='green'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $successlist[1] . "</p></font>";
                                echo "<font color='green'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $successlist[2] . "</p></font>";
                                echo "<font color='green'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $successlist[3] . "</p></font>";                                
                                echo "<font color='green'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $successlist[6] . "</p></font>";
                            }
                            ?>
                            </p>



                            </div>

<!--                             <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-8" style="margin-bottom:20px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:0px;">
                                    <?php echo "Du registrerte deg " . $userRow['userDate']; ?>
                                </p>
                            </div> -->

                            <div class="col-12" style="margin-bottom:35px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">Navn</p>
                                <input class="form-control" type="text" value="<?php echo $field_username; ?>" name="field_username"></div>

                            <div class="col-12" style="margin-bottom:35px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">Tittel</p>
                                <input class="form-control" type="text" value="<?php echo $field_title; ?>" readonly="" name="field_title"></div>

                            <div class="col-12" style="margin-bottom:35px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">E-post adresse</p>
                                <input class="form-control" type="text" value="<?php echo $field_email; ?>" readonly="" name="field_email">
                            </div>

                            <div class="col-12" style="margin-bottom:35px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">Bedrift</p>
                                <input class="form-control" type="text" value="<?php echo $field_company; ?>" name="field_company"></div>

                            <div class="col-12" style="margin-bottom:35px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">Passord</p>
                                <input class="form-control" type="password" name="field_password" value="<?php echo $field_password; ?>">
                                <?php
                                if ($error == true){
                                    echo "<font color='red'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $errorlist[3] . "</p></font>";
                                }
                                ?>
                            </div>

                            <div class="col-12" style="margin-bottom:35px;">
                                <p class="text-muted" style="font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:10px;">Verifiser Passord</p>
                                <input class="form-control" type="password" name="field_valpassword" value="<?php echo $field_valpassword; ?>">
                                <?php
                                if ($error == true){
                                    echo "<font color='red'><p style='font-family:ABeeZee, sans-serif;font-size:16px;margin-bottom:5px;'>" . $errorlist[4] . "</p></font>";
                                }
                                ?>
                            </div>

                            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-12" style="margin-bottom:20px;">
                                <img class="rounded" src="<?php echo $loadImage; ?>" width="150" height="150" style="margin-right:30px;margin-bottom:16px;">
                                <!-- <input type="hidden" name="size" value="1000000"> 1 MB -->
                                <input type="file" accept="image/*" name="upload" style="width:256px;padding-top:12px;padding-bottom:12px;padding-right:12px;padding-left:12px;background-color:rgba(0,0,0,0.02);border:1px solid rgba(0,0,0,0.06);">

                                <p class="text-muted" style="font-family:Advent+Pro, sans-serif;font-size:14px;margin-bottom:10px;">Vi anbefaler deg å bruke like filstørrelser. 150 x 150, 300x300, 500x500 osv.</p>
                            </div>

                            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-12" style="margin-bottom:10px;">
                                <button class="btn btn-outline-primary" type="submit" name="btn-save">Lagre</button>
                                <button class="btn btn-outline-primary" type="submit" name="btn-passchange">Endre passord</button>
                            </div>

                    </div>
        </div>
        </form>
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