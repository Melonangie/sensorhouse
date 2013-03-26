<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(!isset($_SESSION['login'])){
		  echo '					
			 <div id="menu1">
				<ul>
					<li><a href="index.php?module=1&amp;action=index">Accueil</a></li>
					<li><a href="index.php?module=1&amp;action=presentation">Presentation</a></li>
					<li><a href="index.php?module=1&amp;action=documentation">Documentation</a></li>
					<li><a href="index.php?module=1&amp;action=inscription">Inscription</a></li>				
				</ul>
			 </div>
		  ';	
		
	   } else if (isset($_SESSION['admin'])) {
	   	echo('
		  <div id="menu2">
		  	<ul>
		  		<li><a href="index.php?module=1&amp;action=index">Accueil</a></li>
		  		<li><a href="index.php?module=1&amp;action=users">Membres</a></li>
		  		<li><a href="index.php?module=1&amp;action=matrice">Matrice</a></li>
		  		<li><a href="index.php?module=1&amp;action=problem">Problèmes</a></li>
		  		<li><a href="index.php?module=1&amp;action=request">Requêtes</a></li>
		  		<li><a href="index.php?module=1&amp;action=prefavourite">Favoris</a></li>
		  		<li><a href="index.php?module=1&amp;action=ajouterclients">Ajouts</a></li>
		  		<li><a href="index.php?module=1&amp;action=aide">Aide</a></li>
		  	</ul>
		  </div>
		');
  	   } else {
  	   		 echo '
			 <div id="menu2">
			   <ul>
					<li><a href="index.php?module=1&amp;action=index">Accueil</a></li>
					<li><a href="index.php?module=1&amp;action=consulter">Consulter</a></li>
					<li><a href="index.php?module=1&amp;action=favoris">Favoris</a>
					<li><a href="#">Itinéraire</a></li>
					<li><a href="index.php?module=1&amp;action=horaire">Horaire</a></li>	
					<li><a href="index.php?module=1&amp;action=aide">Aide</a></li>			
				</ul>
			  </div>
		   ';	  
  	   }


?>
<li class="active"><a href="#">Home</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="nav-header">Nav header</li>
        <li><a href="#">Separated link</a></li>
        <li><a href="#">One more separated link</a></li>
    </ul>
</li>
        