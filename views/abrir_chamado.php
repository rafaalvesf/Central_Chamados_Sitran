<?php 
include 'db.php';
if(!isset($_GET['tratativa'])){ ?>
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

<?php } else {?>
    <?php while($linha = mysqli_fetch_array($consulta_chamados1)){ ?>
    <?php if($linha['Id_Chamado'] == $_GET['tratativa']){ ?>
        <h1 class="ctexto ctexto1"> TRATATIVA DO CHAMADO #<?php echo $linha['Id_Chamado']; ?> </h1>
        <br>
        <div style="border:4px solid #ccc; width: 100%;">
            <h2 class="ctexto ctexto3"><?php echo $linha['Titulo_Chamado']; ?></h2>    <br><br>
            <h4 class="ctexto" style="color:red;text-decoration: underline;">DESCRIÇÃO DO CHAMADO</h4> <br>
            <h6 class="formulario ctexto"><?php echo $linha['Descricao_Chamado']; ?></h6>
            <br>
            <div style="display: flex; text-align:center;">
                <h4 class="ctexto flexstrutura" style="margin: 0 auto">Solicitante: </h4>
                <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $linha['Solicitante_Chamado'];?> - <?php echo $linha['Setor_Solicitante']; ?></h6>
                <h4 class="ctexto flexstrutura" style="margin: 0 auto">Data:</h4>
                <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $linha['Data_Abertura'];?></h6>
                <h4 class="ctexto flexstrutura" style="margin: 0 auto">Responsável:</h4>
                <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $linha['Responsavel_Tecnico'];?></h6>
                <h4 class="ctexto flexstrutura" style="margin: 0 auto">Prioridade:</h4>
                <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $linha['Prioridade'];?></h6>
                <h4 class="ctexto flexstrutura" style="margin: 0 auto">Status:</h4>
                <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $linha['Status'];?></h6>
            </div>
            <br>
            <h4 class="ctexto" style="color:red;text-decoration: underline;">Ações Realizadas</h4> <br>
                <?php 
                    $i=1;
                    while($linha = mysqli_fetch_array($consulta_tratativa)){ ?>
                    <h6 class="formulario ctexto" style="margin: 0 auto">#<?php echo $i?> - <?php echo $linha['Tratativa']; $i++ ?></h6>
                <?php } ?>
                <br>
            </div>
    <?php } ?>
	<?php } ?>
        
<?php } ?>