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
	<div class="container" style="position: relative; top: 30px">
			<h1>Cadastro Pedido</h1>
			<div class="row">
				<div id="buscar_cliente">
					<form id="frmCadProduto">
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto" placeholder="nome cliente">
						<span class="btn btn-primary" id="btnBuscarCliente">Buscar</span>
					</form>
				</div>
					<form>
						<input type="text" class="form-control input-sm" id="codigo_cliente" name="codigo_cliente" placeholder="código produto">
						<span class="btn btn-danger" id="btnBuscarProduto">Buscar</span><br>
						<label>Produto:</label>
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto">
						<label>Valor:</label>
						<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto">
						<label>Quantidade:</label>
						<input type="text" class="form-control input-sm" id="quantidade" name="quantidade"><br>
						<span class="btn btn-danger" id="btnInserirProduto">Inserir Produto</span>
					</form>
				</div>
				<div class="col-sm-4" style="position: relative; margin-left: 30%;">
					<table border="1">
						<tr>
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
				<div class="col-sm-4" style="position: relative; margin-left: 30%;">
					<label>Valor Total</label>
					<input type="text" id="valor_total" name="valor_total">
					<span class="btn btn-danger" style="position: relative;" id="btnCadastrarProduto">Concluir
					</span>
				</div>
			</div>
		</div>

</body>
</html>