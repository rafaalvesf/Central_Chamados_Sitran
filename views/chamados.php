<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h2 class="ctexto1">MEUS CHAMADOS</h2>

    <form  method="post">
    <input type="submit" value="Exibir Fechados" name="mcheckbox1" class="is-white">
    </form>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" style="width: 4%; height: 5%; float:right"></a>
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
		while($linha = mysqli_fetch_array($consulta_chamados3)){
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=abrir_chamado&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969">'.$linha['Solicitante_Chamado'].'</td>';
            echo '<td class="alicolunas">'.$linha['Setor_Solicitante'].'</td>';
            echo '<td class="alicolunas">'.$linha['Data_Abertura'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td class="alicolunas" style="color:red; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td class="alicolunas" style="color:gray; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td class="alicolunas" style="color:black; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td class="alicolunas" style="color:orange; font-weight:bold">'.$linha['Status'].'</td>';
            }
    ?>
	<?php
        }
	?>

</table>
</div>
