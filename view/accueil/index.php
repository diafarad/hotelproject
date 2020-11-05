<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="public/css/bootstrap.min.css"/>
    <script src="<?php echo base_url(); ?>public/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-3.4.0.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 28%;
            padding: 10px;
            height: 120px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

         .separator {
             display: flex;
             align-items: center;
             text-align: center;
         }

        .separator::before {
            content: '';
            width : 25px;
            border-bottom: 1px solid #000;
            margin-right: .1em;
        }
        .separator::after {
            margin-left: .25em;
            content: '';
            width : 115px;
            border-bottom: 1px solid #000;
        }
    </style>
</head>
<body>
    <div style="margin-top: 50px; margin-left: 160px" class="separator"><h3 style="margin-top: 10px">Accueil</h3></div>
    <div style="margin-top: 30px; margin-left: 160px;" class="row">
        <div class="column" style="margin-right:10px; background-color:#002060; color:#fff"><img style="float: right; margin-right: 7px; margin-top: 7px" src="<?php echo base_url(); ?>public/image/icons8-chambre-85.png"><?php echo '<h4 style=" margin-top: 30px; font-weight: bold; font-family: Calibri; font-size: 28px">'.number_format(60, 0, ',', ' ').'</h4>'; ?></div>
        <div class="column" style="margin-right:10px; background-color:#bf9000; color:#fff"><img style="float: right; margin-right: 7px; margin-top: 7px" src="<?php echo base_url(); ?>public/image/icons8-ventilateur-85.png"><?php echo '<h4 style=" margin-top: 30px; font-weight: bold; font-family: Calibri; font-size: 28px">35</h4>'; ?></div>
        <div class="column" style="background-color:#843c0b; color: #fff"><img style="float: right; margin-right: 7px; margin-top: 7px" src="<?php echo base_url(); ?>public/image/icons8-climatisation-85.png"><?php echo '<h4 style=" margin-top: 30px; font-weight: bold; font-family: Calibri; font-size: 28px">'.number_format(25, 0, ',', ' ').'</h4>'; ?></div>
    </div>
    <div style="margin-left: 160px;" class="row">
        <div class="column" style="margin-right:10px; height: 45px; background-color: #0036a2; color:#fff"><h4 style="margin-top: 2px">Nombre de chambres</h4></div>
        <div class="column" style="margin-right:10px; height: 45px; background-color: #ffc91d; color:#fff"><h4 style="margin-top: 2px">Chambres ventilo</h4></div>
        <div class="column" style="margin-right:10px; height: 45px; background-color: #c45a11; color: #fff"><h4 style="margin-top: 2px">Chambres clim</h4></div>
    </div>
    <div class="row" style="margin-top:15px; margin-left: 160px;">
        <div class="column" style="margin-right:10px; background-color:#B50975; color: #fff"><img style="float: right; margin-right: 7px; margin-top: 7px" src="<?php echo base_url(); ?>public/image/icons8-chambre-viste-85.png"><?php echo '<h4 style=" margin-top: 30px; font-weight: bold; font-family: Calibri; font-size: 28px">763</h4>'; ?></div>
        <div class="column" style="margin-right:10px; background-color:#6f2fa0; color: #fff"><img style="float: right; margin-right: 7px; margin-top: 7px" src="<?php echo base_url(); ?>public/image/icons8-parasol-85.png"><?php echo '<h4 style=" margin-top: 30px; font-weight: bold; font-family: Calibri; font-size: 28px">987</h4>'; ?></div>
        <div class="column" style="margin-right:10px; background-color:#1c83a3; color:#fff"><img style="float: right; margin-right: 7px; margin-top: 7px" src="<?php echo base_url(); ?>public/image/icons8-pièces-de-monnaie-85.png"><?php echo '<h4 style=" margin-top: 30px; font-weight: bold; font-family: Calibri; font-size: 28px">'.number_format(25800000, 0, ',', ' ').' FCFA</h4>'; ?></div>
    </div>
    <div style="margin-left: 160px;" class="row">
        <div class="column" style="margin-right:10px; height: 45px; background-color: #F559B7; color: #fff"><h4 style="margin-top: 2px">Visiteurs accès chambre</h4></div>
        <div class="column" style="margin-right:10px; height: 45px; background-color: #a162d0; color: #fff"><h4 style="margin-top: 2px">Visiteurs accès piscine</h4></div>
        <div class="column" style="margin-right:10px; height: 45px; background-color: #26add7; color: #fff"><h4 style="margin-top: 2px">Recette</h4></div>
    </div>
</body>
</html>
