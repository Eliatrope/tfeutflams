<?php	
	require_once('../assets/php/connexion.php');
	
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Administration - Tout Feu Tout Flam's © | Ingrédients</title>
		<meta charset="utf-8" />
		<meta name="description" content=""/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="stylesheets/style.css"/>
		
		<link rel="stylesheet" type="text/css" href="stylesheets/yellow-text-default.css"/>
	</head>
	<body>
		<section>
			<?php
				if(isset($_SESSION['connect'])){
					include_once 'assets/php/menu.php';
			?>	
		<!--Check la doc' du plug-in 
			https://github.com/stefanvermaas/yellow-text
		-->
				<form action="edit.php" method="POST">
					<textarea id="yellowtext"></textarea>
						<div class="cb"></div>
					<input type="submit" value="envoyer" />
				</form>
						<p><a href="../index.php">Retour au site</a></p>
						<p><a href="sessiondestroy.php" onclick="return confirm(\'Se déconnecter et revenir à l\'accueil ?\');">[Déconnexion]</a></p>
					
			<?php 
				}else{
					echo 'Accès interdit ou refusé! Vous allez être redirigé...';
					echo '<meta http-equiv="refresh" content="4; URL=index.php">';
				}
			?>
						
				
			<script src="assets/js/jquery-2.2.0.min.js"></script>	
			<script src="assets/js/yellow-text.min.js"></script>	
			<script src="assets/js/editor.js"></script>	
		</section>
	</body>
</html>