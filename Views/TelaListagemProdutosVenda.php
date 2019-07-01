<?php 

	require_once "../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();
    
    $sql =  "SELECT cod_produtovenda, nome_produto, descricao_produto, qnt_produto, valor_produto FROM tab_produtovenda";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Produtos</title>
	<?php require_once "TelaMenu.php" ?>
	<link rel="stylesheet" type="text/css" href="../css/estiloListagemPedido.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="principal">
		<h2>Listagem de Produtos</h2>
		<div id="row">
			<div id="pesquisa">
					<form id="frmpesquisa" action="listagem/listagemProduto.esp.php" method="POST">
						<span id="de">Nome</span>
						<input type="text" class="form-control" id="busca_produto_cliente" name="busca_produto_cliente" placeholder="Digite nome" required></input>
						<button type="submit" class="btn btn-primary" id="btnPesquisaData">buscar</button>
						<!--<span class="btn btn-danger" id="btnPesquisaData">Testar</span>-->
					</form>
				</div>
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
		</div>
	</div>

</body>
</html>