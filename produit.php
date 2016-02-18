<?php
	require_once 'assets/php/connexion.php';

	//Récupération flams
	$sql="SELECT * FROM flams";
	$resultats=$connexion->query($sql);
	$flams=$resultats->fetchAll(PDO::FETCH_OBJ);
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
										'<div class="buttonproduct">'.
											'En savoir plus'.
										'</div>'.
									'</article>'
								;
							}
						?>
					</div>
				</div>
				<div class="containertitleformules">
					<h3>Nos formules soirée Flam’s à volonté*</h3>
				</div>
				<?php include_once "assets/php/footer.php";?>
		</section>
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
	</body>
</html>