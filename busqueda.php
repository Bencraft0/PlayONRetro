<?php 
session_start();
if (isset($_SESSION['correo']) || !empty($_SESSION['correo'])) {
$id = $_SESSION["correo"]; 

$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");
$consulta2 = 'SELECT * FROM usuario';
$usuarios = mysqli_query($conexion, $consulta2);
while ($reg = mysqli_fetch_array($usuarios)) {
    if ($id == $reg['correo'] || $id == $reg['nombre']) {
        $_SESSION["id"] = $reg['id'];
        break;
    }
}

$consulta2 = "SELECT * FROM usuario WHERE `id` = '{$_SESSION["id"]}'";
$consulta2_1 = mysqli_query($conexion, $consulta2);
$_SESSION = mysqli_fetch_array($consulta2_1);
$usuario = $_SESSION;
$usuario_id = $_SESSION['id']; }

$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");
$nombre = $_GET['nombre'];
$tipo = $_GET['tipo'];
$marca = $_GET['marca'];
$ordenarPor = $_GET['ordenar_por']
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PlayONRetro</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" type="text/css" href="style.css">
  
    <style>
        .sincoincidencias {
            display: flex;
            align-items: center;
            width: 100%
        }
        .product-image {
            max-width: 100%;
            width: 150px;
            height: 150px;
        }

        .filter-section {
            border-right: 1px solid #ddd;
            padding-right: 15px;
        }

        .filter-section .form-check {
            padding-left: 0;
        }

        .badge-full {
            background-color: #00cc66;
            color: #fff;
            padding: 0.5em;
            border-radius: 0.25em;
        }

        .badge-arrives-tomorrow {
            background-color: #00cc66;
            color: #fff;
            padding: 0.5em;
            border-radius: 0.25em;
        }

        .list-group-item {
            border: none;
        }

        .badge-sale {
            background-color: #007bff;
            color: #fff;
            padding: 0.25em 0.5em;
            border-radius: 0.25em;
        }

        @media (max-width: 767px) {
            .filter-section {
                border-right: none;
                padding-right: 0;
            }
        }

        .product-card {
            position: relative;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .heart-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            color: #ddd;
            cursor: pointer;
        }

        .heart-icon:hover {
            color: #ff4d4d;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .product-rating span {
            color: #ffd700;
        }

        .badge-discount {
            background-color: #28a745;
            color: white;
            padding: 0.2em 0.4em;
            font-size: 0.875em;
            margin-left: 0.5em;
            border-radius: 0.25em;
        }

        .price {
            font-size: 1.25em;
            color: #28a745;
        }

        .old-price {
            text-decoration: line-through;
            color: #888;
        }

        .col-md-9 {
            padding-left: 20px;
        }

        .col-md-3 h5,
        .col-md-3 ul,
        .col-md-3 p {
            margin-bottom: 15px;
        }

        .product-title {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 0.5em;
        }

        .badge-primary {
            background-color: #007bff;
            color: white;
            padding: 0.2em 0.4em;
            font-size: 0.875em;
            margin-right: 0.5em;
            border-radius: 0.25em;
        }

        .price-cuotas {
            color: #888;
            font-size: 0.875em;
        }
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
            text-align: center;
            padding: 10px;
        }
    </style>
  </head>
  <body>
  <?php 
$conexion = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
mysqli_select_db($conexion, "b13_36951409_proyecto");
                  $consulta1='SELECT * FROM productos';
                  $productos= mysqli_query($conexion, $consulta1);; ?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <defs>
        <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
          <path fill="currentColor" d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
          <path fill="currentColor" d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
          <path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
          <path fill="currentColor" d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
          <path fill="currentColor" d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
          <path fill="currentColor" d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
          <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
        </symbol>
        <symbol xmlns="http://www. w3.org/2000/svg" id="search" viewBox="0 0 24 24">
          <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
          <path fill="currentColor" d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"/>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
          <path fill="currentColor" d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"/>
        </symbol>
      </defs>
    </svg>
