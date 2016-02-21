<?php
	
	require_once('../assets/php/connexion.php');
	
	session_start();
	
	setlocale(LC_TIME, 'fr_FR.utf8','fra');
	
	$todayfr = utf8_encode(strftime("%A %d %B %Y")); 
	
	$Jplus7fr = utf8_encode(strftime('%A %d %B %Y', strtotime('+7 day')));
	
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
				<p style="text-align:center;">	Aujourd'hui, nous sommes le <u><?php echo $todayfr;?></u><br>
				Ce qui signifie que le module gmaps(carte) exposera les emplacements enregistrés dans l'intervalle du <u><?php echo $todayfr.' au '.$Jplus7fr;?></u>
				</p>
				<form action="insert.php" method="POST">
					<button name="table" value="gmaps" class="buttoninsert">Insérer un nouvel élément</button>
				</form>
				<div class="bigforming">
							<table>
								<thead>
									<tr>
										
										<th>
											Heure
										</th>
										<th>
											Date
										</th>
										<th>
											Adresse
										</th>
										<th>
											Ville
										</th>
										<th>
											Code postal
										</th>
										<th>
											Actions
										</th>
									</tr>
								</thead>
											
								<tbody>
			<?php
					
					//Initialisation
					$sql = "SELECT * FROM gmaps g INNER JOIN emplacement e ON g.fk_emplacement = e.id";
					$result = $connexion->query($sql);
					$gmaps = $result->fetchAll(PDO::FETCH_OBJ);
					
					foreach($gmaps as $g){
						echo 
							'<tr>'.
								'<td>'.
									$g->heure.
								'</td>'.
								'<td>'.
									$g->date.
								'</td>'.
								"<td>".
									$g->adresse.
								"</td>".
								'<td>'.
									$g->ville.
								'</td>'.
								'<td>'.
									$g->cp.
								'</td>'.
								'<td>'.
									'<form action="edit.php" method="POST"><input class="actioning editimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="gmaps" /><input type="hidden" name="id" value="'.$g->id.'" /></form>'.
									'<form action="delete.php" method="POST"><input class="actioning deleteimg" type="submit" name="submit" value=""/><input type="hidden" name="table" value="gmaps" /><input type="hidden" name="id" value="'.$g->id.'" />
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
				//$_SESSION['connect']=0;
				echo
					
						"<h1><span>V</span>euillez vous identifier</h1>
						<form action='login.php' method='POST'>
							<label for='username'>Username</label>
								<input type='text' id='username' placeholder='Votre username' name='username' />
							<label for='password'>Password</label>
								<input type='password' id='password' placeholder='Votre password' name='password' />
								<div><input type='submit' name='submit' value='Identifier' /></div>
						</form>
						<p><a href='../index.php'>Retour au site</a></p>"
						
						
					;
			}
		?>
			<script src="assets/js/jquery-2.2.0.min.js"></script>
			<script src="assets/js/menu.js"></script>
		</section>
	</body>
</html>