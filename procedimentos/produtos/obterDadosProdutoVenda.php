<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/clientes.class.php";


$obj = new produtos();

echo json_encode($obj->obterDadosProdutoModal($_POST['idproduto']));


 ?>