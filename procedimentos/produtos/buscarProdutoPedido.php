<?php 

require_once "../../classes/produtos.class.php";
require_once "../../classes/conexao.class.php";

$obj = new produtos();

$dados = array(

    $_POST['id_produto']

);

echo $obj->buscarProdutoPedido($dados);

?>