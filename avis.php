<?php
	require_once 'assets/php/connexion.php';
	
	//ORDER BY note ou date ?
	
	//Récup' avis modérés
	$sql="SELECT * FROM commentaire WHERE moderation=1 ORDER BY date DESC";
	$resultat=$connexion->query($sql);
	$comm=$resultat->fetchAll(PDO::FETCH_OBJ);
?>
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
			<a href="#commentaire" class="nu"><div class="leavecomment">Laisser un commentaire</div></a>
				<?php
					foreach($comm as $c){
						echo
							'<div class="containeravis">'.
								'<h1>'.$c->pseudo.'</h1>'.
								'<img src="assets/images/note/'.$c->note.'.png" alt="note de '.$c->note.'" title="Note de '.$c->note.' attribuée à Tout Feu Tout Flam\'s par '.$c->pseudo.'"/>'.
									'<div class="cb"></div>'.
								'<h2>“'.$c->titre.'”</h2>'.
								'<span>Avis rédigé le '.$c->date.'</span>'.
								'<p>'.$c->commentaire.'</p>'.
									'<hr>'.
							'</div>'
						;
					}
				?>
				<div class="containerformcommande">
					<h5>Envie de laisser<br> un commentaire?</h5>
					<form action="avis.php" method="POST">
						<div id="commentaire">
							<label for="pseudo">Pseudo*</label>
								<input type="text" name="pseudo" id="pseudo" placeholder="Merci de saisir votre pseudonyme" required />
							<label for="note">Note*</label>
								<select id="note" name="note">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							<label for="mail">Adresse mail*</label>
								<input type="text" name="mail" id="mail" placeholder="Merci de saisir votre adresse mail" required />
							<label for="title">Titre*</label>
								<input type="text" name="title" id="title" placeholder="Merci de donner un titre à votre commentaire" required />
							<label for="comm">Commentaire*</label>
							<textarea id="comm" name="comment">Votre commentaire</textarea>
								<div class="cb"></div>
							<span>Les champs marqués d'un * sont obligatoires</span>
							<input type="hidden" name="date" value="<?php 
								setlocale(LC_TIME, 'fr_FR.utf8','fra');
								echo utf8_encode(strftime("%d %B %Y"));?>" />
							<input type="hidden" name="moderation" value="0" />
							<input name="submit" type="submit" value="Envoyer" />
						</div>
						<br>
					</form>
				</div>  
				<?php
					if(isset($_POST['submit'])){
						$pseudo = null;
						$note = null;
						$mail = null;
						$title = null;
						$comment = null;
						$date = null;
						$moderation = null;
						
					if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['note']) && !empty($_POST['note']) && isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['comment']) && !empty($_POST['comment']) && isset($_POST['date']) && !empty($_POST['date']) && isset($_POST['moderation'])){
						
						$pseudo = $_POST['pseudo'];
						$note = $_POST['note'];
						$mail = $_POST['mail'];
						$title = $_POST['title'];
						$comment = $_POST['comment'];
						$date = $_POST['date'];
						$moderation = $_POST['moderation'];
					}	
						if(!is_null($pseudo) && !is_null($note) && !is_null($mail) && !is_null($title) && !is_null($comment) && !is_null($date)){	
							$sql="INSERT INTO commentaire SET pseudo = '$pseudo', date = '$date', titre = '$title', mail = '$mail', commentaire = '$comment', note = '$note', moderation = '$moderation'";
							
							if($connexion->exec($sql)){
								echo "<p class='reponseform'>Commentaire bien envoyé!</p>";
							}else{
								echo "<p class='reponseform'>Erreur lors de l'envoi du commentaire</p>";
							}
						}else{
							echo "<p class='reponseform'>Erreur lors de l'envoi du commentaire</p>";
						}
					}
				?>
			<?php include_once "assets/php/footer.php";?>
		</section>
		<script src="assets/js/jquery-2.2.0.min.js"></script>
		<script src="assets/js/menu.js"></script>
	</body>
</html>
			