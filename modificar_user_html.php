<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil - Editar</title>
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
$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");
$consulta = "SELECT * FROM usuario WHERE `id` = '{$_SESSION["id"]}'";
$id=$_SESSION["id"];
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
        $correo = $datos['correo'];
        $imagen1 = $datos['icono'];
        $pais = $datos['pais'];
        $ciudad = $datos['ciudad'];
        $contraseña = $datos['contrasena'];
        $fecha_agregado = $datos['fecha_agregado'];
    ?>
    <main class="flex-shrink-0 content">
    <div class="container" style="background-color:azure">
            <h3 class="my-3">Editar usuario: <?php echo $nombre; ?></h3>

            <form action="modificar_user.php?id=<?php echo $id;?>" class="row g-3" method="post" enctype="multipart/form-data">

                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="col-md-4">
                    <label for="correo" class="form-label">Correo</label>
                    <input class="form-control" type="email" placeholder="Direccion de correo" name="correo" id="mail" value="<?php echo $correo; ?>">
                </div>
                <div class="col-md-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" name="contraseña" placeholder="Contraseña" value="<?php echo $contraseña; ?>">
                </div>
                <div class="col-md-12">
                    <label for="imagen1" class="form-label">Foto de perfil</label>
                    <img width="250px" height="250px" src="data:image/jpeg;base64,<?php echo base64_encode($imagen1); ?>" alt="Icono aun no definido">
                    <br>
                    <input type="file" name="imagen1" placeholder="imagen">
                </div>
                <br>
                <div class="col-md-6">
                    <label for="pais" class="form-label">Pais</label>
                    <select class="form-select" name="pais">
                        <option value="Argentina" <?php if ($pais == 'Argentina') echo 'selected'; ?>>Argentina</option>
                        <option value="Bolivia" <?php if ($pais == 'Bolivia') echo 'selected'; ?>>Bolivia</option>
                        <option value="Brasil" <?php if ($pais == 'Brasil') echo 'selected'; ?>>Brasil</option>
                        <option value="Chile" <?php if ($pais == 'Chile') echo 'selected'; ?>>Chile</option>
                        <option value="Colombia" <?php if ($pais == 'Colombia') echo 'selected'; ?>>Colombia</option>
                        <option value="Costa Rica" <?php if ($pais == 'Costa Rica') echo 'selected'; ?>>Costa Rica</option>
                        <option value="Cuba" <?php if ($pais == 'Cuba') echo 'selected'; ?>>Cuba</option>
                        <option value="Ecuador" <?php if ($pais == 'Ecuador') echo 'selected'; ?>>Ecuador</option>
                        <option value="El Salvador" <?php if ($pais == 'El Salvador') echo 'selected'; ?>>El Salvador</option>
                        <option value="Guatemala" <?php if ($pais == 'Guatemala') echo 'selected'; ?>>Guatemala</option>
                        <option value="Honduras" <?php if ($pais == 'Honduras') echo 'selected'; ?>>Honduras</option>
                        <option value="México" <?php if ($pais == 'México') echo 'selected'; ?>>México</option>
                        <option value="Nicaragua" <?php if ($pais == 'Nicaragua') echo 'selected'; ?>>Nicaragua</option>
                        <option value="Panamá" <?php if ($pais == 'Panamá') echo 'selected'; ?>>Panamá</option>
                        <option value="Paraguay" <?php if ($pais == 'Paraguay') echo 'selected'; ?>>Paraguay</option>
                        <option value="Perú" <?php if ($pais == 'Perú') echo 'selected'; ?>>Perú</option>
                        <option value="Puerto Rico" <?php if ($pais == 'Puerto Rico') echo 'selected'; ?>>Puerto Rico</option>
                        <option value="República Dominicana" <?php if ($pais == 'República Dominicana') echo 'selected'; ?>>República Dominicana</option>
                        <option value="Uruguay" <?php if ($pais == 'Uruguay') echo 'selected'; ?>>Uruguay</option>
                        <option value="Venezuela" <?php if ($pais == 'Venezuela') echo 'selected'; ?>>Venezuela</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="marca" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?php echo $ciudad; ?>">
                </div>
                <br><br>
                <div class="col-md-3">
                    <label for="fecha" class="form-label">Fecha de creacion</label>
                    <label class="form-control"><?php echo $fecha_agregado; ?></label>
                </div>

                <div class="col-12">
                    <a href="miperfil.php" class="btn btn-secondary">Regresar</a>
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