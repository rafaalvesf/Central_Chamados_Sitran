<?php
include 'db.php';

    while ($linha = mysqli_fetch_array($consulta_saida_estoque)) {
        $datab = new DateTime($linha['Data_Saida']);
?>
   <?php
        if ($linha['Id_Saida'] == $_GET['termo']) {
?>

<h3 class="ctexto ctexto1"> TERMO DE ENTREGA DE EQUIPAMENTO </h3>
        <br>
        <div class="">
        <div class="">
  <br><br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">Item: </h5><h5> &nbsp; &nbsp;<?php echo $linha['Nome_Produto'];?></h5>  
        </div>
        <br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">Marca: </h5><h5> &nbsp; &nbsp;<?php echo $linha['Marca_Produto'];?></h5>
        </div>
        <br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">Modelo: </h5><h5> &nbsp; &nbsp;<?php echo $linha['Modelo_Produto'];?></h5>
        </div>
        <br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">Acessórios: </h5><h5> &nbsp; &nbsp;<?php echo $linha['Acessorios'];?></h5>
        </div>
            <br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">S/N: </h5><h5> &nbsp; &nbsp;<?php echo $linha['Serial_Number'];?></h5>
        </div>
            <br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">Especificações: </h5><h5> &nbsp; &nbsp;<?php echo $linha['Especificacoes'];?></h5>
        </div>
            <br>
        <div class="displaytratativa">
            <h5 class="formulario formulariocolor">Estado de uso:</h5><h5> &nbsp; &nbsp;<?php echo $linha['Condicao_Produto'];?></h5>
        </div>
            <br><br><br>
        </div>

            <h5>Foi fornecido, para o(a) Sr(a). <?php echo $linha['Solicitante'];?> do setor de <?php echo $linha['Setor_Solicitante'];?> um(a) <?php echo $linha['Nome_Produto'];?>
                da marca <?php echo $linha['Marca_Produto'];?>, modelo <?php echo $linha['Modelo_Produto'];?> <?php if($linha['Acessorios'] == '' || $linha['Acessorios'] == null){ ?>
                    .
                <?php } else{ ?>
                    , com <?php echo $linha['Acessorios'];?>.
                <?php } ?>

            </h5><br>
            <h5>O equipamento foi entregue pelo setor de informática para o uso do Sr(a).<?php echo $linha['Solicitante'];?> em suas atribuições profissionais.</h5><br>
            <h5>O equipamento de SN: <?php echo $linha['Serial_Number'];?> entregue ao solicitante, é dotado de um <?php echo $linha['Especificacoes'];?>.</h5><br>
            <h5>O equipamento foi entregue na data de <?php echo $datab->format('d-m-y h:i');?> e a condição de uso é <?php echo $linha['Condicao_Produto'];?>.</h5>
       </div>
       <div class="displaytratativa">
            <h5 class="assentr">________________________</h5>   <h5 class="assreceb">________________________</h5>
       </div>
       <div class="displaytratativa">
            <h5 class="assentr1">ASS: INFORMATICA</h5>   <h5 class="assreceb1">ASS: RECEBEDOR</h5>
       </div>
       
    <?php
        }
?>
    <?php }
    ?>