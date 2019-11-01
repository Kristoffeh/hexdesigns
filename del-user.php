<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLETTE BRUKER?</title>
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
    ob_start();
    session_start();
    require_once 'dbconnect.php';
    include 'includes/ifnot_loggedin.php';

    $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res);

    $ress=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_GET['id']);
    $getRow=mysqli_fetch_array($ress);

    $errMSG = "";
    

    if(isset($_POST['btn-delete'])){
        $deluser = (string)$getRow['userEmail'];
        $query = "DELETE FROM users WHERE userEmail='$deluser'";
        $res = mysqli_query($conn, $query);

        if ($res){
            header("Location: del-user.php?id=7");
            exit;
        }
        else{
            $errMSG = "Noe gikk galt, prøv igjen senere.";
        }
    }
?>

<body style="background-color:rgb(242,242,242);">
    <div class="row" style="margin-bottom:50px;margin-top:50px;">
        <div class="col-12 col-sm-10 col-md-10 col-lg-6 offset-0 offset-sm-1 offset-md-1 offset-lg-3">
            <section class="kp-section">
                <a href="admin-index.php" style="background-color: #ededed; padding-top: 8px; padding-bottom: 8px; padding-left: 15px; padding-right: 15px; border-radius: 5px;">&larr; Tilbake til Admin Panel</a>
                <div class="row" style="margin-bottom:20px;margin-top: 20px;">
                    <div class="col">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="contact_form" class="well form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <center>
                                    <label style="font-size: 18px; margin-bottom: 30px;">
                                        Er du sikker på at du vil slette <b><?php echo $getRow['userName']; ?></b>? <i>(Permanent)</i>
                                    </label>
                                    <br/>
                                    <img class="rounded-circle" src="<?php echo $getRow['userImage']; ?>" width="200px" height="200px" style="margin-bottom: 30px;">

                                    <table class="table table-striped table-bordered" style="width: 60%;">
                                        <tbody>
                                          <tr>
                                            <td>ID</td>
                                            <td><?php echo $getRow['userId']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Navn</td>
                                            <td><?php echo $getRow['userName']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>E-post adresse</td>
                                            <td><?php echo $getRow['userEmail']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Bedrift</td>
                                            <td><?php echo $getRow['userCompany']; ?></td>
                                          </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-striped table-bordered" style="width: 60%; margin-bottom: 20px; margin-top: 50px;">
                                        <tbody>
                                            <tr>
                                                <td>Type</td>
                                                <td><?php echo ucfirst($getRow['userType']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tittel</td>
                                                <td><?php echo $getRow['userTitle']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Registrert</td>
                                                <td><?php echo $getRow['userDate']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </center>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" id="contact_form" class="well form-horizontal" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:8px;">
                        <div class="col">
                            <form>
                                <div class="form-group">
                                    <center>
                                        <button class="btn btn-danger" type="submit" name="btn-delete" style="width: 150px; height: 50px; font-size: 17px;">Slett</button>
                                        <br/>
                                        <br/>
                                        <label><?php echo $errMSG; ?></label>
                                    </center>
                                </div>
                            </form>
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