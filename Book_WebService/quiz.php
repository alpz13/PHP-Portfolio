<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>READBOOK | Quiz</title>
  <link rel="image_src" href="/images/notify_better_image.png"/>
  <link rel="shortcut icon" id="favicon" href="favicon.png">
  <link rel="canonical" href="http://www.thepetedesign.com/demos/onepage_scroll_demo.html" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Pacifico:400' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery.onepage-scroll.js"></script>
  <link href='css/onepage-scroll.css' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link href="css/quiz.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <script>
    $(document).ready(function(){
      $(".main").onepage_scroll({
        sectionContainer: "section",
        responsiveFallback: 600,
        loop: true
      });
    });
  </script>
  <script>
  function OnSubmitForm(){
    //window.location="index.php";
    if(document.pressed=='Ver resultados')
      document.formulario.action="preguntas.php";
    else if(document.pressed=='Inicio')
      document.formulario.action="index.php";
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
  
  <form class="wrapper" method="post" name="formulario" id="formulario" onsubmit="return OnSubmitForm()">
    <div class="main">
      <section class="page1">
        <input type="submit" class="btn btn-info"  value="Inicio" onclick="document.pressed=this.value" style="left:0; position:absolute; width: 100px;"/>
        <div class="page_container">
          <h1>Quiz de <br>recomendación <br> de libros</h1>
          <h2>Para empezar a contestar las preguntas simplemente haz scroll hacia abajo o da click en los botones en la parte derecha de la página</h2>
        </div>
      </section>
      
      <section class="page2">
        <div class="page_container">
          <h1>¿Que sexo eres?</h1>
          <br>
          <div style="color: #FFF">
          <input type="radio" name="sex" id="radio1" value="2" class="css-checkbox" checked="checked"/>
          <label for="radio1" class="css-label">Masculino</label>
          &nbsp;
          <input type="radio" name="sex" id="radio2" value="1" class="css-checkbox"/>
          <label for="radio2" class="css-label">Femenino</label>
          <div>
        </div>
      </section>
      
      <section class="page3">
        <div class="page_container">
          <h1>¿En qué intervalo de edad se encuentra?</h1>
          <p></p>
          <br><br><br>
          <div style="position: relative;  text-align: left">
          <input type="radio" name="age" id="radio3" value="0" class="css-checkbox" checked="checked"/>
          <label for="radio3" class="css-label">Menor a 10 años</label>
          <br><br>
          <input type="radio" name="age" id="radio4" value="1" class="css-checkbox" />
          <label for="radio4" class="css-label">10 a 20 años</label>
          <br><br>
          <input type="radio" name="age" id="radio5" value="2" class="css-checkbox"/>
          <label for="radio5" class="css-label">20 a 30 años</label>
          <br><br>
          <input type="radio" name="age" id="radio6" value="3" class="css-checkbox" />
          <label for="radio6" class="css-label">Mayor a 30 años</label>
          <div>
        </div>
      </section>

      <section class="page4">
        <div class="page_container">
          <h1>¿Que le gusta<br>hacer en su <br> tiempo libre?</h1>
          <div style="position: relative;  text-align: left">
            <input type="radio" name="activity" id="radio7" value="0" class="css-checkbox" checked="checked"/>
            <label for="radio7" class="css-label">Hacer ejercicio</label>
            <br><br>
            <input type="radio" name="activity" id="radio8" value="1" class="css-checkbox" />
            <label for="radio8" class="css-label">Salir con amigos</label>
            <br><br>
            <input type="radio" name="activity" id="radio9" value="2" class="css-checkbox"/>
            <label for="radio9" class="css-label">Estar con la familia</label>
            <br><br>
            <input type="radio" name="activity" id="radio10" value="3" class="css-checkbox" />
            <label for="radio10" class="css-label">Cocinar</label>
          <div>
        </div>
      </section>
      
      <section class="page5">
        <div class="page_container">
          <h1>¿Cuál palabra describiría mejor su personalidad?</h1>
          <br>
          <div style="color: #FFF">
          <input type="radio" name="personality" id="radio11" value="0" class="css-checkbox" checked="checked"/>
          <label for="radio11" class="css-label">Tranquilo</label>
          &nbsp;
          <input type="radio" name="personality" id="radio12" value="1" class="css-checkbox" />
          <label for="radio12" class="css-label">Intelectual</label>
          &nbsp;
          <input type="radio" name="personality" id="radio13" value="2" class="css-checkbox" />
          <label for="radio13" class="css-label">Impulsivo</label>
          &nbsp;
          <input type="radio" name="personality" id="radio14" value="3" class="css-checkbox" />
          <label for="radio14" class="css-label">Deportivo</label>
          <div>
        </div>
      </section>
      
      <section class="page6">
        <div class="page_container">
          <h1>Elige un programa de los siguientes: </h1>
          <br><br><br>
          <div style="position: relative;  text-align: left">
          <input type="radio" name="show" id="radio15" value="0" class="css-checkbox" checked="checked"/>
          <label for="radio15" class="css-label">Two and a half men</label>
          <br><br>
          <input type="radio" name="show" id="radio16" value="1" class="css-checkbox" />
          <label for="radio16" class="css-label">Criminal Minds</label>
          <br><br>
          <input type="radio" name="show" id="radio17" value="2" class="css-checkbox"/>
          <label for="radio17" class="css-label">Documental de Discovery Channel</label>
          <br><br>
          <input type="radio" name="show" id="radio18" value="3" class="css-checkbox" />
          <label for="radio18" class="css-label">Telenovela</label>
          <div>
        </div>
      </section>
      
      <section class="page7">
        <div class="page_container">
          <h1>Elige una<br>pelicula de<br>las siguientes</h1>
          <div style="position: relative;  text-align: left">
            <input type="radio" name="movie" id="radio19" value="0" class="css-checkbox" checked="checked"/>
            <label for="radio19" class="css-label">The Notebook</label>
            <br><br>
            <input type="radio" name="movie" id="radio20" value="1" class="css-checkbox" />
            <label for="radio20" class="css-label">Fast and Furious</label>
            <br><br>
            <input type="radio" name="movie" id="radio21" value="2" class="css-checkbox"/>
            <label for="radio21" class="css-label">Hostel</label>
            <br><br>
            <input type="radio" name="movie" id="radio22" value="3" class="css-checkbox" />
            <label for="radio22" class="css-label">The Patriot</label>
          <div>
        </div>
      </section>
      
      <section class="page8">
        <div class="page_container">
          <h1>¿Qué género de libros prefieres?</h1>
          <br>
          <div style="color: #FFF">
          <input type="radio" name="genre" id="radio23" value="0" class="css-checkbox" checked="checked"/>
          <label for="radio23" class="css-label">Tragedia</label>
          &nbsp;
          <input type="radio" name="genre" id="radio24" value="1" class="css-checkbox" />
          <label for="radio24" class="css-label">Romántico</label>
          &nbsp;
          <input type="radio" name="genre" id="radio25" value="2" class="css-checkbox" />
          <label for="radio25" class="css-label">Suspenso</label>
          &nbsp;
          <input type="radio" name="genre" id="radio26" value="3" class="css-checkbox" />
          <label for="radio26" class="css-label">Ciencia Ficción</label>
          </div>
        </div>
      </section>

      <section class="page9">
        <div class="page_container">
          <h1>¿Qué sentimiento te identifica mejor?</h1>
          <br><br><br>
          <div style="position: relative;  text-align: left">
          <input type="radio" name="feel" id="radio27" value="0" class="css-checkbox" checked="checked"/>
          <label for="radio27" class="css-label">Alegría</label>
          <br><br>
          <input type="radio" name="feel" id="radio28" value="1" class="css-checkbox" />
          <label for="radio28" class="css-label">Deseo</label>
          <br><br>
          <input type="radio" name="feel" id="radio29" value="2" class="css-checkbox"/>
          <label for="radio29" class="css-label">Paz</label>
          <br><br>
          <input type="radio" name="feel" id="radio30" value="3" class="css-checkbox" />
          <label for="radio30" class="css-label">Optimismo</label>
          <div>
        </div>
      </section>

      <section class="page10">
        <div class="page_container">
          <h1>Encuesta finalizada</h1>
          <br>
          <div style="color: #FFF">
            <input type="submit" class="btn" id="terminar"  value="Ver resultados" onclick="document.pressed=this.value"/>
          </div>
        </div>

      </section>
    </div>
    </form>


</body>
</html>
