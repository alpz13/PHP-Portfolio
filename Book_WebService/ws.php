<?php

require_once('lib/nusoap.php');

$proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
$proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
$proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
$proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
$client = new nusoap_client('http://edude.codingdiaries.com/final/webservice.php?wsdl', 'wsdl',
  $proxyhost, $proxyport, $proxyusername, $proxypassword);
$err = $client->getError();
if ($err) {
    
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
    exit();

}

$result = $client->call('getUsuario', array('email' => 'a01062735@itesm.mx'));

if ($client->fault) {
    echo '<h2>Fault</h2><pre>';
    print_r($result);
    echo '</pre>';
} else {
    
    $err = $client->getError();
    if ($err) {
        
        echo '<h2>Error</h2><pre>' . $err . '</pre>';
    } else {
        
        echo '<h2>Result</h2><pre>';
        print_r($result);
        echo '</pre>';
    }
}

?>
