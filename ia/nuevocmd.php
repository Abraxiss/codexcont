
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/artyom.min.js"></script>
	<script src="js/artyomCommands.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		.contenedor{
			width: 60%;
			margin-left: auto;
			margin-right: auto;
		}

	</style>
</head>

<div class="card-header ">
  <div class="card-body">
    <H4 class="card-title text-center">NUEVO COMANDO</H4>
  </div>
</div>

<br><br>
<body>
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

		



<br>

<div class="container">
  <div class="row">
    <div class="col-sm">
     
    </div>
<div class="col-lg-10">

<div class="card-header ">
	<div class="fcontainer" style="margin-top: 100px;">	
	<form class="form-horizontal" method="post" id="guardar_comandos" name="guardar_comandos">
			<div class="modal-body"> <!-- CUERPO DEL MENSAJE -->
			<input type="button" class="btn btn-info" onclick="startArtyom();" value="Activar">
	        <input type="button" class="btn btn-danger" onclick="stopArtyom();" value="Desactivar">
	        <p></p>
	        <input type="text" id="texto" name="comando" class="form-control" placeholder="Pregunta ?." style="padding: 14px;color:red;font-family: cursive;height: 60px;border-radius: 100px;" required>
	        <p></p>
	        <input type="text" id="resp" name="respuesta"  class="form-control" placeholder="Respuesta o url?." style="padding: 14px;color:red;font-family: cursive;height: 60px;border-radius: 100px;" required>
	        <p></p>
	        <select class="form-control" name="tipo" style="padding: 14px;color:red;font-family: cursive;height: 60px;border-radius: 100px;" name="rol" required>
	                     <option value="">Escoge el tipo de comando</option>
	                      <option value="1">Respuesta</option>
	                      <option value="2">Url</option>
	                    </select>
	    	</div>
    	<button type="submit" class="btn btn-danger" style="margin-left: 25px;" id="guardar_comandos">Guardar_comandos</button>
	</form>
    </div>	
</div>
    </div>
    <div class="col-sm">
    
    </div>
  </div>
</div>






	<script>
		$( "#guardar_comandos" ).submit(function( event ) {
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/comandos.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Guardando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			load(1);
		  }
	});
  event.preventDefault();
})
	// $(document).ready(function() {

		$('#normal').mouseover(function() {
			artyom.say("boton normal de bootstrap")
		});

		$('#normal').mouseout(function() {
			artyom.shutUp();
		});

		$('#destacado').mouseover(function() {
			artyom.say("boton destacado de bootstrap")
		});

		$('#exito').mouseover(function() {
			artyom.say("boton exito de bootstrap")
		});

		$('#información').mouseover(function() {
			artyom.say("boton informacion de bootstrap")
		});

		$('#advertencia').mouseover(function() {
			artyom.say("boton advertencia de bootstrap")
		});

		$('#peligro').mouseover(function() {
			artyom.say("boton peligro de bootstrap")
		});

		//El sistema responde
	//El sistema responde
		artyom.addCommands([
			{
				indexes:["captu",'cuál es tu banda favorita','Saluda a mis seguidores'],
				action: function(i){
					if (i==0) {
						artyom.say("Hola Raul, buenos dias");

					}
					if (i==1) {
						artyom.say("Raul, me gusta tu banda BLESS");
					}
					if (i==2) {
						artyom.say("Hola gente, espero les este yendo muy bien y que este tutorial les ayude de mucho. Saludos");
					}
				}
			},
			{
				indexes:['me voy','chau'],
				action: function(){
					alert('ok, chau');					
				}
			},
			{
				indexes:['abrir google','abrir facebook', 'abrir youtube'],
				action: function(i){
					if (i==0) {
						artyom.say("Abriendo google");
						//window.open("http://www.google.com",'_blank');
					}
					if (i==1) {
						//artyom.say("Abriendo facebook");
						//window.open("http://www.facebook.com/intecsolt/",'_blank');
					}
					if (i==2) {
						artyom.say("Abriendo youtube");
						window.open("https://www.youtube.com/channel/UCF721oswf7EUSsQbuGFoMZQ",'_blank');
					}
				}
			},
			{
				indexes:['limpiar'],
				action: function(){
					$('#texto').val('');
				}
			}
		]); 

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
						artyom.say("Abriendo pagina");
						window.open(r[0],'_blank');
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
</body>
</html>