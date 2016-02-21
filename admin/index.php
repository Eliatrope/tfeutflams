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
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="../assets/css/styletablette.css"/>
		<link rel="stylesheet" type="text/css" href="../assets/css/styleweb.css"/>
	</head>
	<body>
		<section class="hugecontainer">
		<?php
			if(isset($_SESSION['connect'])){
				include_once '/assets/php/header.php';
				echo 
					"<div class=\"cb\"></div>".
					"<h1 style='margin:0; text-align:center;'>Administration Tout Feu Tout Flam's | Bienvenue ".$_SESSION['username']."</h1>".
					"<div class='centermepls'><p class='pbuttonadmin'><a href=\"../index.php\">Retour au site</a></p>".
					"<p class='pbuttonadmin'><a href=\"sessiondestroy.php\" onclick=\"return confirm('Se déconnecter et revenir à l\'accueil ?');\">[Déconnexion]</a></p></div>".
					"<div class='cb'></div>"
				;
				
			?>
				
			<?php
				include_once '/assets/php/footer.php';
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
			<script src="assets/js/jquery-2.2.0.min.js"></script>
			<script src="assets/js/menu.js"></script>
		</section>
	</body>
</html>