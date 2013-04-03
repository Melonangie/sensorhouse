<?php

include_once ('./clases/HTMLPurifier.standalone.php');
include_once ('./clases/PasswordHash.class.php');
include_once ('./bd/queries.sql.php');

/**
 * Funciones para encriptar claves 
 */

/**
 * limpia y desinfecta
 * @param type $var Nombre e la variable
 * @return type Valor delavarible escapada
 */
function getPost($var) {
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $clean_html  = $purifier->purify($_POST[$var]);
    return $clean_html;
    //       return $purifier->purify($var);
}

/**
 * Oscura funcion para verificar claves y usuarios
 * @param type $newpass Current passwords/passphrases
 * @param type $oldpass Old passwords/passphrases
 * @param type $user Username.
 * @param type $aux User's full name, e-mail address...
 * @param type $args Additional arguments to override the default password policy.
 * @return string Returns 'OK' if the new password/passphrase passes the requirements.
 */
function pwqcheck($newpass, $oldpass = '', $user = '', $aux = '', $args = '') {
    $retval = 'Bad passphrase (check failed)';
    $descripspec = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'));
    // Leave stderr (fd 2) pointing to where it is, likely to error_log
    // Replace characters that would violate the protocol
    $newpass = strtr($newpass, "\n", '.');
    $oldpass = strtr($oldpass, "\n", '.');
    $user = strtr($user, "\n:", '..');
    // Trigger a "too short" rather than "is the same" message in this special case
    if (!$newpass && !$oldpass)
        $oldpass = '.';
    if ($args)
        $args = ' ' . $args;
    if (!$user)
        $args = ' -2' . $args; // passwdqc 1.2.0+
    $command = 'exec '; // No need to keep the shell process around on Unix
    $command .= 'pwqcheck' . $args;
    if (!($process = @proc_open($command, $descripspec, $pipes)))
        return $retval;
    $err = 0;
    fwrite($pipes[0], "$newpass\n$oldpass\n") || $err = 1;
    if ($user)
        fwrite($pipes[0], "$user::::$aux:/:\n") || $err = 1;
    fclose($pipes[0]) || $err = 1;
    ($output = stream_get_contents($pipes[1])) || $err = 1;
    fclose($pipes[1]);
    $status = proc_close($process);
    // There must be a linefeed character at the end.  Remove it.
    if (substr($output, -1) === "\n")
        $output = substr($output, 0, -1);
    else
        $err = 1;
    if ($err === 0 && ($status === 0 || $output !== 'OK'))
        $retval = $output;

    return $retval;
}

/**
 * Verifica cosas de las claves
 * @param type $newpass
 * @param type $oldpass
 * @param type $user
 * @return type
 */
function verificaClave($newpass, $oldpass = '', $user = '') {
    return pwqcheck($newpass, $oldpass, $user, '', '');
}

/**
 * Trae el usuario de Post y lo sanitaniza
 * @return string Vacio si el usuario es invalido
 */
function getUser() {
    $user = getPost('login');
    if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user))
        $user = ''; //Usuario Invalido
    return $user;
}

/**
 * Trae la clave de Post, lo sanatiza y regresa su hash
 * @return string Hash de la clave o vacio si es invalido
 */
function getPassword() {
    $hash_cost_log2 = 8;
    $hash_portable = FALSE;
    
    $pass = getPost('pass');
    if (strlen($pass) > 72)
        $pass  = ''; //Clave larga
    if ($pass != ''){
        $hasher = new PasswordHash($hash_cost_log2, $hash_portable);
        $hash = $hasher->HashPassword($pass);
        if (strlen($hash) < 20)
		$pass  = ''; //Failed to hash new password
	unset($hasher);
    }
    return $pass;
}

?>
