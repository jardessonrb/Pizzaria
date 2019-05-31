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
			<h1>Registro de Produtos</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadProduto">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto">
						<label>Valor do Produto</label>
						<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto">
						<label>Quantidade</label>
						<input type="text" class="form-control input-sm" id="quantidade_produto" name="quantidade_produto">
						<label>Descrição</label>
						<textarea class="form-control input-sm" id="descricao_produto" name="descricao_produto"></textarea>
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 270px" id="btnNovoProduto">Cadastrar</span>
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