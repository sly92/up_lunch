<?php

include_once 'includes/config.php';

$host=HOST:
$bdd=DATABASE;
$user=USER;
$pass=PASSWORD;

try {
    $bdd = new PDO("mysql:host=$host;dbname=$bdd", $user, $pass, array( PDO::ATTR_PERSISTENT => true ));	// garder la connexion persistente
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage().'<br/>'.'N° : '.$e->getCode();
    }

?>