<!-- EMPIEZA SITIO -->

    <!-- CARRITO -->
    <?php if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['id'] == '') { ?>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Tu Carrito</span>
            <span class="badge bg-primary rounded-pill">0</span>
          </h4>
          <?php 
          echo "<h3>Para ver los productos que tienes en el carrito debes iniciar sesión en tu cuenta de <strong>PlayONRetro.</strong> </h3>";
          echo '<br><a  class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close" >Volver a la página <strong>PRINCIPAL</strong>.</a>';
          echo '<a href="login_html.php" class="btn btn-success">Iniciar Sesión</a>';
          echo '<br><br><label for="no-tener">¿No tienes una cuenta?</label><a href="signup_html.php" class="btn btn-info"> Registrarse </a>';; ?>
        </div>
      </div>
    </div> <?php } else {?>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Tu Carrito</span>
            <?php
            $usuario_id = $_SESSION['id'];
            $carrito_query = "SELECT * FROM carrito WHERE usuario_id = $usuario_id";
            $carrito_result = mysqli_query($conexion, $carrito_query);
            $cantidad_total= 0;
            while ($carrito2 = mysqli_fetch_array($carrito_result)) {
                $cantidad_total= $cantidad_total + $carrito2['cantidad'];
            }
            ?>
            <span class="badge bg-primary rounded-pill"> <?php echo $cantidad_total; ?> </span>
          </h4>
          <ul class="list-group mb-3">
          <?php 
          $usuario_id = $_SESSION['id'];
          $carrito_query = "SELECT * FROM carrito WHERE usuario_id = $usuario_id";
          $carrito_result = mysqli_query($conexion, $carrito_query);
          $cantidad_total= 0;
          $total_carrito= 0;
          while ($carrito = mysqli_fetch_array($carrito_result)) {
              $producto_id = $carrito['producto_id'];
              $producto_query = "SELECT * FROM productos WHERE id = $producto_id";
              $producto_result = mysqli_query($conexion, $producto_query);

              while ($producto = mysqli_fetch_array($producto_result)) {
          ?>
                <form method="post" action="carrito_borrar.php">
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                      <div>
                          <h6 class="my-0"><?php echo $producto['nombre']; ?></h6>
                          <small class="text-body-secondary"><?php echo $producto['descripcion']; ?></small>
                      </div>
                      <span class="text-body-secondary"><?php echo "$" . $producto['precio'] . "x" . "<strong>" . $carrito['cantidad'] . "</strong>"; ?></span>
                      <?php $total_carrito = $total_carrito + ($producto['precio'] * $carrito['cantidad']); ?>
                      <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
                      <button type="submit" class="btn btn-danger">Borrar</button>
                  </li>
                </form>
          <?php 
              }
          }
          ?>
          </ul>
          <label for="total"><?php echo "<strong>TOTAL a pagar: </strong>" . "$" . $total_carrito; ?></label>
          <button class="w-100 btn btn-primary btn-lg" type="submit">Comprar</button>
        </div>
      </div>
    </div> <?php }; ?>
<!-- SOLO CELU -->
    <!-- LINK BUSQUEDA CELU-->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
      <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Buscar</span>
          </h4>
          <form id="search-form" class="w-100 d-flex align-items-center" action="busqueda.php" method="get">
            <select name="tipo" class="form-select border-0 bg-transparent me-2">
              <option value="">Todas las categorías</option>
              <option value="Consolas">Consolas</option>
              <option value="Juegos">Juegos</option>
              <option value="Ropa">Ropa</option>
              <option value="Accesorios">Accesorios</option>
            </select>
            <br>
            <input type="hidden" name="ordenar_por" value="ORDER BY estrellas DESC">
            <input name="nombre" type="text" class="form-control border-0 bg-transparent me-2" placeholder="¡Puedes buscar entre más de 60 productos!" />
            <br>
            <button type="submit" class="btn border-0 bg-transparent p-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
<!-- LOGO -->
    <header>
  <div class="container-fluid">
    <div class="row py-3 border-bottom">
      <div class="col-sm-4 col-lg-1 text-center text-sm-start">
        <div class="main-logo">
          <a href="index.php">
            <img src="images/logo.png" alt="logo" class="img-fluid">
          </a>
        </div>
      </div>
