<!-- Author Lucas Lança
    Página que mostra toddos os cadastros que tem no banco de dados através de uma tabela
    Possui opções de excluir/alterar usuários-->
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Lista de Usuários </title>
    <link rel="shortcut icon" href="../img/icon.jpg">
    <meta name="author" content="Lucas Lança">
    <meta name="description" content="Trabalho Final">
    <meta name="keywords" content="PHP, HTML, css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body>
    <main>
      <header class="jumbotron text-center">
            <h1 class="text-center"> Lista de Usuários: </h1>
          <hr>
          <a href="../index.html" class="btn btn-dark">Voltar para página Inicial</a>
      </header>

      <section class="container">

        <?php

        include '../model/pessoa.class.php';
        include '../dao/pessoadao.class.php';

        $pessoaDAO = new PessoaDAO();

        $pessoas = $pessoaDAO->buscarpessoas();

         ?>
         <table class="table table-striped table-hover">
           <thead>
             <tr>
               <th>Código</th>
               <th>Nome</th>
               <th>Data de Nascimento</th>
               <th>Celular</th>
               <th>Email</th>
               <th>Editar/Excluir</th>
             </tr>
           </thead>
           <tbody>
             <?php
                foreach ($pessoas as $p) {
                  echo "<tr>";
                  echo "<td>".$p->idpessoa."</td>";
                  echo "<td>".$p->nome."</td>";
                  echo "<td>".$p->dataDeNascimento."</td>";
                  echo "<td>".$p->celular."</td>";
                  echo "<td>".$p->email."</td>";
                  echo "<td> <a href='../controller/pessoa.controller.php?op=alterar&idpessoa=$p->idpessoa'><img src='../img/edita.png' alt='icone editar'></a>&nbsp;&nbsp;
                        <a href='../controller/pessoa.controller.php?op=deletar&idpessoa=$p->idpessoa'><img src='../img/exclui.png' alt='icone excluir'></a>
                  <td>
                  </tr>";
                }
              ?>
      </section>
    </main>
  </body>
</html>
