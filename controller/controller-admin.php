<?php

if(isset($_GET['sair'])){
    session_destroy();
    header("Location: ?pagi=login");
}

if(isset($_GET['nav'])){
    $pag = $_GET['nav'];

    if($pag == "pedidos"){
        $pagina = "controller/controller-admin-order.php";
    }else if($pag == "novo"){
        $pagina = "controller/controller-admin-new.php";
    }else if($pag == "lanchonete"){
        $pagina = "controller/controller-admin-snackbar.php";
    }else if($pag == "produtos"){
        $pagina = "controller/controller-admin-product.php";
    }else if($pag == "usuario"){
        $pagina = "controller/controller-admin-user.php";
    }if($pag == "final"){
        $pagina = "controller/controller-admin-order-last.php";
    }      
}else{
    $pagina = "controller/controller-admin-order.php";
}

require_once 'views/views-admin.php';