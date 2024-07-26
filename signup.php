<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>error</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  
</body>
</html>
<?php
                  $conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
                  $consulta1=mysqli_select_db($conexion, "b13_36951409_proyecto");


$nombre = $_POST['name'];
$correo = $_POST['email'];
$contraseña = $_POST['pass'];
$confirm_contraseña = $_POST['confirm_pass'];

if ($contraseña !== $confirm_contraseña) {
    die("Las contraseñas no coinciden.");
}

// Verificar si el nombre de usuario ya existe
$check_nombre = "SELECT * FROM usuario WHERE nombre='$nombre'";
$result_nombre = mysqli_query($conexion, $check_nombre);

// Verificar si el correo electrónico ya existe
$check_correo = "SELECT * FROM usuario WHERE correo='$correo'";
$result_correo = mysqli_query($conexion, $check_correo);

if ((mysqli_num_rows($result_nombre) > 0) and (mysqli_num_rows($result_correo) > 0)) {
  echo "<h2>El nombre de usuario y el correo electrónico ya estan en uso.</h2>"; ?> 
  <br> 
  <a href="signup_html.php" class="btn btn-secondary">Volver a Intentar</a> 
  <a href="login_html.php" class="btn btn-success">Iniciar Sesion</a> 
  <?php 
  die; }

if (mysqli_num_rows($result_nombre) > 0) {
  echo "<h2>El nombre de usuario ya está en uso.</h2>"; ?>
  <br> 
  <a href="signup_html.php" class="btn btn-secondary">Volver a Intentar</a> 
  <a href="login_html.php" class="btn btn-success">Iniciar Sesion</a> 
  <?php 
  die; }
if (mysqli_num_rows($result_correo) > 0) {
  echo "<h2>El correo electrónico ya está en uso.</h2>"; ?>
  <br> 
  <a href="signup_html.php" class="btn btn-secondary">Volver a Intentar</a> 
  <a href="login_html.php" class="btn btn-success">Iniciar Sesion</a> 
  <?php 
  die; }

$pass = password_hash($contraseña, PASSWORD_BCRYPT);
$sub = isset($_POST['subscribe']) ? 1 : 0;

$consulta = "INSERT INTO usuario (nombre, correo, contrasena, sub)
VALUES ('$nombre', '$correo', '$pass', '$sub')";

if (mysqli_query($conexion, $consulta)) {
    header('Location: login_html.php');
    exit();
} else {
    echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);
?>