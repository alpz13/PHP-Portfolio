<?php

include_once('util.php');
	
	$mysql=connect();
	$mysql->query("SET NAMES 'utf8'");

	$query="SELECT e.ISBN, titulo, autor, editorial, genero, descripcion 
	FROM libros l, escoge e,usuarios u 
	WHERE l.ISBN=e.ISBN AND  u.email=e.email 
	AND u.email='".$_SESSION['email']."'";

	$res=showquery($query,$mysql);
?>
