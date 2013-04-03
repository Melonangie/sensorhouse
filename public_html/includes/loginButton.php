<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['token'])){
    unset( $_SESSION['token']);
}

$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

?>

<a href="#myModal" role="button" class="btn btn-info mybutton" data-toggle="modal"><i class="icon-white icon-user"></i><span lang="en"> Clientes</span></a>

<!-- Modal -->
<div id="myModal" class="modal hide fade login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 class="form-signin-heading" lang="en">Iniciar sesion</h2>
    </div>

    <form class="form-signin" method="POST" action="index.php?action=conectar" accept-charset="UTF-8">
        <div class="modal-body">
            <!--Usuario o clave incorrect-->
            
            <fieldset>
                <div class="input-prepend">
                    <button class="btn disabled"><i class="icon-star"></i></button>
                    <!-- username -->
                    <input name="login" type="text" lang="en" class="span5" placeholder="Usuario" autocomplete="on" required value="<?php echo(isset($_POST['login']) ? $_POST['login'] : ''); ?>">
                </div>
                <div class="input-prepend">
                    <button class="btn disabled"><i class=" icon-pencil"></i></button>
                    <!-- password -->
                    <input name="pass" type="password" lang="en" class="span5" placeholder="Clave" autocomplete="on" required>
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"><span lang="en"> Recuerdame</span>
                </label>
            </fieldset>
        </div>

        <div class="modal-footer">
            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <button class="btn" data-dismiss="modal" aria-hidden="true" lang="en">Cancelar</button>
            <button class="btn btn-primary" type="submit" lang="en" name="conexion" value="Conexion" >Acceder</button>
        </div>
    </form>
</div>  