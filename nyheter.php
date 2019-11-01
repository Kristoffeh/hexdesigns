<!DOCTYPE html>
<html>

<?php require 'includes/vars.php'; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $website_title . " - Nyheter"; ?></title>
    <link rel="stylesheet" href="assets-front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets-front/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets-front/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Andika">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat+Brush">
    <link rel="stylesheet" href="assets-front/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="assets-front/css/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.css">
    <link rel="stylesheet" href="assets-front/css/Dark-NavBar.css">
    <link rel="stylesheet" href="assets-front/css/Navbar-Fixed-Side.css">
    <link rel="stylesheet" href="assets-front/css/Pretty-Registration-Form.css">
    <link rel="shortcut icon" type="image/png" href="image-uploads/favicon.png"/>
    <link rel="stylesheet" href="assets/css/custom.css">
    
</head>

<body>
    <?php
    require 'includes/navbar.php';
    navbar("false", "true"); // Parameterne velger om HJEM og NYHETER skal være 'active' eller ikke, HJEM er aktiv.
    ?>

    <section class="clean-block clean-blog-list dark" style="margin-top:0px;">
        <div class="container">
            <div class="block-heading" style="padding-top:10px;"></div>
            <div class="block-content" style="margin-bottom:50px;">
                <div class="clean-blog-post" style="padding-bottom:0px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="info">
                                <h2 class="text-info" style="font-size:25px;font-family:Montserrat, sans-serif;color:rgb(0,145,255);">Nyhet #1</h2><span class="text-muted"><a href="#">John Smith</a></span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae
                                leo.</p>
                            <div class="info"><span class="text-muted">Publisert 16. Januar 2018</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content" style="margin-bottom:50px;">
                <div class="clean-blog-post" style="padding-bottom:0px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="info">
                                <h2 class="text-info" style="font-size:25px;font-family:Montserrat, sans-serif;color:rgb(0,145,255);">Nyhet #2</h2><span class="text-muted"><a href="#">John Smith</a></span></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae
                                leo.</p>
                            <div class="info"><span class="text-muted">Publisert 16. Januar 2018</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="page"></main>
    
    <?php include 'includes/footer.php'; ?>

    <script src="assets-front/js/jquery.min.js"></script>
    <script src="assets-front/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets-front/js/Hover-Product.js"></script>
    <script src="assets-front/js/theme.js"></script>
    <script src="assets-front/js/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.js"></script>
    <script src="assets-front/js/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.js"></script>
    <script src="assets-front/js/Bootstrap-4-Navbar-with-Logo-Image-Brand-Name-and-Responsive-Menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"></script>
    <script src="assets-front/js/Sidebar-Menu.js"></script>
    <script src="assets-front/js/SO-Floating-Nav_v10.js"></script>
    <script src="assets-front/js/vertical-slide-withot-image.js"></script>
</body>

</html>