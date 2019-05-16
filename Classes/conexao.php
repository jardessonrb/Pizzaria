<?php

class conectar{

	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $banco = "pizzaria";
    
    public function conexao(){
	      $conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);

		  return $conexao;
	}
	
}

?>