<?php
	require_once 'assets/php/connexion.php';
	
	//Récupération actualité
	$sql="SELECT * FROM actualite ORDER BY id DESC LIMIT 1";
	$result=$connexion->query($sql);
	$actu=$result->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération géolocalisation
	$sql="SELECT * FROM emplacement";
	$resultat=$connexion->query($sql);
	$emplacement=$resultat->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération flams
	$sql="SELECT * FROM flams";
	$resultats=$connexion->query($sql);
	$flams=$resultats->fetchAll(PDO::FETCH_OBJ);
	
?>
<!--Astuce du jour: https://developers.google.com/web/tools/setup/setup-workflow. Pour ne plus avoir à reload le navigateur quant on fait des modifs dans les fichiers-->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="description" content="">
		<link href="assets/css/style.css" type="text/css" rel="stylesheet" />
		<link href="assets/css/styletablette.css" type="text/css" rel="stylesheet" />
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
							'<h1>'.$a->title.'</h1>'.
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
				<div class="leftarrow arrow"></div>
				<p>Lundi 08 février 2016</p>
				<div class="rightarrow arrow"></div>
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
										"content: '".$e->ville, $e->adresse."'".
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
				<?php
					foreach($flams as $f){
						echo
							'<div class="arrow leftarrow" id="'.$f->id.'"></div>'.
							'<article class="theproduct" id="'.$f->id.'">'.
								'<div class="containertitleproduct">'.
									'<h4>'.$f->nom.'</h4>'.
								'</div>'.
								'<div class="containerimgproduct">'.
									'<img src="'.$f->img.'"/>'.
								'</div>'.
								'<p>'.
									$f->description.
								'</p>'.
								'<div class="buttonproduct">'.
									'<a href="produits.php">En savoir plus</a>'.
								'</div>'.
							'</article>'.
							'<div id="'.$f->id.'"class="arrow rightarrow"></div>'
						;
					}
				?>	
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