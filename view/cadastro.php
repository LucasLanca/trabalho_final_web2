<!-- Author Lucas Lança
    Página de cadastro, apresentação do formulário para envio para banco de dados-->
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Cadastro </title>
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
    <main class="fundo1">
      <header class="jumbotron text-center">
        <h1>Complete todo o formulário e Envie</h1>
        <hr>
        <a class="navbar-brand btn btn-dark" href="../index.html">Voltar para página inicial</a>
        <a class="navbar-brand btn btn-dark" href="buscarpessoas.php">Vizualizar Usuários</a>
      </header>

      <form class="container" action="../controller/pessoa.controller.php?op=cadastrar" method="post" name="form01">
        <label for="nome">
          Nome:
        </label>
        <input type="text" name="nome" pattern="^[A-Za-zÀ-Úà-ú ]{2,30}$" class="form-control">
        <br>
        <label for="nascimento">
          Data de Nascimento:
        </label>
        <input type="date" name="nascimento" class="form-control">
        <br>
        <label for="email">
          Email:
        </label>
        <input type="email" name="email" class="form-control">
        <br>
        <label for="celular">
          Telefone:
        </label>
        <input type="number" name="celular" pattern="^[0-9]{9,20}$" class="form-control">
        <br>
        <input type="reset" name="limpa" value="Limpar" class="btn btn-dark">
        <input type="submit" name="envia" value="Enviar" class="btn btn-dark">
        <hr>
      </form>
    </main>
  </body>
</html>
