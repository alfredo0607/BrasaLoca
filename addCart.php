<?php
include("metodo.php");

if (isset($_GET['id'])) {


    $idProduct = $_GET['id'];
    $URL    = 'http://localhost:5000/hamburquesas/';

    $URLCARD    = 'http://localhost:5000/cart';
    $rs     = API::GET($URL . $idProduct);
    $array  = API::JSON_TO_ARRAY($rs);

    $rs = API::POST($URLCARD, $array, isset($_GET['cant']));
}

?>

<script>
    alert("Producto agregado con exito");
</script>

<?php
Header("Location: index.php");
?>