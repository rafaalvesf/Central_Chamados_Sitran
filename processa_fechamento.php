<?php 

include 'db.php';

$Status_fechamento = $_POST['itstatus'];
$Descricao_Fechamento = $_POST['idescricao_tratativa'];
$Id_Referencia = $_POST['Id_Chamado_Ref'];


$query = "INSERT INTO fechar_chamado(Id_Chamado_Ref, Tratativa) 
VALUES('$Id_Referencia', '$Descricao_Fechamento')";

mysqli_query($conexao, $query);

header('location:home.php?pagina=chamados');