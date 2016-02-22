<?php
	require_once 'assets/php/connexion.php';
	
	//Date d'aujourd'hui
	setlocale(LC_TIME, 'fr_FR.utf8','fra');
	
	$todayfr = utf8_encode(strftime("%A %d %B %Y"));
	$today = date('Y-m-d');
					
	//Date dans 1 jours
	$Jplus1fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+1 day')));
							
	$Jplus1 = date('Y-m-d', strtotime('+1 day'));
							
							
	//Date dans 2 jours
	$Jplus2fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+2 day')));
							
	$Jplus2 = date('Y-m-d', strtotime('+2 day'));
							
							
	//Date dans 3 jours
	$Jplus3fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+3 day')));
							
	$Jplus3 = date('Y-m-d', strtotime('+3 day'));
							
	//Date dans 4 jours
	$Jplus4fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+4 day')));
							
	$Jplus4 = date('Y-m-d', strtotime('+4 day'));
							
	//Date dans 5 jours
	$Jplus5fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+5 day')));
							
	$Jplus5 = date('Y-m-d', strtotime('+5 day'));
							
	//Date dans 6 jours
	$Jplus6fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+6 day')));
							
	$Jplus6 = date('Y-m-d', strtotime('+6 day'));
							
	//Date dans 7 jours
	$Jplus7fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+7 day')));
							
	$Jplus7 = date('Y-m-d', strtotime('+7 day'));
	
	//Récupération géolocalisation
	/*$sql="SELECT * FROM emplacement";
	$resultat=$connexion->query($sql);
	$emplacement=$resultat->fetchAll(PDO::FETCH_OBJ);*/
	
	$jointure = "SELECT * FROM gmaps g INNER JOIN emplacement e ON g.fk_emplacement = e.id WHERE g.jour BETWEEN '$today' AND '$Jplus7'";
	$results = $connexion->query($jointure);
	$emplacement = $results->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération actualité
	$sql="SELECT * FROM actualite ORDER BY id DESC LIMIT 1";
	$result=$connexion->query($sql);
	$actu=$result->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération flams
	$sql="SELECT * FROM flams";
	$resultats=$connexion->query($sql);
	$flams=$resultats->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération SEO
	$sql="SELECT * FROM seo WHERE page='index'";
	$resultat=$connexion->query($sql);
	$seo=$resultat->fetchAll(PDO::FETCH_OBJ);
	
	
	
?>
<!--Astuce du jour: https://developers.google.com/web/tools/setup/setup-workflow. Pour ne plus avoir à reload le navigateur quant on fait des modifs dans les fichiers-->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<?php
			foreach($seo as $s){
				echo
					'<title>'.$s->title.'</title>'.
					'<meta name="description" content="'.$s->meta_description.'">'
				;
			}
		?>
		<link href="assets/css/style.css" type="text/css" rel="stylesheet" />
		<link href="assets/css/styletablette.css" type="text/css" rel="stylesheet" />
		<link href="assets/css/styleweb.css" type="text/css" rel="stylesheet" />
	</head>
	
	
	<body>
		<section class="hugecontainer">
			<?php include_once "assets/php/header.php";?>
	<!-- ERROR 666
		<div class="just">
			<h1>Tout Feu Tout...</h1>
			<h4>FLAM'$</h4>
			<img src="assets/images/1.jpg"/>
			<img src="assets/images/2.jpg"/>
			<img src="assets/images/3.jpg"/>
			<p>MIAM MIAM MIAM MIAM MIAM MIAM MIAM</p>
		</div>
		<p class="gobo"><a href="admin/">VERS LE SUPER BACK-OFFICE</a></p>
	-->
			<article class="containeractu">
				<?php
					foreach($actu as $a){
						echo 
							"<a href='article.php?id=".$a->id."'><h1>".$a->title."</h1></a>".
							'<img src="assets/images/article/'.$a->main_image.'"/>'.
							'<p>'.
								$a->content.
							'</p>'.
							'<a href="article.php?id='.$a->id.'">'.
								'<div class="buttoncontaineractu">'.
									'Lire la suite'.
								'</div>'.
							'</a>'
						;
					}
				?>
				<br />
			</article>
			<!--Module géolocalisation-->
			<div class="containerrdv">
				<h2>LES RENDEZ-VOUS DE LA SEMAINE</h2>
			</div>
			<div id="map"></div>
			
			<aside class="navgeoloc">
				<p>
					<!--Trop compliqué de filtrer, j'abandonne l'idée-->
					<!--<form action="index.php" method="POST">
						<select name="filtre" class="filtre">
							<option value="0" selected>Voir pour toute la semaine</option>
						-->
							<?php
								/*
							
							
							
							
							
									
								$sql="SELECT * FROM gmaps WHERE jour BETWEEN '$today' AND '$Jplus7'";
								$resultat=$connexion->query($sql);
								$gmaps=$resultat->fetchAll(PDO::FETCH_OBJ);
								
								
								foreach($gmaps as $g){
									
									echo
										'<option value="'.$g->jour.'">'.$g->date.'</option>'	
									;	
								}
								*/
								echo 'Du '.$todayfr.' au '.$Jplus7fr;
							?>
						<!--</select>
					</form>-->
					
					</p>
			</aside>
			
			
			<script src="https://maps.googleapis.com/maps/api/js"></script>
			<script src="assets/js/gmaps.js"></script>
			<script src="assets/js/global.js"></script>
			<script>
					<?php
						foreach($emplacement as $e){
								echo
									"map.addMarker({".
										"lat: ".$e->latitude.",".
										"lng: ".$e->longitude.",".
										"title: '".$e->ville."',".
										"infoWindow: {".
											"content: \"<h1 class=\'titledate\'>".$e->date."</h1><p class=\'pdate\'>".$e->adresse."</p><p class=\'pdate\'>". $e->cp, $e->ville."</p><p class=\'pdate\'>".$e->heure."</p>\"".
										"},".
										"click: function(e) {".
											"map.setCenter({lat: ".$e->latitude.", lng: ".$e->longitude."});".
										"},".
										"icon: './assets/images/home/littlelogo.png',".
									"});"
								;
						}
					?>
				</script>
				
				<div class="containertitleproduits">
					<h3>NOS PRODUITS</h3>
				</div>
				<div class="containerproduits">
					<div class="containeroverflowproduct">
						<?php
							foreach($flams as $f){
								echo
									'<article class="theproduct" id="'.$f->id.'">'.
										'<div class="containertitleproduct">'.
											'<h4>'.$f->nom.'</h4>'.
										'</div>'.
										'<div class="containerimgproduct">'.
											'<img src="assets/images/flams/'.$f->img.'" alt="'.$f->nom.'" title="'.$f->nom.'"/>'.
										'</div>'.
										'<p>'.
											$f->description.
										'</p>'.
										'<div class="buttonproduct">'.
											'<a href="produit.php">En savoir plus</a>'.
										'</div>'.
									'</article>'
								;
							}
						?>
					</div>
				</div>
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
				<?php
					include_once "assets/php/footer.php";
				?>
		</section>
		
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
		
	</body>
</html>