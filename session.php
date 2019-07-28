 <?php
if(!empty($_SESSION['id']))
{
$session_uid=$_SESSION['id'];
include('class/userClass.php');
$userClass = new userClass();
}
if(empty($session_uid))
{
$url=BASE_URL.'index.php';
header("Location: $url");
}
?>