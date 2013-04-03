<?php
 /**
 * @package pages
 */
 require_once 'usuarios.func.php';
echo '<section><h1> Verification de Connexion </h1><article>';

if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion' && 
        (isset($_SESSION['token_time'])) && 
        (isset($_SESSION['token'])) && 
        (isset($_POST['token'])) && 
        $_POST['token'] == $_SESSION['token']) {
            $token_age = time() - $_SESSION['token_time'];
            if ((isset($_POST['login']) && !empty($_POST['login'])) && 
                    (isset($_POST['pass']) && 
                    !empty($_POST['pass'])) && 
                    $token_age <= 300 ) {
                // Test if the login and password are defined.
		$db = new BD();
		//extract($_POST);   je vous renvoie à la doc de cette fonction
		$exist = existID($_POST['login'], $_POST['pass'], $db);
		$admin = isAdmin($_SESSION['id'], $db);
		$idMembre = getUserId($_SESSION['login'], $db);
		$idMembre = $_SESSION['id'];
		$db->closeConnexion(); 

		if ($exist == 1) { 
	// si on obtient une réponse, alors l'utilisateur est un membre
		$_SESSION['login'] = $_POST['login'];
			if ($admin) {
				$_SESSION['admin'] = true;
			}		
			$varclef = "Connexion en cours...";
			if (isset($varclef)){
				echo "	<h2>$varclef</h2>
					<p class='message'>
					<img src='images/loading.gif'/></br>
					        Vérifiez bien que les cookies sont activés pour pouvoir vous connecter ...
					    </p></article></section>";
			}
			echo '
				<script language="Javascript">
					setTimeout("window.location=\'index.php\'",1000);
				</script>
				';
		}
        //si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
		else if ($exist == 0) {
			$info = 'Désolé, mais le compte demandé est non reconnu";';
		}
		else {
			$info = 'Probl&egrave;me dans la base de donn&eacute;es : plusieurs membres ont les mêmes identifiants de connexion';
		}
	}
	else {
		$info = 'Au moins un des champs est vide or token more than 5 min have pass';
	}
}

if (isset($info)){
	echo "<h2>La tentative de connexion a échoué!</h2>
		<div class='error-msg'>$info </div>
		<p class='message'><strong><a href='index.php'>Retour &agrave; l'accueil</a></strong></p>
			</article></section>";
}

?>