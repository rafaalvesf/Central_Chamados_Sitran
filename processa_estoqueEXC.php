<?php 

include 'db.php';
$Nome_Produto = $_POST['nome_produtose'];
$Quantidade = $_POST['quantidadese'];
$Solicitante = $_POST['solicitantese'];
$Setor_Solicitante = $_POST['setorse'];
$Motivo = $_POST['descricaose'];

$query = "UPDATE Estoque SET Quantidade_Estocada = Quantidade_Estocada-'$Quantidade', Valor_aproximado = Valor_aproximado/Estoque.Quantidade_Estocada*(Estoque.Quantidade_Estocada -1),Ultima_Retirada=CURRENT_TIMESTAMP WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Saida_Estoque(Nome_Produto, Quantidade, Data_Saida, Solicitante, Setor_Solicitante, Motivo) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, UPPER('$Solicitante'), UPPER('$Setor_Solicitante'), '$Motivo')"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

header('location:home.php?pagina=estoque');