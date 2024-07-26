<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayONRetro</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  </head>
<body>
    
    <?php 
    session_start();
    if (empty($_SESSION['id'])) {
        echo "<h2>Para agregar objetos al carrito debes iniciar sesión en tu cuenta de </h2><h1>PlayONRetro.</h1>"; 
        ?> 
        <br> 
        <a href="index.php" class="btn btn-secondary">Volver a la pagina <strong>PRINCIPAL</strong>.</a>
        <a href="login_html.php" class="btn btn-success">Iniciar Sesion</a>
        <br><br>
        <label for="no-tener">¿No tienes una cuenta?</label><a href="signup_html.php" class="btn btn-info"> Registrarse </a>
        <?php
        die; 
    }

    $conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
    mysqli_select_db($conexion, "b13_36951409_proyecto");

    $producto_id = $_POST['producto_id'];
    $usuario_id = $_SESSION['id'];

    $consulta = "DELETE FROM carrito WHERE usuario_id = '$usuario_id' AND producto_id = '$producto_id'";
    mysqli_query($conexion, $consulta);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    ?>

</body>
</html>