<?php
include "include/conexao.php";

    if(isset($_POST["btnacao"])){
        
        $login = $_POST["login"];
        $senha = md5($_POST["senha"]);

        $sql = "SELECT funcionario from funcionario
         WHERE login = '$login' 
                and senha = '$senha'
                 and ativo = 1 ";
        $res = mysqli_query($conexao, $sql);

         if(mysqli_num_rows($res)==1){
            echo "passou aqui";
            $linha = mysqli_fetch_assoc($res);
            $funcionario = $linha['funcionario'];
            session_start();
            $_SESSION['usuario'] = $funcionario;
            header('Location: index.php');
         }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mobile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">    

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
        <form name="frm_login" method="POST" action="login.php">
        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <img src="logo_etec.jpeg" class="img-responsive" alt="ETEC Antonio Devisate">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>                    
                        <div class="col-md-10">
                            <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="login" class="form-control" id="login" value="">
                            </div>
                        </div>                         
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" value="">
                        </div>
                    </div> 
                    <div class="col-md-1"></div>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group"> 
                        <center>                       
                        <input type="submit" name="btnacao" class="btn btn-primary" id="btnacao" value="Entrar">
                        </center>
                        </div>
                    </div> 
                    <div class="col-md-1"></div>
                </div>               
            </div>           
        </div>
        </form>
    </div>
  </body>
  </html>