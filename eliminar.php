<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion = mysqli_connect("sql302.byethost13.comter.com", "b13_36951409", "benjamin5");
    mysqli_select_db($conexion, "b13_36951409_proyecto");

    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $consulta = "DELETE FROM productos WHERE id = $id";
    if (!mysqli_query($conexion, $consulta)) {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
        die;
    } 

    mysqli_close($conexion);
}
?>
<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto Borrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="css/estilo.css" rel="stylesheet">
</head>
<?php 
if (!$_SESSION['admin']) {
    echo "<h2>No tienes permiso para acceder a este sitio.</h2>"; ?> 
  <br> 
  <a href="index.php" class="btn btn-primary">Volver a la pagina principal</a> <?php die;
} ?>
<body style="
    margin: 0;
    padding: 0;
    background-image: url(images/fondo_crud.jpeg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 100vh;
    width: 100%;
">

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col text-center my-3">
                    <h2>Registro N° <?php echo $id; ?> eliminado</h2>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="crud.php" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> 2024 | PlayONRetro</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>