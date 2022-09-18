<?php
include("metodo.php");


$data = [];
$cantidad = 0;
$total = 0;
$URLCARD    = 'http://localhost:5000/cart';
$URL    = 'http://localhost:5000/pedido';


if (isset($_POST['Enviar'])) {


  $rs = API::GET($URLCARD);
  $array  = API::JSON_TO_ARRAY($rs);
  $cantidad = count($array);

  if (count($array) >= 1) {

    foreach ($array as $product) {
      $total += $product['price'];
    }

    $place = ['fecha' => date("m.d.y"), 'id' => random_int(1, 10000), 'estado' => 'sin entregar', 'statusBuy' => 'pagado', 'cantidad' => $cantidad, 'total' => $total, 'name' => $_POST['name'], 'email' => $_POST['email'], 'celular' => $_POST['celular'], 'dereccion' => $_POST['dereccion']];
    $rs = API::POST($URL, $place);

    Header("Location: factura.php");
  }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <script type="text/javascript" src="javascript.js"></script>
  <title>Brasa loca</title>
</head>

<body>
  <nav class="navbar" style="background: red">
    <div class="max-width">
      <div class="logo">
        <a href="#" style="color: white">Brasa<span style="color: white">Loca.</span></a>
      </div>
      <ul class="menu">
        <li><a href="./index.php" class="menu-btn">Inicio</a></li>
        <li><a href="#footer" class="menu-btn">Contacto</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <section class="contact" id="Contactos">
    <div class="column right">
      <div class="text">Formulario de Domicilio</div>
      <form action="./formDomicilio.php" method="POST">
        <div class="fields">
          <div class="field name">
            <input type="text" placeholder="Nombre" name="name" />
          </div>

          <div class="field email">
            <input type="email" placeholder="Email" name="email" />
          </div>
        </div>

        <div class="fiel">
          <div class="field name">
            <label>Direccion</label>
            <input type="text" placeholder="Direccion" name="direccion" />
          </div>
        </div>

        <div class="fields">
          <div class="field name">
            <input type="number" placeholder="Numero celular" name="celular" />
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Enviar" name="Enviar">

        </div>
      </form>
    </div>
  </section>




  <div class="footer" id="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Descarga Nuestra App</h3>
          <p>
            Disponible para Android <br />
            y Ios
          </p>
          <div class="app-logo">
            <img src="images/play-store.png" alt="" />
            <img src="images/app-store.png" alt="" />
          </div>
        </div>

        <div class="container">
          <div class="box">
            <i class="fas fa-hotel fa-3x all"></i>
            <h3>Ubicacion</h3>
            <p>Barranquilla - Atlantico.</p>
          </div>

          <div class="box">
            <i class="fas fa-phone fa-3x all"></i>
            <h3>Telefono de Contacto</h3>
            <p>(+57)3116534760</p>
          </div>

          <div class="box">
            <i class="fas fa-envelope fa-3x all"></i>
            <h3>Email de Contacto</h3>
            <p>brasa_loca@gmail></p>
          </div>
        </div>
      </div>
      <hr />
      <p class="copyright">Copyright 2020 - brasa_loca</p>
    </div>
  </div>
</body>

</html>