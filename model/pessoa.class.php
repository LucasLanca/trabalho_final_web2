<?php

// Author: Lucas Lança
//Classe Pessoa, com os atributos que criarão o banco de dados
  class Pessoa {
    //Atributos
    private $idpessoa;
    private $nome;
    private $dataDeNascimento;
    private $celular;
    private $email;

    //Métodos
    //Método construtor - Método Mágico
    public function __construct() {
    }
    //Getters e Setters - Métodos Mágicos
    public function __get($atributo){
      return $this->$atributo;
    }
    public function __set($atributo,$valor){
      $this->$atributo = $valor;
    }
    //toString - Assim como os outros, Método Mágico
    public function __toString(){
      return
             "<br>Nome: ".$this->nome.
             "<br>Data de Nascimento: ".$this->dataDeNascimento.
             "<br>Celular: ".$this->celular.
             "<br>E-mail: ".$this->email;
    }
}
 ?>
