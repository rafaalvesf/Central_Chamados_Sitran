<?php 
session_start();
include 'db.php';

$Id_Compra = $_POST['Id'];
$Nome_Produto = $_POST['nomeP'];
$Marca_Produto = $_POST['marcaP'];
$Modelo_Produto = $_POST['modeloP'];
$Serial_Produto = $_POST['serialP'];
$Nota_Produto = $_POST['notaP'];
$Prazo_Garantia = $_POST['garantiaP'];

$Fornecedor_Produto = $_POST['fornecedorP'];
$Destino_Produto = $_POST['destinatarioP'];

$Data_Compra = $_POST['dataP'];

$query = "UPDATE Compras SET Nome_Produto=UPPER('$Nome_Produto'),
Marca_Produto=UPPER('$Marca_Produto'), Modelo_Produto=UPPER('$Modelo_Produto'), Serial_Number= UPPER('$Serial_Produto'),
Nota_Fiscal=UPPER('$Nota_Produto'), Prazo_Garantia=UPPER('$Prazo_Garantia'), Fornecedor=UPPER('$Fornecedor_Produto'),
Destinatario=UPPER('$Destino_Produto'), Data_Compra=UPPER('$Data_Compra') WHERE Id = '$Id_Compra'";

mysqli_query($conexao, $query);
header('location:home.php?pagina=gcompras');