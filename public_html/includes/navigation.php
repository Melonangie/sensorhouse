<?php

/**
 * Menu de navegacion 
 **/

if (isset($_SESSION['login'])) {
    //Menu de un usuaario logado
    echo '					
	<li class="active"><a href="#">Principal</a></li>
        <li><a href="#about">Presentacion</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluciones<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Modelo</a></li>
                <li class="divider"></li>
                <li class="nav-header">Planes</li>
                <li><a href="#">Clasico</a></li>
                <li><a href="#">Plus</a></li>
                <li><a href="#">Gold</a></li>
            </ul>
        </li> 
        <li><a href="#contact">Tienda</a></li>
        <li><a href="#contact">Documentacion</a></li>
	';
} else if (isset($_SESSION['admin'])) {
    //Menu dell administrador
    echo('
        <li class="active"><a href="#">Principal</a></li>
        <li><a href="#about">Presentacion</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluciones<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Modelo</a></li>
                <li class="divider"></li>
                <li class="nav-header">Planes</li>
                <li><a href="#">Clasico</a></li>
                <li><a href="#">Plus</a></li>
                <li><a href="#">Gold</a></li>
            </ul>
        </li> 
        <li><a href="#contact">Tienda</a></li>
        <li><a href="#contact">Documentacion</a></li>
	');
} else {
    //Menu de un visiatante
    echo '
	<li class="active" ><a href="#" lang="en">Principal</a></li>
        <li><a href="#about" lang="en">Presentacion</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span lang="en">Video Vigilancia</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#" lang="en">Nuestro Modelo</a></li>
                <li class="divider"></li>
                <li class="nav-header" lang="en">Nuestros Paquetes</li>
                <li><a href="#" lang="en">Paquete Conectes</a></li>
                <li><a href="#" lang="en">Paquete Acerques</a></li>
                <li><a href="#" lang="en">Paquete Alejes</a></li>
            </ul>
        </li> 
        <li><a href="#contact" lang="en">Tienda</a></li>
        <li><a href="#contact" lang="en">Documentacion</a></li>
        <li><a href="#contact" lang="en">Contactarnos</a></li>
        ';
}
?>