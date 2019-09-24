<script type="text/javascript">
function validateFormedit()
{
    var setor=document.forms["editar"]["isetor_solicitante"].value;
    var motivo=document.forms["editar"]["imotivo"].value;
    var descricao=document.forms["editar_chamado_form"]["idescricao_chamado"].value;
    var solicitante=document.forms["editar_chamado_form"]["isolicitante"].value;
    var designado=document.forms["editar_chamado_form"]["idesignado"].value;

    if(setor==null||setor==""||motivo==null||motivo==""||descricao==null||descricao==""||solicitante==null||solicitante==""||designado=="Selecione um atendente")
    {
        alert("HÁ CAMPOS OBRIGATÓRIOS NÂO PREENCHIDOS");
        return false;

    }
}
</script>
    
    <?php while($linha = mysqli_fetch_array($consulta_chamados)){ ?>
		<?php if($linha['Id_Chamado'] == $_GET['editar']){ ?>
			<link rel="stylesheet" href="css/main.css">
    <h2 class="ctexto ctexto1">EDITAR CHAMADO ABERTO</h2>
    <div class="ctexto">
    <?php $designado = $linha['Responsavel_Tecnico'] ?>
    <form name="editar_chamado_form" action="processa_edita_chamado.php" class="formulario" onsubmit="return validateFormedit()" method="post">
    <input type="hidden" name="Id_Chamado" value="<?php echo $linha['Id_Chamado']; ?>">
    <br>
    <label>Motivo:</label><br>
    <input class="ctexto" type="text" name="imotivo" value="<?php echo $linha['Titulo_Chamado']; ?>" style="text-transform:uppercase">
    <br><br>
    <label>Descrição de Chamado:</label><br>
    <div class="input-group">
        <div class="input-group-prepend">
    </div>
    <textarea class="form-control" aria-label="With textarea" name="idescricao_chamado" style="width: 175px; height: 50px"><?php echo $linha['Descricao_Chamado']; ?></textarea>
    </div><br><br>
    <label>Solicitante:</label><br>
    <input class="ctexto" type="text" name="isolicitante" value="<?php echo $linha['Solicitante_Chamado']; ?>" style="text-transform:uppercase"><br><br>   
    <div class="ctexto">
    <label>Setor do Solicitante:</label><br>
    <select name="isetor_solicitante">
        <option><?php echo $linha['Setor_Solicitante']; ?></option>
        <?php
    while ($linha = mysqli_fetch_array($consulta_setores)) {
        echo '<option class="ctexto" value="' . $linha['Nome_Setor'] . '">' . $linha['Nome_Setor'] . '</option>';
    };

?>
   </select><br><br>
   </div>
   <div class="ctexto">
    <label>Designado à:</label><br>
    <select name="idesignado">
        <option><?php echo $designado ?></option>
        <?php
    while ($linha = mysqli_fetch_array($consulta_usuarios)) {
        echo '<option value="' . $linha['Nome_Usuario'] . '">' . $linha['Nome_Usuario'] . '</option>';
    };

?>
   </select><br><br>
   </div>
    <label>Prioridade:</label><br>
    <select name="iprioridade">
        <option>MEDIA</option>
        <option>ALTA</option>
        <option>BAIXA</option>        
    </select><br><br>
    
    <div class="ctexto">
    <input type="submit" value="Salvar" name="Salvar" class="button">
    </div>
</form>
</div>
			<?php } ?>
    <?php } ?>
    
    
    
    
    
    
    
    
    
    
    
