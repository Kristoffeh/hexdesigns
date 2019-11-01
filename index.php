<!DOCTYPE html>
<html>

<?php require 'includes/vars.php'; ?>

<?php
# Priserkalkulator

$nyhet = 2199;
$bilde = 2499;
$nedtelling = 199;
$faq = 299;
$tabeller = 299;
$Fremgangsdrift = 299;
$kontaktskjema = 799;
$bloggingsystem = 4500;

ob_start();
session_start();
include('includes/language.php');
include('includes/getlang.php');
include('includes/translate.php');

?>

<!-- <?php print t(''); ?> -->



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - " . t('sitename'); ?></title>
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
    <link rel="stylesheet" href="assets/css/noselect.css">
    <link rel="stylesheet" href="custom-assets/span.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>

</head>

<body>
    <?php
    require 'includes/navbar.php';
    navbar("false", "false"); // Parameterne velger om HJEM og NYHETER skal være 'active' eller ikke, HJEM er aktiv.
    ?>
    
    <main class="page landing-page" style="padding-top:51px;">
        <section class="clean-block clean-hero" style="background-image:url(&quot;assets/img/scenery/image1.jpg&quot;);color:rgba(9, 162, 255, 0.85);">
            <div data-aos="slide-right" data-aos-duration="1000" data-aos-once="true" class="text">
                <h4 style="margin-bottom:30px;"><?php print t('index_intro-title'); ?></h4>
                <p style="margin-bottom:5px;"><em><?php print t('index_intro-subtitle'); ?></em></p>
                <p><em><?php print t('index_intro-subtitle2'); ?></em></p><a class="btn btn-outline-light btn-lg" role="button" href="registrering.php"><?php print t('index_intro-registerbtn'); ?></a></div>
        </section>

        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading" style="margin-bottom:20px;"></div>
                <div class="row align-items-start">
                    <div class="col-md-6 al-right"><img class="img-fluid nosel-img" src="assets/img/sketchprosed.png" width="400"></div>
                    <div class="col-md-6" style="margin-top:25px;">
                        <h3><?php print t('prosedyrer'); ?></h3>
                        <div class="getting-started-info">
                            <p><?php print t('prosedyrer2'); ?></p>
                            <p><?php print t('prosedyrer3'); ?></p>
                            <p><?php print t('prosedyrer4'); ?></p>
                            <p><a href="dk.php"><?php print t('prosedyrer5'); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block features" style="padding-bottom:0px;margin-bottom:50px;margin-top:50px;">
            <div class="container" style="margin-top:30px;">
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4><?php print t('wh_b1-title'); ?></h4>
                        <p><?php print t('wh_b1-subtitle'); ?><br></p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                        <h4><?php print t('wh_b2-title'); ?></h4>
                        <p><?php print t('wh_b2-subtitle'); ?><br></p>
                    </div>
                </div>
            </div>
        </section>

        <style>
        .clean-calc .heading{
        text-align:center;
        padding-bottom:10px;
        border-bottom:1px solid rgba(0,0,0,.1)
        }
        .clean-calc{
            background-color:#fff;
            box-shadow:0 2px 10px rgba(0,0,0,.075);
            border-top:3px solid #5ea4f3;
            padding:30px;
            overflow:hidden;
            position:relative
        }
        .clean-subcalc{
            background-color:#f7f7f7;
            box-shadow:0 2px 10px rgba(0,0,0,.075);
            /*border-top:3px solid #5ea4f3;*/
            padding:20px;
            overflow:hidden;
            position:relative;
            text-align: center;
            border-top: 1px solid #ededed
        }
