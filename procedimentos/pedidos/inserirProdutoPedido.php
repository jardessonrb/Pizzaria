<?php 

require_once "../../classes/pedido.class.php";
require_once "../../classes/conexao.class.php";

$obj = new Pedido();

$dados = array(

    $_POST['quantidade'],

);

echo $obj->inserirProdutoPedido($dados);

?>