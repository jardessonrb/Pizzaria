<?php 

	require_once "../../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();

    $data1 = $_POST['dataInicio'];
    $data2 = $_POST['dataFim'];

  
    $sql =  "SELECT cod_pedido,valor_total, hora_pedido,data_pedido, cli.nome_cliente, status_pedido FROM tab_pedido ped JOIN tab_cliente cli ON ped.cod_cliente = cli.cod_cliente WHERE data_pedido BETWEEN '$data1' AND '$data2'";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	<?php require_once "../dependencias.php" ?>
	<link rel="stylesheet" type="text/css" href="../../css/listagem_geral.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">

</head>
<body>
	<div class="principal">
		<h2>Listagem de Pedidos</h2>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topo_tabela">
							<td>Numero</td>
							<td>Valor</td>
							<td>Hora</td>
							<td>Data</td>
							<td>Cliente</td>
							<td>Status</td>
							<td>Detalhar</td>
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
							   <span class="btn btn-primary btn-xs" onclick="detalharPedido('<?php echo $mostrar[0]?>')"><span>
						        <span class="glyphicon glyphicon-search"></span>
						      </span>
							</td>
							<td>
						    <span class="btn btn-primary btn-xs" onclick="editarPedido('<?php echo $mostrar[0]?>')"><span>
					           <span class="glyphicon glyphicon-pencil"></span>
					        </span>
							</td>
							<td>
							   <span class="btn btn-primary btn-xs" onclick="detalharPedido('<?php echo $mostrar[0]?>')"><span>
						        <span class="glyphicon glyphicon-remove"></span>
						      </span>
							</td>
						</tr>

			<?php endWhile; ?>
					</table>
					
				</div>
				
			</fieldset>
		</div>
	</div>

</body>
</html>