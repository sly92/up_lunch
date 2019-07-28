 <?php
include('includes/config.php');
$session_uid='';
$_SESSION['id']='';
if(empty($session_uid) && empty($_SESSION['id']))
{
session_unset();
session_destroy();
header('Location: index.php');

}

?>