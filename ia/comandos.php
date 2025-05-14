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
		body{
			background-image: url(img/img.jpg);
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="contenedor">		

		<div class="modal-body"> <!-- CUERPO DEL MENSAJE -->
		<input type="button" class="btn btn-info" onclick="startArtyom();" value="activar">
        <input type="button" class="btn btn-danger" onclick="stopArtyom();" value="desactivar">
        <p></p>
        <label  id="lcmd" style="color: #fff;">Comando</label>
        <input type="text" name="" id="text" style="font-family: cursive;color: red;"  class="form-control">
        <p></p>
         <label  id="lcmd" style="color: #fff;">Respuesta</label>
        <input type="text" name="" id="resp" style="font-family: cursive;color: red;"  class="form-control">
		<p></p>
        <select class="form-control" name="rol">
                      <option value="1">Respuesta</option>
                      <option value="2">Url</option>
                    </select>
       </div>
     </div>	
		<br>
	</div>

	<script>
		// Escribir lo que escucha.
		artyom.redirectRecognizedTextOutput(function(text,isFinal){
			var texto = $('#text');
			if (isFinal) {
				texto.val(text);
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

	
	</script>
</body>
</html>