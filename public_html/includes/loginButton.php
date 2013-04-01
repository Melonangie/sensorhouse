<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<a href="#myModal" role="button" class="btn btn-info mybutton" data-toggle="modal"><i class="icon-white icon-user"></i><span lang="en"> Clientes</span></a>
                    
        <!-- Modal -->
        <div id="myModal" class="modal hide fade login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="form-signin-heading" lang="en">Iniciar sesion</h2>
            </div>
            <div class="modal-body">
                <form class="form-signin" method="POST" action="" accept-charset="UTF-8">
                    <div class="alert alert-error">
                        <a class="close" data-dismiss="alert" href="#">x</a><span lang="en">Usuario o Clave Incorrecto</span>
                    </div>
                    <input type="text" lang="en" class="input-block-level" placeholder="Correo Electronico">
                    <input type="password" lang="en" class="input-block-level" placeholder="Clave">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"><span lang="en"> Recuerdame</span>
                    </label>
                    <button class="btn btn-large btn-primary" type="submit" lang="en">Acceder</button>
                </form>
            </div>
        </div>  