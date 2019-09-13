<?php 

include 'db.php';
$Nome_Produto = $_POST['nome_produtoee'];
$Quantidade = $_POST['quantidadeee'];
$Quantidade_Minima = $_POST['quantidade_minimaee'];
$Valor_aproximado = $_POST['valor_aproximadoee'];
$Fornecedor = $_POST['fornecedoree'];
$Motivo = $_POST['descricaoee'];

$query = "UPDATE Estoque SET Quantidade_Estocada = Quantidade_Estocada+'$Quantidade', Quantidade_Minima = '$Quantidade_Minima' , Valor_aproximado = Estoque.Quantidade_Estocada*'$Valor_aproximado' WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Entrada_Estoque(Nome_Produto, Quantidade, Data_Entrada, Fornecedor, Descricao, Valor_Aproximado) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, UPPER('$Fornecedor'), '$Motivo', '$Valor_aproximado')"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

header('location:home.php?pagina=estoque');