<?php 
session_start();
include 'db.php';

$query = "UPDATE Lixo SET Quantidade = 0, Valor_Aproximado= 0";

mysqli_query($conexao, $query);
header('location:home.php?pagina=lixo');