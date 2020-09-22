<?php 
session_start();
include 'db.php';

$Email = trim($_POST['exemail']);

$query = "DELETE FROM Senhas_Email WHERE Email = '$Email'";

mysqli_query($conexao, $query);
header('location:home.php?pagina=gsenhas');

################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual APAGOU a senha do $Email em nosso gerador de senhas. Agora não temos mais essa informação!";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.urlencode($Msgm).'';
file_get_contents($Request_Url);
##########################################################
?>
