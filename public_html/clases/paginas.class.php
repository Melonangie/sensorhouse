<?php

/**
 * Clase que despliega contenido de paginas a un visitante no logeado
 * @author angie
 */
class paginas {

    function paginas() {
        
    }

    /**
     * Funcion que busca el archivo solicitado
     * @param type $action link
     */
    function doAction($pagina) {
        switch ($pagina) {
            case "index" : $this->home();
                break;
            case "presentacion" : $this->aboutus();
                break;
            case "soluciones" : $this->oursolutions();
                break;
            case "conectar" : $this->checkConnection();
                break;
            case "tienda" : $this->store();
                break;
            case "documentacion" : $this->documentation();
                break;
            case "contactar" : $this->contactus();
                break;
            default : $this->home();
        }
    }

    function home() {
        include('./paginasVisitor/home.inc.php');
    }

    function aboutus() {
        include('./paginasVisitor/presentacion.inc.php');
    }

    function oursolutions() {
        include('./paginasVisitor/soluciones.inc.php');
    }

    function checkConnection() {
        include('./funciones/conectar.func.php');
    }

    function store() {
        header('Location: http://localhost/~angie/opencart/upload/');
    }

    function documentation() {
        include('./paginasVisitor/documentacion.inc.php');
    }

    function contactus() {
        include('./paginasVisitor/contactar.inc.php');
    }
    
}
?>
