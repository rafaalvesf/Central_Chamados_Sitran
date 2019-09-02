<?php if(!isset($_GET['editar'])){ ?>
<link rel="stylesheet" href="css/main.css">
<h2 class="ctexto ctexto1">ABRIR NOVO CHAMADO</h2>
<form method="post" action="processa_chamado.php" class="formulario">
	<br>
	<label>Motivo:</label><br>
	<input type="text" name="imotivo" placeholder="Insira o motivo do chamado" style="text-transform:uppercase">
	<br><br>
	<label>Descrição de Chamado:</label><br>
    <input type="text" name="idescricao_chamado" placeholder="Descreva o problema apresentado" class="formdescricao"><br><br>
    <label>Solicitante:</label><br>
    <input type="text" name="isolicitante" placeholder="Escreva o Nome do Solicitante" style="text-transform:uppercase"><br><br>
    <label>Setor do Solicitante:</label><br>
    <input type="text" name="isetor_solicitante" placeholder="Escreva o Setor do Solicitante" style="text-transform:uppercase"><br><br>
    
    <label>Designado à:</label><br>
    <select name="idesignado">
		<option>Selecione um atendente</option>
		<?php 
		while($linha = mysqli_fetch_array($consulta_usuarios)){
			echo '<option value="'.$linha['Nome_Usuario'].'">'.$linha['Nome_Usuario'].'</option>';
		}
		?>
	</select><br><br>
    <label>Prioridade:</label><br>
    <select name="iprioridade">
		<option>MEDIA</option>
        <option>ALTA</option>
        <option>BAIXA</option>        
    </select><br><br>
    
    <div class="ctexto">
    <input type="submit" value="Salvar" class="button">
    </div>
</form>
<?php } ?>