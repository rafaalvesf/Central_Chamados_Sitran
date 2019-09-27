<?php
include 'db.php';
if (!isset($_GET['tratativa'])) {
?>

<script type="text/javascript">
function validateForm()
{
    var setor=document.forms["abrir_chamado_form"]["isetor_solicitante"].value;
    var motivo=document.forms["abrir_chamado_form"]["imotivo"].value;
    var descricao=document.forms["abrir_chamado_form"]["idescricao_chamado"].value;
    var solicitante=document.forms["abrir_chamado_form"]["isolicitante"].value;
    var designado=document.forms["abrir_chamado_form"]["idesignado"].value;

    if(setor=="SETOR DO SOLICITANTE"||motivo==null||motivo==""||descricao==null||descricao==""||solicitante==null||solicitante==""||designado=="Selecione um atendente")
    {
        alert("HÁ CAMPOS OBRIGATÓRIOS NÂO PREENCHIDOS");
        return false;
    }
}
</script>
<div class="backformulario">
<link rel="stylesheet" href="css/main.css">
<h3 class="ctexto ctexto1">ABRIR NOVO CHAMADO</h3>
<div class="ctexto">
    <form name="abrir_chamado_form"action="processa_chamado.php" class="formulario" onsubmit="return validateForm()" method="post">
    <br>
    <label>Motivo:</label><br>
    <input class="ctexto backformularioinput" type="text" name="imotivo" placeholder="Insira o motivo do chamado" style="text-transform:uppercase">
    <br><br>
    <label>Descrição de Chamado:</label><br>
    <div class="input-group">
        <div class="input-group-prepend">
    </div>
    <textarea class="form-control backformularioinput" aria-label="With textarea" name="idescricao_chamado" style="width: 300px; height: 80px"></textarea>
    </div><br><br>
    <label>Solicitante:</label><br>
    <?php $linha = mysqli_fetch_array($consulta_setores) ?>
    <input class="ctexto backformularioinput" type="text" name="isolicitante" placeholder="Escreva o Nome do Solicitante" style="text-transform:uppercase"><br><br>
    <label>Setor do Solicitante:</label><br> <td><a href="?pagina=adicionar_setores&add=<?php echo $linha['Nome_Setor']; ?>"><img src="img/Add.ico" style="width:15px; height:15px"></a></td>  
    <select name="isetor_solicitante" class="backformularioinput">
        <option>SETOR DO SOLICITANTE</option>
        <?php
    while ($linha = mysqli_fetch_array($consulta_setores)) {
        echo '<option class="ctexto" value="' . $linha['Nome_Setor'] . '">' . $linha['Nome_Setor'] . '</option>';
    }

?>
   </select><br><br>
    
    <label>Designado à:</label><br>
    <select name="idesignado" class="backformularioinput">
        <option>Selecione um atendente</option>
        <?php
    while ($linha = mysqli_fetch_array($consulta_usuarios)) {
        echo '<option class="ctexto" value="' . $linha['Nome_Usuario'] . '">' . $linha['Nome_Usuario'] . '</option>';
    }

?>
   </select><br><br>
    <label>Prioridade:</label><br>
    <select name="iprioridade" class="backformularioinput" style="width:70px">
        <option>MEDIA</option>
        <option>ALTA</option>
        <option>BAIXA</option>        
    </select><br><br>
    
    <div class="ctexto">
    <input type="submit" value="Salvar" name="Salvar" class="button">
    </div>
</form>
</div>
</div>
<?php
} else {
?>
   <?php
    while ($linha = mysqli_fetch_array($consulta_chamados1)) {
?>
   <?php
        if ($linha['Id_Chamado'] == $_GET['tratativa']) {
?>

<h3 class="ctexto ctexto1"> TRATATIVA DO CHAMADO #<?php
            echo $linha['Id_Chamado'];
?> </h3>
        <br>
        <div class="bordertratativa">
        <div class="colorform">
            <h3 class="ctexto ctexto3"><?php
            echo $linha['Titulo_Chamado'];
?></h3>    <br><br>
            <h4 class="ctexto tratativaletter">DESCRIÇÃO DO CHAMADO</h4> <br>
            <h5 class="formulario formulariocolor ctexto"><?php
            echo $linha['Descricao_Chamado'];
?></h5>
            <br>
            <div class="displaytratativa">
                <h4 class="ctexto flexstrutura tratativaletter" style="margin: 0 auto">Solicitante: </h4>
                <h6 class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Solicitante_Chamado'];
?> - <?php
            echo $linha['Setor_Solicitante'];
?></h6>
                <h4 class="ctexto flexstrutura tratativaletter" style="margin: 0 auto">Data:</h4>
                <h6 class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Data_Abertura'];
?></h6>
                <h4 class="ctexto flexstrutura tratativaletter" style="margin: 0 auto">Responsável:</h4>
                <h6 class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Responsavel_Tecnico'];
?></h6>
                <h4 class="ctexto flexstrutura tratativaletter" style="margin: 0 auto">Prioridade:</h4>
                <h6 class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Prioridade'];
?></h6>
                <h4 class="ctexto flexstrutura tratativaletter" style="margin: 0 auto">Status:</h4>
                <h6 class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Status'];
?></h6>
            </div>
            <br>
            <h4 class="ctexto" style="color:#FA5858;text-decoration: underline;">Ações Realizadas</h4> <br>
                <?php
            $i = 1;
            $y = 0;
            while ($linha = mysqli_fetch_array($consulta_tratativa)) {
?>
                   <h6 class="formulario ctexto" style="margin: 0 auto">#<?php
                echo $i;
?> - <?php
                echo $linha['Tratativa'];
                $i++;
                $y = 1;
?></h6>
                <?php
            }
?>
            <?php
                if($y==0){?>
                    <h4 class="ctexto ctexto1"> Nenhuma Tratativa Realizada </h4>
            <?php }
?>
            <br>
            <h4 class="ctexto tratativaletter">Inserir Ações Realizadas</h4>
            <form method="post" action="processa_fechamento.php" class="formulario">            
            <br>
            <div style="text-align:center;">
            <input type="text" name="idescricao_tratativa" placeholder="Descreva o procedimento realizado" style="width:80%;height:40px; text-align:center">
            </div><br>
            <div style="text-align:center">
            <input type="hidden" name="Id_Chamado_Ref" value="<?php echo $_GET['tratativa']?>">
            <div class="d-flex">
                <div class="btn-group">
                    <button type="submit" name="itstatus" value="ABERTO" class="btn btn-secondary">Atualizar</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <button class="dropdown-item" type="submit" name="itstatus" value="FECHADO">FECHAR Chamado</button>
                    <button class="dropdown-item" type="submit" name="itstatus" value="PAUSADO">PAUSAR Chamado</button>
                    </div>
                </div>
            </div>

            </div>
            <br>
            </div>
        </form>
        </div>
    <?php
        }
?>
   <?php
    }
?>
       
<?php
}
?>