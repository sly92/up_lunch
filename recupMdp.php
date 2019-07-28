 <?php 
include_once 'header.html';
require("includes/db_connect.php"); 
include_once 'includes/config.php';?>

<?php
if(isset($_POST['submit']))
    $userClass->forgetPassword($_POST);
?>
	
						