<!-- BUSCADOR -->      
      <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-6 d-none d-lg-block">
        <div class="search-bar d-flex bg-light p-2 my-2 rounded-4 align-items-center">
          <form id="search-form" class="w-100 d-flex align-items-center" action="busqueda.php" method="get">
            <select name="tipo" class="form-select border-0 bg-transparent me-2">
              <option value="">Todas las categorías</option>
              <option value="Consolas">Consolas</option>
              <option value="Juegos">Juegos</option>
              <option value="Ropa">Ropa</option>
              <option value="Accesorios">Accesorios</option>
            </select>
            <br>
            <input type="hidden" name="ordenar_por" value="ORDER BY estrellas DESC">
            <input name="nombre" type="text" class="form-control border-0 bg-transparent me-2" placeholder="¡Puedes buscar entre más de 60 productos!" />
            <br>
            <button type="submit" class="btn border-0 bg-transparent p-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
              </svg>
            </button>
          </form>
        </div>
      </div>
<!-- INFO CONTACTO -->          
          <div class="col-sm-8 col-lg-5 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
            <div class="support-box text-end d-none d-xl-block">
              <span class="fs-6 text-muted">¿Te ayudamos?</span>
              <a href="https://wa.me/+542915341257" target="_blank">
              <h5 class="mb-0">+54 - 9 2915341257</h5>
              </a>class="mb-0">+54 - 9 2915341257</h5>class="mb-0">+54 - 9 2915341257</h5>class="mb-0">+54 - 9 2915341257</h5>class="mb-0">+54 - 9 2915341257</h5>class="mb-0">+54 - 9 2915341257</h5>class="mb-0">+54 - 9 2915341257</h5>2915341257">
              <h5 class="mb-0">+54 - 9 2915341257</h5>
              </a>2915341257">
              <h5 class="mb-0">+54 - 9 2915341257</h5>
              </a>2915341257">
              <h5 class="mb-0">+54 - 9 2915341257</h5>
              </a>2915341257">
              <h5 class="mb-0">+54 - 9 2915341257</h5>
              </a>2915341257">
              <h5 class="mb-0">+54 - 9 2915341257</h5>
              </a>
            </div>
            <ul class="d-flex justify-content-end list-unstyled m-0">
<!-- FOTO PERFIL -->              
            <li>
        <a href="mi-perfil.php" class="rounded-circle bg-light p-2 mx-1">
        <?php if (!isset($usuario['icono']) || empty($usuario['icono'])) {?>
                <!-- Si no hay un icono en la sesión, se muestra el icono por defecto -->
                <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#user"></use></svg>
            <?php } else { ?>
        <img src="data:image/png;base64, <?php echo base64_encode($usuario['icono']); ?>" alt="NA" width="30px" height="30px">
        <?php }; ?>
        </a>
              </li>
<!-- FAVORITOS-->
              <li>
                <a href="favoritos_html.php" class="rounded-circle bg-light p-2 mx-1">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#heart"></use></svg>
                </a>
              </li>
<!-- SOLO CELU -->
        <!-- CARRITO -->
              <li class="d-lg-none">
                <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#cart"></use></svg>
                </a>
              </li>
        <!-- BUSQUEDA -->
              <li class="d-lg-none">
                <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg>
                </a>
              </li>
            </ul>
<!-- CARRITO -->
            <div class="cart text-end d-none d-lg-block dropdown">
              <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <span class="fs-6 text-muted dropdown-toggle">Tu Carrito</span>
                <span class="cart-total fs-5 fw-bold"><?php if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['id'] == '') { echo "$ " . 0 . ".00"; } else echo "$ " . $total_carrito . ".00";?> </span>
              </button>
            </div>
