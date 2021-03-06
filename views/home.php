<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    
    <h3 class="ctexto1">CHAMADOS ABERTOS NO MOMENTO</h3>

    <form  method="post">
    <input type="submit" value="Exibir Fechados" name="mcheckbox" class="is-white">
    </form>

   

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
    
    <form method="post" action="?pagina=filtrar_chamado&filtrosearch" class="filsearch">
        <input type="text" class="ctexto backformularioinput" name="insearch" placeholder="Pesquisar chamados...">
        <input type="image" class="search" src="img/search.png">
    </form>


<table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
        <th></th>
	</tr>

    <?php              
		while($linha = mysqli_fetch_array($consulta_chamados2)){
           
            $datab = new DateTime($linha['Data_Abertura']);
            $dataa = new DateTime();
            $intervalo = $datab->diff($dataa);

            echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1 largtable">'.$linha['Titulo_Chamado'].'</td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td class="alicolunas"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtrose='.$linha['Setor_Solicitante'].'">'.$linha['Setor_Solicitante'].'</a></td>';
            echo '<td class="alicolunas">'.$intervalo->format('%R%a dias %H:%I').'</td>';
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
            <td><a href="?pagina=editar_chamado&editar=<?php echo $linha['Id_Chamado'];?>"><img class="logo_edit" src="img/edit.png"></a></td>
	<?php
		}
	?>

</table>

</div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>
