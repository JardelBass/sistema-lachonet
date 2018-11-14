<?php
    class crud{
        public function listaV($conn, $codigo){
            $select = "SELECT * FROM tabela_order WHERE BINARY order_sale=:codigo";

            $result = $conn->prepare($select);
            $result->bindParam(':codigo',$codigo, PDO::PARAM_INT);
            $result->execute();
            $postR = $result;
            return $postR;
        }

        public function listaPedido($conn){
            $result = $conn->prepare("SELECT * FROM tabela_order");
            $result->execute();
            $postR = $result;
            return $postR;
        }

        public function listaVenda($conn){
            $result = $conn->prepare("SELECT * FROM tabela_sale");
            $result->execute();
            $postR = $result;
            return $postR;
        }

        public function listaProduto($conn){
            $result = $conn->prepare("SELECT * FROM tabela_product");
            $result->execute();
            $postR = $result;
            return $postR;
        }

        public function salvarVenda($conn,$mesa,$atendente,$valor){
             
            $inset = "INSERT INTO tabela_sale (sale_code, sale_table, sale_clerk, sale_value, sale_status, sale_hour, sale_hour_f, sale_date) VALUES (:codigo, :mesa, :atendente, :valor, :estato, :horaI, :horaF, :data)";

            $dataD = "".date('d')."".date('m')."".date('y');
            $hora = "".date('G')."".date('i')."".date('s');
            $codigo = $mesa."-".$dataD."-".$hora;
            $horaI = date('G:i');
            $horaF = '00:00';
            $data = date('y/m/d');
            $estato = "cosenha";

            try{
                $result = $conn->prepare($inset);
                $result->bindParam(':codigo',$codigo, PDO::PARAM_STR);
                $result->bindParam(':mesa',$mesa, PDO::PARAM_STR);
                $result->bindParam(':atendente',$atendente, PDO::PARAM_STR);
                $result->bindParam(':valor',$valor, PDO::PARAM_STR);
                $result->bindParam(':estato',$estato, PDO::PARAM_STR);
                $result->bindParam(':horaI',$horaI, PDO::PARAM_STR);
                $result->bindParam(':horaF',$horaF, PDO::PARAM_STR);
                $result->bindParam(':data',$data, PDO::PARAM_STR);
                $result->execute();
                $contar = $result->rowCount();
                
                if($contar >0){
                    return $codigo;
                }

            }catch (PDOException $ex){
                echo "ERRO".$ex;
            }
        }

        public function salvarPedido($conn, $codigoV, $codigoP){
            $inset = "INSERT INTO tabela_order (order_sale, order_product, order_date) VALUES (:codigoV, :codigoP, :data)";
            $data = date('d/m/y');

            try{
                $result = $conn->prepare($inset);
                $result->bindParam(':codigoV',$codigoV, PDO::PARAM_STR);
                $result->bindParam(':codigoP',$codigoP, PDO::PARAM_STR);
                $result->bindParam(':data',$data, PDO::PARAM_STR);
                $result->execute();
                $contar = $result->rowCount();
                
                if($contar >0){
                   return $contar;
                }

            }catch (PDOException $ex){
                echo "ERRO".$ex;
            }    
        }

        public function enceraPedido($id, $conn){
            $update = "UPDATE tabela_sale SET  sale_status=:statu WHERE sale_id=:id";
            $status = "enserado";

            $result = $conn->prepare($update);
            $result->bindParam(':statu',$status, PDO::PARAM_STR);
            $result->bindParam(':id',$id, PDO::PARAM_STR);
            $result->execute();
        }

        public function atualisaValor($id, $conn,$valor){
            $update = "UPDATE tabela_sale SET  sale_value=:valor WHERE sale_id=:id";

            $result = $conn->prepare($update);
            $result->bindParam(':valor',$valor, PDO::PARAM_STR);
            $result->bindParam(':id',$id, PDO::PARAM_STR);
            $result->execute();
        }

    }
?>