<?php 

Class Pedido{
   
    public function iniciarPedido($dados){
        
        $c = new conectar();

		$conexao = $c->conexao();

		$valto = 10;
		$codfun = 3;
    	$data = date('d/m/Y');
    	$hora = date('H:i:s');
    		

    	$sql = "INSERT INTO tab_pedido(data_pedido, hora_pedido, valor_total, cod_cliente, cod_funcionario) VALUES ('$data', '$hora', '$valto', '$dados[0]', '$codfun')";
        

    	$result = mysqli_query($conexao, $sql);

    	if ($result == "false") {
    		return 0;
    	} else {
    		return 1;
    	}
    	


    }
}

?>