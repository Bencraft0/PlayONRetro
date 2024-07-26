<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
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
            <h3 class="my-3" id="titulo">Productos</h3>
            <a href="index.php" class="btn btn-secondary">Volver</a>
            <a href="nuevo_html.php" class="btn btn-success">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Imagen 1</th>
                        <th scope="col">Imagen 2</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Cant. Vendidas</th>
                        <th scope="col">Estrellas</th>
                        <th scope="col">Fecha Agregado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <?php
$conexion = mysqli_connect("sql302.byethost13.comer.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");
                    $consulta='SELECT * FROM productos';
                    $datos= mysqli_query($conexion, $consulta);
                ?>
                <tbody>
                <?php while ($reg=mysqli_fetch_array($datos)) { ?>
                    <tr>
                        <td><?php echo $reg['id']; ?></td>
                        <td><?php echo $reg['nombre']; ?></td>
                        <td><?php echo $reg['descripcion']; ?></td>
                        <td><?php echo $reg['tipo']; ?></td>
                        <td><?php echo $reg['marca']; ?></td>
                        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen1'])?>" alt="" width="100px" height="100px"></td>
                        <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen2'])?>" alt="" width="100px" height="100px"></td>
                        <td><?php echo $reg['precio']; ?></td>
                        <td><?php echo $reg['descuento']; ?></td>
                        <td><?php echo $reg['cant_vendidas']; ?></td>
                        <td><?php echo $reg['estrellas']; ?></td>
                        <td><?php echo $reg['fecha_agregado']; ?></td>
                        <td>
                        <a href="editar_html.php?id=<?php echo $reg['id'];?>" class="btn btn-warning btn-sm me-2">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#eliminaModal" data-bs-id="<?php echo $reg['id']; ?>">Eliminar</button>
                        </td>
                    </tr>
                    <?php }; ?>

                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary"> 2024 | PlayONRetro</span>
        </div>
    </footer>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>

        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const id = button.getAttribute('data-bs-id')

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina')
                form.setAttribute('action', 'eliminar.php?id=' + id)
            })
        }
    </script>

</body>

</html>