<?php 

include 'db.php';

$Nome_Item = $_POST['nome_item'];
$Descricao_Item = $_POST['descricao_item'];

$query = "INSERT INTO Lixo(Nome_Produto, Quantidade, Descricao) 
VALUES(UPPER('$Nome_Item'), 0, '$Descricao_Item')";

mysqli_query($conexao, $query);

header('location:home.php?pagina=lixo');