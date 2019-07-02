<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/clientes.class.php";


$obj = new clientes();

echo json_encode($obj->obterDadosCliente($_POST['idcliente']));


 ?>
