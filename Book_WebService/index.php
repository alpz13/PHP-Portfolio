<?php ob_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]>Edu was here<!--> <html lang="en"> <!--<![endif]-->  

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
<?php session_start()?>

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

<!--=== Slider ===-->
<div class="slider-inner">
    <div id="da-slider" class="da-slider">
        <div class="da-slide">
            <h2><i>BIENVENID@s AL</i> <br /> <i>PORTAL DE</i> <br /> <i>LECTURA READBOOK!</i></h2>
            <p><i>Dedicados a presentarte</i> <br /> <i>los libros adecuados</i> <br /> <i>para tí</i></p>
            <div class="da-img"><img src="img/1.png" alt="" /></div>
        </div>
        <div class="da-slide">
            <h2><i>CON UN BREVE</i> <br /> <i>CUESTIONARIO</i> <br /> <i> SOBRE TÍ</i></h2>
            <p><i>Mostramos los libros</i> <br /> <i>similares a tu</i> <br /> <i>personalidad</i></p>
            <div class="da-img"><img src="img/2.png" alt="image01" /></div>
        </div>
        <div class="da-slide">
            <h2><i>LA LECTURA ES LA</i> <br /> <i>OCTAVA MARAVILLA</i> <br /> <i>DEL MUNDO</i></h2>
            <p><i>La lectura es la comunicación con</i> <br /> <i>nuestro ser, nuestra</i> <br /> <i>imaginación y nuestro gobierno</i></p>
            <div class="da-img"><img src="img/3.png" alt="image01" /></div>
        </div>
        <div class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>		
        </div>
    </div><!--/da-slider-->
</div><!--/slider-->
<!--=== End Slider ===-->

<!--=== Purchase Block ===-->
<div class="purchase" style="background-color:#eee">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>Encuentra el gusto por la lectura con ReadBook</span>
                <p>Creemos que cada persona tiene libros con los cuales se puede identificar, por lo tanto para adentrarse en el mundo de la lectura se deben elegir los libros adecuados.</p>
            </div>
        </div>
    </div>
</div><!--/row-->
<!-- End Purchase Block -->

<!--=== Content Part ===-->
<div class="container">	


    <div class="pagespan container">
        
        <div class="wrap">
            <h2>Libros más vistos</h2>

            <div class="scrollbar">
                <div class="handle">
                    <div class="mousearea"></div>
                </div>
            </div>

            <div class="frame effects" id="effects">
                <ul class="clearfix">
                    <li><img src="img/8478887598.png" alt="Harry_Potter_La_Piedra_Filosofal"></li>
                    <li><img src="img/9685208557.png" alt="Pedro_Paramo_Juan_Rulfo"></li>
                    <li><img src="img/7503013925733.png" alt="Haruki_Murakami_Tokio"></li>
                    <li><img src="img/9786070702853.png" alt="Gordon_Ramsay"></li>
                    <li><img src="img/9786070702921.png" alt="Cazadores_De_Sombras_Ciudad_Cenizas2"></li>
                    <li><img src="img/9786070703430.png" alt="Cazadores_De_Sombras_Ciudad_Cenizas3"></li>
                    <li><img src="img/9786070704352.png" alt="Gabriel_Garcia_Marquez"></li>
                    <li><img src="img/9786070716430.png" alt="Inferno_Dan_Brown"></li>
                    <li><img src="img/9786070719295.png" alt="El_cerebro_de_mi_hermano"></li>
                    <li><img src="img/9786071107848.png" alt="Pequeno_Cerdo_Capitalista"></li>
                    <li><img src="img/9786071121639.png" alt="Las_Ventajas_de_ser_Invisible"></li>
                    <li><img src="img/9786071125583.png" alt="Maravilloso_Desastre"></li>
                    <li><img src="img/9786071126467.png" alt="Joel_Dicker"></li>
                    <li><img src="img/9786071127143.png" alt="Historia_Del_Narcotrafico_Mexico"></li>
                    <li><img src="img/9786071127587.png" alt="El_Heroe_Discreto_Mario_Vargas_Llosa"></li>
                    <li><img src="img/9786071128645.png" alt="Eleanor_Park_Rainbow_Rowell"></li>
                    <li><img src="img/9786071128935.png" alt="Yo_Decido_Gaby_Vargas"></li>
                </ul>
            </div>

            <div class="controls center">
                <button class="btn prev"><i class="icon-chevron-left"></i>&lt;</button>
                <button class="btn next">&gt;<i class="icon-chevron-right"></i></button>
            </div>
        </div>
    </div>

	<!-- Service Blocks -->
	<div class="row">
    	<div class="col-md-4">
    		<div class="service">
                <i class="icon-resize-small service-icon"></i>
    			<div class="desc">
    				<h4>Visión</h4>
                    <p>Tenemos la meta común de lograr que la comunidad mexicana incremente el promedio 
                    de libros leídos, y nos consolidemos como un país más culto y de mayor preparación
                    intelectual.</p>
    			</div>
    		</div>	
    	</div>
    	<div class="col-md-4">
    		<div class="service">
                <i class="icon-cogs service-icon"></i>
    			<div class="desc">
    				<h4>Misión</h4>
                    <p>Asumimos el compromiso y responsabilidad de promover la lectura de la sociedad ofreciendo
                    una selectiva cantidad de libros que cumplan con los intereses de cada persona individualmente, mejorando
                    así su experiencia en el mundo de la literatura.</p>
    			</div>
    		</div>	
    	</div>
    	<div class="col-md-4">
    		<div class="service">
                <i class="icon-plane service-icon"></i>
    			<div class="desc">
    				<h4>Valores</h4>
                    <ul>
                    	<li>Conocimiento</li>
                    	<li>Creatividad</li>
                    	<li>Identidad</li>
                    	<li>Preparación</li>
                    	<li>Competitividad</li>
                    </ul>
    			</div>
    		</div>	
    	</div>			    
	</div><!--/row-->
	<!-- End Service Blokcs -->
    
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
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
<script src="js/horizontal.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
      	App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>

</body>
</html>	
