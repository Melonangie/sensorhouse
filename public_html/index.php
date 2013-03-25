<?php
     session_start();
    // Operations classiques
    include_once ('./operations/operation.class.php');
    // Operations des membres
    include_once ('./operations/operationMembre.class.php');
    // Operations de l'Administrateur
    include_once ('./operations/operationAdmin.class.php');
    // Connexion BD
    include_once ('./bd/BD.class.php');
    
    // boolean de contrôle de membre
    $boolMember = 0;
    $boolAdmin = 0;
    if (isset($_SESSION['admin'])) {
        $boolAdmin = 1;
    } elseif (isset($_SESSION['login'])) {
        $boolMember = 1;
    }
        
    include ('./includes/header.php');
    
    $monAction = null;
        $op = "index";
        if (isset($_GET['action'])) {
            $op = (string)$_GET['action'];
        }
        if ($boolAdmin == 1) {
            $monAction = new myOperationAdmin();
            $monAction -> doActionAdmin($op);
        } else if ($boolMember == 1) {
            $monAction = new myOperationMembre();
            $monAction -> doActionMembre($op);
        } else {
            $monAction = new myOperation();
            $monAction -> doAction($op);
        }
        
     include ('./includes/footer.php');   
?>