<?php
	require_once 'assets/php/connexion.php';
	
	//Récupération actualité
	$sql="SELECT * FROM actualite";
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
			<article class="containeractu">
				<?php
					foreach($actu as $a){
						echo 
							'<a href="article.php?id='.$a->id.'"><h1>'.$a->title.'</h1></a>'.
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
			
			
			<?php
				include_once "assets/php/footer.php";
			?>
			
		</section>
		
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
		
	</body>
</html>