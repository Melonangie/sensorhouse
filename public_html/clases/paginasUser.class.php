<?php
/**
 * Clase que despliega contenido de paginas a un usuario logeado
 *
 * @author angie
 */
class paginasUser {
   function doAction($pagina) {
    switch ($pagina) {
            case "index" : $this->home();
                break;
            case "camara" : $this->liveCam();
                break;
            case "media" : $this->media();
                break;
            case "tienda" : $this->store();
                break;
            case "desconectar" : $this->checkDeconnection();
                break;
            case "contactar" : $this->contactus();
                break;
            case "ayuda" : $this->help();
                break;
            default : $this->home();
        }
    }

    function home() {
        include('./paginasUser/myhome.inc.php');
    }

    function liveCam() {
        include('./paginasUser/myliveCam.inc.php');
    }

    function media() {
        include('./paginasUser/myMedia.inc.php');
    }

    function checkDeconnection() {
        include('./funciones/desconectar.func.php');
    }

    function store() {
        header('Location: http://localhost/~angie/opencart/upload/');
    }

    function help() {
        include('./paginasUser/ayuda.inc.php');
    }

    function contactus() {
        include('./paginasUser/contactar.inc.php');
    }
}

?>
