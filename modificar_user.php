<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
</head>
</html>
<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
$consulta1=mysqli_select_db($conexion, "b13_36951409_proyecto");
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

// Obtener el ID del usuario desde la sesión
$id = $_SESSION["id"];

// Obtener los datos del formulario
if (isset($_POST['guardar_cambios'])) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
    $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['ciudad']);

    // Manejo de la imagen
    if (!isset($_FILES['imagen1']) || $_FILES['imagen1']['error'] != UPLOAD_ERR_OK) {
        // No se subió nueva imagen, mantener la existente
        $consulta = "UPDATE usuario SET 
            nombre='$nombre', 
            correo='$correo', 
            contrasena='$contraseña', 
            pais='$pais', 
            ciudad='$ciudad' 
            WHERE id=$id";
    } else {
        // Subir nueva imagen
        $imagen1 = mysqli_real_escape_string($conexion, file_get_contents($_FILES['imagen1']['tmp_name']));
        $consulta = "UPDATE usuario SET 
            nombre='$nombre', 
            correo='$correo', 
            contrasena='$contraseña', 
            icono='$imagen1', 
            pais='$pais', 
            ciudad='$ciudad' 
            WHERE id=$id";
    }

    // Ejecutar la consulta de actualización
    if (mysqli_query($conexion, $consulta)) {
        header('location: mi-perfil.php'); // Redirigir a la página de perfil después de la actualización
        exit();
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>