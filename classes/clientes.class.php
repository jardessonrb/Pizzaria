<?php 

Class clientes{

	public function cadastrarCliente($dados){

		$con = new conectar();

    	$conexao = $con->conexao();
	   

		$sql = "INSERT INTO tab_cliente (nome_cliente, cpf_cliente, telefone, data_nascimento, rua_cliente, bairro_cliente, numero ) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]');";

	    return mysqli_query($conexao, $sql);


	}
}


?>