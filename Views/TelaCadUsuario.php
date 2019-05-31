<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastro de Produtos</title>
		<meta charset="latin1">
		<?php require_once "TelaMenu.php"; ?>
		<?php require_once "dependencias.php" ?>
		<script src="../js/funcoes.js"></script>

	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Cadastro do Usuario</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadUsuario">
						<label>Usuario</label>
						<input type="text" class="form-control input-sm" id="nome_user" name="nome_user">
						<label>Senha</label>
						<input type="password" class="form-control input-sm" id="senha_user" name="senha_user">
						<label>Nivel de Acesso</label>
						<input type="number" class="form-control input-sm" id="acesso_user" name="acesso_user">
						<label>Código Funcionário</label>
						<input type="number" class="form-control input-sm" id="cod_funcio" name="cod_funcio">
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 270px" id="btnNovoUsuario">Cadastrar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>
