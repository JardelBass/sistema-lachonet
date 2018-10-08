<?php 
class connection{
    public function connectionBD($bank,$host,$usar,$passiword){
        try{
            //Conexao ao banco
            $connection = new PDO("mysql:dbname=".$bank."; host=".$host."; charset=utf8",$usar,$passiword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch(PDOException $erro){
            //tratamento de erro de conexao
            throw new Exception("CONEXAO".$erro->getMessage()."</br>");
            exit;
        }
    }
}
