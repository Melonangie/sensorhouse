<?php
include_once ('usuarios.func.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Checks the token
 * @return boolean
 */
function validaToken() {
    $formaValida = TRUE;
    if (isset($_POST['token']) && $_POST['token'] != $_SESSION['token']) {
        $formaValida = FALSE;
    }
    return $formaValida;
}

/**
 * check all expected variables are set 
 * @return boolean
 */
function validaSubmit() {
    $formaValida = TRUE;
    if(!isset($_POST['login'], $_POST['pass'], $_SESSION['token'])) {
           $formaValida = FALSE;
    }
    return $formaValida;
}

function validaLogin() {
    $user = getUser();
    $pass = getPassword();
    if($user === '' || $pass === '')
        $error = '<div class="alert alert-error hide"><span lang="en">Usuario o Clave Invalido</span></div>';
    if(!isset($error)) {
        $userId = getUserid($user, $pass);
        $userId = $_SESSION['id'];
        $admin  = esAdmin($_SESSION['id']);
    }
}



?>
<div class="slider-holder">
    <div class="container">
        <div class="shell">
            <div class="hero-unit">
                <h1>Hello, world!</h1>
                <p><?php echo $user; ?></p>
            </div>
        </div>
    </div>
</div>




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