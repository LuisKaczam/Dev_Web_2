<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
    <?php
    session_start();
    ?>
</head>
<body class="cadastro">
    <div class="min-h-screen flex items-center">
        <div class="container mx-auto max-w-md transition duration-300">
            <h1 class="imgLogo text-center text-white mt-1 mb-16">Keep Me P🕑sted</h1>
          <div class="py-12 p-10 bg-white rounded-xl shadow-md hover:shadow-lg">
          <div class="mb-6 text-center text-3xl">
              <label class="text-gray-700 font-bold" for="name">Cadastrar</label>
            </div>
            <div class="mb-6">
            <form name="Cadastro" action="banco.php" method="POST">
                <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="nome">Nome</label>
                <input type="text" class="border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-indigo-400 rounded"  placeholder="Nome" name="USER_NOME" value="<?php if(isset($_POST["USER_NOME"])){
                  echo $_POST["USER_NOME"];
                }?>" />
                <?php
                if(isset( $_SESSION["nome"])){
                 if($_SESSION["nome"] == 1){
                   echo " <p id='aviso' class='text-sm inline-block ml-2'>Nome Inválido</p>";
                   unset($_SESSION["nome"]);
                  }
                }
              ?>
              </div>
            <div class="mb-6">
              <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="email">E-mail</label>
              <input type="email" class="border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-indigo-400 rounded" placeholder="E-mail" name="USER_EMAIL" value="<?php if(isset($_POST["USER_EMAIL"])){
                  echo $_POST["USER_EMAIL"];
                }?>" />
              <?php
              if(isset( $_SESSION["email"]) && isset($_SESSION["EMAIL_CERTO"])){
                 if($_SESSION["email"] == 1 || $_SESSION["EMAIL_CERTO"] == 1){
                   echo " <p id='aviso' class='text-sm inline-block ml-2'>Email Inválido</p>";
                   unset($_SESSION["email"]);
                   unset($_SESSION["EMAIL_CERTO"]);
                  }
                }
              ?>
            </div>
            <div class="">
              <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="senha">Senha</label>
              <input type="password" class="border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-indigo-400 rounded" placeholder="Senha" name="USER_SENHA"/>
              <?php
              if(isset( $_SESSION["senha"])){
                 if($_SESSION["senha"] == 1){
                  echo " <p id='aviso' class='text-sm inline-block ml-2'>A senha deve conter no mínimo 4 caracteres.</p>";
                  unset($_SESSION["senha"]);
                  }
                }
              ?>
            </div>
            <button class="w-full mt-6 text-indigo-50 font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-500 transition duration-300" type="submit" name="cadastrar">CADASTRAR</button>
            <p class="text-center ml-20 text-sm text-gray-700 inline-block mt-4">Já tem uma conta? Faça <a href="login.php" class="text-indigo-600  hover:text-indigo-600 hover:underline hover:cursor-pointer transition duration-200">Login</a></p>
          </form>
          </div>
        </div>
      </div>
      <footer class="text-center lg:text-left bg-black w-full">
        <div class="text-white text-center p-4">
        © 2022 Copyright: Luis Felipe Kaczam
        </div>
      </footer>
  </body>
</html>