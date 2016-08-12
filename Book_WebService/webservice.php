<?php
require_once('lib/nusoap.php');
include_once('util.php');


// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('hellowsdl', 'urn:hellowsdl');
// Register the method to expose

$server->register('getUsuario',                // method name
    array('email' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getUsuario',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el nombre de un usuario con el '            // documentation
);
$server->register('getLibros_ISBN',                // method name
    array('email' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getLibros_ISBN',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el ISBN de los libros'            // documentation
);
$server->register('getLibros_titulo',                // method name
    array('email' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getLibros_titulo',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el titulo de los libros'            // documentation
);
$server->register('getLibros_descripcion',                // method name
    array('email' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getLibros_descripcion',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el descripcion de los libros'            // documentation
);
$server->register('insertFavorito',                // method name
    array('email' => 'xsd:string', 'isbn' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#insertFavorito',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Inserta un favorito'            // documentation
);
$server->register('deleteFavorito',                // method name
    array('email' => 'xsd:string', 'isbn' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#deleteFavorito',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Borra un favorito'            // documentation
);
$server->register('getRecomendado_ISBN',                // method name
    array('n1' => 'xsd:string', 'n2' => 'xsd:string', 'n3' => 'xsd:string', 'n4' => 'xsd:string', 'n5' => 'xsd:string', 'n6' => 'xsd:string', 'n7' => 'xsd:string', 'n8' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getRecomendado_ISBN',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el ISBN de los libros recomendados por el quiz'            // documentation
);
$server->register('getRecomendado_titulo',                // method name
    array('n1' => 'xsd:string', 'n2' => 'xsd:string', 'n3' => 'xsd:string', 'n4' => 'xsd:string', 'n5' => 'xsd:string', 'n6' => 'xsd:string', 'n7' => 'xsd:string', 'n8' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getRecomendado_titulo',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el titulo de los libros recomendados por el quiz'            // documentation
);
$server->register('getRecomendado_descripcion',                // method name
    array('n1' => 'xsd:string', 'n2' => 'xsd:string', 'n3' => 'xsd:string', 'n4' => 'xsd:string', 'n5' => 'xsd:string', 'n6' => 'xsd:string', 'n7' => 'xsd:string', 'n8' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#getRecomendado_descripcion',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Obtiene el descripcion de los libros recomendados por el quiz'            // documentation
);
// Define the method as a PHP function

function getUsuario($email){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");
    $query="SELECT nombre FROM usuarios WHERE email='".$email."'";
    $res=$mysql->query($query);
    $res=mysqli_fetch_array($res);
    $res1=$res[0];

    return $res1;
}
function getLibros_ISBN($email){
    $mysql=connect();
    if($email=='no_email'){
        $query="select ISBN from libros";
    }else{
        $query="select ISBN from libros where libros.isbn NOT IN(SELECT e.isbn FROM escoge e where email='".$email."')";
    }
    $res=$mysql->query($query);
    while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
                $table[]=$row;
            }
    if(count($table)!=0){
        $res1="".$table[0]['ISBN'];
        for($i=1; $i<count($table);$i++){
            $res1.=";".$table[$i]['ISBN'];
        }
        return $res1;
    }else{
        return false;
    }
}
function getLibros_titulo($email){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");
    if($email=='no_email'){
        $query="select titulo from libros";
    }else{
        $query="select titulo from libros where libros.isbn NOT IN(SELECT e.isbn FROM escoge e where email='".$email."')";
    }
    $res=$mysql->query($query);
    while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
                $table[]=$row;
            }
    if(count($table)!=0){
        $res1="".$table[0]['titulo'];
        for($i=1; $i<count($table);$i++){
            $res1.=";".$table[$i]['titulo'];
        }
        return $res1;
    }else{
        return false;
    }
}
function getLibros_descripcion($email){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");
    if($email=='no_email'){
        $query="select descripcion from libros";
    }else{
        $query="select descripcion from libros where libros.isbn NOT IN(SELECT e.isbn FROM escoge e where email='".$email."')";
    }
    $res=$mysql->query($query);
    while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
                $table[]=$row;
            }
    if(count($table)!=0){
        $res1="".$table[0]['descripcion'];
        for($i=1; $i<count($table);$i++){
            $res1.=";*;".$table[$i]['descripcion'];
        }
        return $res1;
    }else{
        return false;
    }
}
function insertFavorito($email,$isbn){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");

    $query="INSERT INTO escoge VALUES('".$email."',".$isbn.")";
    $res=$mysql->query($query);
    return $res;
}
function deleteFavorito($email,$isbn){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");

    $query="DELETE FROM escoge WHERE email='".$email."' AND ISBN=".$isbn;
    $res=$mysql->query($query);
    return $res;
}
function getRecomendado_ISBN($n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");

    $query="SELECT ISBN FROM libros 
            where (Preguntas like '".$n1.$n2."%' OR Preguntas like '__".$n3.$n4."%' OR Preguntas like '______".$n7.$n8."'
                   OR Preguntas like '_".$n2.$n3."%' OR Preguntas like '___".$n4.$n5."%' OR Preguntas like '_____".$n6.$n7."%')";
    $res=$mysql->query($query);
    while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
                $table[]=$row;
            }
    if(count($table)!=0){
        $res1="".$table[0]['ISBN'];
        for($i=1; $i<count($table);$i++){
            $res1.=";".$table[$i]['ISBN'];
        }
        return $res1;
    }else{
        return false;
    }
}
function getRecomendado_titulo($n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");

    $query="SELECT titulo FROM libros 
            where (Preguntas like '".$n1.$n2."%' OR Preguntas like '__".$n3.$n4."%' OR Preguntas like '______".$n7.$n8."'
                   OR Preguntas like '_".$n2.$n3."%' OR Preguntas like '___".$n4.$n5."%' OR Preguntas like '_____".$n6.$n7."%')";
    $res=$mysql->query($query);
    while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
                $table[]=$row;
            }
    if(count($table)!=0){
        $res1="".$table[0]['titulo'];
        for($i=1; $i<count($table);$i++){
            $res1.=";".$table[$i]['titulo'];
        }
        return $res1;
    }else{
        return false;
    }
}
function getRecomendado_descripcion($n1,$n2,$n3,$n4,$n5,$n6,$n7,$n8){
    $mysql=connect();
    $mysql->query("SET NAMES 'utf8'");

    $query="SELECT descripcion FROM libros 
            where (Preguntas like '".$n1.$n2."%' OR Preguntas like '__".$n3.$n4."%' OR Preguntas like '______".$n7.$n8."'
                   OR Preguntas like '_".$n2.$n3."%' OR Preguntas like '___".$n4.$n5."%' OR Preguntas like '_____".$n6.$n7."%')";
    $res=$mysql->query($query);
    while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
                $table[]=$row;
            }
    if(count($table)!=0){
        $res1="".$table[0]['descripcion'];
        for($i=1; $i<count($table);$i++){
            $res1.=";*;".$table[$i]['descripcion'];
        }
        return $res1;
    }else{
        return false;
    }
}
// Use the request to (try to) invoke the service.
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

exit();
?>
