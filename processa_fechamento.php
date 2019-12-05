<?php 

include 'db.php';

$Status_fechamento = $_POST['itstatus'];
$Descricao_Fechamento = $_POST['idescricao_tratativa'];
$Id_Referencia = $_POST['Id_Chamado_Ref'];

if($Descricao_Fechamento==""){

}
else{
$query = "INSERT INTO fechar_chamado(Id_Chamado_Ref, Tratativa, Data_Fechamento) 
VALUES('$Id_Referencia', '$Descricao_Fechamento', CURRENT_TIMESTAMP)";
}
$query1 = "UPDATE Chamados SET Chamados.Status='$Status_fechamento' WHERE Id_Chamado = $Id_Referencia";

if($Status_fechamento == "FECHADO"){
    $query2 = "INSERT INTO fechar_chamado(Id_Chamado_Ref, Tratativa, Data_Fechamento) 
    VALUES('$Id_Referencia', 'Chamado Fechado', CURRENT_TIMESTAMP)";
}

mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);
mysqli_query($conexao, $query2);

header('location:home.php?pagina=chamados');