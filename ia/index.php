<?php include(".././session/sessionup.php"); ?>

<audio src=".././op_voz/audio/saludo1.mp3" preload="preload" autoplay="autoplay" ></audio>
<audio src=".././op_voz/audio/efect1.mp3" preload="preload" autoplay="autoplay" ></audio>
<audio src=".././op_voz/audio/efect4.mp3" preload="preload" autoplay="autoplay" ></audio>
<audio src=".././op_voz/audio/efectoload.mp3" preload="preload" autoplay="autoplay" ></audio>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/artyom.min.js"></script>
	<script src="js/artyomCommands.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">       
	<link rel="stylesheet" href="Stylos/Stylosindex.css">

<link rel="stylesheet" href="estilos.css">

	<style>
		.contenedor{
			width: 60%;
			margin-left: auto;
			margin-right: auto;
		}

	</style>





</head>
<body>

 <div class="fixed-action-btn toolbar">
  <a class="btn-floating btn-large blue">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a href=".././asiento_ingresos.php" class="btn-floating blue">
      <i class="material-icons">add_circle INGRESOS</i></a></li>
    <li><a href=".././op_apertura.php"  class="btn-floating blue">
      <i class="material-icons">donut_small APERTURA </i> </a></li>
    <li><a href=".././asiento_egresos.php"  class="btn-floating blue">
      <i class="material-icons">do_not_disturb_on EGRESOS</i></a></li>
   
  </ul>
</div>














<div role="dialog" tabindex="-1" class="modal fade" id="modal_hablar">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header" style="display: block;"> <!-- CABECERA -->
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
       <h4 class="text-center modal-title">Texto a voz utilizando artyom</h4>
       </div>
       <div class="modal-body"> <!-- CUERPO DEL MENSAJE -->
			<label for="leer">Escribe un texto para leerlo</label>
			<textarea id="leer"  class="form-control" rows="4" cols="100"></textarea>
			<p></p>
			<input type="button" id="btnLeer" class="btn btn-info" value="Hablar">
       </div>
       <div class="modal-footer"> <!-- PIE -->
       <button class="btn btn-default btn btn-primary btn-lg" type="button" data-dismiss="modal">Cerrar </button>
       </div>
     </div>
   </div>
</div>


<body>
<div class="oja">


<div class="container">
  <div class="row">
    <div class="col-3">
      
    </div>
    <div class="col-6">
      <img   src="./boot.gif" class="img-fluid" class="responsive-img" width="650" heigth="650" > 

    </div>
    <div class="col-3">
      
    </div>
  </div>
</div>

 
<br>



<div class="container ">

<div class="row grafi">
	    <div class="col-1">
	   	
	    </div>

    	<div class="col-10 justify-content-center">

			<form class="form-horizonta" method="post" id="guardar_comandos" name="guardar_comandos">
				 <div class="align-center text-center"> <!-- CUERPO DEL MENSAJE -->

					<button type="button" class="btn-neon btn-primary" onclick="startArtyom();" >
						<i class="fas fa-power-off"></i></button>
						<i class="fas fa-align-justify"></i>
						<span id="span1"></span>
				        <span id="span2"></span>
				        <span id="span3"></span>
				        <span id="span4"></span>
			        
					<button type="button" class="btn-neon btn-danger" onclick="stopArtyom();" >
						<i class="fas fa-stop"></i></button>
						</button>
			        	<span id="span1"></span>
				        <span id="span2"></span>
				        <span id="span3"></span>
				        <span id="span4"></span>
<br><br>
			        <input type="text" id="texto" name="comando" class="form-control" placeholder="Pregunta ?." style="padding: 14px;color:#ffffff;font-family: cursive;height: 60px;border-radius: 100px ;" required>

			        
			        

			    </div>
			</form>     	
   		</div>

	    <div class="col-1">
	     	
	    </div>


</div>

</div>




</div>









	<script>
		
	// $(document).ready(function() {
	//El sistema responde
	//El sistema responde

		// Escribir lo que escucha.
		artyom.redirectRecognizedTextOutput(function(text,isFinal){
			var texto = $('#texto');
			if (isFinal) {
				texto.val(text);
				 $.get("ajax/acceso.php", { cmd: text }).done(function(data) {
				 	r = data.split("-");
				 		if (r[1]==1) {
						artyom.say(r[0]);
					}else if(r[1]==2){
						
				



						window.open(r[0] , "_self");

				}else if(r[1]==0){
						artyom.say(r[0]);
					}
 				 });
			}else{
				
			}
		});


		//inicializamos la libreria Artyom
		function startArtyom(){
			artyom.initialize({
				lang: "es-ES",
				continuous:true,// Reconoce 1 solo comando y para de escuchar
	            listen:true, // Iniciar !
	            debug:true, // Muestra un informe en la consola
	            speed:1 // Habla normalmente
			});
		};
		
		// Stop libreria;
		function stopArtyom(){
			artyom.fatality();// Detener cualquier instancia previa
		};

		// leer texto
		$('#btnLeer').click(function (e) {
            e.preventDefault();
            var btn = $('#btnLeer');
            if (artyom.speechSupported()) {
                btn.addClass('disabled');
                btn.attr('disabled', 'disabled');

                var text = $('#leer').val();
                if (text) {
                    var lines = $("#leer").val().split("\n").filter(function (e) {
                        return e
                    });
                    var totalLines = lines.length - 1;

                    for (var c = 0; c < lines.length; c++) {
                        var line = lines[c];
                        if (totalLines == c) {
                            artyom.say(line, {
                                onEnd: function () {
                                    btn.removeAttr('disabled');
                                    btn.removeClass('disabled');
                                }
                            });
                        } else {
                            artyom.say(line);
                        }
                    }
                }
            } else {
                alert("ERROR");
            }
        });
	
	// });
	</script>



	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script> 
   document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      toolbarEnabled: true
    });
  });

  // Or with jQuery

  $('.fixed-action-btn').floatingActionButton({
    toolbarEnabled: true
  });
</script>


</body>
</html>