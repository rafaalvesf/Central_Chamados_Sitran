<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "stock";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db) or die ('Falha ao conectar na DATABASE, Deu ruim!');

$query = "SELECT * FROM Chamados ORDER BY Data_Abertura DESC";
$consulta_chamados = mysqli_query($conexao, $query);

$query = "SELECT * FROM Chamados INNER JOIN Usuarios WHERE Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' ORDER BY Data_Abertura DESC";
$consulta_chamados1 = mysqli_query($conexao, $query);

$query = "SELECT * FROM Estoque";
$consulta_estoque = mysqli_query($conexao, $query);

$query = "SELECT * FROM Lixo";			
$consulta_lixo = mysqli_query($conexao, $query);

$query = "SELECT * FROM Manutencao";			
$consulta_lixo = mysqli_query($conexao, $query);

$query = "SELECT * FROM Usuarios";			
$consulta_usuarios = mysqli_query($conexao, $query);
?>