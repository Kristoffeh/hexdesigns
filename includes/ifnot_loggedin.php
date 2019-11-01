<?php
// if no user is logged in
if( !isset($_SESSION['user']) ) {
    header("Location: innlogging.php");
    exit;
}
?>