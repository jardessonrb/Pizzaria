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
		<div class="container">
			<h1>Funcionarios</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadProduto">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome" name="nome">
						<label>Valor do Produto</label>
						<input type="text" class="form-control input-sm" id="valor" name="valor">
						<label>Quantidade</label>
						<input type="text" class="form-control input-sm" id="quantidade" name="quantidade">
						<label>Descrição</label>
						<textarea class="form-control input-sm" id="descricao" name="descricao"></textarea>
						<p></p>
						<span class="btn btn-primary" id="btnCadProduto">Cadastrar</span>
						<a href="../procedimentos/relatorio/relatorioPro.php" class="btn btn-primary" id="btnRelatorio">Relátorio</a>
					</form>
				</div>
			</div>
		</div>
</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){


			$('#btnCadProduto').click(function(){

				vazios=validarFormVazio('frmCadProduto');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCadProduto').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/produtos/adicionarProduto.php",
					success:function(r){
						if(r==1){
							$('#frmCadProduto')[0].reset();
						
							alertify.success("Funcionário Adicionado");
						}else{
							alertify.error("Produto cadastrado com sucesso");
						}
					}
				});
			});
		});
	</script>