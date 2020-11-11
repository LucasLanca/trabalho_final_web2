<!-- Author Lucas Lança
    Classe Persistence, extende de PDO, Liga back com o banco-->
<?php

class ConexaoBanco extends PDO {
  //Criando instância para criar conexão
  private static $instance = null;
  //Construtor mágico, Ele vem da classe PDO
  public function __construct($dsn, $user, $pass) {
    parent::__construct($dsn, $user, $pass);
  }
  //Pegando instacia para conectar com o banco
  public static function getInstance() {
    //Verificação se o banco ja existe, ele não pode existir para ser criado
    if (!isset(self::$instance)) {
      //Testr erros
      try{
        //Criação do banco
        self::$instance = new
        ConexaoBanco("mysql:dbname=id15371371_bd_pessoa;host=localhost","id15371371_lanca","!7{Iirc+Yi2K+Fed");
      }catch(PDOException $e){
        echo "Erro ao conectar. ";
      }
    }
    return self::$instance;
  }
}
 ?>
 <!-- k^dNBWr65dD36K!nMBzA
 banco:
 !7{Iirc+Yi2K+Fed -->
