<?php
	
	require_once('../assets/php/connexion.php');
	
	session_start();
	
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Administration - Tout Feu Tout Flam's ©</title>
		<meta charset="utf-8" />
		<meta name="description" content="Produits"/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	</head>
	<body>
		<section class="maincontainer">
		<?php
			if(isset($_SESSION['connect'])){
				include_once 'assets/php/menu.php';
				echo 
					"<div class=\"cb\"></div>".
					"<h1 style='margin:0;'>Administration Tout Feu Tout Flam's | Produits</h1>".
					"<p><a href=\"../index.php\">Retour au site</a></p>".
					"<p><a href=\"sessiondestroy.php\" onclick=\"return confirm('Se déconnecter et revenir à l\'accueil ?');\">[Déconnexion]</a></p>"
			?>
			<!-- pas de table! -->
			<?php 
				;
				
				//echo $_SESSION['connect'];
			}else{
				echo 'Accès interdit ou refusé! Vous allez être redirigé...';
				echo '<meta http-equiv="refresh" content="4; URL=index.php">';
			}
		?>
			
		</section>
	</body>
</html>