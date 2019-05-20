<?php 

require_once "../../classes/conexao.php";
require_once "../../classes/produtos.php";


$obj = new produtos();



$dados=array(
	$_POST['nome'],
	$_POST['valor'],
	$_POST['descricao'],
	$_POST['quantidade']
);

echo $obj->adicionar($dados);

 ?>