<?php

require_once ('./clases/HTMLPurifier.standalone.php');
require_once ('./clases/PasswordHash.class.php');

/**
 * Funciones para variables para encriptar claves 
 */

$hash = '';
$hasher = '';
$hash_cost_log2 = 8;
$pwqcheck_args = '';
$debug = TRUE;
$use_pwqcheck = TRUE;
$hash_portable = FALSE;
$dummy_salt = '$2a$08$1234567890123456789012';

/**
 * limpia y desinfecta
 * @param type $var Nombre e la variable
 * @return type Valor delavarible escapada
 */
function getPost($var) {
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    return $purifier->purify($_POST[$var]);
    //       return $purifier->purify($var);
}

/**
 * Oscura funcion para verificar claves y usuarios
 * Returns 'OK' if the new password/passphrase passes the requirements.
 * @param type $newpass Current passwords/passphrases
 * @param type $oldpass Old passwords/passphrases
 * @param type $user Username.
 * @param type $aux User's full name, e-mail address...
 * @param type $args Additional arguments to override the default password policy.
 * @return string
 */
function pwqcheck($newpass, $oldpass = '', $user = '', $aux = '', $args = '') {
    $retval = 'Bad passphrase (check failed)';
    $descriptorspec = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'));

    $newpass = strtr($newpass, "\n", '.');
    $oldpass = strtr($oldpass, "\n", '.');
    $user = strtr($user, "\n:", '..');

    if (!$newpass && !$oldpass)
        $oldpass = '.';
    if ($args)
        $args = ' ' . $args;
    if (!$user)
        $args = ' -2' . $args; // passwdqc 1.2.0+

    $command = 'exec '; // No need to keep the shell process around on Unix
    $command .= 'pwqcheck' . $args;
    if (!($process = @proc_open($command, $descriptorspec, $pipes)))
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
 * 
 * @global type $use_pwqcheck
 * @global type $pwqcheck_args
 * @param type $newpass
 * @param type $oldpass
 * @param type $user
 * @return string
 */
function my_pwqcheck($newpass, $oldpass = '', $user = '') {
    global $use_pwqcheck, $pwqcheck_args;
    if ($use_pwqcheck)
        return pwqcheck($newpass, $oldpass, $user, '', $pwqcheck_args);

    /* Some really trivial and obviously-insufficient password strength checks -
     * we ought to use the pwqcheck(1) program instead. */
    $check = '';
    if (strlen($newpass) < 7)
        $check = 'way too short';
    else if (stristr($oldpass, $newpass) ||
            (strlen($oldpass) >= 4 && stristr($newpass, $oldpass)))
        $check = 'is based on the old one';
    else if (stristr($user, $newpass) ||
            (strlen($user) >= 4 && stristr($newpass, $user)))
        $check = 'is based on the username';
    if ($check)
        return "Bad password ($check)";
    return 'OK';
}



$user = get_post_var('user');
/* Sanity-check the username, don't rely on our use of prepared statements
 * alone to prevent attacks on the SQL server via malicious usernames. */
if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user))
    fail('Invalid username');

$pass = get_post_var('pass');
/* Don't let them spend more of our CPU time than we were willing to.
 * Besides, bcrypt happens to use the first 72 characters only anyway. */
if (strlen($pass) > 72)
    fail('The supplied password is too long');
?>
