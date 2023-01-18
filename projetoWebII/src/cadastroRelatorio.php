<?php
session_start();
include_once("conectar.php");
include_once("validaSessão.php");
if(isset($_SESSION["id"])){
    $RELATORIO_USERID = $_SESSION["id"];
}

$_SESSION["relatorioNome"] = 0;
$_SESSION["relatorioTitulo"] = 0;
$_SESSION["faltaDado"] = 0;
$_SESSION["cadastrado"] = 0;
$_SESSION["TITULO_CERTO"] = 0;

$RELATORIO_EVENTO_TITULO = $_POST["RELATORIO_EVENTO_TITULO"];
$RELATORIO_TEXTO = $_POST["RELATORIO_TEXTO"];
$RELATORIO_NOME = $_POST["RELATORIO_NOME"];

if(empty($RELATORIO_NOME)){
    $_SESSION["relatorioNome"] = 1; 
}

if(empty($RELATORIO_EVENTO_TITULO)){
        $_SESSION["relatorioTitulo"] = 1; 
    }
 if(empty($RELATORIO_TEXTO)){
     $_SESSION["faltaDado"] = 1; 
 }


 $queryEvento = "SELECT * FROM TB_EVENTOS WHERE EVENTO_USERID = '$RELATORIO_USERID'";
 $resEvento = mysqli_query($conexao, $queryEvento)  or die ('ERRO - Não foi possível retornar o dados do Título solicitado.');
 while($evento = mysqli_fetch_assoc($resEvento)){
     if(strcmp($evento["EVENTO_TITULO"], $RELATORIO_EVENTO_TITULO) == 0){
          $_SESSION["TITULO_CERTO"] = 1;
        }
    }

    if($_SESSION["relatorioNome"] == 0 && $_SESSION["relatorioTitulo"] == 0 && $_SESSION["faltaDado"] == 0 && $_SESSION["TITULO_CERTO"] == 1){
        $_SESSION["cadastrado"] = 1;
        $query = "INSERT INTO TB_RELATORIOS (RELATORIO_NOME, RELATORIO_EVENTO_TITULO, RELATORIO_TEXTO, RELATORIO_USERID) VALUES ('$RELATORIO_NOME', '$RELATORIO_EVENTO_TITULO', '$RELATORIO_TEXTO', '$RELATORIO_USERID')";
        mysqli_query($conexao,$query) or die("Erro: não foi possível cadastrar relatório no banco de dados! ".mysqli_error($conexao));
        mysqli_close($conexao);
        header("Location:tela_relatorio.php");

    }else{
        header("Location:tela_relatorio.php");
    }
?>


