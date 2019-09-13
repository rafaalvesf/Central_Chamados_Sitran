<?php if(!isset($_GET['add'])&&!isset($_GET['remove'])){ ?>

<div class="ctexto">
	<h2 class="ctexto1">ADICIONAR ESTOQUE</h2>
</div>
<form method="post" action="processa_estoque.php" class="formulario ctexto">
    <br>
    <label>Nome do Item:</label><br>
    <input type="text" name="nome_item" placeholder="Nome do Item" style="text-transform:uppercase" class="ctexto">
    <br><br>
    <label>Descrição:</label><br>
    <input type="text" name="descricao_item" placeholder="Descreva o item a ser adicionado" class="formdescricao" style="text-transform:uppercase"><br><br>
    <label>Quantidade Mímima Desejada:</label><br>
    <input type="number" name="quantidade_minima" class="ctexto"><br><br>
    <br><br>    
    <div class="ctexto">
    <input type="submit" value="Salvar" class="button">
    </div>
</form>


<?php } else if(isset($_GET['add'])) { ?>
	<?php while($linha = mysqli_fetch_array($consulta_estoque)){ ?>
		<?php if($linha['Nome_Produto'] == $_GET['add']){ ?>

			<div class="ctexto">
				<h2 class="ctexto1">ADICIONAR PRODUTO NO ESTOQUE</h2>
			</div>
			<form method="post" action="processa_estoque.php" class="formulario ctexto">
    			<br>
    			<label>Nome do Item:</label><br>
    			<input type="text" name="nome_item" placeholder="Nome do Item" style="text-transform:uppercase" class="ctexto">
    			<br><br>
    			<label>Descrição:</label><br>
    			<input type="text" name="descricao_item" placeholder="Descreva o item a ser adicionado" class="formdescricao" style="text-transform:uppercase"><br><br>
    			<label>Quantidade Mímima Desejada:</label><br>
    			<input type="number" name="quantidade_minima" class="ctexto"><br><br>
    			<br><br>    
    			<div class="ctexto">
    			<input type="submit" value="Salvar" class="button">
    			</div>
			</form>
		<?php } ?>
	<?php } ?>
<?php } else { while($linha = mysqli_fetch_array($consulta_estoque)){ ?>
		<?php if($linha['Nome_Produto'] == $_GET['remove']){ ?>
			<div class="ctexto">
				<h2 class="ctexto1">REMOVER PRODUTO DO ESTOQUE</h2>
			</div>
			<form method="post" action="processa_estoque.php" class="formulario ctexto">
    			<br>
    			<label>Nome do Item:</label><br>
    			<input type="text" name="nome_item" placeholder="Nome do Item" style="text-transform:uppercase" class="ctexto">
    			<br><br>
    			<label>Descrição:</label><br>
    			<input type="text" name="descricao_item" placeholder="Descreva o item a ser adicionado" class="formdescricao" style="text-transform:uppercase"><br><br>
    			<label>Quantidade Mímima Desejada:</label><br>
    			<input type="number" name="quantidade_minima" class="ctexto"><br><br>
    			<br><br>    
    			<div class="ctexto">
    			<input type="submit" value="Salvar" class="button">
    			</div>
			</form>
		<?php } ?>	
	<?php } ?>
<?php } ?>
