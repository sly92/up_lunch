<?php 	include_once("header.html"); 
		include('class/userClass.php');?>
	</head>

	<body>

	    <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" style="position:absolute; left:10;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <<a class="navbar-brand" href="#">UP - LUNCH</a>

	          
	             
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav ">
	            <li class="active"><a href="#">Accueil</a></li>
	         
	            <li><a href="#favoris">Mes favoris</a></li>
	            <li><a href="#presentation">Qui sommes nous ?</a></li>
	            <li><a href="#conditions">Conditions d'utilisations</a></li>
	            <li><a href="#contact">Nous contacter</a></li>
<br>
	            <a id="nav-facebook" href="#url-page-facebook"><img src="Image/logo-facebook.png" alt="facebook" height="30" width="40"></a>
	            <a id="nav-gmail" href="#url-connexion-gmail.php"><img src="Image/logo-gmail.png" alt="gmail" height="20" width="30"></a> 
	            
	          </ul>

	   
	        </div><!--/.nav-collapse -->
<?php
	        if(!isset($_SESSION['id']))
	        {

 		echo '<a id="picto-connect" href="#"><img src="Image/inscription.png" alt="bonhomme" height="40" width="40" data-toggle="modal" data-target="#myModal"></a>';
	        }

	        else
	        {
		echo '<a id="picto-connect" href="logout.php"><img src="Image/off.png" alt="off" height="40" width="40" data-toggle="modal" data-target="#myModal"></a>';
	        }
?>
	      </div>
	    </nav>


</br></br></br>   <script src="Jquery/jquery.js"></script> 
         <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>