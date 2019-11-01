<!DOCTYPE html>
<html>

<?php

ob_start();
session_start();
include('includes/language.php');
include('includes/getlang.php');
include('includes/translate.php');

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEX Designs - <?php print t('dok_title'); ?></title>
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
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <?php
    require 'includes/navbar.php';
    navbar("false", "false"); // Parameterne velger om HJEM og NYHETER skal være 'active' eller ikke, HJEM er aktiv.
    ?>
    <main class="page landing-page" style="padding-top:75px;">
        <section class="clean-block clean-info dark" style="margin-top:-75px;">
            <div class="container">
                <div data-aos="zoom-out" data-aos-duration="1000" data-aos-once="true" class="block-heading" style="padding-top:130px;">
                    <h1 class="text-primary"><?php print t('dok_title'); ?></h1>
                    <p><?php print t('dok_subtitle'); ?></p>
                </div>
                <div class="row justify-content-center" style="margin-bottom:75px;">
                    <div class="col-md-5 col-lg-9" data-aos="zoom-out" data-aos-duration="1000" data-aos-once="true">
                        <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/sketch1.png">
                            <div class="card-body">
                                <h4 class="card-title"><?php print t('entry1_title'); ?></h4>
                                <p class="card-text"><?php print t('entry1_subtitle'); ?></p>
                                <p class="card-text"><?php print t('entry1_subtitle2'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-bottom:75px;">
                    <div class="col-md-5 col-lg-9" data-aos="zoom-out" data-aos-duration="1000" data-aos-once="true">
                        <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/sketch2.png">
                            <div class="card-body">
                                <h4 class="card-title"><?php print t('entry2_title'); ?></h4>
                                <p class="card-text"><?php print t('entry2_subtitle'); ?></p>
                                <p class="card-text"><?php print t('entry2_subtitle2'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-bottom:75px;">
                    <div class="col-md-5 col-lg-9" data-aos="zoom-out" data-aos-duration="1000" data-aos-once="true">
                        <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/sketch3.png">
                            <div class="card-body">
                                <h4 class="card-title"><?php print t('entry3_title'); ?></h4>
                                <p class="card-text"><?php print t('entry3_subtitle'); ?></p>
                                <p class="card-text"><?php print t('entry3_subtitle2'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-bottom:75px;">
                    <div class="col-md-5 col-lg-9" data-aos="zoom-out" data-aos-duration="1000" data-aos-once="true">
                        <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/sketch4.png">
                            <div class="card-body">
                                <h4 class="card-title"><?php print t('entry4_title'); ?></h4>
                                <p class="card-text"><?php print t('entry4_subtitle'); ?></p>
                                <p class="card-text"><?php print t('entry4_subtitle2'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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