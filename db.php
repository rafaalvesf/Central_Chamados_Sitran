<?php 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "stock";


$conexao = mysqli_connect($servidor, $usuario, $senha, $db) or die ('Falha ao conectar na DATABASE, Deu ruim!');

$query = "SELECT * FROM Chamados ORDER BY Id_Chamado DESC";
$consulta_chamados = mysqli_query($conexao, $query);

$query = "SELECT * FROM Chamados WHERE Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' ORDER BY Id_Chamado DESC";
$consulta_chamados1 = mysqli_query($conexao, $query);

if(isset($_POST['mcheckbox']) != 'Exibir Fechados'){
$query = "SELECT * FROM Chamados WHERE Status != 'FECHADO' ORDER BY Id_Chamado DESC";
$consulta_chamados2 = mysqli_query($conexao, $query);
}
else{
$query = "SELECT * FROM Chamados ORDER BY Id_Chamado DESC";
$consulta_chamados2 = mysqli_query($conexao, $query);
}

if(isset($_POST['mcheckbox1']) != 'Exibir Fechados'){
$query = "SELECT * FROM Chamados WHERE Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' AND Status != 'FECHADO' ORDER BY Id_Chamado DESC";
$consulta_chamados3 = mysqli_query($conexao, $query);
}
else{
$query = "SELECT * FROM Chamados WHERE Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' ORDER BY Id_Chamado DESC";
$consulta_chamados3 = mysqli_query($conexao, $query);
}

if(isset($_GET['tratativa'])) {
$query = "SELECT Tratativa FROM Fechar_Chamado WHERE Id_Chamado_Ref = '{$_GET['tratativa']}'";
$consulta_tratativa = mysqli_query($conexao, $query);
}
#consultas de ESTOQUE
$query = "SELECT * FROM Estoque ORDER BY Nome_Produto DESC";
$consulta_estoque = mysqli_query($conexao, $query);

$query = "SELECT * FROM Lixo";			
$consulta_lixo = mysqli_query($conexao, $query);

$query = "SELECT * FROM Manutencao";			
$consulta_manutencao = mysqli_query($conexao, $query);

$query = "SELECT * FROM Usuarios";			
$consulta_usuarios = mysqli_query($conexao, $query);

$query = "SELECT * FROM Setores ORDER BY Nome_Setor";			
$consulta_setores = mysqli_query($conexao, $query);

$query = "SELECT * FROM Entrada_Estoque ORDER BY Id_Entrada DESC limit 5";
$consulta_entrada_estoque = mysqli_query($conexao, $query);

$query = "SELECT * FROM Saida_Estoque ORDER BY Id_Saida DESC limit 5";
$consulta_saida_estoque = mysqli_query($conexao, $query);
?>