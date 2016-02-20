<?php
	require_once 'assets/php/connexion.php';

	//Récupération flams
	$sql="SELECT * FROM flams";
	$resultats=$connexion->query($sql);
	$flams=$resultats->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération formules à volonté
	$sql="SELECT * FROM formules WHERE type = 1";
	$resultat=$connexion->query($sql);
	$formulev=$resultat->fetchAll(PDO::FETCH_OBJ);
	
	//Récupération formules à emporter
	$sql="SELECT * FROM formules WHERE type = 2";
	$resultat=$connexion->query($sql);
	$formulee=$resultat->fetchAll(PDO::FETCH_OBJ);
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
	</head>
	
	<body>
		<section class="hugecontainer">
			<?php include_once "assets/php/header.php";?>
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
										'<button class="buttonproduct flams-'.$f->id.'" value="'.$f->id.'">'.
											'En savoir plus'.
										'</button>'.
									'</article>'
								;
							}
						?>
					</div>
				</div>
				<!--Module détail produit-->
				<div class="detailproduit">
					<?php
						foreach($flams as $f){
							echo
								'<div class="containerflamsprod flams-'.$f->id.'">'.
									'<h6 class="flams-'.$f->id.'">'.$f->nom.'</h6>'.
									'<img src="assets/images/flams/'.$f->img.'" alt="'.$f->nom.'" title="'.$f->nom.'" class="flams-'.$f->id.'"/>'.
									'<p class="flams-'.$f->id.'">'.$f->description.'</p>'.
									'<br>'.
									'<span class="flams-'.$f->id.'">Ingrédients:</span>'.
									'<p class="flams-'.$f->id.'">'.
									$f->ingredients.
									'</p>'.
								'</div>'
							;
						}
					?>
				</div>
				<div class="containertitleformules">
					<h3>NOS FORMULES SOIRÉE FLAM'S À VOLONTÉ*</h3>
				</div>
				<?php
					foreach($formulev as $fv){
						echo 
							'<article class="containerformule">'.
								'<h4>'.$fv->title.'*</h4>'.
								'<div class="containerformulediv">'.
									'<img src="assets/images/formules/'.$fv->img.'" alt="'.$fv->title.' de Tout Feu Tout Flam\'s" title="'.$fv->title.' de Tout Feu Tout Flam\'s"/>'.
									'<div class="egalbarre"></div>'.
									'<div class="egalbarre"></div>'.
									'<p>'.
										$fv->prix.
									'€</p>'.
								'</div>'.
							'</article>'
						;
					}
				?>
				<div class="containerformulesprecision">
					<p>* FORMULES EXCLUSIVES AUX ÉVÉNEMENTS RÉSERVÉS (MINIMUM DE 15 PERSONNES)</p>
				</div>
				<div class="containertitleformules">
					<h3>NOS FORMULES FLAM'S À EMPORTER*</h3>
				</div>
				<?php
					foreach($formulee as $fe){
						echo 
							'<article class="containerformule">'.
								'<h4>'.$fe->title.'*</h4>'.
								'<div class="containerformulediv">'.
									'<img src="assets/images/formules/'.$fe->img.'" alt="'.$fe->title.' de Tout Feu Tout Flam\'s" title="'.$fe->title.' de Tout Feu Tout Flam\'s"/>'.
									'<div class="egalbarre"></div>'.
									'<div class="egalbarre"></div>'.
									'<p>'.
										$fe->prix.
									'€</p>'.
								'</div>'.
							'</article>'
						;
					}
				?>
				<div class="containerformulesprecision">
					<p>+ 1.00€ POUR UNE CANETTE</p>
				</div>
				<?php include_once "assets/php/footer.php";?>
		</section>
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
		<script src="assets/js/slideproduit.js"></script>
	</body>
</html>