<?php
	echo '<meta charset="utf-8"/>';
	require_once('../assets/php/connexion.php');
	

	session_start();
	$_SESSION['connect']=0;
	
	if(!isset($_POST['username'], $_POST['password'])){
		$username="";
		$password="";
	}else{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$query = $connexion->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");

            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR, 40);

            $query->execute();
			$check=$query->fetchColumn();
		
		if($check==FALSE){
			echo 'Mauvais nom d\'utilisateur ou mot de passe, vous allez être redirigé...';
            echo '<meta http-equiv="refresh" content="4; URL=index.php">';
			unset($_SESSION['connect']);
			session_destroy();	
		}else{
			$_SESSION['connect']=1;
			$_SESSION['username']=$username;
			
			echo 'Identification réussie, vous allez être redirigé...';
			echo '<meta http-equiv="refresh" content="4; URL=index.php">';
		}
	}
		
		/*if($username == 'BALLA' && $password == 'admin'){// bonne sécurité, gg
			$_SESSION['connect']=1;
			$_SESSION['username']=$username;
			
			
			
			echo 'Identification réussie, vous allez être redirigé...';
			echo '<meta http-equiv="refresh" content="4; URL=index.php">';
		}else{
			echo 'Mauvais nom d\'utilisateur ou mot de passe, vous allez être redirigé...';
            echo '<meta http-equiv="refresh" content="4; URL=admin.php">';
		}
*/
	
	
	
	
	
	
	
	//Login à la izi(qui ne fonctionne pas de mon côté :c)
    /*if(isset($_SESSION['username']))
    {
        echo '<meta http-equiv="refresh" content="0; URL=index.php">';
    }

    if(!isset($_POST['username'], $_POST['password'], $_POST['submit']))
    {
       //echo '<meta http-equiv="refresh" content="4; URL=admin.php">';
	   
	   echo 'Merci de saisir votre nom d\'utilisateur et votre mot de passe pour vous identifier.';
    }

    elseif (ctype_alnum($_POST['username']) != true)
    {
        echo '<meta http-equiv="refresh" content="4; URL=admin.php">';
		
		echo 'Le nom d\'utilisateur ne peut contenir que des caractères alphanumériques! Vous allez être redirigé...';
    }

    

    else
    {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $password = sha1($password.$username);

        try
        {
            $query = $connexion->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");

            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR, 40);

            $query->execute();

            $user_id = $query->fetchColumn();//PDOStatement::fetch()

            if($user_id == false)//Ici, y a un = en plus pour le type de var
            {
                    echo 'Mauvais nom d\'utilisateur ou mot de passe, vous allez être redirigé...';
                    echo '<meta http-equiv="refresh" content="4; URL=admin.php">';
            }
            else
            {
					
					
					echo 'Identification réussie, vous allez être redirigé...';
                    echo '<meta http-equiv="refresh" content="4; URL=index.php">';
            }


        }
        catch(Exception $e)
        {
            echo "Impossible d'effectuer la requête. Veuillez réesayer plus tard.";
            echo $e;
        }
    }*/
?>