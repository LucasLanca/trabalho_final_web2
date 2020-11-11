<!-- Author Lucas Lança
    Classe controller, vai comandar o CRUD recebendo os dados das outras páginas e do banco -->
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Controller </title>
    <link rel="shortcut icon" href="../img/icon.jpg">
    <meta name="author" content="Lucas Lança">
    <meta name="description" content="Trabalho Final">
    <meta name="keywords" content="PHP, HTML, CSS, bootstrap, js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body>
    <main>

      <header class="jumbotron text-center">
        <h1 class="text-center"> Área do controller </h1>
        <hr>
        <a class="btn btn-dark" href="../view/cadastro.php"> Voltar para formulário </a>
        <a class="btn btn-dark" href="../view/buscarpessoas.php">Vizualizar Tabela</a>
      </header>

      <section class="container">
        <?php
          //Iniciando Sessão
          session_start();
          //Incluindo classes
          include '../model/pessoa.class.php';
          include '../util/util.class.php';
          include '../dao/pessoadao.class.php';

          //Incluindo classe Util
          $u1 = new Util();
          //Switch para organizar o CRUD
          switch($_REQUEST['op']) {
              //Programação para cadastro de usuários
              case cadastrar:
                //Pegando os casos do form
                $nome = $_POST['nome'];
                $dataDeNascimento = $_POST['nascimento'];
                $email = $_POST['email'];
                $celular = $_POST['celular'];

                //Fazendo validações
                if (empty($nome) || empty($dataDeNascimento) || empty($email) || empty($celular)) {
                  echo "Preencha os dados";
                }else if(!$u1->testarExpressaoRegular('/^[A-Za-zÀ-Úà-ú ]{2,30}$/',$nome)){
                  echo "Nome fora do padrão";
                }else if(!$u1->testarExpressaoRegular('/^[0-9]{9,20}$/',$celular)){
                  echo "Celular fora do padrão";
                }else if(!$u1->validarEmail($email)){
                  echo "Email fora do padrão";
                } else {
                  //Instanciando classe Pessoa
                  $p1 = new Pessoa();
                  //Atribuindo os objetos
                  $p1->nome = $nome;
                  $p1->dataDeNascimento = $dataDeNascimento;
                  $p1->email = $email;
                  $p1->celular = $celular;
                  //Enviando para o banco de dados
                  $pessoaDAO = new PessoaDAO();
                  $pessoaDAO->cadastrarPessoa($p1);
                  //Levando para página de sucesso para informar usuário
                  header('location:../view/paginasucesso.html');
                }
              break;
              //Programação para exclusão de usuários
              case 'deletar':
                //Instanciando classe DAO
                $pDAO = new PessoaDAO();
                $pDAO->deletarPessoa($_REQUEST['idpessoa']);
                //Voltando para página com tabela
                header('location: ../view/buscarpessoas.php');
              break;
              case 'alterar':
              //Programação para alteração de usuários
                $idpessoa = $_REQUEST['idpessoa'];
                $query = 'WHERE idpessoa = '.$idpessoa;
                $pDAO = new PessoaDAO();
                $pessoas = array();
                $pessoas = $pDAO->buscar($query);
                $_SESSION['pessoas'] = serialize($pessoas);
                header('location:../view/alterarpessoas.php');
              break;
              case 'confirmaralteracao':
                //instanciamos a classe Pessoa
                $p = new Pessoa();
                //Dados alterados no form
                $idpessoa = $_REQUEST['codigo'];
                $nome = $_REQUEST['nome'];
                $dataDeNascimento = $_REQUEST['nascimento'];
                $email = $_REQUEST['email'];
                $celular = $_REQUEST['celular'];
                if (empty($nome) || empty($dataDeNascimento) || empty($email) || empty($celular)) {
                  echo "Preencha os dados";
                }else if(!$u1->testarExpressaoRegular('/^[A-Za-zÀ-Úà-ú ]{2,30}$/',$nome)){
                  echo "Nome fora do padrão";
                }else if(!$u1->testarExpressaoRegular('/^[0-9]{9,20}$/',$celular)){
                  echo "Celular fora do padrão";
                }else if(!$u1->validarEmail($email)){
                  echo "Email fora do padrão";
                } else {
                $p->idpessoa = $idpessoa;
                $p->nome = $nome;
                $p->dataDeNascimento = $dataDeNascimento;
                $p->email = $email;
                $p->celular = $celular;
                //Instanciamos a classe DAO
                $pDAO = new PessoaDAO();
                //invocamos a função alterarcotao
                $pDAO->alterarPessoa($p);
                //Voltamos para a tabela alterada
                header('location:../view/buscarpessoas.php');
              }
              break;
              default:
                echo "Deu erro ai. ";
        }
         ?>
      </section>
    </main>
  </body>
</html>
