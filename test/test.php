<?php
/*
include_once "../db/ustawia-bank.php";
require_once "../models/connection-class.php";
require_once "../models/crud-class.php";

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



?>
<div class="card-panel">
    <span class="grey-text text-darken-2">LISTA DE PEDIDOS</span>
</div>

<?php
if($vendaContar != 0){
    while($listaVenda = $venda->FETCH(PDO::FETCH_OBJ)){
        if($listaVenda->sale_status == "enserado"){
?>

<div class="collapsible-header">
    <a href="?pagi=admin&&nav=pedidos&&id=<?= $listaVenda->sale_code?>" >MESA: <?= $listaVenda->sale_table; ?> R$: <?= $listaVenda->sale_value; ?></a>
</div>

<?php }}}else{ ?>
    <div class="card-panel">
        <span class="cinzento-text text-darken-2">Não a Pedido na lista.</span>
    </div>
<?php }?>

<?php if(isset($_GET['id'])){ ?>
    <h1>Olha Minda</h1>
    <?php
        $venda = $crud->listaVenda($conn);
        $codigo = $_GET['id'];
        while($listaVenda = $venda->FETCH(PDO::FETCH_OBJ)){
            if($listaVenda->sale_code == $codigo){
                echo $listaVenda->sale_clerk;
                echo $listaVenda->sale_hour;
                echo $listaVenda->sale_date;
            }
        }
        
        $vendaV = $crud->listaV($conn, $codigo);
        $vendaC = $vendaV->rowCount();

        if($vendaC > 0){
            while($listaV = $vendaV->FETCH(PDO::FETCH_OBJ)){
                if($codigo == $listaV->order_sale){
                    while($listaP = $produto->FETCH(PDO::FETCH_OBJ)){
                        if($listaV->order_product == $listaP->product_id){
                            
        ?>
        
        <?= $listaP->product_name; ?>
        <?= $listaP->product_value; ?>
        <?php
                        } 
                    }
                    $produto = $crud-> listaProduto($conn);
                }
            }   
        }
        ?>
    
<?php } ?>
</div>

 */
