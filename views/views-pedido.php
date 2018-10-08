<?php if($_SESSION['mesa'] == ""){ ?>

<div class="container cont-pedido">
	<div class="input-field col s12">
		<?php echo $_SESSION["mesa"]; ?>

		<form action="" method="post">
			<div class="col s12 cont-pedido-select bot-addP">
				<label>Escolha uma mesa</label>
				<select id="produto" name="mesa">
					<option value="" disabled selected>MESA</option>
					<option value="M1">MESA-1</option>
					<option value="M2">MESA-2</option>
					<option value="M3">MESA-3</option>
				</select>
				<button class="btn waves-effect waves-light col s12" type="submit" name="action">PRÓXIMO</button>
			</div>
		</form>
	</div>
</div>

<?php }else{ ?>

<div class="container cont-pedido">
	<div class="input-field col s12 list-pedido">
	<i class="material-icons prefix">restaurant</i>
	<label for="">Pedido</label> 
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
	<div class="card-panel red lighten-1 text-li">
		<span class="white-text text-darken-3">TOTAL R$ <?= number_format($_SESSION['valor'],2);?></span>
	</div>
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