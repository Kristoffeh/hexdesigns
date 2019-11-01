<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rediger bruker</title>
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

?>

<body style="background-color:rgb(242,242,242);">
    <div class="row" style="margin-bottom:50px;margin-top:50px;">
        <div class="col-12 col-sm-10 col-md-10 col-lg-6 offset-0 offset-sm-1 offset-md-1 offset-lg-3">
            <section class="kp-section">
                <a href="admin-index.php" style="background-color: #ededed; padding-top: 8px; padding-bottom: 8px; padding-left: 15px; padding-right: 15px; border-radius: 5px;">&larr; Tilbake til Admin Panel</a>
                <div class="row" style="margin-bottom:8px;margin-top: 20px;">
                    <div class="col">
                        <form>
                            <div class="form-group"><label>Navn</label>
                                <input class="form-control" type="text" value="<?php echo $getRow['userName']; ?>"></div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom:8px;">
                    <div class="col">
                        <form>
                            <div class="form-group"><label>E-post adresse</label>
                                <input class="form-control" type="text" readonly="" value="<?php echo $getRow['userEmail']; ?>">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom:8px;">
                    <div class="col">
                        <form>
                            <div class="form-group"><label>Gruppe</label>
                                <select class="form-control">
                                    <option value="default" selected=""><?php echo ucfirst($getRow['userType']); ?></option>
                                    <option value="medlem">Medlem</option>
                                    <option value="admin">Admin</option>
                                    <option value="Utvikler">Utvikler</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom:8px;">
                    <div class="col">
                        <form>
                            <div class="form-group"><label>Tittel</label>
                                <input class="form-control" type="text" value="<?php echo $getRow['userTitle']; ?>">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom:8px;">
                    <div class="col">
                        <form>
                            <div class="form-group"><label>Bedrift</label>
                                <input class="form-control" type="text" value="<?php echo $getRow['userCompany']; ?>">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom:8px;">
                    <div class="col">
                        <form>
                            <div class="form-group">
                                <img class="rounded" height="175px" width="175px" src="<?php echo $getRow['userImage']; ?>" style="margin-right:25px;margin-bottom:-8px;">
                                <button class="btn btn-outline-danger" type="button">Slett profilbilde</button>
                            </div>
                        </form>
                        
                        <label style="color:rgb(82,82,82);font-size:13px;">
                            <i>
                                <?php echo $getRow['userImage']; ?>
                            </i>
                        </label>
                    </div>
                </div>
                <div class="row" style="margin-bottom:8px;">
                    <div class="col">
                        <form>
                            <div class="form-group">
                                <button class="btn btn-outline-success" type="submit" name="btn-save">Lagre</button>
                            </div>
                        </form>
                    </div>
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