<?php

function navbar($hjemActive, $nyheterActive) {?>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="height:75px;">
        <div class="container">
            <a class="navbar-brand logo" href="index.php" style="font-family:'Alegreya Sans', sans-serif;">
                <img src="image-uploads/favicon.png" class="rounded" style="margin-right: 10px; width: 35px; height: 35px;" />
                <strong>HEX&nbsp;</strong>Designs</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation" style="padding-right:20px;"><a class="nav-link" href="innlogging.php"><?php print t('global_logg-inn'); ?></a></li>
                    <li class="nav-item" role="presentation" style="padding-right:30px;"><a class="nav-link" href="registrering.php"><?php print t('global_register'); ?></a></li>
                </ul>
        </div>
        </div>
    </nav>
<?php
}
?>

