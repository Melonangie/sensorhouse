<?php

/**
 * Clase para conectarse ala basededatos y hacer queries con mysqli
 *
 * @author angie
 */
require ('local.php');

class bd extends mysqli {
    /* variables de conexion */

    protected static $instance = NULL;
    private $link = NULL;
    private $connected = FALSE;
    private $debug = TRUE;
    private $host = "";
    private $user = "";
    private $pass = "";
    private $database = "";

    /* variables de queries */
      public $res = 0;
      private $stmt = NULL;
      private $query = 0; 

    /* Constructor que  extiende la conexion mysqli */

    function __construct($h = Setting::HOSTNAME, $u = Setting::USER, $p = Setting::PASSWD, $d = Setting::DB) {
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->database = $d;
        $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->link) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        } else {
            $this->connected = TRUE;
        }
    }

    /* destructor */

    public function __destruct() {
        if ($this->connected === TRUE)
            $this->link->close();
    }

    /* crea  una  instancia. $result = bd::instancia()->query("SELECT * FROM ..."); */

    public static function instancia() {
        if (!self::$instance) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        if (self::$instance->connect_error) {
            throw new Exception('MySQL connection failed: ' . self::$instance->connect_error);
        }
        return self::$instance;
    }

    /* cierra l conexion */

    function cerrar() {
        mysqli_close($this->link);
    }

    /* hace un query de prueba SIN parametros */

    function query($sql) {
        $query = mysqli_query($this->link, $sql);
        if ($this->debug && mysqli_errno($this->link) != 0) {
            $message = 'Invalid query: ' . mysqli_error($this->link) . "\n";
            $message .= 'Whole query: ' . $sql;
            die($message);
        }
        return $query;
    }

    /* limpia y desinfecta */

    function limpiar($input) {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input = preg_replace('![\][xX]([A-Fa-f0-9]{1,3})!', '', $input);
        return mysql_real_escape_string($input);
    }

    /* hace query con un prametro int*/

    function selectUno($sql, $param) {
        ($stmt = mysqli_prepare($this->link, $sql)) || printf("MySQL prepare: %s\n", mysqli_error($this->link));
        mysqli_stmt_bind_param($stmt, 'i', $param) || printf("MySQL bind_param: %s\n", mysqli_error($this->link));
        mysqli_stmt_execute($stmt) || printf("MySQL execute: %s\n", mysqli_error($this->link));
        mysqli_stmt_bind_result($stmt, $res);
        mysqli_stmt_fetch($stmt);
    }

}

?>