<?php
     session_start();
    // Operations classiques
    include_once ('./functions/paginas.class.php');
    // Operations des membres
//    include_once ('./functions/operationMembre.class.php');
//    // Operations de l'Administrateur
//    include_once ('./functions/operationAdmin.class.php');
//    // Connexion BD
//    include_once ('./bd/BD.class.php');
    
    // boolean de contrôle de membre
    $boolMember = 0;
    $boolAdmin = 0;
    if (isset($_SESSION['admin'])) {
        $boolAdmin = 1;
    } elseif (isset($_SESSION['login'])) {
        $boolMember = 1;
    }
        
    include ('./includes/header.php');
    
    $accion = null;
        $op = "index";
        if (isset($_GET['action'])) {
            $op = (string)$_GET['action'];
        }
        if ($boolAdmin == 1) {
            $accion = new myOperationAdmin();
            $accion -> doActionAdmin($op);
        } else if ($boolMember == 1) {
            $accion = new myOperationMembre();
            $accion -> doActionMembre($op);
        } else {
            $accion = new paginas();
            $accion -> doAction($op);
        }
        
     include ('./includes/footer.php');   
?>