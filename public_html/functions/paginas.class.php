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
    function doAction($action) {
        switch ($action) {
            case "index" : $this->home();
                break;
            case "presentacion" : $this->aboutus();
                break;
            case "planes" : $this->oursolutions();
                break;
            case "checkConnection" : $this->checkConnection();
                break;
            case "tienda" : $this->store();
                break;
            case "documentacion" : $this->documentation();
                break;
            default : $this->home();
        }
    }

    function home() {
        include('./pagesVisitor/home.inc.php');
    }

    function aboutus() {
        include('./pagesVisitor/presentacion.inc.php');
    }

    function oursolutions() {
        include('./pagesVisitor/planes.inc.php');
    }

    function checkConnection() {
        include('./functions/checkConnection.func.php');
    }

    function store() {
        header('Location: http://localhost/~angie/opencart/upload/');
    }

    function documentation() {
        include('./pagesVisitor/documentacion.inc.php');
    }

}

?>
