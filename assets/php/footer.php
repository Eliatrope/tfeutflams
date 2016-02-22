<footer class="footer">
	<div class="containerms">
		<?php
		//Récupération social network
		$sql="SELECT * FROM socialnetwork";
		$resultat=$connexion->query($sql);
		$sone=$resultat->fetchAll(PDO::FETCH_OBJ);
			foreach($sone as $sn){
				echo
					'<a href="'.$sn->facebook.'" target="_blank"><img alt="Retrouvez Tout Feu Tout Flam\'s sur Facebook" title="Retrouvez Tout Feu Tout Flam\'s sur Facebook" src="assets/images/home/fb.png"/></a>'.
				
					'<a href="'.$sn->instagram.'" target="_blank"><img alt="Retrouvez Tout Feu Tout Flam\'s sur Instagram" title="Retrouvez Tout Feu Tout Flam\'s sur Instagram" src="assets/images/home/insta.png"/></a>'
				;
			}
		?>
	</div>
	<p><a href="">SUIVEZ NOUS</a> - <a href="">MENTIONS LÉGALES</a> - <a href="">PLAN DU SITE</a></p>
</footer>