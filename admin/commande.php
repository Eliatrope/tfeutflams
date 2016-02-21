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
		<link rel="stylesheet" type="text/css" href="assets/css/bic_calendar.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	</head>
	<body>
		<section class="hugecontainer">
		<?php
			if(isset($_SESSION['connect'])){
				include_once '/assets/php/header.php';
				echo 
					"<div class=\"cb\"></div>".
					"<h1 style='margin:0; text-align:center;'>Administration Tout Feu Tout Flam's | Bienvenue ".$_SESSION['username']."</h1>"
				;
				
			?>
			<div class="containercalendar">
				<div id="events-calendar"></div>
			</div>
			
			<!--List of events in a table-->
				<form action="insert.php" method="POST">
					<button name="table" value="commande" class="buttoninsert">Insérer un nouvel élément</button>
				</form>
				<h2 class="titlemodo">EN ATTENTE DE VALIDATION</h2>
				<div class="bigforming">
							<table>
								<thead>
									<tr>
										
										<th>
											Nom
										</th>
										<th>
											Civilite
										</th>
										<th>
											Téléphone
										</th>
										<th>
											Mail
										</th>
										<th>
											Nombre de personnes
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation
					$sql='SELECT * FROM commande WHERE moderation = 0 ORDER BY date DESC';
					$resultat=$connexion->query($sql);
					$commande = $resultat->fetchAll(PDO::FETCH_OBJ);
					
					foreach($commande as $c){
						echo 
							'<tr>'.
								'<td>'.
									$c->nom.
								'</td>'.
								'<td>'.
									$c->civilite.
								'</td>'.
								'<td>'.
									$c->telephone.
								'</td>'.
								'<td>'.
									$c->mail.
								'</td>'.
								'<td>'.
									$c->nb_personnes.
								'</td>'.
								'<td>'.
									'<form action="moderation.php" method="POST"><input class="actioning modoimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="commentaire" /><input type="hidden" name="id" value="'.$c->id.'" /></form>'.
									'<form action="delete.php" method="POST"><input class="actioning deleteimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="commentaire" />
									<input type="hidden" name="id" value="'.$c->id.'" /></form>'.
								'</td>'.
							'</tr>'
						;
					}
					 
							?>
					</tbody>
												
								<tfoot>
												
								</tfoot>
							</table>
						</div>
						
						<h2 class="titlemodo">VALIDÉS</h2>
				<div class="bigforming">
							<table>
								<thead>
									<tr>
										
										<th>
											Civilite
										</th>
										<th>
											Nom
										</th>
										<th>
											Téléphone
										</th>
										<th>
											Mail
										</th>
										<th>
											Nombre de personnes
										</th>
										<th>
											Date
										</th>
										<th>
											Titre
										</th>
										<th>
											Lien
										</th>
										<th>
											Lieu
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation=>modéré
					$sql='SELECT * FROM commande WHERE moderation = 1 ORDER BY date DESC';
					$resultat=$connexion->query($sql);
					$commande = $resultat->fetchAll(PDO::FETCH_OBJ);
					
					foreach($commande as $c){
						echo 
							'<tr>'.
								'<td>'.
									$c->civilite.
								'</td>'.
								'<td>'.
									$c->nom.
								'</td>'.
								'<td>'.
									$c->telephone.
								'</td>'.
								'<td>'.
									$c->mail.
								'</td>'.
								'<td>'.
									$c->nb_personnes.
								'</td>'.
								'<td>'.
									$c->date.
								'</td>'.
								'<td>'.
									$c->title.
								'</td>'.
								'<td>'.
									$c->link.
								'</td>'.
								'<td>'.
									$c->lieu.
								'</td>'.
								'<td>'.
									'<form action="edit.php" method="POST"><input class="actioning editimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="commentaire" /><input type="hidden" name="id" value="'.$c->id.'" /></form>'.
									'<form action="delete.php" method="POST"><input class="actioning deleteimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="commentaire" /><input type="hidden" name="id" value="'.$c->id.'" />
									</form>'.
								'</td>'.
							'</tr>'
						;
					}
					 
							?>
					</tbody>
												
								<tfoot>
												
								</tfoot>
							</table>
						</div>
			<?php
				echo 
					"<div class='centermepls'><p class='pbuttonadmin'><a href=\"../index.php\">Retour au site</a></p>".
					"<p class='pbuttonadmin'><a href=\"sessiondestroy.php\" onclick=\"return confirm('Se déconnecter et revenir à l\'accueil ?');\">[Déconnexion]</a></p></div>".
					"<div class='cb'></div>"
				;
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
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="http://momentjs.com/downloads/moment.js"></script>
			<script src="assets/js/bic_calendar.min.js"></script>
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
										content: \"Réservation soirée flam's\",
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

		</section>
	</body>
</html>