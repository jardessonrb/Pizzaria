<?php 

Class Pedido{
   
    public function iniciarPedido($dados){
        
        $c = new conectar();

		$conexao = $c->conexao();

		$valto = 10;
		$codfun = 2;
    	$data = date('Y/m/d');
    	$hora = date('H:i:s');
    		

    	$sql = "INSERT INTO tab_pedido(data_pedido, hora_pedido, valor_total, cod_cliente, cod_funcionario) VALUES ('$data', '$hora', '$valto', '$dados[0]', '$codfun')";
        

    	$result = mysqli_query($conexao, $sql);

    	if ($result == "false") {
    		return 1;
    	} else {
    		return 0;
    	}
    	


    }


    public function inserirProdutoPedido($dados){
         $c = new conectar();

        $conexao = $c->conexao();

        $cod_pedido = 42;
        $cod_produto = 16;

        $sql = "INSERT INTO tab_itempedido(quantidade, cod_produtovenda, cod_pedido) VALUES ('$dados[0]','$cod_produto', '$cod_pedido')";
        

        $result = mysqli_query($conexao, $sql);
        

        if ($result == "false") {
            return 1;
        } else {
            return 0;
        }

    }
}

?>