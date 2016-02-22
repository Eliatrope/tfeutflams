<?php
	require_once 'assets/php/connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="description" content="">
		<link href="assets/css/style.css" type="text/css" rel="stylesheet" />
		<link href="assets/css/styletablette.css" type="text/css" rel="stylesheet" />
		<link href="assets/css/styleweb.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="admin/assets/css/bic_calendar.css"/>
		<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.min.css"/>
	</head>
	
	
	<body>
		<section class="hugecontainer">
			<?php include_once "assets/php/header.php";?>
			<div class="containercalendar">
				<div id="events-calendar"></div>
			</div>
			
			<!--List of events in a table-->
			<div class="containerformcommande">
					<h5>ENVIE D'UNE<br>SOIRÉE FLAM'S?</h5>
					<form action="" method="POST">
						<div>
							<label for="name">Nom*</label>
								<input type="text" name="name" id="name" placeholder="Merci de saisir votre nom"/>
							<label for="prenom">Prénom*</label>
								<input type="text" name="prenom" id="prenom" placeholder="Merci de saisir votre prénom"/>
							<label for="civilite">Civilité*</label>
								<select id="civilite">
									<option value="monsieur" name="civilite">Monsieur</option>
									<option value="madame" name="civilite">Madame</option>
								</select>
							<label for="mail">Adresse mail*</label>
								<input type="text" name="mail" id="mail" placeholder="Merci de saisir votre adresse mail"/>
							<label for="phone">Téléphone*</label>
								<input type="text" name="phone" id="phone" placeholder="Merci de saisir votre numéro de téléphone"/>
							<label for="personne">Nombre de personnes*</label>
								<input type="number" name="personne" id="personne" placeholder="Merci de saisir le nombre de personnes"/>
							<label for="place">Lieu</label>
								<input type="text" name="place" id="place" placeholder="Merci de saisir le lieu de réservation"/>
							<label for="comm">Commentaire(facultatif)</label>
							<textarea id="comm" name="comm">Plus d'informations à nous donner ?</textarea>
								<div class="cb"></div>
							<span>Les champs marqués d'un * sont obligatoires</span>
							<input type="submit" value="Envoyer"/>
						</div>
						<br>
					</form>
				</div>
			<?php include_once "assets/php/footer.php";?>
		</section>
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
			<script src="admin/assets/js/bootstrap.min.js"></script>
			<script src="http://momentjs.com/downloads/moment.js"></script>
			<script src="admin/assets/js/bic_calendar.min.js"></script>
			<script>
				
					$(document).ready(function() {

						var monthNames = ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];

						var dayNames = ["Lu", "Ma", "Me", "Je", "Ve", "Sa", "Di"];
					<?php 
					//Initialisation
					$sql="SELECT * FROM commande WHERE moderation=1";
					$resultat=$connexion->query($sql);
					$commande=$resultat->fetchAll(PDO::FETCH_OBJ);
						echo "var events = [";
							foreach($commande as $c){
								echo
									"{
										date: \"".$c->date."\",
										title: \"".$c->title."\",
										link: \"".$c->link."\",
										linkTarget: \"_blank\",
										color: \"\",
										content: \"".$c->content."\",
										class: \"\",
										displayMonthController: true,
										displayYearController: true,
										nMonths: 6
									},"
									;
							}
						echo"];";
							
						echo "$('#events-calendar').bic_calendar({
								//list of events in array
								events: events,
								//enable select
								enableSelect: false,
								//enable multi-select
								multiSelect: false,
								//set day names
								dayNames: dayNames,
								//set month names
								monthNames: monthNames,
								//show dayNames
								showDays: true,
								//show month controller
								displayMonthController: true,
								//show year controller
								displayYearController: true,
							});"
							;
					?>
						});
				
			</script>
	</body>
</html>
			