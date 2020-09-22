<?php 
session_start();
include 'db.php';
$Nome_Produto = trim($_POST['nome_produtose']);
$Quantidade = $_POST['quantidadese'];
$Solicitante = strtoupper(trim($_POST['solicitantese']));
$Setor_Solicitante = strtoupper(trim($_POST['setorse']));
$Motivo = trim($_POST['descricaose']);
$Marca = trim($_POST['marcase']);
$Modelo = trim($_POST['modelose']);
$Acessorios = trim($_POST['acessoriosse']);
$SN = trim($_POST['serialse']);
$Especificacao = trim($_POST['especificacoesse']);
$Condicao = trim($_POST['condicaose']);


$query = "UPDATE Estoque SET Quantidade_Estocada = Quantidade_Estocada-'$Quantidade', Valor_aproximado = Valor_aproximado/Estoque.Quantidade_Estocada*(Estoque.Quantidade_Estocada -1),Ultima_Retirada=CURRENT_TIMESTAMP WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Saida_Estoque(Nome_Produto, Quantidade, Data_Saida, Solicitante, Setor_Solicitante, Motivo, Marca_Produto, Modelo_Produto, Acessorios, Serial_Number, Especificacoes, Condicao_Produto) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, UPPER('$Solicitante'), UPPER('$Setor_Solicitante'), '$Motivo', UPPER('$Marca'), UPPER('$Modelo'), '$Acessorios', UPPER('$SN'), UPPER('$Especificacao'), UPPER('$Condicao'))"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual RETIROU $Quantidade - $Nome_Produto(S) de nosso ESTOQUE, o produto foi solicitado pelo Sr.(a) $Solicitante-$Setor_Solicitante. É importante verificar se é necessário repor o item ao ESTOQUE!";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.urlencode($Msgm).'';
file_get_contents($Request_Url);
##########################################################

header('location:home.php?pagina=estoque');
?>