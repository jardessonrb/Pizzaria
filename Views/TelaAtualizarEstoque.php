<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastro de Produtos</title>
		<meta charset="latin1">
		<?php require_once "TelaMenu.php"; ?>
		<?php require_once "dependencias.php" ?>
		<script src="../js/funcoes.js"></script>
		<script src="../lib/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
		window.onload = function(){

          desabilitar();

		}
	</script>

	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Atualizar Estoque</h1>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control input-sm" id="pesquisa_nome" name="pesquisa_nome" placeholder="digite codigo produto">
					<span class="btn btn-primary" id="btnBuscarProduto">Buscar</span>
					<form id="frmCadProduto">
						<label>Nome produto</label>
						<input type="text" hidden="" id="cod_produto" name="cod_produto">
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto">
						<label>Quantidade em estoque</label>
						<input type="text" class="form-control input-sm" id="quantidade_produto" name="quantidade_produto">
						<label>Forma de Armazenamento</label>
						<select class="form-control" id="decremento" name="decremento">
							<option value="0">Selecione forma de estoque</option>
							<option value="sim">Possui Estoque</option>
							<option value="nao">Não Possui Estoque</option>
						</select><br>
						<input type="text" class="form-control input-sm" id="pesquisa_nome" name="pesquisa_nome" placeholder="QNT reposta no estoque">
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 270px" id="btnCadastrarProduto">Atualizar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnBuscarProduto').click(function(){
		var codigo = document.getElementById("pesquisa_nome").value;
		alert(codigo);

		$.ajax({

			type:"POST",
			data: {codigo_produto: codigo},
			url:"../procedimentos/produtos/atualizarProdutoEstoque.php",
			success:function(r){
				dado=jQuery.parseJSON(r);

			$('#nome_produto').val(dado['nome_produto']);
			document.getElementById('quantidade_produto').value= dado['qnt_produto'];
			document.getElementById('decremento').value= dado['decremento'];
			document.getElementById('cod_produto').value= dado['cod_produtovenda'];
			

			}

		})
	    });
	});

	$(document).ready(function(){
		$('#btnCadastrarProduto').click(function(){

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
					alert(r);
					if(r==1){
						$('#frmCadProduto')[0].reset();
						alertify.success("Produto cadastrado com sucesso!");
					}else{
						alertify.error("Produto não cadastrado");
					}
				}
			});
		});
	});


		function desabilitar(){
			document.getElementById("nome_produto").disabled = true;
			document.getElementById("quantidade_produto").disabled = true;
			document.getElementById("nome_produto").disabled = true;
		}		
</script>