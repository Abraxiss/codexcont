<?php
	if (empty($_POST['comando'])) {
           $errors[] = "comando vacío";
        } else if (!empty($_POST['comando'])){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$comando=mysqli_real_escape_string($con,(strip_tags($_POST["comando"],ENT_QUOTES)));
		$respuesta=mysqli_real_escape_string($con,(strip_tags($_POST["respuesta"],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));

		$sql2 = "SELECT * FROM respuestas WHERE comando = '" . $comando . "';";
                $query_check_user_name = mysqli_query($con,$sql2);
				$query_check_user=mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 1) {
                    $errors[] = "Lo sentimos , el comando ya existe.";
                } else {
		$sql="INSERT INTO respuestas (id, comando, respuesta, tipo) VALUES (null,'$comando','$respuesta','$tipo')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Comando ingresado.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		
	}
		} else {
			$errors []= "Error desconocido.";
		}
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>