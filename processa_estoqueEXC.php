<?php 

include 'db.php';
$Nome_Produto = $_POST['nome_produtose'];
$Quantidade = $_POST['quantidadese'];
$Solicitante = $_POST['solicitantese'];
$Setor_Solicitante = $_POST['setorse'];
$Motivo = $_POST['descricaose'];
$Marca = $_POST['marcase'];
$Modelo = $_POST['modelose'];
$Acessorios = $_POST['acessoriosse'];
$SN = $_POST['serialse'];
$Especificacao = $_POST['especificacoesse'];
$Condicao = $_POST['condicaose'];


$query = "UPDATE Estoque SET Quantidade_Estocada = Quantidade_Estocada-'$Quantidade', Valor_aproximado = Valor_aproximado/Estoque.Quantidade_Estocada*(Estoque.Quantidade_Estocada -1),Ultima_Retirada=CURRENT_TIMESTAMP WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Saida_Estoque(Nome_Produto, Quantidade, Data_Saida, Solicitante, Setor_Solicitante, Motivo, Marca_Produto, Modelo_Produto, Acessorios, Serial_Number, Especificacoes, Condicao_Produto) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, UPPER('$Solicitante'), UPPER('$Setor_Solicitante'), '$Motivo', UPPER('$Marca'), UPPER('$Modelo'), '$Acessorios', UPPER('$SN'), UPPER('$Especificacao'), UPPER('$Condicao'))"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

header('location:home.php?pagina=estoque');