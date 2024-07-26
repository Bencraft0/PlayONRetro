<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilo.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
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
$consulta1=mysqli_select_db($conexion, "b13_36951409_proyecto");

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
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

    <main class="flex-shrink-0 content">
        <div class="container" style="background-color:azure">
            <h3 class="my-3">Crear producto: </h3>

            <form action="nuevo.php" class="row g-3" method="post" enctype="multipart/form-data">

                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="">
                </div>

                <div class="col-md-8">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" cols="32" rows="8"></textarea>
                </div>

                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="Juego">Juego</option>
                        <option value="Consola">Consola</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Accesorio">Accesorio</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" value="">
                </div>
                <div class="col-md-6">
                    <label for="imagen1" class="form-label">Imagen 1</label>
                    <input type="file" name="imagen1" placeholder="imagen">
                </div>
                <div class="col-md-6">
                    <label for="imagen2" class="form-label">Imagen 2</label>
                    <input type="file" name="imagen2" placeholder="imagen">
                </div>
                <br><br>
                <div class="col-md-5">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" placeholder="Precio" value="">
                </div>
                <div class="col-md-4">
                    <label for="descuento" class="form-label">Descuento</label>
                    <select class="form-select" id="descuento" name="descuento" required>
                        <option value="0">SIN DESCUENTO</option>
                        <option value="25">25% descuento</option>
                        <option value="50">50% descuento</option>
                        <option value="75">75% descuento</option>
                        <option value="100">GRATIS</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="cant.vendidas" class="form-label">Cantidad Vendidas</label>
                    <input type="text" class="form-control" name="cant_vendidas" placeholder="Cantidad vendidas" value="">
                </div>
                <div class="col-md-3">
                    <label for="estrellas" class="form-label">Estrellas</label>
                    <input type="text" class="form-control" name="estrellas" placeholder="Estrellas" value="">
                </div>
                <div class="col-md-3">
                    <label for="fecha" class="form-label">Fecha agregado</label>
                    <label class="form-control">
                        <?php 
                    date_default_timezone_set('Etc/GMT+3');
                    echo date('d') . "/" . date('m') . "/" . date('Y') . " || " . date('H') . ":" . date('i') . ":" . date('s');
                    ?></label>
                </div>

                <div class="col-12">
                    <a href="crud.php" class="btn btn-secondary">Regresar</a>
                    <button type="submit" name="guardar_cambios" value="Guardar Cambios" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary">2024 | PlayONRetro</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>