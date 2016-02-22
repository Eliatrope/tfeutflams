<?php
	session_start();
	//$session=$_SESSION['connect'];

	if(isset($_SESSION['connect'])){
		echo '<meta charset="utf-8"/>';
		echo 'Déconnexion effectuée. Vous allez être redirigé...';
		echo '<meta http-equiv="refresh" content="
		4; URL=index.php">';
		
		unset($_SESSION['connect']);
		session_destroy();		
	}else{
		echo '<meta http-equiv="refresh" content="0; URL=../index.php">';
		
		//echo $_SESSION['connect'];
	}
?>

