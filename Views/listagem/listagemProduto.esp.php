<?php 

	require_once "../../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();

    $nome = $_POST['busca_produto_cliente'];
    

  
    $sql =  "SELECT cod_produtovenda, nome_produto, descricao_produto, qnt_produto, valor_produto FROM tab_produtovenda WHERE nome_produto LIKE '%$nome%';";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	<?php require_once "../dependencias.php" ?>
	<link rel="stylesheet" type="text/css" href="../../css/estiloListagemPedido.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">

</head>
<body>
	<div class="principal">
		<h2>Listagem de Cliente Especifica</h2>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topotabela">
							<td>Cod Produto</td>
							<td>Nome Produto</td>
							<td>Descrição</td>
							<td>Qnt. Estoque</td>
							<td>Valor</td>
							<td>Editar</td>
						</tr>

						<?php while($mostrar = mysqli_fetch_row($result)): ?>

						<tr id="corpo_tabela">
							<td><?php echo $mostrar[0]; ?></td>
							<td><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2]; ?></td>
							<td><?php echo $mostrar[3]; ?></td>
							<td><?php echo $mostrar[4]; ?></td>
							<td>
						    <span class="btn btn-primary btn-xs" onclick="editarPedido('<?php echo $mostrar[0]?>')"><span>
					           <span class="glyphicon glyphicon-pencil"></span>
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