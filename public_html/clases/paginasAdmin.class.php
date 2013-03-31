<?php
/**
 * Clase que despliega contenido de paginas a un administrador
 *
 * @author angie
 */
class paginasAdmin {
    
    function doAction($pagina) {
    switch ($pagina) {
            case "index" : $this->home();
                break;
            case "usuarios" : $this->users();
                break;
            case "planes" : $this->solutions();
                break;
            case "videos" : $this->videos();
                break;
            case "tienda" : $this->adminStore();
                break;
            case "desconectar" : $this->checkDeconnection();
                break;
            case "ayuda" : $this->help();
                break;
            default : $this->home();
        }
    }

    function home() {
        include('./paginasAdmin/home.inc.php');
    }

    function users() {
        include('./paginasAdmin/usuarios.inc.php');
    }

    function solutions() {
        include('./paginasAdmin/soluciones.inc.php');
    }

    function checkDeconnection() {
        include('./funciones/desconectar.func.php');
    }

    function adminStore() {
        header('Location: http://localhost/~angie/opencart/upload/');
    }

    function help() {
        include('./paginasAdmin/ayuda.inc.php');
    }

    function videos() {
        include('./paginasAdmin/videos.inc.php');
    }
}

?>
