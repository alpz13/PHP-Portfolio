<?php session_start()?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>ReadBook | <?php echo $_SESSION['name']; ?></title>

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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    
   
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
                    echo "<li> <a href='cuenta.php'>".$_SESSION['name'].'</a></li>
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
                    <li class="dropdown">
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

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Resultados</h1>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->


<!--=== Content Part ===-->
<div class="container"> 
<h1>Libros recomendados</h1>
<?php
    require_once('lib/nusoap.php');

    $proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
    $proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
    $proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
    $proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
    $client = new nusoap_client('http://edude.codingdiaries.com/final/webservice.php?wsdl', 'wsdl',
                            $proxyhost, $proxyport, $proxyusername, $proxypassword);
    $err = $client->getError();

    $forma=$_POST;

    $n1=$forma['sex'];
    $n2=$forma['age'];
    $n3=$forma['activity'];
    $n4=$forma['personality'];
    $n5=$forma['show'];
    $n6=$forma['movie'];
    $n7=$forma['genre'];
    $n8=$forma['feel'];

    $res_isbn=$client->call('getRecomendado_ISBN', array('n1' => $n1, 'n2' => $n2, 'n3' => $n3, 'n4' => $n4, 'n5' => $n5, 'n6' => $n6, 'n7' => $n7, 'n8' => $n8));
    $res_titulo=$client->call('getRecomendado_titulo', array('n1' => $n1, 'n2' => $n2, 'n3' => $n3, 'n4' => $n4, 'n5' => $n5, 'n6' => $n6, 'n7' => $n7, 'n8' => $n8));
    $res_descripcion=$client->call('getRecomendado_descripcion', array('n1' => $n1, 'n2' => $n2, 'n3' => $n3, 'n4' => $n4, 'n5' => $n5, 'n6' => $n6, 'n7' => $n7, 'n8' => $n8));

    $cont=1;
    $grid="";
    //foreach ($res as $key => $value) {
    $res_isbn=explode(';', $res_isbn);
    $res_titulo=explode(';', $res_titulo);
    $res_descripcion=explode(';*;', $res_descripcion);
    for ($i=0; $i < count($res_isbn); $i++) { 
        if($cont==1){
            $grid.='<div class="row service-v1 margin-bottom-40">';
        }

       $grid.='<div class="col-md-3 md-margin-bottom-40">
                    <img src="img/'.$res_isbn[$i].'.png" alt="'.$res_titulo[$i].'.png">
                    <h3>'.$res_titulo[$i].'</h3>
                    <p class="resume">'.ucfirst(strtolower(addslashes($res_descripcion[$i]))).'</p>
                </div>';
                $cont++;
        if($cont==5){
          $grid.="</div>";
          $cont=1;
       }
    }
    if($cont!=1){
          $grid.="</div>";
          $cont=1;
    }

    echo $grid;

?>

</div><!--/container-->     

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

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/hover-dropdown.min.js"></script> 
<script type="text/javascript" src="js/back-to-top.js"></script>
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="js/flexslider-min.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/cslider.js"></script> 
<!-- JS Page Level -->           
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="js/plugins.js"></script>
<script src="js/sly.min.js"></script>
<script src="js/readmore.js"></script>
<script src="js/horizontal.js"></script>

 <script>
    $('.resume').readmore({maxHeight: 150});
  </script>

</body>
</html> 
