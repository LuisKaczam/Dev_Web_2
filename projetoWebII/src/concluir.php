<?php 
include_once("validaSessão.php");
include_once("conectar.php");

if(isset($_GET['tabela']) && isset($_GET['id']) && isset($_GET['codigo']) && isset($_GET['origem'])){
	$tabela = $_GET['tabela'];
	$id = $_GET['id'];
	$codigo = $_GET['codigo'];
	$origem = $_GET['origem'];
	$query = "DELETE FROM $tabela WHERE $id = $codigo";
	$sql = mysqli_query($conexao, $query) or die ('ERRO - Não foi possível executar a Query: ' . mysqli_error($conexao));
	if($sql){
		header('location:'.$origem);
	}else{
		echo '<script>alert("Erro: a query de deleção falhou!")</script>';
		echo '</br><a href="'.$origem.'">Voltar</a>';
	}
} else {
echo '<script>alert("Erro: não foi possível realizar a tarefa. Os dados para deleção parecem incompletos!")</script>';
header('location:index.php');
}
?>