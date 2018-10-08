<?php
    if(!isset($_SESSION['produtos'])){
        $_SESSION['produtos'] = array();
        $_SESSION['valor'] = 0;
    }

    if(!isset($_SESSION['mesa'])){
        $_SESSION['mesa'] = "";
    } 

    include_once "db/ustawia-bank.php";
    require_once "models/connection-class.php";

    $connectionB = new connection();
    $conn = $connectionB->connectionBD(BANK,HOST,USER,PASSWORD);

    include_once 'models/crud-class.php';
    $crud = new crud();
    $listaPedido = $crud->listaProduto($conn);
    $listaProduto = $crud->listaProduto($conn);

    if(isset($_POST['produto'])){
        array_push($_SESSION['produtos'], $_POST['produto']);
        $listaV = $crud->listaProduto($conn);
        while($lisV = $listaV->FETCH(PDO::FETCH_OBJ)){
            if($_POST['produto'] == $lisV->product_id){
                $_SESSION['valor'] = $_SESSION['valor'] + number_format($lisV->product_value,2);
            }
        }
    }

    if(isset($_POST['mesa'])){
        $_SESSION['mesa'] = $_POST['mesa'];
    } 

    if(isset($_POST['salvar'])){
        $mesa = $_SESSION['mesa'];
        $atendente = $_SESSION['name'];
        $valor = $_SESSION['valor'];
        $pedido = $crud->salvarVenda($conn,$mesa,$atendente,$valor);
        
        
        foreach($_SESSION['produtos'] as $list):
            $crud->salvarPedido($conn, $pedido, $list);
        endforeach;
        
        unset($_SESSION['produtos']);
        unset($_SESSION['mesa']);
        header("location: ?pagi=admin");
    }

    if(isset($_GET['volta'])){
        unset($_SESSION['produtos']);
        unset($_SESSION['mesa']);
        header("location: ?pagi=admin");
    }


include_once 'views/views-admin-new.php';