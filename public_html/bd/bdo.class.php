<?php

require_once ('local.php');

/**
 * Clases para conectarse ala base de datos
 * @author angie
 */
class conexion extends mysqli {
    /* variables de conexion */

    private static $instance = NULL;
    private $connected = FALSE;
    private $host = "";
    private $user = "";
    private $pass = "";
    private $database = "";

    /**
     * Constructor que conecta a la base de datos.
     * @param type $h host
     * @param type $u user
     * @param type $p pass
     * @param type $d database
     */
    public function __construct($h = Setting::HOSTNAME, $u = Setting::USER, $p = Setting::PASSWD, $d = Setting::DB) {
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->database = $d;
        $this->conection = parent::__construct($this->host, $this->user, $this->pass, $this->database);
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            $this->connected = TRUE;
        }
    }

    /**
     * Crea una instancia de la clase.
     * bd::instancia()->query("SELECT * FROM ..."); 
     * @return type regresa un objeto mysqli
     */
    public static function instancia() {
        if (!self::$instance) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

}
?>