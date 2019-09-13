<?php
session_start();
#verificar se o usuário é valodio
include ('verifica_login.php');

#Banco de dados 
include 'db.php';

#Incluindo o Cabecalho da página
include 'header.php';

#Incluindo o corpo da página
if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}
else{
	$pagina = 'home';
}

switch($pagina){
	case 'chamados': include 'views/chamados.php'; break;
	case 'estoque': include 'views/estoque.php'; break;
	case 'lixo': include 'views/lixo.php'; break;
	case 'manutencao': include 'views/manutencao.php'; break;
	case 'abrir_chamado': include 'views/abrir_chamado.php'; break;
	case 'adicionar_estoque': include 'views/adicionar_estoque.php'; break;


	default: include 'views/home.php'; break;
}

#Incluindo o Rodape da pagina
include 'footer.php';