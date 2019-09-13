<link rel="stylesheet" href="css/main.css">
    <div class="ctexto">
        <h2 class="ctexto1">ESTOQUE SITRAN</h2>

        <a href="?pagina=adicionar_estoque" style="text-decoration:none;"><img src="img/add.ico" style="width: 5%; height: 5%; float:right"></a>
        <table border="1" style="border:4px solid #ccc; width: 100%;">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Descrição dos Produtos</th>
                <th>Estoque Mínimo</th>
                <th>Ultima Retirada</th>
                <th>Valor Total do Estoque</th>
            </tr>
            <?php    
	    while($linha = mysqli_fetch_array($consulta_estoque)){
            echo '<tr><td class="alicolunas alicolunas1">'.$linha['Nome_Produto'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Quantidade_Estocada'].'</td>';
            echo '<td class="alicolunas">'.$linha['Descricao_Produto'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Quantidade_Minima'].'</td>';
            echo '<td class="alicolunas">'.$linha['Ultima_Retirada'].'</td>';
            echo '<td class="alicolunas">R$ '.$linha['Valor_aproximado'].'</td>';
    ?>
            <td><a href="?pagina=adicionar_estoque&add=<?php echo $linha['Nome_Produto']; ?>"><img src="img/Add.ico" style="width:25px; height:25px"></a></td>
            <td><a href="?pagina=adicionar_estoque&remove=<?php echo $linha['Nome_Produto']; ?>"><img src="img/remov.png" style="width:25px; height:25px"></a></td>
                <?php
        }
	?>

        </table>

    </div>