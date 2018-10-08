<div class="col s3 admin-p">
    <div class="card-panel admin-lc red lighten-2">
        <span class="white-text text-darken-2">NOVO PEDIDO</span>
    </div>
    <div class="admin-ppx">
    <?php if($_SESSION['mesa'] == ""){ ?>

    <div class="cont-pedido">
        <div class="input-field col s12">
            <?php echo $_SESSION["mesa"]; ?>

            <form action="" method="post">
                <div class="col s12 cont-pedido-select bot-addP">
                    <label>Escolha</label>
                    <select id="produto" name="mesa">
                        <option value="" disabled selected>PEDIDO</option>
                        <option value="ENTREGA">ENTREGA</option>
                        <option value="VIAGEM">PARA VIAGEM</option>
                    </select>
                    <button class="btn waves-effect waves-light col s12" type="submit" name="action">PRÓXIMO</button>
                </div>
            </form>
        </div>
    </div>

    <?php }else{ ?>

    <div class="cont-pedido">
        <div class="input-field col s12">
            <form action="" method="post">
                <div class="col s12 cont-pedido-select bot-addP">
                    <label>Escolha uma item</label>
                    <select id="produto" name="produto">
                        <option value="" disabled selected>ITEM</option>
                            <?php while($listaP = $listaProduto->FETCH(PDO::FETCH_OBJ)){ ?>
                                <option value="<?= $listaP->product_id; ?>"><?= $listaP->product_name; ?></option>
                            <?php } ?>
                    </select>
                    <button class="btn waves-effect waves-light col s12" type="submit" name="action">ADD ITEM</button>
                </div>
            </form>
        </div>
    </div>
    <?php } ?>
   
    </div>
</div>

<div class="col s8 offset-s4 admin-d">
    <div class="card-panel admin-lc red lighten-2 center-align">
        <span class="white-text text-darken-2">PEDIDO</span>
    </div>
    
    <div class="admin-dd">
        <div class="admin-tp2">
            <table class="striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="list-pedido-th">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($lista = $listaPedido->FETCH(PDO::FETCH_OBJ)){
                            foreach($_SESSION['produtos'] as $list):
                                if($lista->product_id == $list){ 
                                    echo "<tr><td>".$lista->product_name."</td><td class='list-pedido-th'>".$lista->product_value."</td></tr>";
                                }
                            endforeach;
                        }
                    ?>
                </tbody>
            </table>
        </div>
            <div class="card-panel right-align grey text-li admin-total">
                <span class="white-text text-darken-3">TOTAL R$ <?= number_format($_SESSION['valor'],2);?></span>
            </div>
            <a class="waves-effect waves-light btn red col s6" href='?pagi=admin&&nav=novo&&volta'>CÂNCER</a>
            <form action='' method='post'>
                <button class='btn waves-effect waves-light col s6' type='submit' name='salvar'>SALVAR</button>
            </form>
        </div>
    
</div>