<?php
session_start();
include_once("conectar.php");
include_once("validaSessão.php");
if(isset($_SESSION["id"])){
    $EVENTO_USERID = $_SESSION["id"];
}

$_SESSION["eventoTitulo"] = 0;
$_SESSION["evento_data"] = 0;
$_SESSION["evento_hora"] = 0;


$EVENTO_TITULO = $_POST["EVENTO_TITULO"];
$EVENTO_DESC = $_POST["EVENTO_DESC"];
$EVENTO_DATA = $_POST["EVENTO_DATA"];
$EVENTO_HORA = $_POST["EVENTO_HORA"];
$EVENTO_LOCAL = $_POST["EVENTO_LOCAL"];

if(empty($EVENTO_TITULO)){
    $_SESSION["eventoTitulo"] = 1;
}

if(empty($EVENTO_DATA)){
    $_SESSION["evento_data"] = 1;
}

if(empty($EVENTO_HORA)){
    $_SESSION["evento_hora"]  = 1;
}

if($_SESSION["eventoTitulo"] == 1 ||  $_SESSION["evento_data"]  == 1 || $_SESSION["evento_hora"] == 1){
    header("Location: index.php");
}else{
$query = "INSERT INTO TB_EVENTOS (EVENTO_TITULO, EVENTO_DESC, EVENTO_DATA, EVENTO_HORA, EVENTO_USERID, EVENTO_LOCAL) VALUES ('$EVENTO_TITULO', '$EVENTO_DESC', '$EVENTO_DATA', '$EVENTO_HORA', '$EVENTO_USERID', '$EVENTO_LOCAL')";
mysqli_query($conexao,$query) or die("Erro: não foi possível registrar o evento no banco de dados!");
mysqli_close($conexao);
header("Location: index.php");
}
?>