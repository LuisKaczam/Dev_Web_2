<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
  	<link href="../dist/output.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Ler Relatório</title>
  <?php
include_once("validaSessão.php");
include_once("conectar.php");
?>
</head>
<body class="bg-light text-dark">
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> <button class="navbar-toggler" type="button"
        data-target="#navigation"> <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse">
        <h1 class="imgLogo2 ml-3 text-white mt-2 mb-2 mr-0">Keep Me P🕑sted</h1>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a href="index.php" class="nav-link"> Compromissos e Reuniões </a> </li>
          <li class="nav-item"> <a href="tela_relatorio.php" class="nav-link"> Escrever Relatórios </a> </li>
          <li class="nav-item active" class="nav-item"> <a href="relatorios.php" class="nav-link"> Relatórios </a> </li>
        </ul>
      </div>
      <img id="avatar" src="user.png" class="rounded-circle mb-1 mr-4" style="width: 50px;"
  alt="Avatar" />

<p class="mb-2 ml-4 mr-4 text-white"><strong><?php echo $_SESSION["nome"]?></strong></p>
      <div class="d-flex flex-row-reverse mr-4">
      <div class="flex space-x-2 justify-center">
  <div>
    <a style="text-decoration: none;" href="sair.php"><button type="button" class="h-8 px-6 pt-2.5 pb-2 flex btnSair font-medium rounded shadow-md">
    <svg width="18px" height="18px" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-door-closed mt-2 mr-2">
  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
    </svg>
      <span class="mt-1"> SAIR </span>
    </button><a>
  </div>
</div>
</div>
    </nav>
  </header>
  <?php 
if(isset($_GET['tabela']) && isset($_GET['idRelatorio']) && isset($_GET['codigo']) && isset($_GET['origem'])){
	$tabela = $_GET['tabela'];
	$id = $_GET['idRelatorio'];
	$codigo = $_GET['codigo'];
	$query = "SELECT * FROM $tabela WHERE $id = $codigo";
	$sql = mysqli_query($conexao, $query) or die ('ERRO - Não foi possível executar a Query: ' . mysqli_error($conexao));
}
?>
<div class="h-screen w-full">
<div class="d-flex justify-content-center">
  <div class="w-50 mt-4 form-outline mb-4">
     <h1 class="text-center mt-6">Relatório</h1>
	 <div class="d-flex justify-content-center">
	<div class="w-full d-flex justify-content-center mt-4 btn-group">
    <button id="b" onclick="butalico()" type="button" class="btn btn-dark"><i class="fa fa-bold"></i></button>
    <button id="ital" onclick="italico()" type="button" class="btn btn-dark"><i class="fa fa-italic"></i></button>
    <button id="ctro" onclick="AlinharCentro()" type="button" class="btn btn-dark"><i class="fa fa-align-center"></i></button>
    <button id="j" onclick="AlinharJustificado()" type="button" class="btn btn-dark"><i class="fa fa-align-justify"></i></button>
   </div>
 </div>
 <div class="d-flex justify-content-center">
 <div class="form-outline mb-4 shadow-md p-3 bg-white rounded">
	<?php
	if($relatorio = mysqli_fetch_assoc($sql)){
	?>
        <textarea maxlength="300" style="text-align:left;" class="form-control" id="texto" rows="20" cols="93" name="RELATORIO_TEXTO"><?php echo $relatorio["RELATORIO_TEXTO"];?></textarea>
      </div>
	  <?php }?>
 </div>
 <div class="w-full d-flex flex-row-reverse mt-8">
 <a style="text-decoration: none;" href="relatorios.php"><button name="btnSalvarRelatorio" type="submit" class="btn btn-success btn-block mb-4 mr-4"><i class="fa fa-arrow-left"></i> Voltar</button></a>
    </div>
    </div>
  </div>



	<?php
  echo '<script language="javascript">';
  echo 'function italico(){
    const italicoo = document.getElementById("texto").style.fontStyle;
    if(italicoo == "italic"){
      document.getElementById("texto").style.fontStyle = "normal";
      document.getElementById("ital").style.backgroundColor = "#212529";
      document.getElementById("ital").style.color = "#F8F9FA";
    }else{
      document.getElementById("texto").style.fontStyle = "italic";
      document.getElementById("ital").style.backgroundColor = "#F8F9FA";
      document.getElementById("ital").style.color = "black";
    }
      }';
  echo '</script>';

  echo '<script language="javascript">';
  echo 'function butalico(){
      const negrito = document.getElementById("texto").style.fontWeight;
      if(negrito == "bold"){
        document.getElementById("texto").style.fontWeight = "normal";
        document.getElementById("b").style.backgroundColor = "#212529";
        document.getElementById("b").style.color = "#F8F9FA";
      }else{
        document.getElementById("texto").style.fontWeight = "bold";
        document.getElementById("b").style.backgroundColor = "#F8F9FA";
        document.getElementById("b").style.color = "black";
      }
      }';
  echo '</script>';

  echo '<script language="javascript">';
  echo 'function AlinharCentro(){
      const negrito = document.getElementById("texto").style.textAlign;
      if(negrito == "left" || negrito == "justify"){
        document.getElementById("texto").style.textAlign = "center";
        document.getElementById("ctro").style.backgroundColor = "#F8F9FA";
        document.getElementById("ctro").style.color = "black";
        document.getElementById("j").style.backgroundColor = "#212529";
        document.getElementById("j").style.color = "#F8F9FA";
        
      }else{
        document.getElementById("texto").style.textAlign = "left";
        document.getElementById("ctro").style.backgroundColor = "#212529";
        document.getElementById("ctro").style.color = "#F8F9FA";
      }
      }';
  echo '</script>';

  echo '<script language="javascript">';
  echo 'function AlinharJustificado(){
      const negrito = document.getElementById("texto").style.textAlign;
      if(negrito == "left" || negrito == "center"){
        document.getElementById("texto").style.textAlign = "justify";
        document.getElementById("j").style.backgroundColor = "#F8F9FA";
        document.getElementById("j").style.color = "black";
        document.getElementById("ctro").style.backgroundColor = "#212529";
        document.getElementById("ctro").style.color = "#F8F9FA";
      }else{
        document.getElementById("texto").style.textAlign = "left";
        document.getElementById("j").style.backgroundColor = "#212529";
        document.getElementById("j").style.color = "#F8F9FA";
      }
      }';
  echo '</script>';
?>
<footer class="footer navbar-fixed-bottom" class="text-center lg:text-left bg-black w-full">
        <div class="text-white text-center p-4">
        © 2022 Copyright: Luis Felipe Kaczam
        </div>
      </footer>
    </div>
</body>
</html>