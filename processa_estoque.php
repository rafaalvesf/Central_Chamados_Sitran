<?php 

include 'db.php';

$Nome_Item = $_POST['nome_item'];
$Descricao_Item = $_POST['descricao_item'];
$Quantidade_Minima = $_POST['quantidade_minima'];

$query = "INSERT INTO Estoque(Nome_Produto, Descricao_Produto, Quantidade_Minima, Quantidade_Estocada) 
VALUES(UPPER('$Nome_Item'), UPPER('$Descricao_Item'), '$Quantidade_Minima', 0)";

mysqli_query($conexao, $query);

header('location:home.php?pagina=estoque');