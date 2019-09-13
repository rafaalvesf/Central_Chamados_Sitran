<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "stock";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db) or die ('Falha ao conectar na DATABASE, Deu ruim!');

$query = "SELECT * FROM Chamados ORDER BY Data_Abertura DESC";
$consulta_chamados = mysqli_query($conexao, $query);

$query = "SELECT * FROM Chamados WHERE Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' ORDER BY Data_Abertura DESC";
$consulta_chamados1 = mysqli_query($conexao, $query);

if(isset($_GET['tratativa'])) {
$query = "SELECT Tratativa FROM Fechar_Chamado WHERE Id_Chamado_Ref = '{$_GET['tratativa']}'";
$consulta_tratativa = mysqli_query($conexao, $query);
}
#consultas de ESTOQUE
$query = "SELECT * FROM Estoque";
$consulta_estoque = mysqli_query($conexao, $query);

$query = "SELECT * FROM Lixo";			
$consulta_lixo = mysqli_query($conexao, $query);

$query = "SELECT * FROM Manutencao";			
$consulta_manutencao = mysqli_query($conexao, $query);

$query = "SELECT * FROM Usuarios";			
$consulta_usuarios = mysqli_query($conexao, $query);

$query = "SELECT * FROM Entrada_Estoque ORDER BY Id_Entrada DESC limit 5";
$consulta_entrada_estoque = mysqli_query($conexao, $query);
?>