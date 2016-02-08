<?php
	require_once('../assets/php/connexion.php');
	
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Administration - Tout Feu Tout Flam's © | Ingrédients</title>
		<meta charset="utf-8" />
		<meta name="description" content=""/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	</head>
	<body>
		<section>
			<?php
				if(isset($_SESSION['connect'])){
					include_once 'assets/php/menu.php';
			?>		
				
			
					<form class="bigforming" action="delete.php" method="POST">
						<input type="submit" value="Supprimer"/>
							<table>
								<thead>
									<tr>
										<th>
											<input type="checkbox" value="" name="all">
										</th>
										<th>
											Nom
										</th>
										<th>
											Image
										</th>
										<th>
											Action
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation
					$sql='SELECT * FROM ingredients';
					$resultat=$connexion->query($sql);
					$ingredients = $resultat->fetchAll(PDO::FETCH_OBJ);
					
					foreach($ingredients as $i){
						echo 
							'<tr>'.
								'<th>'.
									'<input type="checkbox" name="'.$i->id.'" value="'.$i->id.'"'.
								'</th>'.
								'<td>'.
									$i->nom.
								'</td>'.
								'<td>'.
									'<img class="imgforming" src="assets/images/ingredients/'.$i->img.'" alt="'.
									$i->nom.'" title="'.$i->nom.'" />'.
								'</td>'.
								'<td>'.
									'<img class="actioning"/>'.
									'<img class="actioning" />'.
								'</td>'.
							'</tr>'
						;
					}
					 
							?>
					</tbody>
												
								<tfoot>
												
								</tfoot>
							</table>
						</form>
						
						<p><a href="../index.php">Retour au site</a></p>
						<p><a href="sessiondestroy.php" onclick="return confirm(\'Se déconnecter et revenir à l\'accueil ?\');">[Déconnexion]</a></p>
					
			<?php 
				}else{
					echo 'Accès interdit ou refusé! Vous allez être redirigé...';
					echo '<meta http-equiv="refresh" content="4; URL=index.php">';
				}
			?>
						
				
				
		</section>
	</body>
</html>