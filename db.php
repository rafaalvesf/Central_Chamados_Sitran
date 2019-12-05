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

if(isset($_GET['filtrose'])) {
$query = "SELECT * FROM Chamados  WHERE Setor_Solicitante = '{$_GET['filtrose']}' ORDER BY Id_Chamado DESC";
$consulta_chamados4 = mysqli_query($conexao, $query);
}

if(isset($_GET['filtroso'])) {
$query = "SELECT * FROM Chamados WHERE Solicitante_Chamado = '{$_GET['filtroso']}' ORDER BY Id_Chamado DESC";
$consulta_chamados5 = mysqli_query($conexao, $query);
}

if(isset($_GET['filtroseu'])) {
$query = "SELECT * FROM Chamados WHERE Setor_Solicitante = '{$_GET['filtroseu']}' AND  Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' ORDER BY Id_Chamado DESC";
$consulta_chamados6 = mysqli_query($conexao, $query);
}

if(isset($_GET['filtrosou'])) {
$query = "SELECT * FROM Chamados WHERE Solicitante_Chamado = '{$_GET['filtrosou']}' AND  Responsavel_Tecnico = '{$_SESSION['usuario_digitado']}' ORDER BY Id_Chamado DESC";
$consulta_chamados7 = mysqli_query($conexao, $query);
}

if(isset($_GET['filtrosearch'])) {
$query = "SELECT * FROM Chamados  WHERE Descricao_Chamado LIKE '%{$_POST['insearch']}%' OR Titulo_Chamado LIKE '%{$_POST['insearch']}%'  ORDER BY Id_Chamado DESC";
$consulta_chamados8 = mysqli_query($conexao, $query);
}

if(isset($_GET['tratativa'])) {
$query = "SELECT Tratativa, Data_Fechamento FROM Fechar_Chamado WHERE Id_Chamado_Ref = '{$_GET['tratativa']}'";
$consulta_tratativa = mysqli_query($conexao, $query);
}
#consultas de ESTOQUE
$query = "SELECT * FROM Estoque ORDER BY Nome_Produto";
$consulta_estoque = mysqli_query($conexao, $query);

#Consulta LIXO
$query = "SELECT * FROM Lixo";			
$consulta_lixo = mysqli_query($conexao, $query);

if(isset($_POST['checktodoslx']) != 'Exibir Todos'){
$query = "SELECT * FROM Entrada_Lixo ORDER BY Id_Entrada DESC limit 5";
$consulta_entrada_lixo = mysqli_query($conexao, $query);
}
else{
$query = "SELECT * FROM Entrada_Lixo ORDER BY Id_Entrada DESC";
$consulta_entrada_lixo = mysqli_query($conexao, $query);
}

if(isset($_POST['checktodoslx1']) != 'Exibir Todos'){
$query = "SELECT * FROM Saida_Lixo ORDER BY Id_Saida DESC limit 5";
$consulta_saida_lixo = mysqli_query($conexao, $query);
}
else{
$query = "SELECT * FROM Saida_Lixo ORDER BY Id_Saida DESC";
$consulta_saida_lixo = mysqli_query($conexao, $query);
}

#consultas de MANUTENCAO
$query = "SELECT * FROM Manutencao";			
$consulta_manutencao = mysqli_query($conexao, $query);

$query = "SELECT * FROM Usuarios";			
$consulta_usuarios = mysqli_query($conexao, $query);

$query = "SELECT * FROM Setores ORDER BY Nome_Setor";			
$consulta_setores = mysqli_query($conexao, $query);

#consultas de ESTOQUE
if(isset($_POST['checktodos']) != 'Exibir Todos'){
$query = "SELECT * FROM Entrada_Estoque ORDER BY Id_Entrada DESC limit 5";
$consulta_entrada_estoque = mysqli_query($conexao, $query);
}
else{
$query = "SELECT * FROM Entrada_Estoque ORDER BY Id_Entrada DESC";
$consulta_entrada_estoque = mysqli_query($conexao, $query);
}

if(isset($_POST['checktodos1']) != 'Exibir Todos'){
$query = "SELECT * FROM Saida_Estoque ORDER BY Id_Saida DESC limit 5";
$consulta_saida_estoque = mysqli_query($conexao, $query);
}
else{
$query = "SELECT * FROM Saida_Estoque ORDER BY Id_Saida DESC";
$consulta_saida_estoque = mysqli_query($conexao, $query);
}


?>