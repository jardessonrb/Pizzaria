<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	<?php require_once "TelaMenu.php" ?>
	<link rel="stylesheet" type="text/css" href="../css/estiloListagemPedido.css">
</head>
<body>
	<div class="principal">
		<h2>Listagem de Pedidos</h2>
		<div id="row">
			<fieldset id="fildset">

				<div id="pesquisa">
					<span id="de">De</span><input type="date" class="form-control" id="dataInicio"></input><span id="ate">Até</span>
					<input type="date" class="form-control" id="dataFim"></input>
					<span class="btn btn-danger" id="btnPesquisaData">buscar</span>

				</div>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topotabela">
							<td>Codigo</td>
							<td>Hora</td>
							<td>valor total</td>
							<td>Cliente</td>
							<td>Funcionario</td>
							<td>Status</td>
							<td>Cancelar</td>
						</tr>
						<tr id="dadostabela">
							<td>Codigo</td>
							<td>Hora</td>
							<td>valor total</td>
							<td>Cliente</td>
							<td>Funcionario</td>
							<td>Status</td>
							<td>X</td>
							
						</tr>
					</table>
					
				</div>
				
			</fieldset>
		</div>
	</div>

</body>
</html>