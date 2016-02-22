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
				<form action="insert.php" method="POST">
					<button name="table" value="commentaire" class="buttoninsert">Insérer un nouvel élément</button>
				</form>
				<h2 class="titlemodo">EN ATTENTE DE VALIDATION</h2>
				<div class="bigforming">
							<table>
								<thead>
									<tr>
										
										<th>
											Pseudo
										</th>
										<th>
											Titre
										</th>
										<th>
											Commentaire
										</th>
										<th>
											Mail
										</th>
										<th>
											Date
										</th>
										<th>
											Note
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation
					$sql='SELECT * FROM commentaire WHERE moderation = 0 ORDER BY date DESC';
					$resultat=$connexion->query($sql);
					$commentaire = $resultat->fetchAll(PDO::FETCH_OBJ);
					
					foreach($commentaire as $c){
						echo 
							'<tr>'.
								'<td>'.
									$c->pseudo.
								'</td>'.
								'<td>'.
									$c->titre.
								'</td>'.
								'<td>'.
									$c->commentaire.
								'</td>'.
								'<td>'.
									$c->mail.
								'</td>'.
								'<td>'.
									$c->date.
								'</td>'.
								'<td>'.
									$c->note.
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
											Pseudo
										</th>
										<th>
											Titre
										</th>
										<th>
											Commentaire
										</th>
										<th>
											Mail
										</th>
										<th>
											Date
										</th>
										<th>
											Note
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation
					$sql='SELECT * FROM commentaire WHERE moderation = 1 ORDER BY date DESC';
					$resultat=$connexion->query($sql);
					$commentaire = $resultat->fetchAll(PDO::FETCH_OBJ);
					
					foreach($commentaire as $c){
						echo 
							'<tr>'.
								'<td>'.
									$c->pseudo.
								'</td>'.
								'<td>'.
									$c->titre.
								'</td>'.
								'<td>'.
									$c->commentaire.
								'</td>'.
								'<td>'.
									$c->mail.
								'</td>'.
								'<td>'.
									$c->date.
								'</td>'.
								'<td>'.
									$c->note.
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
					echo 'Accès interdit ou refusé! Vous allez être redirigé...';
					echo '<meta http-equiv="refresh" content="4; URL=index.php">';
				}
		?>
			<script src="assets/js/jquery-2.2.0.min.js"></script>
			<script src="assets/js/menu.js"></script>
		</section>
	</body>
</html>