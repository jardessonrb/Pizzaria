<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Fucnionário</title>
	<?php require_once "dependencias.php" ?>

</head>
<body>
	<?php require_once "TelaMenu.php" ?>
<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Cadastro do Funcionário</h1>
			<div class="row">
				<div class="col-sm-5">
					<form id="frmCadFuncionario">
						<label>Nome do Funcionario</label>
						<input type="text" class="form-control input-sm" id="nome_funcio" name="nome_funcio">
						<label class="input-label">Cargo</label>
						<input type="text" class="form-control input-sm" id="cargo_funcio" name="cargo_funcio">
						<label>Data de nascimento</label>
				        <input type="date" class="form-control input-sm" id="nascimento_funcio" name="nascimento_funcio">
						<label>CPF do Funcionario</label>
						<input type="text" class="form-control input-sm" id="cpf_funcio" name="cpf_funcio">
						<label>Telefone</label>
						<input type="text" class="form-control input-sm" id="telefone_funcio" name="telefone_funcio">
						<label>Data de Admissão</label>
				        <input type="date" class="form-control input-sm" id="admissao_funcio" name="admissao_funcio">
				        <label>Endereço-Rua</label>
						<input type="text" class="form-control input-sm" id="rua_funcio" name="rua_funcio">
						<label>Endereço-Bairro</label>
						<input type="text" class="form-control input-sm" id="bairro_funcio" name="bairro_funcio">
						<label>Endereço-N° Casa</label>
						<input type="number" class="form-control input-sm" id="numero_funcio" name="numero_funcio">
						<label>Salário Inicial</label>
						<input type="text" class="form-control input-sm" id="salario_funcio" name="salario_funcio">
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 315px" id="btnNovoFuncionario">Cadastrar</span>
						
					</form>
				</div>
			</div>
		</div>
	
</body>
</html>