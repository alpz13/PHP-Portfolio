<?php session_start()?>
<?php ob_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]>Edu was here<!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>ReadBook | Home</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/responsive.css">      
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="css/flexslider.css">       
    <link rel="stylesheet" href="css/parallax-slider.css">
    <link rel="stylesheet" href="css/default.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/ospb.css">
    <link rel="stylesheet" href="css/horizontal.css">

    <script type="text/javascript" src="https://colo.cachefly.net/js/min.inject.js?id=PjwsPSI&ad_label=Admedia"></script> 
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
?>

</head> 

<body style="background-color: #FFF">  
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-XXXXXX-XX', 'example.com');
ga('require', 'displayfeatures');
ga('send', 'pageview');
</script>

    <!--=== Top ===-->    
    <div class="top">
        <div class="container">   
            <ul class="loginbar pull-right">
               <?php 
               if(!isset($_SESSION['name'])) { 
                    echo '<li><a href="login.php">Iniciar sesión</a></li> 
                    <li class="devider"></li>
                    <li><a href="reg.php">Registrarse</a></li>';
                }else{ 
            $result = $client->call('getUsuario', array('email' => $_SESSION['email']));
                    echo "<li> <a href='cuenta.php'>".$result.'</a></li>
                    <li class="devider"></li>
                    <li><a href="logout.php">  Cerrar Sesión</a></li>'; 
                }
                ?>
        </ul>
    </div>      
</div><!--/top-->
<!--=== End Top ===-->    

<!--=== Header ===-->    
<div class="header">
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img id="logo-header" src="img/logo.png" alt="Logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown active">
                    <a href="index.php">
                        INICIO
                        <i class="icon-angle-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="quiz.php">
                        QUIZ
                        <i class="icon-angle-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="libros.php">
                        VER LIBROS
                        <i class="icon-angle-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="about.php">
                        ACERCA DE
                        <i class="icon-angle-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="casos.php">
                        CASOS DE USO
                        <i class="icon-angle-down"></i>
                    </a>
                </li>
            </ul>     
        </div><!-- /navbar-collapse -->
    </div>    
</div>    
</div><!--/header-->
<!--=== End Header ===-->    

<!--=== Casos ===-->
<style>
    .todos-casos{
        width: 100%;
    }
    .todos-casos div{
        width: 50%;
    }

