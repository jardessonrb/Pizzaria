<!DOCTYPE html>
	<html>
	<head>
		<title>clientes</title>
		<meta charset="utf-8">
		<?php require_once "TelaMenu.php"; ?>
		<script src="../lib/jquery-3.2.1.min.js"></script>
		<script src="../js/funcoes.js"></script>
	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px" >
			<h1>Cadastro do Clientes</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmClientes">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome_cliente" name="nome_cliente">
						<label>CPF</label>
						<input type="text" class="form-control input-sm" id="cpf_cliente" name="cpf_cliente">
						<label>Telefone</label>
						<input type="text" class="form-control input-sm" id="telefone_cliente" name="telefone_cliente">
						<label>Nascimento</label>
						<input type="date" class="form-control input-sm" id="nascimento_cliente" name="nascimento_cliente" required="true">
						<label>Endereco-Rua</label>
						<input type="text" class="form-control input-sm" id="rua_cliente" name="rua_cliente">
						<label>Endereco-Bairro</label>
						<input type="text" class="form-control input-sm" id="bairro_cliente" name="bairro_cliente">
						<label>Endereco-N° Casa</label>
						<input type="number" class="form-control input-sm" id="numero_cliente" name="numero_cliente">
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 315px" id="btnCadastrarCliente">Cadastrar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tabelaClientesLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->


		<!-- Modal 
		<div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar cliente</h4>
					</div>
					<div class="modal-body">
						<form id="frmClientesU">
							<input type="text" hidden="" id="idclienteU" name="idclienteU">
							<label>Nome</label>
							<input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
							<label>Sobrenome</label>
							<input type="text" class="form-control input-sm" id="sobrenomeU" name="sobrenomeU">
							<label>Endereço</label>
							<input type="text" class="form-control input-sm" id="enderecoU" name="enderecoU">
							<label>Email</label>
							<input type="text" class="form-control input-sm" id="emailU" name="emailU">
							<label>Telefone</label>
							<input type="text" class="form-control input-sm" id="telefoneU" name="telefoneU">
							<label>CPF</label>
							<input type="text" class="form-control input-sm" id="cpfU" name="cpfU">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAdicionarClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>

					</div>
				</div>
			</div>
		</div>-->

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){

			//$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");

			$('#btnCadastrarCliente').click(function(){

				vazios=validarFormVazio('frmClientes');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmClientes').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/clientes/cadastrocliente.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							//$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Cliente Adicionado");
						}else{
							alertify.error("Não foi possível adicionar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function adicionarDado(idcliente){

			$.ajax({
				type:"POST",
				data:"idcliente=" + idcliente,
				url:"../procedimentos/clientes/obterDadosCliente.php",
				success:function(r){

					dado=jQuery.parseJSON(r);


					$('#idclienteU').val(dado['id_cliente']);
					$('#nomeU').val(dado['nome']);
					$('#sobrenomeU').val(dado['sobrenome']);
					$('#enderecoU').val(dado['endereco']);
					$('#emailU').val(dado['email']);
					$('#telefoneU').val(dado['telefone']);
					$('#cpfU').val(dado['cpf']);



				}
			});
		}

		function eliminarCliente(idcliente){
			alertify.confirm('Deseja Excluir este cliente?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcliente=" + idcliente,
					url:"../procedimentos/clientes/eliminarClientes.php",
					success:function(r){


						if(r==1){
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não foi possível excluir");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}
	</script>

	

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAdicionarClienteU').click(function(){
				dados=$('#frmClientesU').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/clientes/atualizarClientes.php",
					success:function(r){



						if(r==1){
							$('#frmClientes')[0].reset();
							$('#tabelaClientesLoad').load("clientes/tabelaClientes.php");
							alertify.success("Cliente atualizado com sucesso!");
						}else{
							alertify.error("Não foi possível atualizar cliente");
						}
					}
				});
			})
		})
	</script>
<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>