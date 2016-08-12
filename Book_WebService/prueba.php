<?php 

session_start();
$receiver = $_POST['receiver'];
echo $receiver;
$subject = $_POST['subject'];
echo $subject;
$message = $_POST['message'];
$redirect = 0;

$header = "From: " . strip_tags($_SESSION['name']) . "\r\n";
$header .= "Reply-To: ". strip_tags($_SESSION['email']) . "\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	
include_once('util.php');
$message = str_replace("\n.", "\n..", $message);

	$mysql=connect();
	$mysql->query("SET NAMES 'utf8'");

	$query="SELECT e.ISBN, titulo, autor, editorial, genero, descripcion 
	FROM libros l, escoge e,usuarios u 
	WHERE l.ISBN=e.ISBN AND  u.email=e.email 
	AND u.email='".$_SESSION['email']."'";

	$res=showquery($query,$mysql);
	$messagefav = "<html><body>";
if($res != false){
	$messagefav.= '<br> Hola '.$receiver.' Estos son mis libros favoritos... Cuales son los tuyos?<br><ul>';

	foreach ($res as $key => $value) {
		$messagefav.= '<li>'.$value['ISBN'].', '.$value['titulo'].', '.$value['autor'].', '.$value['editorial'].'</li>';

	}
	$messagefav.="</ul></body></html>";
	$mensaje = $message . $messagefav;
	$envio = mail($receiver, $subject, $mensaje, $header);
	echo $receiver;
	echo $subject;
	echo $envio;
}



if($envio == TRUE){
	echo "<script>alert('Se envio con exito')</script>";
	$redirect = 1;

} else {
	echo "Ocurrio un error";
}

if($redirect==1)
{
	header("Location: cuenta.php");
}



?>
