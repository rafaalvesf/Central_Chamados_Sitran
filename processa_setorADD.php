<?php 
session_start();
include 'db.php';

$Nome_Setor = $_POST['nomesetoradd'];


if($Nome_Setor==null || $Nome_Setor==""){

}
else{
$query = "INSERT INTO Setores(Nome_Setor) 
VALUES(UPPER('$Nome_Setor'))";

}
mysqli_query($conexao, $query);
header('location:home.php');