<!-- BOTON INICIAR SESION -->
            <?php if (isset($_SESSION['id'])) { ?>
              <a class="btn btn-dark btn-lg" href="cerrarsesion.php">Cerrar Sesión</a>
            <?php } else { ?>
            <a class="btn btn-dark btn-lg" href="login_html.php">Iniciar Sesion</a>
            <?php }; ?>
          </div>

        </div>
      </div>
      <div class="container-fluid">
        <div class="row py-3">
          <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
            <nav class="main-menu d-flex navbar navbar-expand-lg">

              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header justify-content-center">
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
<!-- NAVEGADOR -->
                <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                    <li class="nav-item active">
                      <a href="consolas.php" class="nav-link">Consolas</a>
                    </li>  
                    <li class="nav-item dropdown">
                      <a href="juegos.php" class="nav-link">Juegos</a>
                    </li>
                    <li class="nav-item">
                      <a href="ropa.php" class="nav-link">Ropa</a>
                    </li>
                    <li class="nav-item">
                      <a href="accesorios.php" class="nav-link">Accesorios</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Marcas</a>
                      <ul class="dropdown-menu" aria-labelledby="pages">
                      <form method="get" action="marca.php">
                      <?php
                      // La consulta SQL
                      $sql = "SELECT DISTINCT marca FROM productos";

                      // Ejecutar la consulta
                      $result = $conexion->query($sql);

                      while ($row = $result->fetch_assoc()) {
                          $marca2 = $row["marca"];
                          // Contar el número de productos para cada marca
                          $consulta2 = "SELECT COUNT(*) AS total FROM productos WHERE marca = '$marca2'";
                          $resultado2 = $conexion->query($consulta2);
                          $datos2 = $resultado2->fetch_assoc();
                          $numeromarca = $datos2['total'];
                          
                          echo "<li><button type='submit' name='marca' value='$marca2' class='dropdown-item'>$marca2 ($numeromarca)</button></li>";
                      }
                      ?>
                </form>
                        <li><a href="playonretro.php" class="dropdown-item">PlayONRetro<span class="badge bg-success text-dark ms-2">Propia</span></a></li>
                      </ul>
                    </li>

                  </ul>
                
                </div>

              </div>

            </nav>
          </div>
        </div>
      </div>
    </header>

<!-- TODOS LOS PRODUCTOS-->
<?php
// Aseguramos que la conexión a la base de datos esté definida
if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Inicializamos la consulta base
$consulta1 = "SELECT * FROM productos WHERE 1=1";

// Añadimos condiciones dependiendo de las variables que estén definidas
if (isset($nombre) && $nombre != '') {
  $consulta1 .= " AND nombre LIKE '%$nombre%'";
}

if (isset($tipo) && $tipo != '') {
  $consulta1 .= " AND tipo = '$tipo'";
}

if (isset($marca) && $marca != '') {
  $consulta1 .= " AND marca = '$marca'";
}
$consulta1 .= " " . $ordenarPor;
// Ejecutamos la consulta
$productos = mysqli_query($conexion, $consulta1);
?>

