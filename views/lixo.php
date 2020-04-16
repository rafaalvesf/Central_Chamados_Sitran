<?php
include 'db.php';
?>
<link rel="stylesheet" href="css/main.css">
<script>
function funcao1() {
    var x;
    var r = confirm("Você Realmente deseja EXCLUIR TODO o ESTOQUE?");
    if (r == true) {
        x = "você pressionou OK!";
    } else {
        return false;;
    }
    document.getElementById("demo").innerHTML = x;
}
</script>
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
        while($linha1 = mysqli_fetch_array($consulta_usuarios1)){
        if($linha1['Perfil'] == '1') { ?>
        <form method="post" onsubmit="return funcao1()" action="processa_apagar_tudo.php">
        <label>APAGAR TUDO</label>
        <input type="image" class="logo_edit" src="img/removs.png">
        </form>
        <?php } 
        }?>
    </div>

<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>