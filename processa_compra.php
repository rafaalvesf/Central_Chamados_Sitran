<?php 
session_start();
include 'db.php';

$Nome_Produto = $_POST['nomeP'];
$Marca_Produto = $_POST['marcaP'];
$Modelo_Produto = $_POST['modeloP'];
$Serial_Produto = $_POST['serialP'];
$Nota_Produto = $_POST['notaP'];
$Prazo_Garantia = $_POST['garantiaP'];
$Tempo_Garantia = $_POST['garantia1P'];
$Fornecedor_Produto = $_POST['fornecedorP'];
$Destino_Produto = $_POST['destinatarioP'];
$Garantia = "$Prazo_Garantia $Tempo_Garantia";
$Data_Compra = $_POST['dataP'];

$query = "INSERT INTO Compras(Nome_Produto, Marca_Produto, Modelo_Produto, Serial_Number, Nota_Fiscal, Data_Compra, Prazo_Garantia, Fornecedor, Destinatario) 
VALUES (UPPER('$Nome_Produto'), UPPER('$Marca_Produto'), UPPER('$Modelo_Produto'), UPPER('$Serial_Produto'), UPPER('$Nota_Produto'), '$Data_Compra', UPPER('$Garantia'), UPPER('$Fornecedor_Produto'), UPPER('$Destino_Produto'))";

mysqli_query($conexao, $query);
header('location:home.php?pagina=gcompras');