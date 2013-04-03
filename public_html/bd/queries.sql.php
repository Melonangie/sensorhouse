<?php

require_once ('bdo.class.php');

/**
 * Clases para hacer queries con mysqli
 * @author angie
 */
class queries {
    
    /* variables para hacer queries */

    public $conection = null;
    private $resp = array();
    private $debug = TRUE;
    private $stmt = null;
    private $db = null;
    
    public function __construct() {
        $this->db = conexion::instancia();
    }

    /**
     * MAta una conexion con error
     * @param type $pub Tipo de error
     * @param type $pvt Mensaje de msqli
     */
    private function msnError($pub, $pvt = '') {
        global $debug;
	$msg = $pub;
	if ($debug && $pvt !== '')
		$msg .= ": $pvt";
	exit("An error occurred ($msg).\n");
    }
    
    /**
     * Query test que imprieme claves de usuarios
     * @param type $test Nombre de usuario
     */
    public function muestraPass($test) {
	($this->stmt = $this->db->prepare('select password from acceso where username=?'))
		|| msnError('MySQL prepare', $this->db->error);
	$this->stmt->bind_param('s', $test)
		|| msnError('MySQL bind_param', $this->db->error);
	$this->stmt->execute()
		|| msnError('MySQL execute', $this->db->error);
	$this->stmt->bind_result($this->hash)
		|| msnError('MySQL bind_result', $this->db->error);
	if (!$this->stmt->fetch() && $this->db->errno)
		msnError('MySQL fetch', $this->db->error);
        echo $this->hash;
        unset($this->hash);
        $this->stmt->close();
    }
    
    public function getUserid($user, $pass) {
        $id = "1";
        return $id;
    }
    
    public function esAdmin($userid) {
        return TRUE;
    }
    
}

?>
