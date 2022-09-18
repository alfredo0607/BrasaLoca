<?php
include("metodo.php");


$data = [];
$cantidad = 0;
$total = 0;
$URLCARD    = 'http://localhost:5000/cart';
$URL    = 'http://localhost:5000/pedido';


if (isset($_POST['enviar'])) {

    $rs = API::GET($URLCARD);
    $array  = API::JSON_TO_ARRAY($rs);
    $cantidad = count($array);

    if (count($array) >= 1) {

        foreach ($array as $product) {
            $total += $product['price'];
        }

        $place = ['fecha' => date("m.d.y"), 'id' => random_int(1, 10000), 'estado' => 'sin entregar', 'statusBuy' => 'pagado', 'cantidad' => $cantidad, 'total' => $total, 'name' => $_POST['name'], 'email' => $_POST['email'], 'celular' => $_POST['celular'], 'dereccion' => $_POST['dereccion']];
        $rs = API::POST($URL, $place);
    }
}


?>

<?php
Header("Location: success.php");
?>

    
