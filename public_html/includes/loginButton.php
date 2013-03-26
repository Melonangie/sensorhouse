<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<a href="#myModal" role="button" class="btn btn-success mybutton" data-toggle="modal"><i class="icon-white icon-user"></i>Login</a>
                    
        <!-- Modal -->
        <div id="myModal" class="modal hide fade login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="form-signin-heading">Please sign in</h2>
            </div>
            <div class="modal-body">
                <form class="form-signin" method="POST" action="" accept-charset="UTF-8">
                    <div class="alert alert-error">
                        <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
                    </div> 
                    <input type="text" class="input-block-level" placeholder="Email address">
                    <input type="password" class="input-block-level" placeholder="Password">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
                </form>
            </div>
        </div>  