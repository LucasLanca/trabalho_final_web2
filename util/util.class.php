<!-- Author Lucas Lança
    Classe Util-->
<?php
	//Classe usada para fazer a validação dos campos no form
	class Util {

	//Validar email
	public function validarEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	//Expressão regular
	public function testarExpressaoRegular($expressao, $atributo){
		return preg_match($expressao,$atributo);
	}

	//Converter para maiúsculo:
	public function converterMaiusculo($variavel){
		return strtoupper($variavel);
	}
	//Converter para minusculo:
	public function converterMinusculo($variavel){
		return strtolower($variavel);
	}
	//Quantidade de caracteres:
	public function contarCaracteres($variavel){
		return strlen($variavel);
	}
	//Retirar Espaço:
	public function retirarEspaco($variavel){
		return trim($variavel);
	}
	//Começar em maiúsculo:
	public function converterPrimeiraLetra($variavel){
		return ucwords($variavel);
	}
}
?>
