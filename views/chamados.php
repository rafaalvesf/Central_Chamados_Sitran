<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h2 class="ctexto1">MEUS CHAMADOS</h2>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" style="width: 5%; height: 5%; float:right"></a>
<table border="1" style="border:4px solid #ccc; width: 100%;">
	<tr>
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
	</tr>

    <?php    
		while($linha = mysqli_fetch_array($consulta_chamados1)){
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Titulo_Chamado'].'</td>';
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:blue">'.$linha['Solicitante_Chamado'].'</td>';
            echo '<td class="alicolunas">'.$linha['Setor_Solicitante'].'</td>';
            echo '<td class="alicolunas">'.$linha['Data_Abertura'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            echo '<td class="alicolunas">'.$linha['Prioridade'].'</td>';
            echo '<td class="alicolunas">'.$linha['Status'].'</td>';
	?>
        <td><a href="?pagina=abrir_chamado&tratativa=<?php echo $linha['Id_Chamado']; ?>">Tratar</a></td>
	<?php
        }
	?>

</table>
</div>
