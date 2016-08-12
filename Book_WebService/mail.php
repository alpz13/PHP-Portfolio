<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/demo.css">
	<script type="text/javascript">
		function mostrarVentana()
		{
   			var ventana = document.getElementById('VentanaEmergente'); // Accedemos al contenedor
   			ventana.style.marginTop = "100px"; 
    		ventana.style.marginLeft = ((document.body.clientWidth-350) / 2) +  "px"; 
   			ventana.style.display = 'block'; 
		}

		function ocultarVentana()
		{
    		var ventana = document.getElementById('VentanaEmergente'); // Accedemos al contenedor
    		ventana.style.display = 'none'; 
		}

	</script>
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
<input type="button" onclick="mostrarVentana()" value="abrir Div">
<div id="VentanaEmergente" style="position: fixed; width: 550px; height: 290px; top: 0; left: 0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal; border: #333333 3px solid; background-color: #FAFAFA; color: #000000; display:none;">
	<form action="prueba.php" method="POST">
	<div style="font-weight: bold; text-align: left; color: #FFFFFF; padding: 5px; background-color:#006394">
		Correo
	</div>
 	<label>From: </label>
 	<label name="sender">Micorreo@itesm.mx</label>
 	<br>
 	<label>To :</label>
 	<input type="text" name="receiver"/>
 	<br>
 	<label>Subject :</label>
 	<input type="text" name="subject"/>
 	<br>
 	<label>Mensaje</label>
 	<br>
	<textarea name="message" cols="50" rows="5"></textarea>
  	<div style="padding: 10px; background-color: #F0F0F0; text-align: center; margin-top: 44px;">
  	<input id="btnAceptar"  name="btnAceptar" size="20" type="submit" value="Aceptar" />
  	<input id="btnCancelar" onclick="ocultarVentana();" name="btnCancelar" size="20" type="button" value="Cancelar" />
  	</form>
 	</div>
</div>


</body>
</html>