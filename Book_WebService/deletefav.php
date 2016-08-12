<?php
 session_start();

require_once('lib/nusoap.php');

$proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
$proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
$proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
$proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
$client = new nusoap_client('http://edude.codingdiaries.com/final/webservice.php?wsdl', 'wsdl',
						$proxyhost, $proxyport, $proxyusername, $proxypassword);
$err = $client->getError();

$result = $client->call('deleteFavorito', array('email' => $_SESSION['email'], 'isbn' => $_POST['isbn']));

	echo $result;
?>