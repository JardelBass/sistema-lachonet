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
        if(!$_SESSION['mesa'] == ""){
            $mesa = $_SESSION['mesa'];
            $atendente = $_SESSION['name'];
            $valor = $_SESSION['valor'];

            $listaAt = $crud->listaVenda($conn);
            while($lisAtx = $listaAt->FETCH(PDO::FETCH_OBJ)){
                if($lisAtx->sale_status == "cosenha"){
                    if($lisAtx->sale_table == $mesa){
                        $id = $lisAtx->sale_id;
                        $codigo = $lisAtx->sale_code;
                        $valorT = $lisAtx->sale_value;
                    }
                }
            }

            if(!$codigo == ""){
                $pedido = $codigo;
                $valorTotal = $valorT + $valor; 
                $crud->atualisaValor($id, $conn,$valorTotal);
            }else{
                $pedido = $crud->salvarVenda($conn,$mesa,$atendente,$valor);
            }
            
            foreach($_SESSION['produtos'] as $list):
                $crud->salvarPedido($conn, $pedido, $list);
            endforeach;
            
            unset($_SESSION['produtos']);
            unset($_SESSION['mesa']);
            header("location: ?pagi=home");
        }
    }
    
    if(isset($_REQUEST['volta'])){
        unset($_SESSION['produtos']);
        unset($_SESSION['mesa']);
        header("location: ?pagi=home");
    }

    include_once "views/views-pedido.php";
?>