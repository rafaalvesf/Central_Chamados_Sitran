<?php 
session_start();
include 'db.php';

$query = "UPDATE Lixo SET Quantidade = 0, Valor_Aproximado= 0";

mysqli_query($conexao, $query);

################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -443000747;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, acabei de ver que o $User_Atual ZEROU a contagem do LIXO ELETRÔNICO";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################

header('location:home.php?pagina=lixo');