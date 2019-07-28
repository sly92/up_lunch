 <?php require("includes/db_connect.php"); ?>

 <title> Connexion </title>
      </head>

    <body>


<script type="text/javascript">

var js_array =<?php echo json_encode($_GET);?>;
console.log(js_array);
</script>


<?php

$ok = false;

$userClass = new userClass(); 

$erreurMsgIns="";
$erreurMsgCon="";

//Si lutilisateur est connecte, on affiche la page de son profil

if(!isset($_SESSION['id']))
{    

       //On verifie si le formulaire a ete envoye
    if(isset($_POST['connexion']))
    {
        if (isset($_POST['login']) && isset($_POST['mdp'])) 
        {

        $login=$_POST['login'];
        $pass=$_POST['mdp'];
        

if(strlen(trim($login))>1 && strlen(trim($pass))>1)
{
$ok = true;
$id=$userClass->connexion($bdd,$login,$pass);
if($id)
{
$url=BASE_URL.'accueil.php';
header("Location: $url"); // Page redirecting to home.php 
}
else
{
$erreurMsgCon="Verifier votre login ou mot de passe";
}
}
 if(isset($erreurMsgCon))
        {
                echo '<p style="color: red; width: 100%; text-align: center; padding: 5px;">'.$erreurMsgCon.'</p>';
        }



}

else if(isset($_GET['Email']) and trim($_GET['Email'])!="")
{
    $login=$_GET['Email'];
    $name=$_GET['Name'];

    $id=$userClass->connexionG($bdd,$name,$login);
}

}

} else {

echo "Vous êtes déjà connecté";
?>

<script language="JavaScript">
    document.location.href="index.php";
</script>


<?php

}
/* Signup Form */
if (isset($_POST['inscription']))
{
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['mobile']) && isset($_POST['mdp'])){
$ok = true;

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['login'];
$mobile=$_POST['mobile'];
$pass=$_POST['mdp'];

/* Verifier expressions régulière */
$nom_check = preg_match('~^[A-Za-z]{3,20}$~i', $nom);
$prenom_check = preg_match('~^[A-Za-z]{3,20}$~i', $prenom);
$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $pass);

if($nom_check && $prenom_check && $email_check && $password_check && strlen(trim($nom))>0 && strlen(trim($prenom))>0 )
{

$id=$userClass->inscription($bdd,$nom,$prenom,$email,$mobile,$pass);
if($id)
{
$url=BASE_URL.'accueil.php';
header("Location: $url"); // Page redirecting to home.php 
}
else
{
$erreurMsgIns="L'email est déjà existant.";
}
}
else
{
   $erreurMsgIns="Veuillez remplir correctement le formulaire."; 
}


}
$erreurMsgIns="Un des champs est resté vide"; 

 if(isset($erreurMsgCon))
        {
            echo '<p style="color: red; border: 1px solid red; width: 100%; text-align: center; padding: 5px;">'.$erreurMsgCon.'</p>';
   
        }   
}

     
?>

<div class="content">

    

