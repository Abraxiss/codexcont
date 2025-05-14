
<?php
$query = "SELECT * FROM user WHERE id_user = $id_user";
$result = mysqli_query($conexion, $query);
$filas = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Perfil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .fotocheck {
      max-width: 400px;
      margin: auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      padding: 20px;
    }
    .avatar-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #007bff;
      margin-bottom: 10px;
    }
    .form-label {
      font-weight: bold;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-4">
  <div class="fotocheck text-center">
    <!-- Avatar -->
    <img src="<?php  echo $filas ['user_avatar']  ?>" alt="Avatar" class="avatar-img mx-auto d-block">
    <form action="subir_avatar.php" method="POST" enctype="multipart/form-data" class="mb-3">
      <input type="file" name="avatar" class="form-control form-control-sm mb-2">
      <button class="btn btn-outline-primary btn-sm w-100" type="submit">Actualizar Foto</button>
    </form>

    <!-- Datos personales -->
    <form action="actualizar_datos.php" method="POST" class="text-start">
      <div class="mb-2">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= $filas['user_nombre'] ?>">
      </div>
      <div class="mb-2">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $filas['user_correo'] ?>">
      </div>
      <button class="btn btn-success w-100 mb-2" type="submit">Guardar cambios</button>
    </form>

    <!-- Cambiar contraseña -->
    <form action="cambiar_contrasena.php" method="POST" class="text-start">
      <div class="mb-2">
        <label class="form-label">Contraseña actual</label>
        <input type="text" name="actual" class="form-control" value="<?= $filas['user_clave'] ?>">
      </div>
      <div class="mb-2">
        <label class="form-label">Nueva contraseña</label>
        <input type="password" name="nueva" class="form-control">
      </div>
      <button class="btn btn-warning w-100 mb-2" type="submit">Cambiar contraseña</button>
    </form>

    <!-- Código de activación -->
    <div class="text-start">
      <p><strong>Código de de juego:</strong> </p>
      <div class="mx-auto p-6 text-center border border-primary rounded" style="background-color: #f8f9fa; width: 50%;">
        <h3 class="text-secondary fs-2 m-0"><?= $filas['user_codigo'] ?></h3>
      </div>

    </div>
  </div>
</div>

</body>
</html>
