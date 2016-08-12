<?php session_start()?>

<html lang="es">
<head>
    <title>READBOOK | Login</title>

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
    <!-- CSS Style Page -->    
    <link rel="stylesheet" href="css/login.css">
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="css/default.css" id="style_color">
    <link rel="stylesheet" href="css/app.css">
    <script type="text/javascript" src="js/ajax.js"></script>
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

<body> 
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
                    <li class="dropdown active">
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

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Libros</h1>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">
    <?php
    //webservice
    require_once('lib/nusoap.php');

    $proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
    $proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
    $proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
    $proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
    $client = new nusoap_client('http://edude.codingdiaries.com/final/webservice.php?wsdl', 'wsdl',
                            $proxyhost, $proxyport, $proxyusername, $proxypassword);
    $err = $client->getError();

        if(isset($_SESSION['name'])){
            $res_isbn=$client->call('getLibros_ISBN', array('email' => $_SESSION['email']));
            $res_titulo=$client->call('getLibros_titulo', array('email' => $_SESSION['email']));
            $res_descripcion=$client->call('getLibros_descripcion', array('email' => $_SESSION['email']));
        }else{
            $res_isbn=$client->call('getLibros_ISBN', array('email' => 'no_email'));
            $res_titulo=$client->call('getLibros_titulo', array('email' => 'no_email'));
            $res_descripcion=$client->call('getLibros_descripcion', array('email' => 'no_email'));
        }

        if ($res_isbn != false) {
            $res_isbn=explode(';',$res_isbn);
            $res_titulo=explode(';',$res_titulo);
            $res_descripcion=explode(';*;',$res_descripcion);
           $cont=1;
           $grid="";
           //foreach ($res as $key => $value) {
           for($i=0;$i<count($res_isbn);$i++){
               if($cont==1){
                    $grid.='<div class="row service-v1 margin-bottom-40">';
               }

                $grid.='<div class="col-md-3 md-margin-bottom-40" id="'.$res_isbn[$i].'">
                            <img src="img/'.$res_isbn[$i].'.png" alt="'.$res_titulo[$i].'.png">
                            <h2>'.$res_titulo[$i].'</h2>';
                if(isset($_SESSION['name'])){
                    $grid .= '<a href="javascript:void(0)" class="favorito" id="'.$res_isbn[$i].'"><img src="img/fav_icon.png" style="width: 32px; height: 32px; margin-bottom: 10px" > </a>';
                            
                }
                $grid.='<p class="desc">'.ucfirst(strtolower(addslashes($res_descripcion[$i]))).'</p>
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
        }

     ?>


</div><!--/container-->     
<!--=== End Content Part ===-->

<!--=== Copyright ===-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">                      
                <p class="copyright-space">
                    2013 &copy; READBOOK. ALL Rights Reserved.
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

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<!-- JS Page Level -->           
<script type="text/javascript" src="js/app.js"></script>

<script src="js/readmore.js"></script>

 <script>
    $('.desc').readmore({maxHeight: 200});

    $(".favorito").click(function(){
        var isbn=$(this).attr("id");
        $.ajax({
            method:"POST",
            url: "insertfav.php",
            data:{'isbn': isbn},
            success:function(cosas){
                if(cosas==1){
                   $("#"+isbn).css("display","none");
                }
                
             
            }

            });
    });
  </script>

</body>
</html> 
