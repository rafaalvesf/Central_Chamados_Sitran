<?php 

include 'db.php';

$Status_fechamento = $_POST['itstatus'];
$Descricao_Fechamento = $_POST['idescricao_tratativa'];
$Id_Referencia = $_POST['Id_Chamado_Ref'];

if($Descricao_Fechamento==null){

}
else{
$query = "INSERT INTO fechar_chamado(Id_Chamado_Ref, Tratativa) 
VALUES('$Id_Referencia', '$Descricao_Fechamento')";
}
$query1 = "UPDATE Chamados SET Chamados.Status='$Status_fechamento' WHERE Id_Chamado = $Id_Referencia";

mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);

header('location:home.php?pagina=chamados');