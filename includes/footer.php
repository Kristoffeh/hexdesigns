<footer class="page-footer dark stickyfooter">
    <div class="container">
        <div class="row">

            <div class="col-sm-2">
<!--                 <h5>About us</h5>
                <ul>
                    <li><a href="#">Om oss</a></li>
                </ul> -->
            </div>
            <div class="col-sm-3">
                <h5><?php print t('footer_komigang'); ?></h5>
                <ul>
                    <li><a href="innlogging.php"><?php print t('footer_logginn'); ?></a></li>
                    <li><a href="registrering.php"><?php print t('footer_register'); ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?php print t('footer_support'); ?></h5>
                <ul>
                    <li><a>support@hexdesigns.no</a></li>
                    <li><a><?php print t('footer_kontaktoss'); ?></a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5><?php print t('footer_language'); ?></h5>
                <ul>
                    <?php
                    if ($_SESSION['lang'] == "no"){
                        echo "<li><a href=" . $_SERVER['PHP_SELF'] . "?l=en" . ">Switch to English</a></li>";
                    }
                    else if ($_SESSION['lang'] == "en"){
                        echo "<li><a href=" . $_SERVER['PHP_SELF'] . "?l=no" . ">Switch to Norwegian</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="col-sm-3">
<!--                 <h5>Legal</h5>
                <ul>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul> -->
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>HEX Designs © 2018</p>
    </div>
</footer>