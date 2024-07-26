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
<?php 
session_start();
if (!$_SESSION['admin']) {
    echo "<h2>No tienes permiso para acceder a este sitio.</h2>"; ?> 
  <br> 
  <a href="index.php" class="btn btn-primary">Volver a la pagina principal</a> <?php die;
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
    <?php 
        $nombre = $datos['nombre'];
        $descripcion = $datos['descripcion'];
        $tipo = $datos['tipo'];
        $marca = $datos['marca'];
        $imagen1 = $datos['imagen1'];
        $imagen2 = $datos['imagen2'];
        $precio = $datos['precio'];
        $descuento = $datos['descuento'];
        $cant_vendidas = $datos['cant_vendidas'];
        $estrellas = $datos['estrellas'];
        $fecha_agregado = $datos['fecha_agregado'];
    ?>

    <main class="flex-shrink-0">
    <div class="container" style="background-color:azure">
            <h3 class="my-3">Editar producto: <?php echo $nombre; ?></h3>

            <form action="editar.php?id=<?php echo $id;?>" class="row g-3" method="post" enctype="multipart/form-data">

                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                </div>

                <div class="col-md-8">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" cols="32" rows="8"><?php echo $descripcion; ?></textarea>
                </div>

                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="Juego" <?php if ($tipo == 'Juego') echo 'selected'; ?>>Juego</option>
                        <option value="Consola" <?php if ($tipo == 'Consola') echo 'selected'; ?>>Consola</option>
                        <option value="Ropa" <?php if ($tipo == 'Ropa') echo 'selected'; ?>>Ropa</option>
                        <option value="Accesorio" <?php if ($tipo == 'Accesorio') echo 'selected'; ?>>Accesorio</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" value="<?php echo $marca; ?>">
                </div>
                <div class="col-md-6">
                    <label for="imagen1" class="form-label">Imagen 1</label>
                    <img width="250px" height="250px" src="data:image/jpeg;base64,<?php echo base64_encode($imagen1); ?>" alt="Imagen 1 aun no definida">
                    <br>
                    <input type="file" name="imagen1" placeholder="imagen">
                </div>
                <div class="col-md-6">
                    <label for="imagen2" class="form-label">Imagen 2</label>
                    <img width="250px" height="250px" src="data:image/jpeg;base64,<?php echo base64_encode($imagen2); ?>" alt="Imagen 2 aun no definida">
                    <br>
                    <input type="file" name="imagen2" placeholder="imagen">
                </div>
                <br><br>
                <div class="col-md-5">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php echo $precio; ?>">
                </div>
                <div class="col-md-4">
                    <label for="descuento" class="form-label">Descuento</label>
                    <select class="form-select" id="descuento" name="descuento" required>
                        <option value="0" <?php if ($descuento == '0') echo 'selected'; ?> >SIN DESCUENTO</option>
                        <option value="25" <?php if ($descuento == '25') echo 'selected'; ?>>25% descuento</option>
                        <option value="50" <?php if ($descuento == '50') echo 'selected'; ?> >50% descuento</option>
                        <option value="75" <?php if ($descuento == '75') echo 'selected'; ?> >75% descuento</option>
                        <option value="100" <?php if ($descuento == '100') echo 'selected'; ?>>GRATIS</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="cant.vendidas" class="form-label">Cantidad Vendidas</label>
                    <input type="text" class="form-control" name="cant_vendidas" placeholder="Cantidad vendidas" value="<?php echo $cant_vendidas; ?>">
                </div>
                <div class="col-md-3">
                    <label for="estrellas" class="form-label">Estrellas</label>
                    <input type="text" class="form-control" name="estrellas" placeholder="Estrellas" value="<?php echo $estrellas; ?>">
                </div>
                <div class="col-md-3">
                    <label for="fecha" class="form-label">Fecha agregado</label>
                    <label class="form-control"><?php echo $fecha_agregado; ?></label>
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