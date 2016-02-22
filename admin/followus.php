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
					<button name="table" value="socialnetwork" class="buttoninsert">Insérer un nouvel élément</button>
				</form>
				<div class="bigforming">
							<table>
								<thead>
									<tr>
										
										<th>
											Facebook
										</th>
										<th>
											Instagram
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation
					$sql='SELECT * FROM socialnetwork';
					$resultat=$connexion->query($sql);
					$sone = $resultat->fetchAll(PDO::FETCH_OBJ);
					
					foreach($sone as $sn){
						echo 
							'<tr>'.
								'<td>'.
									$sn->facebook.
								'</td>'.
								'<td>'.
									$sn->instagram.
								'</td>'.
								'<td>'.
									'<form action="edit.php" method="POST"><input class="actioning editimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="socialnetwork" /><input type="hidden" name="id" value="'.$sn->id.'" /></form>'.
									'</form>'.
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