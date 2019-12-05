<?php
    while ($linha = mysqli_fetch_array($consulta_chamados)) {
        $datab = new DateTime($linha['Data_Abertura']);
?>
   <?php
        if ($linha['Id_Chamado'] == $_GET['tratativa']) {
?>
       <h3 class="ctexto ctexto1"> TRATATIVAS REALIZADOS NO CHAMADO #<?php
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
            echo $datab->format('d-m-y h:i');
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
                $dataalt = new DateTime($linha['Data_Fechamento']);
?>
                   <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $dataalt->format('d-m-y h:i') ?>_#<?php
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
            <form method="post" action="processa_fechamento.php" class="formulario">
            <div style="text-align:center">
            <input type="hidden" name="Id_Chamado_Ref" value="<?php echo $_GET['tratativa']?>">
            <div class="d-flex">
                <div class="btn-group">
                    <button type="submit" name="itstatus" value="ABERTO" class="btn btn-secondary">Reabrir</button>
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