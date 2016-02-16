<?php
	require_once 'assets/php/connexion.php';
	
	//Récup' prés'
	$sql="SELECT * FROM presentation WHERE id=1";
	$resultat=$connexion->query($sql);
	$presentation=$resultat->fetchAll(PDO::FETCH_OBJ);
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
			<?php
				foreach($presentation as $p){
					echo
						'<div class="containerslidepres">'.
							'<img src="assets/images/presentation/'.$p->img1.'" alt="'.$p->img1.'" class="img1"/>'.
							'<img src="assets/images/presentation/'.$p->img2.'" alt="'.$p->img2.'" class="img2"/>'.
							'<img src="assets/images/presentation/'.$p->img3.'" alt="'.$p->img3.'" class="img3"/>'.
							'<div class="arrow apres leftapres img4"></div>'.
							'<div class="arrow apres rightapres img5"></div>'.
							'<div class="arrow apres leftapres img6"></div>'.
							'<div class="arrow apres rightapres img7"></div>'.
							'<div class="arrow apres leftapres img8"></div>'.
							'<div class="arrow apres rightapres img9"></div>'.
						'</div>'.
						'<div class="containertxtpres">'.
							'<h1>'.$p->title_welcome.'</h1>'.
							'<p>'.$p->txt_welcome.'</p>'.
							'<h1>'.$p->title_pres.'</h1>'.
							'<p>'.$p->txt_pres.'</p>'.
						'</div>'
					;
				}
			?>
			<?php include_once "assets/php/footer.php";?>
		</section>
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
		<script src="assets/js/slidepres.js"></script>
	</body>
</html>