<?php 

class produtos{

  public function cadastrarProduto($dados){

  	$con = new conectar();
  	$conexao = $con->conexao();

  	$sql = "INSERT INTO tab_produtovenda(nome_produto, valor_produto, descricao_produto, qnt_produto)VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]');";


  	return mysqli_query($conexao, $sql);

  }

}

 ?>