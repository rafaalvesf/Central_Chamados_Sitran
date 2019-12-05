<?php 

include 'db.php';
$Nome_Produto = $_POST['nome_produtose'];
$Quantidade = $_POST['quantidadese'];
$Solicitante = $_POST['solicitantese'];
$Setor_Solicitante = $_POST['setorse'];
$Motivo = $_POST['descricaose'];


$query = "UPDATE Lixo SET Quantidade = Quantidade-'$Quantidade', Valor_Aproximado = Valor_Aproximado/Lixo.Quantidade*(Lixo.Quantidade -1) WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Saida_Lixo(Nome_Produto, Quantidade, Data_Saida, Motivo_Retirada) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, '$Motivo')"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

header('location:home.php?pagina=lixo');