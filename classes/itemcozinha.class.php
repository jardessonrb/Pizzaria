<?php 

Class itemcozinha{

	public function cadastrarItemCozinha($dados){

		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_itenscozinha(cod_fornecedor, nome_item, quantidade, validade, valor_item, descricao_item, categoria) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]'";


		return mysqli_query($conexao, $sql);

	}
}

?>