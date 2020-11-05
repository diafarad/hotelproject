<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Hotel</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css"/>
    <script src="<?php echo base_url(); ?>public/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-3.4.0.min.js"></script>

    <style>
        /*Reset CSS*/
        *{
            margin: 0px;
            padding: 0px;
            font-family: Avenir, sans-serif;
        }

        nav{
            width: 100%;
            margin: 0 auto;
            background-color: #171717;
            position: relative;
            top: 0px;
        }

        nav ul{
            list-style-type: none;
        }

        nav ul li{
            float: left;
            width: auto;
            padding-right: 20px;
            padding-left: 20px;
            text-align: center;
            position: relative;
        }

        nav ul::after{
            content: "";
            display: table;
            clear: both;
        }

        nav a{
            display: block;
            text-decoration: none;
            color: #fff;
            border-bottom: 2px solid transparent;
            padding: 10px 0px;
        }

        nav a:hover{
            color: orange;
            border-bottom: 2px solid gold;
            text-decoration: none;
        }

        .sous{
            display: none;
            box-shadow: 0px 1px 2px #CCC;
            background-color: #3b3b3b;
            position: absolute;
            width: 85%;
            z-index: 1000;
        }
        nav > ul li:hover .sous{
            display: block;
        }
        .sous li{
            float: none;
            width: 100%;
            padding-right: 0px;
            padding-left: 0px;
            text-align: left;
        }
        .sous a{
            padding: 10px;
            border-bottom: none;
        }
        .sous a:hover{
            border-bottom: none;
            background-color: RGBa(200,200,200,0.1);
        }
        .deroulant > a::after{
            content:" ▼";
            font-size: 12px;
        }

        .conteneur{
            margin: 50px 20px;
            height: 1500px;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="<?php echo base_url().'?page=accueil' ?>" style="font-weight: bold">Accueil</a></li>
        <li><a href="<?php echo base_url().'?page=chambre' ?>" style="font-weight: bold">Chambres</a></li>
        <li><a href="<?php echo base_url().'?page=visiteur' ?>" style="font-weight: bold">Visiteurs</a></li>
        <li><a href="#" style="font-weight: bold">Recettes</a></li>
        <li><a href="#" style="font-weight: bold">Statistiques</a></li>
        <li><a href="#" style="font-weight: bold">Paramètre</a></li>
    </ul>
</nav>

</body>
</html>