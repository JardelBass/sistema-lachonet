<?php
include_once "db/ustawia-bank.php";
require_once "models/connection-class.php";
require_once "models/crud-class.php";

$connectionB = new connection();
$conn = $connectionB->connectionBD(BANK,HOST,USER,PASSWORD);

$crud = new crud();
$vendaC = $crud->listaVenda($conn);
$vendaContar = 0;

while($listaC = $vendaC->FETCH(PDO::FETCH_OBJ)){
    if($listaC->sale_status == "enserado"){
        $vendaContar++;
    }
}

$venda = $crud->listaVenda($conn);
$produto = $crud-> listaProduto($conn);

if(isset($_GET['finalisa'])){
    $id = $_GET['finalisa'];
    $crud->enceraPedido($id, $conn);
    header("location: ?pagi=home");
} 

include_once 'views/views-admin-order-last.php';