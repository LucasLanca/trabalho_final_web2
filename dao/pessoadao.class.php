<!-- Author Lucas Lança
    Classe DAO, irá guardar os métodos do CRUD-->
<?php
  //Puxando classe Persistence
  require '../persistence/ConexaoBanco.class.php';
  //Acesso aos dados dos objetos
  class PessoaDAO {
    private $conexao = null;
    //Método construtor
    public function __construct() {
      $this->conexao = ConexaoBanco::getInstance();
    }
    //Método destrutor
    public function __destruct() {
    }
    //Área do CRUD
    //Função de cadastro
    public function cadastrarPessoa($p) {
      //Primeiro testar erros
      try {
        //Método para inserir dentro do banco
        $stat = $this->conexao->prepare("INSERT INTO pessoa(idpessoa,nome,dataDeNascimento,celular,email)VALUES(NULL,?,?,?,?)");
        //Pegando o nome da classe Pessoa através do método mágico
        $stat->bindValue(1,$p->nome);
        $stat->bindValue(2,$p->dataDeNascimento);
        $stat->bindValue(3,$p->celular);
        $stat->bindValue(4,$p->email);
        //Executar o cadastro
        $stat->execute();
      } catch (PDOException $e) {
        //Mensagem de erro
        echo "Erro ao cadastrar usuário. " .$e;
      }
    }
    //Método para vizualizar o banco
    public function buscarPessoas() {
      //Testar erros
      try {
        //Variável que recebe a query
        $stat = $this->conexao->query("SELECT * FROM pessoa");
        //Array para guardar os dados
        $array = array();
        $array = $stat->fetchAll(PDO::FETCH_CLASS,'Pessoa');
        $this->conexao = null;
        return $array;
      } catch (PDOException $e) {
        //Mensagem de erro
        echo "Erro ao buscar usuário. " .$e;
      }
    }
    //Método para deletar do banco
    public function deletarPessoa($idpessoa) {
      //Testar erros
      try {
        //Comando de exclusão do banco
        $stat = $this->conexao->prepare("DELETE FROM pessoa WHERE idpessoa=?");
        //Informando os dados
        $stat->bindValue(1,$idpessoa);
        //Executar a exclusão
        $stat->execute();
        $stat->conexao = null;
      } catch (PDOException $e) {
        //Mensagem de erro
        echo "Erro ao excluir usuário";
      }
    }
    //Método de busca de dados a fim de fazer alteração
    public function buscar($query) {
      //Testar erros
      try {
        //Criando query SELECT
        $stat = $this->conexao->query("SELECT * FROM pessoa ".$query);
        $array = $stat->fetchAll(PDO::FETCH_CLASS,'Pessoa');
        $this->conexao = null;
        //Objeto retorna em forma de array
        return $array;
      } catch (PDOException $e) {
        //Mensagem de erro
        echo "Erro ao buscar usuário" .$e;
      }
    }
    //Método para alterar os dados do banco
    public function alterarPessoa($p) {
      //Testar erros
      try {
        //Método de UPDATE
        $stat = $this->conexao->prepare("UPDATE pessoa SET nome = ?, dataDeNascimento = ?, celular = ?, email = ? WHERE idpessoa = ? ");
        //Definindo os dados da classe Pessoa
        $stat->bindValue(1,$p->nome);
        $stat->bindValue(2,$p->dataDeNascimento);
        $stat->bindValue(3,$p->celular);
        $stat->bindValue(4,$p->email);
        //Meu problema para o update estava aqui, tinha um $ antes do id, perdi o maior tempo do mundo com isso
        $stat->bindValue(5,$p->idpessoa);
        //Executando o UPDATE
        $stat->execute();
        $this->conexao = null;
      } catch (PDOException $e) {
        //Mensagem de erro
        echo "Erro ao editar usuário" .$e;
      }
    }
  }
 ?>