<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 filter-section">
            <form method="get" action="busqueda.php">
    <h5>Filtros</h5>
    <input name="nombre" type="hidden" value="<?php echo htmlspecialchars($nombre, ENT_QUOTES); ?>">
    <input name="tipo" type="hidden" value="<?php echo htmlspecialchars($tipo, ENT_QUOTES); ?>">
    <input name="marca" type="hidden" value="<?php echo htmlspecialchars($marca, ENT_QUOTES); ?>">
    <div class="list-group">
        <div class="form-check form-switch list-group-item">
            <input class="form-check-input" type="checkbox" id="freeShippingOption">
            <label class="form-check-label" for="freeShippingOption">Envío gratis</label>
        </div>
        <fieldset>
            <legend>Categorías</legend>
            <ul class="list-unstyled">
                <?php
                $sql = "SELECT DISTINCT tipo FROM productos";
                $result = $conexion->query($sql);
                ?>
                <li>
                    <div>
                        <input type="radio" id="tipo_none" name="tipo" value="" <?php echo ($tipo == '') ? 'checked' : ''; ?>>
                        <label for="tipo_none">Todos las categorias</label>
                    </div>
                </li>
                <?php while ($row = $result->fetch_assoc()) {
                    $tipo2 = $row["tipo"];
                    $consulta2 = "SELECT * FROM productos WHERE tipo = '$tipo2'";
                    if (isset($nombre) && $nombre != '') {
                      $consulta2 .= " AND nombre LIKE '%$nombre%'";
                    }
                    if (isset($marca) && $marca != '') {
                      $consulta2 .= " AND marca = '$marca'";
                    }
                    $producto_tipo = mysqli_query($conexion, $consulta2);
                ?>
                <li>
                    <div>
                        <input type="radio" id="tipo_<?php echo $tipo2; ?>" name="tipo" value="<?php echo htmlspecialchars($tipo2, ENT_QUOTES); ?>" <?php echo ($tipo2 == $tipo) ? 'checked' : ''; ?>>
                        <label for="tipo_<?php echo $tipo2; ?>"><?php echo $tipo2 . " (" . mysqli_num_rows($producto_tipo) . ")"; ?></label>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </fieldset>
    </div>
    <fieldset>
        <legend>Marcas</legend>
        <ul class="list-unstyled">
            <?php
            $sql = "SELECT DISTINCT marca FROM productos";
            $result = $conexion->query($sql);
            ?>
            <li>
                <div>
                    <input type="radio" id="marca_none" name="marca" value="" <?php echo ($marca == '') ? 'checked' : ''; ?>>
                    <label for="marca_none">Todas las marcas</label>
                </div>
            </li>
            <?php while ($row = $result->fetch_assoc()) {
                $marca2 = $row["marca"];
                $consulta2 = "SELECT * FROM productos WHERE marca = '$marca2'";
                if (isset($nombre) && $nombre != '') {
                  $consulta2 .= " AND nombre LIKE '%$nombre%'";
                }
                if (isset($tipo) && $tipo != '') {
                  $consulta2 .= " AND tipo = '$tipo'";
                }
                $producto_marca = mysqli_query($conexion, $consulta2);
            ?>
            <li>
                <div>
                    <input type="radio" id="marca_<?php echo $marca2; ?>" name="marca" value="<?php echo htmlspecialchars($marca2, ENT_QUOTES); ?>" <?php echo ($marca2 == $marca) ? 'checked' : ''; ?>>
                    <label for="marca_<?php echo $marca2; ?>"><?php echo $marca2 . " (" . mysqli_num_rows($producto_marca) . ")"; ?></label>
                </div>
            </li>
            <?php } ?>
        </ul>
    </fieldset>
    <li>
        <button type="submit">Aplicar filtros</button>
    </li>
</form>
            </div>
            <div class="col-md-9">
                <form action="busqueda.php">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h5><?php echo $nombre; ?></h5>
                        <small><?php echo mysqli_num_rows($productos); ?> resultados</small>
                        <div>
                            Ordenar por
                            <select name="ordenar_por" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                              <option value="ORDER BY estrellas DESC" <?php echo ($ordenarPor == 'ORDER BY estrellas DESC') ? 'selected' : ''; ?>>Mas relevantes</option>
                              <option value="ORDER BY precio ASC" <?php echo ($ordenarPor == 'ORDER BY precio ASC') ? 'selected' : ''; ?>>Mas Barato</option>
                              <option value="ORDER BY precio DESC" <?php echo ($ordenarPor == 'ORDER BY precio DESC') ? 'selected' : ''; ?>>Mas Caro</option>
                              <option value="ORDER BY nombre ASC" <?php echo ($ordenarPor == 'ORDER BY nombre ASC') ? 'selected' : ''; ?>>Nombre</option>
                              <option value="ORDER BY fecha_agregado DESC" <?php echo ($ordenarPor == 'ORDER BY fecha_agregado DESC') ? 'selected' : ''; ?>>Mas Reciente</option>
                            </select>
                        </div>
                    </div>
                </form>
                <hr>
                <?php
                // Verificamos si hay resultados
                if (mysqli_num_rows($productos) <= 0) { ?>
                  <div class="sincoincidencias">
                      <h2>No hay productos disponibles</h2>
                      <?php if (!empty($nombre)) { ?>
                        <h2>, con el nombre: "<?php echo $nombre;?>"</h2>
                    <?php } ?>
                      <?php if (!empty($tipo)) { ?>
                          <h2>, en la categoría "<?php echo $tipo;?>"</h2>
                      <?php } ?>
                      <?php if (!empty($marca)) { ?>
                          <h2>, de la marca "<?php echo $marca;?>"</h2>
                      <?php } ?>
                  </div>
                <?php } else { ?>
                <?php while ($reg = mysqli_fetch_assoc($productos)) { ?>
                    <div class="row product-card">
                        <form method="post" action="favoritos.php">
                            <?php $producto_id = $reg['id']; ?>
                            <input name="id" type="hidden" value="<?php echo $reg['id']; ?>">
                            <button type="submit" class="bi bi-heart heart-icon btn-wishlist <?php 
                                $consultafav = "SELECT * FROM favoritos WHERE usuario_id='$usuario_id' AND producto_id='$producto_id'";
                                $verificacion = mysqli_query($conexion, $consultafav);
                                if (mysqli_num_rows($verificacion) > 0) {
                                    echo "active";
                                }
                                ?>">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </button>
                        </form>
                        <div class="col-4 col-sm-3 col-md-2">
                            <img src="data:image/jpg;base64,<?php echo base64_encode($reg['imagen1']); ?>" alt="<?php echo $reg['nombre']; ?>" class="product-image">
                        </div>
                        <div class="col-8 col-sm-9 col-md-10">
                            <h4 class="product-title"><?php echo $reg['nombre']; ?></h4>
                            <?php if ($reg['descuento'] > 0) { ?>
                                <div class="old-price">$<?php echo number_format($reg['precio']); ?></div>
                                <div class="price">$<?php echo number_format($reg['precio'] * ((100 - $reg['descuento']) / 100), 0); ?> <span class="badge-discount"><?php echo $reg['descuento']; ?>% OFF</span></div>
                            <?php } else { ?>
                                <br>
                                <div><h2>$<?php echo number_format($reg['precio']); ?></h2></div>
                            <?php } ?>
                            <form method="post" action="carrito.php">
                                <div style="width: 100px;" class="input-group product-qty">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                            <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="cantidad" class="form-control input-number" value="1">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                            <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                        </button>
                                    </span>
                                </div>
                                <div>
                                    <input name="id" type="hidden" value="<?php echo $reg['id']; ?>">
                                    <button style="border-radius: 0px;" type="submit"><span class="badge-full">Agregar al Carrito</span></button>
                                    <div class="product-rating mt-2">
                                        <span><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg>
                                        <?php echo $reg['estrellas']; ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>


    <footer class="py-5">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <img src="images/logo.png" alt="logo">
              <div class="social-links mt-5">
                <ul class="d-flex list-unstyled gap-2">
                  <li>
                    <a href="https://www.facebook.com/benja.bohn/" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M15.12 5.32H17V2.14A26.11 26.11 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.05.28-1.73 1.76-1.73Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://x.com/Bencraft0" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M22.991 3.95a1 1 0 0 0-1.51-.86a7.48 7.48 0 0 1-1.874.794a5.152 5.152 0 0 0-3.374-1.242a5.232 5.232 0 0 0-5.223 5.063a11.032 11.032 0 0 1-6.814-3.924a1.012 1.012 0 0 0-.857-.365a.999.999 0 0 0-.785.5a5.276 5.276 0 0 0-.242 4.769l-.002.001a1.041 1.041 0 0 0-.496.89a3.042 3.042 0 0 0 .027.439a5.185 5.185 0 0 0 1.568 3.312a.998.998 0 0 0-.066.77a5.204 5.204 0 0 0 2.362 2.922a7.465 7.465 0 0 1-3.59.448A1 1 0 0 0 1.45 19.3a12.942 12.942 0 0 0 7.01 2.061a12.788 12.788 0 0 0 12.465-9.363a12.822 12.822 0 0 0 .535-3.646l-.001-.2a5.77 5.77 0 0 0 1.532-4.202Zm-3.306 3.212a.995.995 0 0 0-.234.702c.01.165.009.331.009.488a10.824 10.824 0 0 1-.454 3.08a10.685 10.685 0 0 1-10.546 7.93a10.938 10.938 0 0 1-2.55-.301a9.48 9.48 0 0 0 2.942-1.564a1 1 0 0 0-.602-1.786a3.208 3.208 0 0 1-2.214-.935q.224-.042.445-.105a1 1 0 0 0-.08-1.943a3.198 3.198 0 0 1-2.25-1.726a5.3 5.3 0 0 0 .545.046a1.02 1.02 0 0 0 .984-.696a1 1 0 0 0-.4-1.137a3.196 3.196 0 0 1-1.425-2.673c0-.066.002-.133.006-.198a13.014 13.014 0 0 0 8.21 3.48a1.02 1.02 0 0 0 .817-.36a1 1 0 0 0 .206-.867a3.157 3.157 0 0 1-.087-.729a3.23 3.23 0 0 1 3.226-3.226a3.184 3.184 0 0 1 2.345 1.02a.993.993 0 0 0 .921.298a9.27 9.27 0 0 0 1.212-.322a6.681 6.681 0 0 1-1.026 1.524Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="www.youtube.com/@BENCRAFT0" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M23 9.71a8.5 8.5 0 0 0-.91-4.13a2.92 2.92 0 0 0-1.72-1A78.36 78.36 0 0 0 12 4.27a78.45 78.45 0 0 0-8.34.3a2.87 2.87 0 0 0-1.46.74c-.9.83-1 2.25-1.1 3.45a48.29 48.29 0 0 0 0 6.48a9.55 9.55 0 0 0 .3 2a3.14 3.14 0 0 0 .71 1.36a2.86 2.86 0 0 0 1.49.78a45.18 45.18 0 0 0 6.5.33c3.5.05 6.57 0 10.2-.28a2.88 2.88 0 0 0 1.53-.78a2.49 2.49 0 0 0 .61-1a10.58 10.58 0 0 0 .52-3.4c.04-.56.04-3.94.04-4.54ZM9.74 14.85V8.66l5.92 3.11c-1.66.92-3.85 1.96-5.92 3.08Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/benja.bohn/" class="btn btn-outline-light">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17.34 5.46a1.2 1.2 0 1 0 1.2 1.2a1.2 1.2 0 0 0-1.2-1.2Zm4.6 2.42a7.59 7.59 0 0 0-.46-2.43a4.94 4.94 0 0 0-1.16-1.77a4.7 4.7 0 0 0-1.77-1.15a7.3 7.3 0 0 0-2.43-.47C15.06 2 14.72 2 12 2s-3.06 0-4.12.06a7.3 7.3 0 0 0-2.43.47a4.78 4.78 0 0 0-1.77 1.15a4.7 4.7 0 0 0-1.15 1.77a7.3 7.3 0 0 0-.47 2.43C2 8.94 2 9.28 2 12s0 3.06.06 4.12a7.3 7.3 0 0 0 .47 2.43a4.7 4.7 0 0 0 1.15 1.77a4.78 4.78 0 0 0 1.77 1.15a7.3 7.3 0 0 0 2.43.47C8.94 22 9.28 22 12 22s3.06 0 4.12-.06a7.3 7.3 0 0 0 2.43-.47a4.7 4.7 0 0 0 1.77-1.15a4.85 4.85 0 0 0 1.16-1.77a7.59 7.59 0 0 0 .46-2.43c0-1.06.06-1.4.06-4.12s0-3.06-.06-4.12ZM20.14 16a5.61 5.61 0 0 1-.34 1.86a3.06 3.06 0 0 1-.75 1.15a3.19 3.19 0 0 1-1.15.75a5.61 5.61 0 0 1-1.86.34c-1 .05-1.37.06-4 .06s-3 0-4-.06a5.73 5.73 0 0 1-1.94-.3a3.27 3.27 0 0 1-1.1-.75a3 3 0 0 1-.74-1.15a5.54 5.54 0 0 1-.4-1.9c0-1-.06-1.37-.06-4s0-3 .06-4a5.54 5.54 0 0 1 .35-1.9A3 3 0 0 1 5 5a3.14 3.14 0 0 1 1.1-.8A5.73 5.73 0 0 1 8 3.86c1 0 1.37-.06 4-.06s3 0 4 .06a5.61 5.61 0 0 1 1.86.34a3.06 3.06 0 0 1 1.19.8a3.06 3.06 0 0 1 .75 1.1a5.61 5.61 0 0 1 .34 1.9c.05 1 .06 1.37.06 4s-.01 3-.06 4ZM12 6.87A5.13 5.13 0 1 0 17.14 12A5.12 5.12 0 0 0 12 6.87Zm0 8.46A3.33 3.33 0 1 1 15.33 12A3.33 3.33 0 0 1 12 15.33Z"/></svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://wa.me/+542915341257" class="btn btn-outline-light">
                      <img src="https://svgsilh.com/svg/2071331.svg" width="16" height="16" alt="whatsapp">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer-menu">
              <h5 class="widget-title">Suscribete</h5>
              <p>Suscríbase a nuestro boletín para recibir información actualizada sobre nuestras grandes ofertas.</p>
              <form class="d-flex mt-3 gap-0" role="newsletter">
                <input class="form-control rounded-start rounded-0 bg-light" type="email" placeholder="Correo electronico" aria-label="Email Address">
                <button class="btn btn-dark rounded-end rounded-0" type="submit">Suscribirse</button>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
    <div id="footer-bottom">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 copyright">
            <p>©2024 PlayONRetro. Todos los derechos reservados.</p>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>