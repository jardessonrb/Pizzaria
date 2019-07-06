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

        $sql = "INSERT INTO tab_itempedido(quantidade, cod_produtovenda, cod_pedido) VALUES ('$dados[0]','$dados[1]', '$dados[2]')";
        

        $result = mysqli_query($conexao, $sql);
        

        if ($result == "false") {
            return 1;
        } else {
            return 0;
        }

    }
    public function buscarIdPedido($dado){
        $c = new conectar();

        $conexao = $c->conexao();


        $sql = "SELECT cod_pedido FROM tab_pedido ORDER BY cod_pedido DESC LIMIT 1";
        

        $result = mysqli_query($conexao, $sql);

        $mostra = mysqli_fetch_row($result);

        $dados = array(

            'cod_pedido' => $mostra[0]
        
         );

        return $dados;

    }

    public function buscarValorTotal($dados){

        $c = new conectar();

        $conexao = $c->conexao();

        $sql = "SELECT ite.quantidade, pro.valor_produto from tab_produtovenda pro JOIN tab_itempedido ite on pro.cod_produtovenda = ite.cod_produtovenda where ite.cod_pedido = '71'";

        $result = mysqli_query($conexao, $sql);

        $soma = 0;

        $mostra = mysqli_fetch_row($result);

        $soma = $mostra[0] * $mostra[1];

        $dados = array(

            'soma' => $soma
        );

        return $dados;

    }

    public function atualizarPedidoModal($dados){

        $c = new conectar();

        $conexao = $c->conexao();

        $sql = "UPDATE tab_pedido SET status_pedido = '$dados[1]' WHERE cod_pedido = '$dados[0]'";

        return mysqli_query($conexao, $sql);
    }

}

?>