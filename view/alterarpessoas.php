<!-- Author Lucas Lança
    Página onde poderão ser alterados os campos do usuário -->
<?php
//Iniciando sessão
  session_start();
 ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Alterar Usuários </title>
    <link rel="shortcut icon" href="../img/icon.jpg">
    <meta name="author" content="Lucas Lança">
    <meta name="description" content="Trabalho Final">
    <meta name="keywords" content="PHP, HTML, CSS, bootstrap, js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body>
    <main>
      <header class="jumbotron text-center">
          <h1> Faça sua alteração </h1>
          <hr>
          <a href="../index.html" class="btn btn-dark">Voltar para página Inicial</a>
          <a href="buscarpessoas.php" class="btn btn-dark">Voltar lista de Usuários</a>
      </header>
      <section class="container">

        <?php
          if (isset($_SESSION['pessoas'])) {
            include_once('../model/pessoa.class.php');
            $p = array();
            $p = unserialize($_SESSION['pessoas']);
          }
         ?>

        <form class="container" action="../controller/pessoa.controller.php?op=confirmaralteracao" method="post" name="form01">
          <label for="codigo">
            Código:
          </label>
          <input type="number" name="codigo" class="form-control" value="<?php echo $p[0]->idpessoa ?>" readonly="readonly">
          <label for="nome">
            Nome:
          </label>
          <input type="text" name="nome" pattern="^[A-Za-zÀ-Úà-ú ]{2,30}$" class="form-control" value="<?php echo $p[0]->nome ?>">
          <br>
          <label for="nascimento">
            Data de Nascimento:
          </label>
          <input type="date" name="nascimento" class="form-control" value="<?php echo $p[0]->dataDeNascimento ?>">
          <br>
          <label for="email">
            Email:
          </label>
          <input type="email" name="email" class="form-control" value="<?php echo $p[0]->email ?>">
          <br>
          <label for="celular">
            Telefone:
          </label>
          <input type="number" name="celular" pattern="^[0-9]{9,20}$" class="form-control" value="<?php echo $p[0]->celular ?>">
          <br>

          <?php
          //Finalizando Sessão
          unset($_SESSION['pessoas']);
           ?>
          <input type="reset" name="limpa" value="Limpar" class="btn btn-dark">
          <input type="submit" name="altera" value="Alterar" class="btn btn-dark">
          <hr>
        </form>
      </section>
    </main>
  </body>
</html>
