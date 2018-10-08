<?php
    define("SELECT","SELECT * FROM tabela_admin WHERE BINARY admin_email=:usuario AND BINARY admin_password=:senha");

    if(isset($_SESSION['usuario']) && (isset($_SESSION['senha']) && (isset($_SESSION['name'])))){
        header('Location:?pagi=carregando');
        exit;
    }

    include_once "db/ustawia-bank.php";
    require_once "models/connection-class.php";

    $connectionB = new connection();
    $conn = $connectionB->connectionBD(BANK,HOST,USER,PASSWORD);

    if (isset($_POST['login'])){
        $usuario = trim(strip_tags($_POST['usuario']));
        $senha = trim(strip_tags($_POST['senha']));

        try{
            $result = $conn->prepare(SELECT);
            $result->bindParam(':usuario',$usuario, PDO::PARAM_STR);
            $result->bindParam(':senha',$senha, PDO::PARAM_STR);
            $result->execute();
            $lista = $result->FETCH(PDO::FETCH_OBJ);
            $contar = $result->rowCount();
            
            if($contar > 0){
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                $_SESSION['name'] = $lista->admin_name;
                $_SESSION['level'] = $lista->admin_level;
                header("Location: ?pagi=carregando");
                exit();
                
            }else{
                echo "<style>.chip{display: block;}</style>";
            }
        }catch(PODException $e){
            echo "ERRO".$ex;
        }
    }

require_once "views/views-login.php";
