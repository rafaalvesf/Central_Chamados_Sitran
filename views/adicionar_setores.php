<?php
        while($linha = mysqli_fetch_array($consulta_setores)){ ?>
		<?php if($linha['Nome_Setor'] == $_GET['add']){ ?>
			
			<div class="ctexto">
				<h2 class="ctexto1">ADICIONAR SETOR</h2>
			</div>
			<div>
			<h3 class="ctexto">Setores Existentes no Momento</h3>
			<table border="1" style="border:4px solid #ccc; width: 100%;">
            <tr>
                <th style="width:12px">ID</th>
                <th style="color:#dc3545">Nome do Setor</th>

            </tr>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_setores)){
            echo '<tr><td class="alicolunas alicolunas1">'.$linha1['Id_Setor'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Nome_Setor'].'</td>';
			}
    		?>
			</table>
			<br><br><br>
			</div>
			<div class="ctexto">
				<h4>Adicionando um Novo Setor.</h4>
			</div>
			<form method="post" action="processa_setorADD.php" class="formulario ctexto">
    			<br>
    			<label>Nome do Setor:</label><br>
    			<input type="text" name="nomesetoradd" placeholder="NOME DO SETOR" class="ctexto" style="text-transform:uppercase">
    			<br><br>
		
    			<div class="ctexto">
    			<input type="submit" value="Salvar" class="button"><br><br>
    			</div>
			</form>
            <?php } ?>	
            <?php } ?>	