<?php 

include 'db.php';
$Nome_Produto = $_POST['nome_produtoee'];
$Quantidade = $_POST['quantidadeee'];
$Valor_aproximado = $_POST['valor_aproximadoee'];
$Fornecedor = $_POST['fornecedoree'];
$Motivo = $_POST['descricaoee'];

$query = "UPDATE Lixo SET Quantidade = Quantidade +'$Quantidade', Valor_aproximado = Lixo.Quantidade * '$Valor_aproximado' WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Entrada_Lixo(Nome_Produto, Quantidade, Data_Entrada, Setor_Origem, Descricao, Valor_Aproximado) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, UPPER('$Fornecedor'), '$Motivo', '$Valor_aproximado')"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

header('location:home.php?pagina=lixo');