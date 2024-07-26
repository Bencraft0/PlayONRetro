<?php
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");
$consulta1='SELECT * FROM usuario';
$usuarios= mysqli_query($conexion, $consulta1);

while ($reg = mysqli_fetch_array($usuarios))
if ($_SESSION["correo"] == $reg["correo"] and $_SESSION["pass"] == $reg["contrasena"]) {
    session_start();
    $_SESSION["correo"] = $correo;
    $_SESSION["pass"] = $contraseña;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} if ($_SESSION["correo"] == $reg["nombre"] and $_SESSION["pass"] == $reg["contrasena"]) {
    session_start();
    $_SESSION["correo"] = $correo;
    $_SESSION["pass"] = $contraseña;
    header ("location: index.php");
    } else header ("location: incorrecto.html")
?>