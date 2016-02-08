<?php
	
	require_once('../assets/php/connexion.php');
	
	session_start();
	
	
	//echo $_SESSION['connect'];
	
	
	//Pour l'index, on fait une condition avec un $_SESSION. En gros, si t'es pas co', tu te tapes le formulaire de co' et si tu l'es, tu as le vrai contenu
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Administration - Tout Feu Tout Flam's ©</title>
		<meta charset="utf-8" />
		<meta name="description" content=""/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	</head>
	<body>
		<section class="maincontainer">
		<?php
			if(isset($_SESSION['connect'])){//Dégueu' le @ mais pas d'autres solutions...
				include_once 'assets/php/menu.php';
				echo 
					"<div class=\"cb\"></div>".
					"<h1 style='margin:0;'>Administration Tout Feu Tout Flam's | Bienvenue ".$_SESSION['username']."</h1>".
					"<p><a href=\"../index.php\">Retour au site</a></p>".
					"<p><a href=\"sessiondestroy.php\" onclick=\"return confirm('Se déconnecter et revenir à l\'accueil ?');\">[Déconnexion]</a></p>"
				;
			?>
				
			
			<?php 
				
				
				//echo $_SESSION['connect'];
			}else{
				//$_SESSION['connect']=0;
				echo
					
						"<h1><span>V</span>euillez vous identifier</h1>
						<form action='login.php' method='POST'>
							<label for='username'>Username</label>
								<input type='text' id='username' placeholder='Votre username' name='username' />
							<label for='password'>Password</label>
								<input type='password' id='password' placeholder='Votre password' name='password' />
								<div><input type='submit' name='submit' value='Identifier' /></div>
						</form>
						<p><a href='../index.php'>Retour au site</a></p>"
						
						
					;
			}
		?>
			
		</section>
	</body>
</html>