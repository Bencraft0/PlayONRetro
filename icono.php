<?php 
session_start();

$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $id = $_SESSION['id'];

    $consulta = "UPDATE usuario SET icono='$imagen' WHERE id='$id'";

    if (mysqli_query($conexion, $consulta)) {
        // Redirigir a mi-perfil.php si la consulta fue exitosa
        header('location: mi-perfil.php');
    } else {
        echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
    }
} else {
    echo "Error en la carga de la imagen.";
}

mysqli_close($conexion);
?>