/*        .clean-block.clean-pricing .col-md-5:not(:last-child) .item{
            margin-bottom:30px
        }*/
        .clean-calc button{
            font-weight:600
        }
        .clean-calc .ribbon{
            width:160px;
            height:32px;
            font-size:12px;
            text-align:center;
            color:#fff;
            font-weight:700;
            box-shadow:0 2px 3px hsla(0,0%,53%,.25);
            background:#4dbe3b;
            -webkit-transform:rotate(45deg);
            transform:rotate(45deg);
            position:absolute;
            right:-42px;
            top:20px;
            padding-top:7px
        }
        .clean-calc p{
            text-align:center;
            margin-top:20px;
            opacity:.7
        }
        .clean-calc .features .feature{
            font-weight:600
        }
        .clean-calc .features h4{
            text-align:center;
            font-size:18px;
            padding:5px
        }
        .clean-calc .price h4{
            margin:15px 0;
            font-size:45px;
            text-align:center;
            color:#2288f9
        }
        .clean-calc .buy-now button{
            text-align:center;
            margin:auto;
            font-weight:600;
            padding:9px 0
        }
        </style>

        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><?php print t('c_title'); ?></h2>
                    <p><?php print t('c_subtitle'); ?></p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-6 offset-0 offset-sm-0 offset-md-0 offset-lg-0">
                        <div class="clean-calc">
                            <div class="heading">
                                <h3><?php print t('c_priskalk'); ?></h3>
                            </div>
                            <p><?php print t('c_subpriskalk'); ?></p>
                            <div class="features">

                            <div class="row" style="margin-bottom:10px;">
                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $nyhet; ?>" id="nyhetch" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="nyhetch"><?php print t('check_news'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $bilde; ?>" id="bildech" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="bildech"><?php print t('check_picture'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2 al-left">
                                        <input type="checkbox" value="<?php echo $bloggingsystem; ?>" id="bloggingsystemch" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="bloggingsystemch"><?php print t('check_blog'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $nedtelling; ?>" id="nedtellingch" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="nedtellingch"><?php print t('check_countdown'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $faq; ?>" id="faqch" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="faqch"><?php print t('check_faq'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $tabeller; ?>" id="tabellerch" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="tabellerch"><?php print t('check_table'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $Fremgangsdrift; ?>" id="fremgangsdriftch" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="fremgangsdriftch"><?php print t('check_progress'); ?></label>
                                    </div>
                                </div>

                                <div class="col-8 offset-3 al-left">
                                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                        <input type="checkbox" value="<?php echo $kontaktskjema; ?>" id="kontaktskjemach" class="custom-control-input">
                                        <label class="custom-control-label nosel-text" for="kontaktskjemach"><?php print t('check_contact'); ?></label>
                                    </div>
                                </div>
                            </div>







                            

                                <!-- <!-- <!-- <!-- <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right">
                                        <input type="checkbox" value="<?php echo $nyhet; ?>" id="nyhetch" class="nyhetch">
                                    </div>
                                    <div class="col"><span><?php print t('check_news'); ?></span></div>
                                </div> 
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $bilde; ?>" id="bildech" class="bildech"></div>
                                    <div class="col"><span><?php print t('check_picture'); ?></span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $bloggingsystem; ?>" id="bloggingsystemch" class="bloggingsystemch"></div>
                                    <div class="col"><span><?php print t('check_blog'); ?></span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $nedtelling; ?>" id="nedtellingch" class="nedtellingch"></div>
                                    <div class="col"><span><?php print t('check_countdown'); ?></span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $faq; ?>" id="faqch" class="faqch"></div>
                                    <div class="col"><span><?php print t('check_faq'); ?></span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $tabeller; ?>" id="tabellerch" class="tabellerch"></div>
                                    <div class="col"><span><?php print t('check_table'); ?></span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $Fremgangsdrift; ?>" id="fremgangsdriftch" class="fremgangsdriftch"></div>
                                    <div class="col"><span><?php print t('check_progress'); ?></span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-4 al-right"><input type="checkbox" value="<?php echo $kontaktskjema; ?>" id="kontaktskjemach" class="kontaktskjemach"></div>
                                    <div class="col"><span><?php print t('check_contact'); ?></span></div>
                                </div>                                 <div class="row" style="margin-bottom:10px;">
                                    <div class="col-lg-4 al-right"><input type="checkbox" value="300"></div>
                                    <div class="col"><span>Supportavtale 1 måned</span></div>
                                </div>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-lg-4 al-right"><input type="checkbox" value="249"></div>
                                    <div class="col"><span>Supportavtale 3 måneder</span></div>
                                </div> -->
                            </div>
                            <hr>
                            <style>
                            	.heading-summary{
                            		background-color: #ededed;
                            		padding-left: 10px;
                            		padding-right: 10px;
                            		padding-top: 8px;
                            		padding-bottom: 8px;

                                    text-align: left;

                            		margin-bottom: 0px;

                            		border-radius: 5px 5px 0px 0px;
                            		border-bottom: 1px solid #e5e5e5
                            	}
                            	.summary{
                            		background-color: #f2f2f2;
                                    text-align: left;
                            		padding-left: 10px;
                            		padding-right: 10px;
                            		padding-top: 8px;
                            		padding-bottom: 8px;

                            		margin-bottom: 0px;

                            		border-radius: 5px 5px 0px 0px;
                            	}
                                .total{
                                    background-color: #ededed;
                                    color: #747779;
                                    text-align: left;
                                    border-radius: 0px 0px 5px 5px;
                                    padding-left: 10px;
                                    padding-right: 10px;
                                    padding-top: 7px;
                                    padding-bottom: 7px;

                                    border-top: 1px solid #e5e5e5
                                }
                            </style>

                            <div class="row">
	                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
	                            	<br/>

	                            	<div class="heading-summary">
	                            		<p style="text-align: left; margin-top: 0px; margin-bottom: 0px; font-size: 18px;"><?php print t('sm_sammendrag'); ?></p>
	                            	</div>
	                            	<div class="summary">
		                            	<p style="text-align: left; margin-top: 0px; margin-bottom: 0px;" class="tbet" id="tbet">+ <?php print t('sm_timebetaling'); ?> : <font color="green">949 kr</font></p>
		                            	<p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_antalltimer'); ?> : <font color="green">5 timer</font></p>
                                        <div id="txtNyhet" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_nyheter'); ?> : <font color="green"><?php echo $nyhet . " kr"; ?></font></p>
                                        </div>

                                        <div id="txtBilde" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_bilde'); ?> : <font color="green"><?php echo $bilde . " kr"; ?></font></p>
                                        </div>

                                        <div id="txtBloggingsystem" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_blog'); ?> : <font color="green"><?php echo $bloggingsystem . " kr"; ?></font></p>
                                        </div>

                                        <div id="txtNedtelling" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_nedtelling'); ?> : <font color="green"><?php echo $nedtelling . " kr"; ?></font></p>
                                        </div>

                                        <div id="txtFaq" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_faq'); ?> : <font color="green"><?php echo $faq . " kr"; ?></font></p>
                                        </div>

                                        <div id="txtTabeller" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_tabeller'); ?> : <font color="green"><?php echo $tabeller . " kr"; ?></font></p>
                                        </div>
                                        
                                        <div id="txtFremgangsdrift" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_fremgang'); ?> : <font color="green"><?php echo $Fremgangsdrift . " kr"; ?></font></p>
                                        </div>

                                        <div id="txtKontaktskjema" style="display: none">
                                            <p style="text-align: left; margin-top: 0px; margin-bottom: 0px;">+ <?php print t('sm_kontakt'); ?> : <font color="green"><?php echo $kontaktskjema . " kr"; ?></font></p>
                                        </div>
	                            	</div>

                                    <h6 id="total" class="total">= 4745 kr</h6>
	                        	</div>

                        	</div>

                        </div>
                        <div class="clean-subcalc">
                            <p class="text-muted" style="margin-bottom: 0px;"><?php print t('sm_hint'); ?></p>
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