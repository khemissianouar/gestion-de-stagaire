<?php
//auto chargement des classes 
 function my_atoloader($class){
	include'../classes/'.$class. '.php';
}

spl_autoload_register('my_atoloader');


// fonction qui coupe le texte
 function truncate($string, $max_length = 100, $replacement = '', $trunc_at_space =true)
{
	$max_length -= strlen($replacement);
	$string_length = strlen($string);
	
	if($string_length <= $max_length)
		return $string;
	
	if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )
		$max_length = $space_position;
	
	return substr_replace($string, $replacement, $max_length);
}
// fonction de debogage
function debug($tableau){
	echo"<pre>";
	print_r($tableau);


		echo"</pre>";
}


?>