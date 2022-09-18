<?php

include("metodo.php");

$URL  = 'http://localhost:5000/hamburquesas';
$rs   = API::GET($URL);
$array  = API::JSON_TO_ARRAY($rs);

if (isset($_GET["cant"])) {
  $cant = $_GET["cant"];
  echo "select country is => " . $cant;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script type="text/javascript" src="javascript.js"></script>
  <title>Brasa loca</title>
</head>

<body>
  <nav class="navbar">
    <div class="max-width">
      <div class="logo">
        <a href="#">Brasa<span>Loca.</span></a>
      </div>
      <ul class="menu">
        <li><a href="./index.php" class="menu-btn">Inicio</a></li>
        <li><a href="./carrito.php" class="menu-btn">Carrito</a></li>
        <li><a href="#footer" class="menu-btn">Contacto</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <section class="home" id="home" style="background: black">
    <div class="max-width">
      <div class="home-content">
        <div class="text-1">Pide tu domicilio ahora y difruta de</div>
        <div class="text-2">Nuestras rica</div>
        <div class="text-3"><span class="typing"></span></div>
        <a href="/formReserva.html">Pedir a domicilio</a>
      </div>
    </div>
  </section>

  <div class="conten">
    <h2 class="title">Nuestras Mejores Hamburquesas</h2>
    <figure class="icon-cards mt-3">
      <div class="icon-cards__content">
        <div class="icon-cards__item d-flex align-items-center justify-content-center">
        </div>
        <div class="icon-cards__item d-flex align-items-center justify-content-center">

        </div>
        <div class="icon-cards__item d-flex align-items-center justify-content-center">

        </div>
      </div>
    </figure>
  </div>


  <div class="">
    <div class="small-container">
      <div class="row">
        <?php
        foreach ($array as $product) {
        ?>

          <div class="col-4">
            <a href="product-details.html">
              <img src="<?php print_r($product['image']) ?>" alt="" /></a>
            <h4 class="margin"><?php print_r($product['name']) ?></h4>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>

            <?php if (count($product['content']) > 0) { ?>
              <h4>Incluye :</h4>
              <hr>

              <?php
              foreach ($product['content'] as $conten) {
              ?>
                <li><?php print_r($conten['name']) ?> - <?php print_r($conten['cantidad']) ?></li>
              <?php
              }
              ?>

            <?php } ?>


            <?php if (count($product['sabores']) > 0) { ?>
              <h4>Selecciona tu sabor favorito :</h4>
              <hr>



              <select>
                <?php
                foreach ($product['sabores'] as $sabor) {
                ?>
                  <option><?php print_r($sabor['name']) ?></option>
                <?php
                }
                ?>
              </select>



            <?php } ?>
            <hr>
            <div style="display: flex; margin: 1rem;">
              <p>Cantdad : </p>
              <form>
                <input value="1" onchange="this.form.submit()" name="cant" style="width: 20% ; margin-left: 3px;" type="number" />

              </form>

            </div>

            <p class="margin"><?php print_r($product['price']) ?>COP <b>c/u</b></p>

            <a href="addCart.php?id=<?php echo $product['id'] ?>" class="btn">Agregar al carrito &#8594;</a>
          </div>


        <?php
        }
        ?>
      </div>
    </div>

    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <img src="images/card.png" class="offer-img" alt="" />
          </div>
          <div class="col-2">
            <p>Aceptamos tarjetas de</p>
            <h1>Credito y Debito</h1>
            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Excepturi rerum maiores eveniet minus ut deserunt vitae
            </small>
            <br />
            <a href="/formReserva.html" class="btn">Pedir Domicilio &#8594;</a>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonial">
      <div class="small-container">
        <h2 class="title">Testimonios</h2>
        <div class="row">
          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, esse
              quae ex sequi praesentium fuga voluptatem placeat voluptates odio
              rerum.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/user-2.png" alt="" />
            <h3>Alfredo Dominguez</h3>
          </div>

          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, esse
              quae ex sequi praesentium fuga voluptatem placeat voluptates odio
              rerum.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/user-2.png" alt="" />
            <h3>Anibal Conrrado</h3>
          </div>

          <div class="col-3">
            <i class="fa fa-quote-left"></i>

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, esse
              quae ex sequi praesentium fuga voluptatem placeat voluptates odio
              rerum.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
            <img src="images/user-2.png" alt="" />
            <h3>Chepe Fortuna</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="brands">
      <div class="small-container">
        <h2 class="title">Contamos con las siguientes marcas</h2>
        <div class="row">
          <div class="col-5">
            <img src="images/logo-godrej.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-oppo.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-paypal.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-philips.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-coca-cola.png" alt="" />
          </div>
        </div>
      </div>
    </div>

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
              <h3> Ubicacion</h3>
              <p>Barranquilla - Atlantico.</p>
            </div>

            <div class="box">
              <i class="fas fa-phone fa-3x all"></i>
              <h3>Telefono de Contacto</h3>
              <p>(+57)3012548775</p>
            </div>

            <div class="box ">
              <i class="fas fa-envelope fa-3x all"></i>
              <h3>Email de Contacto</h3>
              <p>brasa_loca@gmail></p>
            </div>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2022 - brasa-loca</p>
      </div>
    </div>

    <script src="./scripts.js"></script>
</body>

</html>