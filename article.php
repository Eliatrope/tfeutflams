<?php
	require_once 'assets/php/connexion.php';
	
	//Récupération bonne actualité
	$id=$_GET['id'];
	
	$sql="SELECT * FROM actualite WHERE id=$id";
	$result=$connexion->query($sql);
	$actu=$result->fetchAll(PDO::FETCH_OBJ);
	
	
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
			<?php 
				include_once "assets/php/header.php";
			?>
			<article class="containeractuarticle">
				<?php
					foreach($actu as $a){
						echo 
							'<h1>'.$a->title.'</h1>'.
							'<img class="mainimage" src="assets/images/article/'.$a->main_image.'"/>'.
							'<p>'.
								$a->content.
							'</p>'
						;
					}
				?>
				<a class="retouractu" href="actualites.php">← Retour à la liste des articles</a>
			</article>
			<?php
				include_once "assets/php/footer.php";
			?>
			
		</section>
		
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
		<script src="assets/js/fixarticle.js"></script>
		
	</body>
</html>