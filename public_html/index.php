<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


//header
include ('./includes/header.php');

//body
if (isset($_SESSION['admin'])) {
    include ('./clases/paginasAdmin.class.php');
    $accion = new paginasAdmin();
} else if (isset($_SESSION['login'])) {
    include ('./clases/paginasUser.class.php');
    $accion = new paginasUser();
} else {
    include ('./clases/paginas.class.php');
    $accion = new paginas();
}

if (isset($_GET['action'])) {
    $pagina = (string) $_GET['action'];
} else {
    $pagina = "index";
}
$accion->doAction($pagina);

//footer
include ('./includes/footer.php');
?>