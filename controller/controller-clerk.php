<?php

include_once "db/ustawia-bank.php";
require_once "models/connection-class.php";

$connectionB = new connection();
$conn = $connectionB->connectionBD(BANK,HOST,USER,PASSWORD);

include_once 'models/crud-class.php';
$crud = new crud();
$vendaC = $crud->listaVenda($conn);
$vendaContar = 0;

while($listaC = $vendaC->FETCH(PDO::FETCH_OBJ)){
    if($listaC->sale_status == "cosenha"){
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

if(isset($_POST['sair'])){
    session_destroy();
    header("Location: ?pagi=login");
}

require_once 'views/views-clerk.php';