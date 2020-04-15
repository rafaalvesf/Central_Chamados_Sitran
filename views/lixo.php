<link rel="stylesheet" href="css/main.css">
    <div class="ctexto">
        <h3 class="ctexto1">LIXO ELETRÔNICO</h3>

        <a href="?pagina=adicionar_lixo" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
        <table border="0.5" class="table table-hover">
            <tr class="thead-dark">
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Descrição dos Produtos</th>
                <th>Valor Total Descartado</th>
                <th></th>
                <th></th>
            </tr>
            <?php    
	    while($linha = mysqli_fetch_array($consulta_lixo)){

            echo '<tr><td class="alicolunas alicolunas1">'.$linha['Nome_Produto'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Quantidade'].'</td>';    
            echo '<td class="alicolunas">'.$linha['Descricao'].'</td>';
            echo '<td class="alicolunas">R$ '.$linha['Valor_Aproximado'].',00</td>';
    ?>
            <td><a href="?pagina=adicionar_lixo&add=<?php echo $linha['Nome_Produto']; ?>"><img src="img/Add.ico" style="width:25px; height:25px"></a></td>
            <td><a href="?pagina=adicionar_lixo&remove=<?php echo $linha['Nome_Produto']; ?>"><img src="img/remov.png" style="width:25px; height:25px"></a></td>
                <?php
        }
	?>

        </table>
        <?php 
        if(isset($_GET['excluir'])==1){ ?>
        <form action="processa_apagar_tudo.php">
            <br><label for="">Apagar TUDO!</label><br><br>
            <input type="image" src="img/removs.png" style="width:25px; height:25px">
        </form>
        <?php
        }
        ?>
    </div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>