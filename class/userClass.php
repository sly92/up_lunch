
 <?php 

class userClass
{

/* Connexion de l'utilisateur */

public function connexion($bdd,$login,$pass)
{

try{


$hash_password= hash('sha256', $pass); //Password encryption 


$stmt = $bdd->prepare("SELECT Id FROM utilisateurs WHERE Mail=:login AND Mdp=:hash_password");
$stmt->bindParam("login", $login,PDO::PARAM_STR) ;
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetch(PDO::FETCH_OBJ);
$bdd = null;
if($count)
{
$_SESSION['id']=$data->Id; // Storing user session value
return true;
}
else
{
return false;
}
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}


public function connexionG($bdd,$login,$name)
{

try{

$email=$login;

$st = $bdd->prepare("SELECT id FROM utilisateurs WHERE Mail=:email");
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
$data=$st->fetch(PDO::FETCH_OBJ);
if($count<1)
{

list($prenom, $nom) = explode(" ", $login);

$stmt = $bdd->prepare("INSERT INTO utilisateurs(Nom,Prenom,Mail,Mail_Google) VALUES (:nom,:prenom,:login,true)");
$stmt->bindParam("login", $login,PDO::PARAM_STR) ;
$stmt->bindParam("nom", $nom,PDO::PARAM_STR) ;
$stmt->bindParam("prenom", $prenom,PDO::PARAM_STR) ;
$stmt->execute();
$id=$bdd->lastInsertId(); // Last inserted row id
$bdd = null;
$_SESSION['id']=$id;
return true;
}
else
{
$bdd = null;
return false;
}
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}

}


/* Inscription de l'utilisateur */

public function inscription($bdd,$nom,$prenom,$email,$mobile,$pass)
{
try{

$st = $bdd->prepare("SELECT id FROM utilisateurs WHERE Mail=:email");
$st->bindParam("email", $email,PDO::PARAM_STR);
$st->execute();
$count=$st->rowCount();
if($count<1)
{
$stmt = $bdd->prepare("INSERT INTO utilisateurs(Nom,Prenom,Mail,Mdp) VALUES (:nom,:prenom,:mail,:hash_password)");
$stmt->bindParam("nom", $nom,PDO::PARAM_STR) ;
$stmt->bindParam("prenom", $prenom,PDO::PARAM_STR) ;
$stmt->bindParam("mail", $email,PDO::PARAM_STR) ;
$hash_password= hash('sha256', $pass); //Password encryption
$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
$stmt->execute();
$id=$bdd->lastInsertId(); // Last inserted row id
$bdd = null;
$_SESSION['id']=$id;
return true;
}
else
{
$bdd = null;
return false;
}

}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}

/* User Details */
public function infoUtilisateur($bdd,$id)
{
try{

$stmt = $bdd->prepare("SELECT Nom,Prenom,Mail,Mdp,Date_creation FROM utilisateurs WHERE id=:id");
$stmt->bindParam("id", $id,PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
return $data;
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}

public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){

		
			// escape variables for security
			$email = htmlspecialchars(trim( $data['email'] ));

			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$password = $this->randomPassword();
			$password1 = md5( $password );

		try{
			$stmt = $bdd->prepare("UPDATE utilisateurs SET password = '$password1' WHERE Email = :email");
			$stmt->bindParam("email", $email,PDO::PARAM_INT);
			$stmt->execute();
			}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
			
			$to = $email;
			$subject = "New Password Request";
			$txt = "Your New Password ".$password;
			$headers = "From: jpierre68@yahoo.com" . "\r\n" .
						"CC: jpierre68@yahoo.com";

				mail($to,$subject,$txt,$headers);
				return true;

		} else{
			throw new Exception( FIELDS_MISSING );
		}

	return false;
}

	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

}
?> 