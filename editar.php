<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
</head>
</html>
<?php 
session_start();
if (!$_SESSION['admin']) {
    echo "<h2>No tienes permiso para acceder a este sitio.</h2>"; ?> 
  <br> 
  <a href="signup_html.php" class="btn btn-primary">Volver a la pagina principal</a> <?php die;
} 
// Inicia el almacenamiento en búfer de salida

// 1) Conexion
$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2) Almacenamos los datos del envío GET
$id = $_GET['id'];
// 3) Preparar la SQL
$consulta = "SELECT * FROM productos WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
$respuesta = mysqli_query($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos = mysqli_fetch_array($respuesta);

    // Si en la variable constante $_POST existe un índice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
    var_dump($_POST);
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $marca = $_POST['marca'];
        if (!isset($_FILES['imagen1']) || $_FILES['imagen1']['error'] != UPLOAD_ERR_OK) {
            $imagen1 = $datos['imagen1'];
        } else {
            $imagen1 = addslashes(file_get_contents($_FILES['imagen1']['tmp_name']));
        }
        
        if (!isset($_FILES['imagen2']) || $_FILES['imagen2']['error'] != UPLOAD_ERR_OK) {
            $imagen2 = $datos['imagen2'];
        } else {
            $imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
        }
        $precio = $_POST['precio'];
        $descuento = $_POST['descuento'];
        $cant_vendidas = $_POST['cant_vendidas'];
        $estrellas = $_POST['estrellas'];

        // Preparar la orden SQL
        $consulta = "UPDATE productos SET 
            nombre='$nombre', 
            descripcion='$descripcion', 
            tipo='$tipo', 
            marca='$marca', 
            imagen1='$imagen1', 
            imagen2='$imagen2', 
            precio='$precio', 
            descuento='$descuento',
            cant_vendidas='$cant_vendidas',
            estrellas='$estrellas'
            WHERE id=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);
            // a) rederigir a index
            header('location: crud.php'); ?>