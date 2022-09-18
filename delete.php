<?php
include("metodo.php");
if (isset($_GET['id'])) {

    $idProduct = $_GET['id'];

    $URLCARD    = 'http://localhost:5000/cart/';
    $rs = API::DELETE($URLCARD . $idProduct);
}

?>

<?php
Header("Location: carrito.php");
?>

    
