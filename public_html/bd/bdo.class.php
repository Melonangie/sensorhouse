<?php

require ('local.php');

/**
 * Clases para conectarse ala base de datos y hacer queries con mysqli
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

class bd {
    /* variables para hacer queries */

    public $conection = null;
    private $resp = array();
    private $stmt = null;
    private $db = null;

    /**
     * Llama unainstaciae onexion
     */
    public function __construct() {
        $this->db = conexion::instancia();
    }

    /**
     * MAta una coneion con error
     * @param type $pub Tipo de error
     * @param type $pvt Mensaje de msqli
     */
    private function msnError($pub, $pvt = '') {
        $msg = $pub;
        if ($pvt !== '')
            $msg .= ": $pvt";
        exit("An error occurred ($msg).\n");
    }

    /**
     * Test que imrimel claves de usuarios
     * @param type $test Nombre de usuario
     */
    public function getUserId($test) {
       $hash = ''; 
	($this->stmt = $this->db->prepare('select password from acceso where username=?'))
		|| msnError('MySQL prepare', $this->db->error);
	$this->stmt->bind_param('s', $test)
		|| msnError('MySQL bind_param', $this->db->error);
	$this->stmt->execute()
		|| msnError('MySQL execute', $this->db->error);
	$this->stmt->bind_result($hash)
		|| msnError('MySQL bind_result', $this->db->error);
	if (!$this->stmt->fetch() && $this->db->errno)
		msnError('MySQL fetch', $this->db->error);
        echo $hash;
        unset($hash);
        $this->stmt->close();
    }
    
    /**
     * limpia y desinfecta
     * @param type $var Nombre e la variable
     * @return type Valor delavarible escapada
     */
    public function limpiar($var) {
	$val = $_POST[$var];
	if (get_magic_quotes_gpc())
		$val = stripslashes($val);
	$input = preg_replace('![\][xX]([A-Fa-f0-9]{1,3})!', '', $input);
        return $this->db->real_escape_string($input);
    }

}

?>