<div class="container">
      
     

      <script id="metamorph-1-start" type="text/x-placeholder"></script><script id="metamorph-21-start" type="text/x-placeholder"></script>

    <div class="container text-center">
             
   <!-- Large modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Connexion / Inscription ></h4>
            </div>
            <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Connexion</a></li>
                            <li><a href="#Registration" data-toggle="tab">Inscription</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form id="form1" action="#" role="form" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="login" class="form-control" id="email1" placeholder="E-mail" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Mot de passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="mdp" class="form-control" id="password1" placeholder="Mot de passe" />
                                    </div>
                                </div>
                               <div class="row">

                                    <div class="col-md-12 ">
                                        <button type="submit" name="connexion" class="btn btn-primary btn-sm" style="margin-right:10px;">
                                            Se connecter</button>
                                        <button id="oublie" class="btn btn-default btn-sm">Mot de passe oublié ?</a></button>
                                    </div>
                                             
                        <div class="center-block text-center sign-with">
                            <div class="col-md-12">
                              <div id="OR" class=" center-block">
                            OU</div>
                                <h4>
                                    Se connecter avec</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">

                                    <div id="googleSign" class="g-signin2" data-onsuccess="onSignIn"></div>
                                    <?php if(isset($_SESSION['id'])){ ?>
                                    <a href="#" onclick="signOut();">Sign out</a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                
                                </div>
                                
                        
                    </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form id="form2" action="#" role="form" class="form-horizontal" method="post">
                                 <div class="form-group">
                                <label for="Nom" class="col-sm-2 control-label">
                                        Nom</label>
                                    <div class="col-sm-10">
                                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Ex: Dupont" />
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="Prenom" class="col-sm-2 control-label">
                                        Prenom</label>
                                    <div class="col-sm-10">
                                                 <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Ex: Pierre" />
                                        
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" name="login" class="form-control"  placeholder="Ex: dupont@gmail.com" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Ex: 0601020304" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Mot de passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Ex: abc123&!Z" />
                                    </div>
                                </div>
                                          <div id="erreur" style="display:none" >
    <p style="color:red;font-size:12px;">Vous n'avez pas correctement remplis les champs du formulaire !</p>
</div>
                                <br>

                                <div class="row">


                                    <div class="col-md-12 ">
                                        <button type="submit" id="envoi" name="inscription" class="btn btn-primary btn-sm reset">
                                            Envoyer</button>
                                        <button type="reset" id="reset" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>

                        </div>
            </div>
        </div>
    </div>
</div>



         <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Recuperation du mot de passe ></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">

                                <form action="#" role="form" class="form-horizontal" method="post">
                                <span class="help-block">
                                  Email address you use to log in to your account
                                  <br>
                                  We'll send you an email with instructions to choose a new password.
                                </span>
                                    <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="login" class="form-control" id="email1" placeholder="E-mail" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-2">
                             <?php        if(isset($erreurMsgIns))
        {
                echo '<div class="message">'.$erreurMsgIns.'</div>';
        }?>
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" name="oublie" class="btn btn-primary btn-sm">
                                            Envoyer</button>
                                        <button type="reset" class="btn btn-default btn-sm reset">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>

                        </div>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      


<script type="text/javascript">

$(document).ready(function(){

    var ok=true;
    var ie = (function(){
            var undef, v = 3, div = document.createElement("div");
            while (
                div.innerHTML = "<!--[if gt IE "+(++v)+"]><i></i><![endif]-->",
                div.getElementsByTagName("i")[0]
                );
            return v> 4 ? v : undef;
        }());


    var $nom = $("#nom"),

        $prenom = $("#prenom"),

        $login = $("#email"),

        $mobile = $("#mobile"),

        $mdp = $("#mdp"),

        $envoi = $("#envoi"),

        $reset = $("#reset"),

        $erreur = $("#erreur"),

        $champ = $(".form-control");



         $champ.keyup(function(){

            if($(this).is("#mobile"))
                var s= /^0[6-8]{1}[0-9]{8}$/;

            else if($(this).is("#email"))
                var s= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            else 
                var s= /^[A-Za-z0-9\s]{3,}$/;


                if(!$(this).val().match(s)){ // si la chaîne de caractères est inférieure à 5

            $(this).css({ // on rend le champ rouge 

                borderColor : "red",

            color : "red"

            });
           
         }

         else{

             $(this).css({ // si tout est bon, on le rend vert

             borderColor : "green",

             color : "green"
              
         });
ok=true;
         }
     });
          

    $champ.change(function(){

             if($(this).is("#mobile"))
                var s= /^0[6-8]{1}[0-9]{8}$/;

            else if($(this).is("#email"))
                var s= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            else 
                var s= /^[A-Za-z0-9\s]{3,}$/;

             if(!$(this).val().match(s)){ 

            $(this).css({ // on rend le champ rouge 

                borderColor : "red",

            color : "red"

            });
           
         }

         else{

             $(this).css({ // si tout est bon, on le rend vert

             borderColor : "green",

             color : "green"
         });

ok=true;
         }
    });


    $( "#form2" ).submit(function( event ) {

        console.info(ok);

        if(ok==true){

        verifier($nom);

        verifier($prenom);

        verifier($login);

        verifier($mobile);

        verifier($mdp);

        $('#form2 *').filter(':input').each(function(){
    
            if(($(this).css("color") == "red")) 
                ok=false;
        });
     
        }
        if(ok)
        return;
   
        $( "span" ).text( "Erreur dans le formulaire !" ).show().fadeOut( 1000 );
          // // on annule la fonction par défaut du bouton d"envoi
        event.preventDefault();
    
    });




      $reset.click(function(){

        $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS

            borderColor : '#ccc',

            color : '#555'

        });
ok=false;
        $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur

    });

  function verifier(champ){

        if(champ.val() == ""){ // si le champ est vide

            $erreur.css('display', 'block'); // on affiche le message d'erreur

            champ.css({ // on rend le champ rouge

                borderColor : 'red',

                color : 'red'

            });
                ok=false;

        }


    }
});




</script>
                
               
               <script>

   $( "#oublie" ).click(function() {

         $('#myModal').modal('hide');
         $('#myModal2').modal('show');
    });

    function onSignIn(googleUser) {

         var signin = document.getElementById('googleSign');

      console.log('onSuccess!');
      var profile = googleUser.getBasicProfile();
      console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      var EmailG = profile.getEmail();
      var Name = profile.getName();

    signin.onclick = function() {
      window.location.href = "index.php?Email="+EmailG+"&Name=" + Name;
      } 
  }
    


    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
    }


  </script>

                


        </body>
</html>


        




