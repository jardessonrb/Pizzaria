<?php 

	require_once "../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();
    
    $sql =  "SELECT cod_funcionario, nome_funcionario, salario, data_nascimento, data_admissao, cargo, telefone FROM tab_funcionario ";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	<?php require_once "TelaMenu.php" ?>
	<link rel="stylesheet" type="text/css" href="../css/estiloListagemPedido.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="principal">
		<h2>Listagem de Funcionários</h2>
		<div id="row">
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topotabela">
							<td>Cod Funcionário</td>
							<td>Nome</td>
							<td>Salário</td>
							<td>Nascimento</td>
							<td>Admissão</td>
							<td>Cargo</td>
							<td>Telefone</td>
							<td>Editar</td>
						</tr>

						<?php while($mostrar = mysqli_fetch_row($result)): ?>

						<tr id="corpo_tabela">
							<td><?php echo $mostrar[0]; ?></td>
							<td><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2]; ?></td>
							<td><?php echo $mostrar[3]; ?></td>
							<td><?php echo $mostrar[4]; ?></td>
							<td><?php echo $mostrar[5]; ?></td>
							<td><?php echo $mostrar[6]; ?></td>
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