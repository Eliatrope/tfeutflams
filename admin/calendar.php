<?php
	
	require_once('../assets/php/connexion.php');
	
	session_start();
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Administration - Tout Feu Tout Flam's © </title>
		<meta charset="utf-8" />
		<meta name="description" content=""/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/bic_calendar.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<section>
			<?php
				if(isset($_SESSION['connect'])){
					include_once 'assets/php/menu.php';
					echo 
						"<div class=\"cb\"></div>".
						"<h1 style='margin:0;'>Administration Tout Feu Tout Flam's</h1>".
						"<p><a href=\"../index.php\">Retour au site</a></p>".
						"<p><a href=\"sessiondestroy.php\" onclick=\"return confirm('Se déconnecter et revenir à l\'accueil ?');\">[Déconnexion]</a></p>";
			?>
		<div class="containercalendar">
			<div id="events-calendar"></div>
		</div>
		<!--List of events in a table-->
		
		</section>
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="http://momentjs.com/downloads/moment.js"></script>
		<script src="assets/js/bic_calendar.min.js"></script>
		<script src="assets/js/main.js" charset="UTF-8"></script>
		
			<?php 		
				}else{
					echo 'Accès interdit ou refusé! Vous allez être redirigé...';
					echo '<meta http-equiv="refresh" content="4; URL=index.php">';
				}
			?>
	</body>
</html>