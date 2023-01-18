<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
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
              <label class="text-gray-700 font-bold" for="name">Login</label>
            </div>
            <div class="mb-6">
              <form name="Login" action="validaLogin.php" method="POST">
              <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="name">E-mail</label>
              <input type="text" class="border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-indigo-400 rounded" placeholder="E-mail" name="loginEmail" value="<?php if(isset($_POST["loginEmail"])){
                  echo $_POST["loginEmail"];
                }?>" />
              </div>
            <div class="mb-6">
              <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="name">Senha</label>
              <input type="password" class="border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-indigo-400 rounded" placeholder="Senha"  name="loginSenha"/>
              <?php
              if(isset( $_SESSION["login"])){
                 if($_SESSION["login"] == 1){
                   echo " <p id='aviso' class='text-center ml-20 mt-6 text-sm inline-block'>&nbsp&nbsp&nbspEmail e/ou senha Inválido</p>";
                   unset($_SESSION["login"]);
                  }
                }
              ?>
            </div>
            <button class="w-full mt-6 text-indigo-50 font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-500 transition duration-300">LOGIN</button>
            <p class="text-center ml-20 text-sm text-gray-700 inline-block mt-4">Não tem uma conta? <a href="cadastroUser.php" class="text-indigo-600  hover:text-indigo-600 hover:underline hover:cursor-pointer transition duration-200">Cadastre-se</a></p>
          </form>
        </div>
        </div>
      </div>
      <footer class="text-center lg:text-left bg-black h-25 w-full">
        <div class="text-white text-center p-4">
        © 2022 Copyright: Luis Felipe Kaczam
        </div>
      </footer>
  </body>
</html>