<?php

date_default_timezone_set('Europe/Paris');


/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

/* CONFIGURATION DE LA BASE */

define("HOST", "localhost");     // L’hébergeur où vous voulez vous connecter.
define("USER", "root");    // Le nom d’utilisateur de la base de données.
define("PASSWORD", "root");    // Le mot de passe de la base de données. 
define("DATABASE", "up_lunch");    // Le nom de la base de données.
define("BASE_URL", "http://localhost/UPLUNCH/"); // Url du site


//Email du webmaster
$mail_webmaster = 'jpierre68@yahoo.com';


/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'default';
?>