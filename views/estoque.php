<link rel="stylesheet" href="css/main.css">
    <div class="ctexto">
        <h3 class="ctexto1">ESTOQUE SITRAN</h3>

        <a href="?pagina=adicionar_estoque" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
        <table border="0.5" class="table table-hover">
            <tr class="thead-dark">
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Descrição dos Produtos</th>
                <th>Estoque Mínimo</th>
                <th>Ultima Retirada</th>
                <th>Valor Total do Estoque</th>
                <th></th>
                <th></th>
            </tr>
            <?php    
	    while($linha = mysqli_fetch_array($consulta_estoque)){
            $datab = new DateTime($linha['Ultima_Retirada']);
            $dataa = new DateTime();
            $intervalo = $datab->diff($dataa);

            echo '<tr><td class="alicolunas alicolunas1">'.$linha['Nome_Produto'].'</td>';
            if($linha['Quantidade_Estocada'] <= $linha['Quantidade_Minima']){
            echo '<td class="alicolunas alicolunas1" style="color:red">## '.$linha['Quantidade_Estocada'].' ##</td>';
            }
            else{
            echo '<td class="alicolunas alicolunas1">'.$linha['Quantidade_Estocada'].'</td>';    
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Produto'].'</td>';
            if($linha['Quantidade_Estocada'] <= $linha['Quantidade_Minima']){
            echo '<td class="alicolunas alicolunas1" style="color:red">## '.$linha['Quantidade_Minima'].' ##</td>';
            }
            else{
            echo '<td class="alicolunas alicolunas1">'.$linha['Quantidade_Minima'].'</td>';    
            }
            echo '<td class="alicolunas">'.$intervalo->format('%R%a dias %H:%I').'</td>';
            echo '<td class="alicolunas">R$ '.$linha['Valor_aproximado'].',00</td>';
    ?>
            <td><a href="?pagina=adicionar_estoque&add=<?php echo $linha['Nome_Produto']; ?>"><img src="img/Add.ico" style="width:25px; height:25px"></a></td>
            <td><a href="?pagina=adicionar_estoque&remove=<?php echo $linha['Nome_Produto']; ?>"><img src="img/remov.png" style="width:25px; height:25px"></a></td>
                <?php
        }
	?>

        </table>

    </div>