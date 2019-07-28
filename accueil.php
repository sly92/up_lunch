 
 <title> Accueil </title>
	</head>

 <?php
require('includes/db_connect.php');
include('session.php');
include_once('menu.php');
?>

<div id="container">

<?php
$infoUtilisateur=$userClass->infoUtilisateur($bdd,$session_uid);
?>
<h1>Bienvenue <?php echo $infoUtilisateur->Prenom; ?></h1>

<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>

</div>