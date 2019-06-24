<?php 

class produtos{

  public function cadastrarProduto($dados){

  	$con = new conectar();
  	$conexao = $con->conexao();

  	$sql = "INSERT INTO tab_produtovenda(nome_produto, valor_produto, descricao_produto, qnt_produto)VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]');";


  	return mysqli_query($conexao, $sql);

  }


  public function buscarProdutoPedido($dados){

    	$con = new conectar();
    	$conexao = $con->conexao();

    	$sql = "SELECT cod_produtovenda, nome_produto, valor_produto FROM tab_produtovenda WHERE cod_produtovenda='$dados[0]'";


    	$result = mysqli_query($conexao, $sql);

      $mostra = mysqli_fetch_row($result);

     $dados = array(

        'cod_produtovenda' => $mostra[0],
        'nome_produto' => $mostra[1],
        'valor_produto' => $mostra[2]
        
     );

     return $dados;


  }

}

?>