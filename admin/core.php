<?php
//auto chargement des classes 
 function my_atoloader($class){
	include'../classes/'.$class. '.php';
}

spl_autoload_register('my_atoloader');





?>