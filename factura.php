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
<?php

include("metodo.php");

$URL  = 'http://localhost:5000/pedido';
$rs   = API::GET($URL);
$array  = API::JSON_TO_ARRAY($rs);
?>


<body>


    <h1>Listado de pedidos</h1>

    <?php
    foreach ($array as $product) {
    ?>
        <p class="margin">Fecha : <?php print_r($product['fecha']) ?> <b></b></p>
        <p class="margin"> Estado :<?php print_r($product['estado']) ?> <b></b></p>
        <p class="margin">Estado de pago :<?php print_r($product['statusBuy']) ?> <b></b></p>
        <p class="margin"> Cantidad :<?php print_r($product['cantidad']) ?> <b></b></p>
        <p class="margin">Total :<?php print_r($product['total']) ?>.000<b></b></p>
        <p class="margin">Name :<?php print_r($product['name']) ?> <b></b></p>
        <p class="margin">Email:<?php print_r($product['email']) ?> <b></b></p>
        <p class="margin">Celular :<?php print_r($product['celular']) ?> <b></b></p>
        <p class="margin">Direccion :<?php print_r($product['dereccion']) ?> <b></b></p>

        <hr>
    <?php } ?>

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