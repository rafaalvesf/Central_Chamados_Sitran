<?php 
session_start();
include 'db.php';

function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
    {
    // Caracteres de cada tipo
    $lmin = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $num = '1234567890';
    $simb = '!@#$%*-';

    // Variáveis internas
    $retorno = '';
    $caracteres = '';

    // Agrupamos todos os caracteres que poderão ser utilizados
    $caracteres .= $lmin;
    if ($maiusculas) $caracteres .= $lmai;
    if ($numeros) $caracteres .= $num;
    if ($simbolos) $caracteres .= $simb;

    // Calculamos o total de caracteres possíveis
    $len = strlen($caracteres);

    for ($n = 1; $n <= $tamanho; $n++) {
    // Criamos um número aleatório de 1 até $len para pegar um dos caracteres
    $rand = mt_rand(1, $len);
    // Concatenamos um dos caracteres na variável $retorno
    $retorno .= $caracteres[$rand-1];
    }

    return $retorno;
}

$Email = trim($_POST['emailger1']);
$Senha = geraSenha(8, true, true, false);

$query = "INSERT INTO Senhas_Email(Email, Senha) 
VALUES ('$Email', '$Senha')";

mysqli_query($conexao, $query);

################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual GEROU uma senha para o $Email em nosso gerador de senhas. Agora teremos um controle maior sobre suas informações!";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.urlencode($Msgm).'';
file_get_contents($Request_Url);
##########################################################

header('location:home.php?pagina=gsenhas');
