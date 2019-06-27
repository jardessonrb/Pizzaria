<?php 

	require_once "../../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();

    $data1 = $_POST['dataInicio'];
    $data2 = $_POST['dataFim'];

  
    $sql =  "SELECT data_pedido, valor_total, hora_pedido,cod_pedido FROM `tab_pedido` WHERE data_pedido  BETWEEN '$data1' AND '$data2'";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/estiloListagemPedido.css">
</head>
<body>
	<div class="principal">
		<h2>Listagem de Pedidos</h2>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topotabela">
							<td>data</td>
							<td>valor</td>
							<td>hora</td>
							<td>numero</td>
							<td>Cancelar</td>
						</tr>

						<?php while($mostrar = mysqli_fetch_row($result)): ?>

						<tr id="corpo_tabela">
							<td><?php echo $mostrar[0]; ?></td>
							<td><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2]; ?></td>
							<td><?php echo $mostrar[3]; ?></td>
							<td>
							   <span class="btn btn-danger btn-xs" onclick="excluirMemorando('<?php echo $mostrar[0]?>')"><span>
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