<?php if(!isset($_GET['add'])&&!isset($_GET['remove'])){ ?>

<script type="text/javascript">
function validateFormAddItem()
{
	var nomeitem = document.forms["form_add_item"]["nome_item"].value;
	var descricao_item = document.forms["form_add_item"]["descricao_item"].value;
	var estoque_minimo = document.forms["form_add_item"]["quantidade_minima"].value;
	if(nomeitem==null||nomeitem==""|| descricao_item==null||descricao_item=="" || estoque_minimo==null||estoque_minimo=="")
	{
		alert("Há campos em branco");
		return false;

	}
}
</script>

<div class="ctexto">
	<h2 class="ctexto1">ADICIONAR UM ÍTEM NA LISTA</h2>
</div>
<form  name="form_add_item" onsubmit="return validateFormAddItem()" method="post" action="processa_estoque.php" class="formulario ctexto">
    <br>
    <label>Nome do Item:</label><br>
    <input type="text" name="nome_item" placeholder="Nome do Item" style="text-transform:uppercase" class="ctexto">
    <br><br>
    <label>Descrição:</label><br>
    <input type="text" name="descricao_item" placeholder="Descreva o item a ser adicionado" class="formdescricao" style="text-transform:uppercase"><br><br>
    <label>Estoque Mínimo:</label><br>
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
				<h2 class="ctexto1">ENTRADA DE PRODUTO NO ESTOQUE</h2>
			</div>
			<div>
			<h3 class="ctexto">Últimas Entradas de Produtos</h3>
			<table border="1" style="border:4px solid #ccc; width: 100%;">
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data</th>
                <th>Fornecedor</th>
                <th>Observação</th>
            </tr>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_entrada_estoque)){
            echo '<tr><td class="alicolunas alicolunas1">'.$linha1['Id_Entrada'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Nome_Produto'].'</td>';
            echo '<td class="alicolunas">'.$linha1['Quantidade'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Data_Entrada'].'</td>';
            echo '<td class="alicolunas">'.$linha1['Fornecedor'].'</td>';
			echo '<td class="alicolunas">'.$linha1['Descricao'].'</td>';
			}
    		?>
			</table>
			<br><br><br>
			</div>
			<div class="ctexto">
				<h4>Adicionando <?php echo $linha['Nome_Produto']?> ao estoque.</h4>
			</div>
			<form method="post" action="processa_estoqueADD.php" class="formulario ctexto">
    			<br>
    			<label>Quantidade:</label><br>
    			<input type="NUMBER" name="quantidadeee" value="1" class="ctexto">
    			<br><br>
				<label>Estoque Mínimo Necessário(ATUAL):</label><br>
    			<input type="number" name="quantidade_minimaee" value="<?php echo $linha['Quantidade_Minima']?>" class="ctexto"><br><br>
    			<label>Valor Aproximado (UND):</label><br>
				R$<input type="number" name="valor_aproximadoee" class="ctexto"><br><br>
				<label>Fornecedor:</label><br>
				<input type="text" name="fornecedoree" class="ctexto" placeholder="Escreva o Nome do Fornecedor"  style="text-transform:uppercase"><br><br>
				<label>Motivo da Compra:</label><br>
    			<div class="input-group">
        			<div class="input-group-prepend">
    			</div>
    			<textarea class="form-control" aria-label="With textarea" name="descricaoee"></textarea>
    			</div><br><br>
				<input type="hidden" name="nome_produtoee" value="<?php echo $linha['Nome_Produto']?>">
				<br><br>    				
    			<div class="ctexto">
    			<input type="submit" value="Salvar" class="button"><br><br>
    			</div>
			</form>
		<?php } ?>
	<?php } ?>
<?php } else { while($linha = mysqli_fetch_array($consulta_estoque)){ ?>
		<?php if($linha['Nome_Produto'] == $_GET['remove']){ ?>
			
			<div class="ctexto">
				<h2 class="ctexto1">SAÍDA DE PRODUTO NO ESTOQUE</h2>
			</div>
			<div>
			<h3 class="ctexto">Últimas Saídas de Produtos</h3>
			<table border="1" style="border:4px solid #ccc; width: 100%;">
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data Retirada</th>
                <th>Solicitante</th>
				<th>Setor do Solicitante</th>
                <th>Motivo</th>
            </tr>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_saida_estoque)){
            echo '<tr><td class="alicolunas alicolunas1">'.$linha1['Id_Saida'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Nome_Produto'].'</td>';
            echo '<td class="alicolunas">'.$linha1['Quantidade'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Data_Saida'].'</td>';
            echo '<td class="alicolunas">'.$linha1['Solicitante'].'</td>';
			echo '<td class="alicolunas">'.$linha1['Setor_Solicitante'].'</td>';
			echo '<td class="alicolunas">'.$linha1['Motivo'].'</td>';
			}
    		?>
			</table>
			<br><br><br>
			</div>
			<div class="ctexto">
				<h4>Retirando <?php echo $linha['Nome_Produto']?> do estoque.</h4>
			</div>
			<form method="post" action="processa_estoqueEXC.php" class="formulario ctexto">
    			<br>
    			<label>Quantidade:</label><br>
    			<input type="NUMBER" name="quantidadese" value="1" class="ctexto">
    			<br><br>
				<label>Solicitante:</label><br>
				<input type="text" name="solicitantese" class="ctexto" placeholder="Escreva o Nome do Solicitante"  style="text-transform:uppercase"><br><br>
				<label>Setor do Solicitante:</label><br>
				<input type="text" name="setorse" class="ctexto" placeholder="Escreva o Nome do setor"  style="text-transform:uppercase"><br><br>
				<label>Motivo da Saída:</label><br>
    			<div class="input-group">
        			<div class="input-group-prepend">
    			</div>
    			<textarea class="form-control" aria-label="With textarea" name="descricaose"></textarea>
    			</div><br><br>
				<input type="hidden" name="nome_produtose" value="<?php echo $linha['Nome_Produto']?>">
				<br><br>    				
    			<div class="ctexto">
    			<input type="submit" value="Salvar" class="button"><br><br>
    			</div>
			</form>
		<?php } ?>	
	<?php } ?>
<?php } ?>
