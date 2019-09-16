<?php 
session_start();
include 'db.php';

$Titulo_Chamado = $_POST['imotivo'];
$Descricao_Chamado = $_POST['idescricao_chamado'];
$Solicitante_Chamado = $_POST['isolicitante'];
$Setor_Solicitante = $_POST['isetor_solicitante'];
$Responsavel_Tecnico = $_POST['idesignado'];
$Prioridade = $_POST['iprioridade'];

if($Titulo_Chamado==null || $Descricao_Chamado==null || $Solicitante_Chamado==null|| $Setor_Solicitante==null ||$Responsavel_Tecnico=="Selecione um atendente" ){

}
else{
$query = "INSERT INTO Chamados(Titulo_Chamado, Descricao_Chamado, Solicitante_Chamado, Setor_Solicitante, Data_Abertura ,Responsavel_Tecnico, Prioridade, Status) 
VALUES(UPPER('$Titulo_Chamado'), '$Descricao_Chamado',UPPER('$Solicitante_Chamado'), UPPER('$Setor_Solicitante'), CURRENT_TIMESTAMP, UPPER('$Responsavel_Tecnico'),'$Prioridade', 'ABERTO')";

}
mysqli_query($conexao, $query);
header('location:home.php');