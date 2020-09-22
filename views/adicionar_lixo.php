<?php if(!isset($_GET['add'])&&!isset($_GET['remove'])){ ?>

<script type="text/javascript">
function validateFormAddItem() {
    var nomeitem = document.forms["form_add_item"]["nome_item"].value;
    var descricao_item = document.forms["form_add_item"]["descricao_item"].value;
    var estoque_minimo = document.forms["form_add_item"]["quantidade_minima"].value;
    if (nomeitem == null || nomeitem == "" || descricao_item == null || descricao_item == "" || estoque_minimo ==
        null || estoque_minimo == "") {
        alert("Há campos em branco");
        return false;

    }
}
</script>

<div class="backformulario">
    <div class="ctexto">
        <h3 class="ctexto1">ADICIONAR UM ÍTEM NA LISTA</h3>
    </div>
    <form name="form_add_item" onsubmit="return validateFormAddItem()" method="post" action="processa_lixo.php"
        class="formulario ctexto">
        <br>
        <label>Nome do Item:</label><br>
        <input type="text" name="nome_item" placeholder="Nome do Item" style="text-transform:uppercase"
            class="ctexto backformularioinput">
        <br><br>
        <label>Descrição:</label><br>
        <textarea class="form-control backformularioinput" aria-label="With textarea" name="descricao_item"
            style="height: 60px" placeholder="Descreva o item a ser adicionado"
            style="text-transform:uppercase"></textarea><br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button">
        </div>
    </form>
</div>


<?php } else if(isset($_GET['add'])) { ?>
<?php while($linha = mysqli_fetch_array($consulta_lixo)){ ?>
<?php if($linha['Nome_Produto'] == $_GET['add']){ ?>

<div class="ctexto">
    <h3 class="ctexto1">ENTRADA DE LIXO NO ESTOQUE</h3>
</div>
<div>
    <div>
        <h4 class="ctexto">Últimas Entradas de Lixo</h4>
        <form method="post">
            <input type="submit" value="Exibir Todos" name="checktodoslx" class="is-white">
        </form>
    </div>
    <table border="0.5" class="table table-hover">
        <tr class="thead-dark">
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Data</th>
            <th>Setor de Origem</th>
            <th>Motivo / Defeito</th>
        </tr>
        <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_entrada_lixo)){

				$datab = new DateTime($linha1['Data_Entrada']);
				$dataa = new DateTime();
				$intervalo = $datab->diff($dataa);

            echo '<tr><td class="alicolunas alicolunas1">'.$linha1['Id_Entrada'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Nome_Produto'].'</td>';
            echo '<td class="alicolunas">'.$linha1['Quantidade'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$intervalo->format('%R%a dias %H:%I').'</td>';
            echo '<td class="alicolunas">'.$linha1['Setor_Origem'].'</td>';
			echo '<td class="alicolunas">'.$linha1['Descricao'].'</td>';
			}
    		?>
    </table>
    <br><br><br>
</div>
<div class="backformulario">
    <div class="ctexto ctexto1">
        <h4>Descartando <?php echo $linha['Nome_Produto']?> ao lixo.</h4>
    </div>
    <form method="post" action="processa_lixoADD.php" class="formulario ctexto">
        <br>
        <label>Quantidade:</label><br>
        <input type="NUMBER" name="quantidadeee" value="1" class="ctexto backformularioinput">
        <br><br>
        <label>Valor Aproximado (UND):</label><br>
        R$<input type="number" name="valor_aproximadoee" class="ctexto backformularioinput" style="width:195px"><br><br>
        <label>Setor de Origem:</label><br>
        <input type="text" name="fornecedoree" class="ctexto backformularioinput"
            placeholder="Escreva o Setor de Origem" style="text-transform:uppercase"><br><br>
        <label>Motivo / Defeito:</label><br>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="backformularioinput" style="height:50px" aria-label="With textarea"
                name="descricaoee"></textarea>
        </div><br><br>
        <input type="hidden" name="nome_produtoee" value="<?php echo $linha['Nome_Produto']?>">
        <br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button"><br><br>
        </div>
    </form>
</div>
<?php } ?>
<?php } ?>
<?php } else { while($linha = mysqli_fetch_array($consulta_lixo)){ ?>
<?php if($linha['Nome_Produto'] == $_GET['remove']){ ?>

<div class="ctexto">
    <h3 class="ctexto1">SAÍDA DE PRODUTO DO LIXO</h3>
</div>
<div>
    <div>
        <h4 class="ctexto">Últimas Saídas de Produtos</h4>
        <form method="post">
            <input type="submit" value="Exibir Todos" name="checktodoslx1" class="is-white">
        </form>
    </div>
    <table border="0.5" class="table table-hover">
        <tr class="thead-dark">
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Data Retirada</th>
            <th>Motivo</th>
        </tr>
        <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_saida_lixo)){
			
			$datab = new DateTime($linha1['Data_Saida']);
			$dataa = new DateTime();
			$intervalo = $datab->diff($dataa);	
				
            echo '<tr><td class="alicolunas alicolunas1">'.$linha1['Id_Saida'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Nome_Produto'].'</td>';
            echo '<td class="alicolunas">'.$linha1['Quantidade'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$intervalo->format('%R%a dias %H:%I').'</td>';
			echo '<td class="alicolunas">'.$linha1['Motivo_Retirada'].'</td>';
			}
    		?>
    </table>
    <br><br><br>
</div>
<div class="backformulario">
    <div class="ctexto ctexto1">
        <h4>Retirando <?php echo $linha['Nome_Produto']?> do Lixo.</h4>
    </div>
    <form method="post" action="processa_lixoEXC.php" class="formulario ctexto">
        <input type="hidden" name="nome_produtose" value="<?php echo $linha['Nome_Produto']?>">
        <br>
        <label>Quantidade:</label><br>
        <input type="NUMBER" name="quantidadese" value="1" class="ctexto backformularioinput">
        <br><br>
        <label>Motivo da Saída:</label><br>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="backformularioinput" style="height:50px" aria-label="With textarea"
                name="descricaose"></textarea>
        </div><br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button"><br><br>
        </div>
    </form>
</div>
<?php } ?>
<?php } ?>
<?php } ?>