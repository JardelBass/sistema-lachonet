<div class="col s3 admin-p">
    <div class="card-panel admin-lc red lighten-2">
        <span class="white-text text-darken-2">LISTA DE PEDIDOS FINALIZADO</span>
    </div>
    <div class="collection admin-pc">
    <?php  
    if($vendaContar != 0){
        while($listaVenda = $venda->FETCH(PDO::FETCH_OBJ)){
            if($listaVenda->sale_status == "enserado"){
        ?>
        <a href="?pagi=admin&&nav=final&&id=<?= $listaVenda->sale_code?>" class="collection-item black-text " id="<?= $listaVenda->sale_code?>"><i class="material-icons right">send</i>MESA: <?= $listaVenda->sale_table; ?></span></a>   
        <?php }}}else{ ?>
            <div class="card-panel">
                <span class="cinzento-text text-darken-2">Não a Pedido na lista.</span>
            </div>
        <?php }?>
    </div>
</div>

<div class="col s8 offset-s4 admin-d">
    <?php if(isset($_GET['id'])){ $id = $_GET['id']; ?>
        <style><?= "#".$id ?>{background-color: #ffcdd2  ;}
        </style>
        <div class="card-panel admin-lc red lighten-2 center-align">
            <span class="white-text text-darken-2">DADOS PEDIDO</span>
        </div>
        <div class="admin-dd">
        <?php
            $venda = $crud->listaVenda($conn);
            $codigo = $_GET['id'];
            while($listaVenda = $venda->FETCH(PDO::FETCH_OBJ)){
                if($listaVenda->sale_code == $codigo){
        ?>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Atendente</th>
                            <th>Hora inicial</th>
                            <th>Data</th>
                            <th>Valor total</th>
                        </tr>
                    </thead> 
                    <tbody>  
                        <tr>
                            <th><?= $listaVenda->sale_clerk; ?></th>     
                            <th><?= $listaVenda->sale_hour; ?></th>
                            <th><?= $listaVenda->sale_date; ?></th>
                            <th>R$: <?= $listaVenda->sale_value; ?></th>
                        </tr>
                    <tbody>
                </table>
                <div class="card-panel admin-lc black-text teal lighten-4 center-align">
                    <span>PEDIDOS</span>
                </div>
        <?php
                }
            }
        ?>
        <div class="admin-tp">
        <table class="striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pedidos</th>
                            <th>Valor</th>
                        </tr>
                    </thead> 
                    <tbody>
        <?php    
            $vendaV = $crud->listaV($conn, $codigo);
            $vendaC = $vendaV->rowCount();
            $numero = 1;
            if($vendaC > 0){
                while($listaV = $vendaV->FETCH(PDO::FETCH_OBJ)){
                    if($codigo == $listaV->order_sale){
                        while($listaP = $produto->FETCH(PDO::FETCH_OBJ)){
                            if($listaV->order_product == $listaP->product_id){
                                
        ?>
            
            <tr>
                <th><?= $numero; ?></th>
                <th><?= $listaP->product_name; ?></th>
                <th><?= $listaP->product_value; ?></th>
            </tr>
            <?php           $numero++;       
                            }  
                        }
                        $produto = $crud-> listaProduto($conn);
                    }
                }   
            }
            ?>
            </tbody>
        </table>
        </div>
    </div>
    <?php } ?>
</div>

        
