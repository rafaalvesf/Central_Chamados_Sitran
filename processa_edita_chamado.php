<?php 
session_start();
include 'db.php';
$Id_Chamado = $_POST['Id_Chamado'];
$Titulo_Chamado = $_POST['imotivo'];
$Descricao_Chamado = $_POST['idescricao_chamado'];
$Solicitante_Chamado = $_POST['isolicitante'];
$Setor_Solicitante = $_POST['isetor_solicitante'];
$Responsavel_Tecnico = $_POST['idesignado'];
$Prioridade = $_POST['iprioridade'];

if($Titulo_Chamado==null || $Descricao_Chamado==null || $Solicitante_Chamado==null|| $Setor_Solicitante==null ||$Responsavel_Tecnico=="Selecione um atendente" ){

}
else{
$query = "UPDATE Chamados SET Titulo_Chamado=UPPER('$Titulo_Chamado'), Descricao_Chamado='$Descricao_Chamado', Solicitante_Chamado=UPPER('$Solicitante_Chamado'), Setor_Solicitante= UPPER('$Setor_Solicitante'), Responsavel_Tecnico=UPPER('$Responsavel_Tecnico'), Prioridade=('$Prioridade') WHERE Id_Chamado = '$Id_Chamado'";
}
mysqli_query($conexao, $query);
header('location:home.php');