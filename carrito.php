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

<style>
    .Checkout {
        width: 100%;
        height: 100vh;
        display: grid;
        place-items: center;
    }

    .title {
        font-size: var(--lg);
        margin-bottom: 40px;
    }

    .Checkout-container {
        display: grid;
        grid-template-rows: auto 1fr auto;
        width: 600px;
    }

    .my-order-content {
        display: flex;
        flex-direction: column;
    }

    .my-order {
        width: 73%;
    }

    .order {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 16px;
        align-items: center;
        background-color: var(--text-input-field);
        margin-bottom: 24px;
        border-radius: 8px;
        padding: 0 24px;
    }

    .order p:nth-child(1) {
        display: flex;
        flex-direction: column;
    }

    .order p span:nth-child(1) {
        font-size: var(--md);
        font-weight: bold;
    }

    .order p span:nth-child(2) {
        font-size: var(--sm);
        color: var(--very-light-pink);
    }

    .order p:nth-child(2) {
        text-align: end;
        font-weight: bold;
        color: green;
    }

    .shopping-cart {
        display: grid;
        grid-template-columns: auto 1fr auto auto;
        gap: 16px;
        margin-bottom: 24px;
        align-items: center;
    }

    .shopping-cart figure {
        margin: 0;
    }

    .shopping-cart figure img {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        object-fit: cover;
    }

    .shopping-cart p:nth-child(2) {
        color: var(--very-light-pink);
    }

    .shopping-cart p:nth-child(3) {
        font-size: var(--md);
        font-weight: bold;
    }

    .shopping-cart .delete:nth-child(3) {
        font-size: var(--md);
        font-weight: bold;
        color: red;
    }

    .link {
        color: green;
    }
</style>


<?php
include("metodo.php");
$total = 0;
$URL = 'http://localhost:5000/cart';
$rs  = API::GET($URL);
$array  = API::JSON_TO_ARRAY($rs);


$cantidad = count($array);

if (count($array) >= 1) {

    foreach ($array as $product) {
        $total += $product['price'];
    }
}


?>



<body>
    <nav class="navbar" style="background: red">
        <div class="max-width">
            <div class="logo">
                <a href="./index.php" style="color: white">Brasa<span style="color: white">Loca.</span></a>
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
            <h1>Carrito</h1>
        </div>

        <div class="order">
            <p>
                <span>Cantidad de productos : <?php echo count($array) ?></span>
            </p>
            <p> <a class="link" href="index.php">Volver a seguir comprando</a></p>
        </div>
        <?php
        foreach ($array as $product) {
        ?>

            <div class="shopping-cart">
                <figure>
                    <img src="<?php print_r($product['image']) ?>" alt="bike">
                </figure>
                <p><?php print_r($product['name']) ?></p>

                <p><?php print_r($product['price']) ?></p>

                <a href="delete.php?id=<?php echo $product['id'] ?>">Eliminar</a>
            </div>

        <?php
        }

        ?>

        <p> <b>Total :</b> $<?php echo $total ?>.000</p>

        <a class="btn" href="./formDomicilio.php">Pagar &#8594;</a>
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
            <p class="copyright">Copyright 2022 - brasa_loca</p>
        </div>
    </div>
</body>

</html>