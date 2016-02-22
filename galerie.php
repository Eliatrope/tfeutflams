<?php
	require_once 'assets/php/connexion.php';
	
	$sql="SELECT * FROM galerie_photo";
	$resultat=$connexion->query($sql);
	$galerie=$resultat->fetchAll(PDO::FETCH_OBJ);
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
		<link href="assets/css/magnific-popup.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<section class="hugecontainer">
			<?php include_once "assets/php/header.php";?>
			<div class="containergalerie">
				<?php
					foreach($galerie as $g){
						echo 
							'<div class="containergalerieimg popup" title="'.$g->description.'" href="assets/images/galerie/'.$g->img.'">'.
								'<img alt="'.$g->alt.'" title="'.$g->title.'" src="assets/images/galerie/'.$g->img.'"/>'.
							'</div>'
						;
					}
				?>
			</div>
			<!--<div class="viewmoregalerie">-->
				
			</div>
			<?php include_once "assets/php/footer.php";?>
		</section>
		
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
		<script src="assets/js/lightbox.js" type="text/javascript"></script>
	</body>
</html>