</style>
<div class="todos-casos">
    <div>
        <p><strong>Número: </strong>CU01</p>
        <p><strong>Nombre de caso de uso: </strong>Iniciar Sesión</p>
        <p><strong>Actor (es): </strong>Usuario, Sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario inicia sesión utilizando su correo electrónico y contraseña personal.</p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. Usuario da click en el botón de iniciar sesión en el extremo superior derecho. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El usuario llena campo de nombre y contraseña, una vez terminado da click en el botón de entrar.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">3. El sistema consulta en la base de datos y verifica que la contraseña proporcionada coincida con la del usuario en la base de datos. </td>
            <td width="50%">3a. La contraseña no es válida y utilizando AJAX se da retroalimentación al usuario y se pide contraseña de nuevo. </td>
        </tr>
        <tr>
            <td width="50%">4. El usuario verá su nombre reflejado en la esquina superior derecha, y aparecerá el botón de cerrar sesión al lado. </td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU02</p>
        <p><strong>Nombre de caso de uso: </strong>Registrar Usuario</p>
        <p><strong>Actor (es): </strong>Usuario, sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario puede darse de alta en el sistema y poder acceder al portal de libros. </p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario selecciona el botón de registrarse que se encuentra en la esquina superior derecha del portal.  </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El sistema muestra una ventana que contiene la forma de registro. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">3. El usuario llena los campos solicitados y da click en el botón de registrarse.  </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">4. El sistema agrega el usuario al sistema y muestra una ventana de confirmación para darle retroalimentación de que se realizó la operación exitosamente. </td>
            <td width="50%">4a. El sistema muestra una ventana de que no se pudo agregar el usuario correctamente, para que el usuario lo intente más tarde. </td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU03</p>
        <p><strong>Nombre de caso de uso: </strong>Agregar Favorito </p>
        <p><strong>Actor (es): </strong>Usuario, Sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario seleccionar los libros que él quiera para poder agregarlos a su propio repositorio. </p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario da click en “ver libros”, o como resultado de un quiz realizado por un usuario registrado.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El usuario da click en la estrella debajo de cada libro dependiendo de cuál sea el que le guste. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">3. El sistema hará una animación de deslizamiento, la cual significa que acaba de ser agregada al repositorio de los libros del usuario.</td>
            <td width="50%">3a. El sistema no pudo conectarse a la base de datos y muestra un mensaje de error, para que el usuario lo pueda intentar después. </td>
        </tr>
        <tr>
            <td width="50%">4. El usuario sólo puede ver los libros “favoritos” en su repositorio, pero ya no los verá en el catálogo completo, o en el resultado de libros después del quiz.</td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU04</p>
        <p><strong>Nombre de caso de uso: </strong>Quitar favorito</p>
        <p><strong>Actor (es): </strong>Usuario, sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario puede quitar los libros que tiene como favoritos en su repositorio.</p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario da click en el botón que tiene su nombre en la esquina superior derecha. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El sistema muestra una ventana con todos los libros que se encuentran en la relación de usuario-favorito-escoge. </td>
            <td width="50%">2a. El sistema no se pudo conectar a la base de datos exitosamente, muestra un mensaje de error.</td>
        </tr>
        <tr>
            <td width="50%">3. El usuario da click en los íconos rojos debajo de cada libro.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">4. El sistema muestra una transición que representa la eliminación del libro del repositorio de favoritos. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">5. El sistema muestra los libros actuales que quedan después de la eliminación de favorito. </td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU05 </p>
        <p><strong>Nombre de caso de uso: </strong>Contestar Quiz</p>
        <p><strong>Actor (es): </strong>Usuario, sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario resuelve una encuesta y dependiendo de sus elecciones, el sistema mostrará un catálogo de libros relacionados a los gustos.</p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario da click en el botón de quiz. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El sistema muestra un sitio en el cual habrá diez preguntas.</td>
            <td width="50%">2a. El sistema no se pudo conectar a la base de datos exitosamente, muestra un mensaje de error.</td>
        </tr>
        <tr>
            <td width="50%">3. El usuario da click en la elección deseada de la opción múltiple de cada pregunta.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">4. El usuario da click en finalizar encuesta.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">5. El sistema envía a base de datos las elecciones del usuario y consulta los libros que coincidan con las respuestas del usuario.</td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU06</p>
        <p><strong>Nombre de caso de uso: </strong>Consultar libros</p>
        <p><strong>Actor (es): </strong> Usuario, sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario puede ver todos los libros almacenados en la base de datos del sitio. </p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario da click en el botón del menú superior “Ver libros”. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El sistema muestra un sitio con un arreglo de todos los libros dentro de la base de datos</td>
            <td width="50%">2a. El sistema no se pudo conectar a la base de datos exitosamente, muestra un mensaje de error. </td>
        </tr>
        <tr>
            <td width="50%">3. El usuario puede llamar al caso de uso de Agregar favoritos desde aquí.</td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU07</p>
        <p><strong>Nombre de caso de uso: </strong>Editar datos de sesión. </p>
        <p><strong>Actor (es): </strong>Usuario, sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario puede editar su información personal de la base de datos. </p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario da click en el botón que tiene su nombre. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El sistema muestra un sitio en el cual se mostrarán los libros favoritos además un botón que permite modificar los datos de la cuenta. </td>
            <td width="50%">2a. El sistema no se pudo conectar a la base de datos exitosamente, muestra un mensaje de error.</td>
        </tr>
        <tr>
            <td width="50%">3. El usuario da click en el botón de modificar datos de la cuenta.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">4. El sistema muestra un sitio con una forma, la cual ya va a estar previamente llena con los datos actuales del usuario. </td>
            <td width="50%">4a. El sistema no se pudo conectar a la base de datos y muestra un mensaje de error. </td>
        </tr>
        <tr>
            <td width="50%">5. El usuario da click en el botón actualizar.</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">6. El sistema modifica el usuario en la base de datos, actualizándolos de acuerdo a la forma llenada previamente por el usuario. </td>
            <td width="50%">6a. El sistema no se pudo conectar a la base de datos y muestra un mensaje de error. </td>
        </tr>
        <tr>
            <td width="50%">7. El sistema muestra una ventana de confirmación de actualización y muestra un sitio ya con el nombre actual del usuario. </td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
    <div>
        <p><strong>Número: </strong>CU08</p>
        <p><strong>Nombre de caso de uso: </strong>Compartir favoritos.</p>
        <p><strong>Actor (es): </strong>Usuario, sistema</p>
        <p><strong>Descripción: </strong>Caso de uso mediante el cual el usuario puede compartir vía email los libros que tiene como favoritos.</p>
        <table border="1">
            <tr align="center">
             <td width="50%"  colspan="2">
                <strong>Flujo de eventos</strong>
            </td> 
        </tr>
        <tr>
            <td width="50%">
                <strong>Curso normal</strong>
            </td>
            <td width="50%">
                <strong>Curso alternativo</strong>
            </td>
        </tr>
        <tr>
            <td width="50%">1. El usuario da click en el botón que tiene su nombre. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">2. El sistema muestra un sitio en el cual se mostrarán los libros favoritos además un botón que dice compartir. </td>
            <td width="50%">2a. El sistema no se pudo conectar a la base de datos exitosamente, muestra un mensaje de error. </td>
        </tr>
        <tr>
            <td width="50%">3. El usuario da click en el botón de compartir. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">4. El sistema muestra una forma la cual va a pedir un correo electrónico del usuario con quien se desea compartir. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">5. El usuario da click en el botón compartir. </td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%">6. El sistema envía el arreglo de libros contenidos en el repositorio de favoritos al usuario deseado. </td>
            <td width="50%">6a. El sistema no se pudo conectar a la base de datos y muestra un mensaje de error.</td>
        </tr>
        <tr>
            <td width="50%">7. El sistema muestra una ventana de confirmación de envío. </td>
            <td width="50%"></td>
        </tr>
    </table>
    </div>
</div>
<!--=== Copyright ===-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">                      
                <p class="copyright-space">
                    ReadBook &copy; 2014. Todos los derechos reservados.
                </p>
            </div>
            <div class="col-md-6">  
                <a href="index.php">
                    <img id="logo-footer" src="img/logo.png" class="pull-right" alt="" />
                </a>
            </div>
        </div><!--/row-->
    </div><!--/container--> 
</div><!--/copyright--> 
<!--=== End Copyright ===-->
</body>
</html>