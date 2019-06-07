<?php 

Class funcionarios{

	public function cadastrarFuncionario($dados){

		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_funcionario (nome_funcionario, cargo, data_nascimento, cpf_funcionario,telefone, data_admissao, rua_funci, bairro_funci, numero, salario) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]','$dados[8]','$dados[9]')";


		return mysqli_query($conexao, $sql);

	}
}

?>