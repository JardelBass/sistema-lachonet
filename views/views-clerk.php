<div class="container top-pd">
<?php  if($vendaContar != 0){
            while($listaVenda = $venda->FETCH(PDO::FETCH_OBJ)){
                $vendaCodigo = $listaVenda->sale_code;
                $varID = $listaVenda->sale_id;
                if($listaVenda->sale_status == "cosenha"){
    ?>

    <ul class="collapsible">
        <li>
            <div class="collapsible-header">
                <i class="material-icons col s6">room_service</i>MESA: <?= $listaVenda->sale_table; ?>
                <span class="badge" data-badge-caption="">R$: <?= $listaVenda->sale_value; ?></span>
            </div>
            <div class="collapsible-body">
                <div class="lista-p">
                    <span>ATENDEMENTO</span>
                </div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Atendente</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <tr>
                            <th><?= $listaVenda->sale_clerk; ?></th>
                            <th><?= $listaVenda->sale_hour; ?></th>
                        </tr> 
                    </tbody>
                    
                </table>
                <div class="lista-p">
                    <span>PEDIDOS</span>
                </div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Pedidos</th>
                            <th>Valor</th>
                        </tr>
                    </thead> 
                    <tbody>
                        
                        <?php 
                            $vendaV = $crud->listaV($conn, $vendaCodigo);
                            $vendaC = $vendaV->rowCount();
                    
                            if($vendaC > 0){
                                while($listaV = $vendaV->FETCH(PDO::FETCH_OBJ)){
                                    if($vendaCodigo == $listaV->order_sale){
                                        while($listaP = $produto->FETCH(PDO::FETCH_OBJ)){
                                            if($listaV->order_product == $listaP->product_id){
                                                
                        ?>
                        <tr>
                            <th><?= $listaP->product_name; ?></th>
                            <th><?= $listaP->product_value; ?></th>
                        </tr>
                        <?php
                                        } 
                                    }
                                    $produto = $crud-> listaProduto($conn);
                                }
                            }   
                        }
                        ?>
                         
                    </tbody>
                </table>
                    <a class="waves-effect waves-light btn red" href="?pagi=home&finalisa=<?= $varID ?>">FINALIZAR PEDIDO</a>
            </div>
        </li>
    </ul>

<?php }}}else{ ?>
    <div class="card-panel">
        <span class="cinzento-text text-darken-2">Não a Pedido na lista.</span>
    </div>
<?php }?>
</div>

<!-- Scaled in -->
<a id="scale-demo" href="?pagi=pedido" class="btn-floating btn-large scale-transition add-icon red">
    <i class="material-icons">add</i>
</a>

        



