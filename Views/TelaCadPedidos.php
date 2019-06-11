<!DOCTYPE html>
<html>
<head>
	<title>Tela de Pedido</title>
	<meta charset="latin1">
	<?php require_once "TelaMenu.php"; ?>
	<?php require_once "dependencias.php" ?>
	<script src="../js/funcoes.js"></script>
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/telapedido.css">
</head>
<body>
	<div id="container" >
	 <h1>Cadastro Pedido</h1>
			<div id="buscar_cliente">
				<form id="frmCadProduto">
					<input type="text" class="form-control input-sm" id="nome_cliente" name="nome_cliente" placeholder="nome cliente">
					<span class="btn btn-primary" id="btnBuscarCliente">Buscar</span>
				</form>
			</div>

			<div id="buscar_produto">
				<input type="text" class="form-control input-sm" id="codigo_produto" name="codigo_produto" placeholder="código produto">
				<span class="btn btn-danger" id="btnBuscarProduto">Buscar</span><br>		
			</div>
			<form id="posiciona_form">
				<label>Produto:</label>
				<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto" placeholder="nome produto"> 
				<label>Valor:</label>
				<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto" placeholder="valor"> 
				<label>Quantidade:</label>
				<input type="text" class="form-control input-sm" id="quantidade" name="quantidade" placeholder="Quantidade "><br>
				<span class="btn btn-danger" id="btnInserirProduto">Inserir Produto</span>
			</form>
			<hr id="hrdivision">
	</div>
	<div id="posicionaItem">
	    <div id=""> 
			<table id="tableitem" border="1">
				<tr id="cabecaTable">
					<td>Código</td>
					<td>Produto</td>
					<td>Quantidade</td>
					<td>Valor</td>
					<td>Cancelar</td>
				</tr>
				<tr>
					<td>teste</td>
					<td>teste</td>
					<td>teste</td>
					<td>teste</td>
					<td>teste</td>
				</tr>

			</table>
		</div>
			<div id="finalizarCompra">
				<label>Valor Total</label>
				<input type="text" id="valor_total" name="valor_total">
				<span class="btn btn-danger" style="position: relative;" id="btnFinalizarCompra">Concluir
				</span>
			</div>
	</div>
</body>
</html>