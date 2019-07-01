<?php 

	require_once "../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();

    $atual = date('Y/m/d');
    
    $sql =  "SELECT data_pedido, valor_total, hora_pedido, cod_pedido, cod_cliente, status_pedido FROM tab_pedido WHERE data_pedido >= '$atual' ";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	<?php require_once "TelaMenu.php" ?>
	<link rel="stylesheet" type="text/css" href="../css/listagem_geral.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="principal">
			<div id="cabecalho_pesquisa">
			<h2>Listagem de Pedidos</h2>
				<div id="pesquisa">
					<form id="frmpesquisa" action="listagem/listagemPedido.esp.php" method="POST">
						<span id="de">De</span>
						<input type="date" class="form-control" id="dataInicio" name="dataInicio" required></input>
						<span id="ate">Até</span>
						<input type="date" class="form-control" id="dataFim" name="dataFim" required=""></input>
						<button type="submit" class="btn btn-primary" id="btnPesquisaData">buscar</button>
						<!--<span class="btn btn-danger" id="btnPesquisaData">Testar</span>-->
					</form>
				</div>
				<span id="mostra_data">Pedidos Feitos em <?php echo date('d/m/Y') ?></span>
		    </div>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topo_tabela">
							<td>data</td>
							<td>valor</td>
							<td>hora</td>
							<td>numero</td>
							<td>Cliente</td>
							<td>Status</td>
							<td>Editar</td>
							<td>Cancelar</td>
						</tr>

						<?php while($mostrar = mysqli_fetch_row($result)): ?>

						<tr id="corpo_tabela">
							<td><?php echo $mostrar[0]; ?></td>
							<td><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2]; ?></td>
							<td><?php echo $mostrar[3]; ?></td>
							<td><?php echo $mostrar[4]; ?></td>
							<td><?php echo $mostrar[5]; ?></td>
							<td>
						    <span class="btn btn-primary btn-xs" onclick="editarPedido('<?php echo $mostrar[0]?>')"><span>
					           <span class="glyphicon glyphicon-pencil"></span>
					        </span>
							</td>
							<td>
						    <span class="btn btn-primary btn-xs" onclick="cancelarPedido('<?php echo $mostrar[0]?>')"><span>
					           <span class="glyphicon glyphicon-remove"></span>
					        </span>
							</td>
						</tr>

			<?php endWhile; ?>
					</table>
					
				</div>
		</div>
	</div>

</body>
</html>
