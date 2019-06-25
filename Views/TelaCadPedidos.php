<?php
   require_once "../classes/conexao.class.php";

    $c = new conectar();
	$conexao=$c->conexao();

	$sql = "SELECT cod_cliente, nome_cliente FROM tab_cliente";
	$nomes = mysqli_query($conexao, $sql);
 ?>
 <?php
	function ultimoID(){
	   require_once "../classes/conexao.class.php";

	    $c = new conectar();
		$conexao=$c->conexao();

		$sql = "SELECT cod_pedido FROM tab_pedido ORDER BY cod_pedido DESC LIMIT 1";

		$result = mysqli_query($conexao, $sql);

		$ultimoId = mysqli_fetch_row($result);

		return $ultimoId[0];
    }

 ?>
 <?php 
	require_once "../classes/conexao.class.php";

	$id = ultimoID();
   
	$c = new conectar();
	$conexao=$c->conexao();

	$sql="SELECT pro.cod_produtovenda, pro.nome_produto,ite.quantidade, pro.valor_produto from  tab_produtovenda pro JOIN tab_itempedido ite on pro.cod_produtovenda = ite.cod_produtovenda where ite.cod_pedido = '$id' ";

	$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tela de Pedido</title>
	<meta charset="latin1">
	<?php require_once "TelaMenu.php"; ?>
	<?php require_once "dependencias.php" ?>
	<script src="../js/funcoes.js"></script>
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/telapedido.css">
	<script type="text/javascript">
		window.onload = function(){

          desabilitarInicio();

		}
	</script>
</head>
<body>
	<div id="container" >
	 <h1>Cadastro Pedido</h1>
			<div id="buscar_cliente">
				<form id="frmIniciarPedido">
					<select class="form-control input-sm" name="nome_cliente" id="nome_cliente" required>
							<option value="0" selected="Selecione Cliente">Selecione Cliente</option>
							<?php while($mostra = mysqli_fetch_row($nomes)):?>
								<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]; ?></option>
							<?php endWhile; ?>	
						</select>
					<span class="btn btn-primary" id="btnIniciarPedido">Iniciar Venda</span><br>
					<label>Pedido:</label>
				    <input type="text" class="form-control input-sm" id="numero_pedido" name="numero_pedido" placeholder="número pedido"><br>
				</form>
			</div>

			<div id="buscar_produto">
				<form id="frmBuscarProduto">
					<input type="text" class="form-control input-sm" id="codigo_produto" name="codigo_produto" placeholder="código produto">
					<span class="btn btn-danger" id="btnBuscarProduto">Buscar</span><br>		
				</form>
			</div>
			<form id="posiciona_form">
				<label>Produto:</label>
				<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto" placeholder="nome produto"> 
				<label>Valor:</label>
				<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto" placeholder="valor"> 
				<label>Codigo:</label>
				<input type="text" class="form-control input-sm" id="cod_produto" name="cod_produto" placeholder="código produto"><br>
				<label>Quantidade:</label>
				<input type="text" class="form-control input-sm" id="quantidade" name="quantidade" placeholder="Quantidade "><br>
				<span class="btn btn-danger" id="btnInserirProduto">Inserir Produto</span>
			</form>
			<hr id="hrdivision">
	</div>
	<div id="posicionaItem">
	    <div id=""> 
			<table class="table  table-condensed table-bordered" id="tableitem" border="1">
				<tr id="cabecaTable">
					<td width="30">Código</td>
					<td width="200">Produto</td>
					<td width="40">Quantidade</td>
					<td width="100">Valor</td>
					<td width="80">Cancelar</td>
				</tr>
				<?php while($mostrar = mysqli_fetch_row($result)): ?>

				<tr>
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
			<div id="finalizarCompra">
				<label>Valor Total</label>
				<input type="text" id="valor_total" name="valor_total">
				<span class="btn btn-danger" style="position: relative;" id="btnFinalizarCompra">Concluir
				</span>
			</div>
	</div>
</body>
</html>
<!--FUNÇÃO RELACIONADA COM INSERIR PRODUTO NO PEDIDO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnInserirProduto').click(function(){
				//dados=$('#posiciona_form').serialize();
				var cod = document.getElementById("cod_produto").value;
				var quant = document.getElementById("quantidade").value;
				var num = document.getElementById("numero_pedido").value;
				/*var dados = [
					quant,
					cod
				];
				alert(dados[0]+dados[1]);*/
				$.ajax({
					type:"POST",
					data:{codigo: cod, quantidade: quant, numpedido: num},
					url:"../procedimentos/pedidos/inserirProdutoPedido.php",
					success:function(r){
						alert(r);
						if(r==1){
							alertify.success("Produto Inserido");
							window.location.reload();
							limpaCampos();

						}else{
							alertify.error("Produto não Inserido");
						}
					}
				});
			});
		});
	</script>
<!--#######################################################-->
<!--FUNÇÃO PARA INSERIR NOS INPUTS, O PRODUTO BUSCADO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnBuscarProduto').click(function(){
				dados=$('#frmBuscarProduto').serialize();
				alert(dados);
				$.ajax({
					type:"POST",
					data: dados,
					url:"../procedimentos/produtos/buscarProdutoPedido.php",
					success:function(r){
						dado=jQuery.parseJSON(r);


						$('#nome_produto').val(dado['nome_produto']);
						$('#valor_produto').val(dado['valor_produto']);
						//$('#cod_produto').val(dado['cod_produtovenda']);
						document.getElementById('cod_produto').value= dado['cod_produtovenda'];
						if (dado['nome_produto'] != null) {
							abilitarQuantidade();
						}else{
							alert("Produto Não Encontrado!");
						}
						

					}

				})
		      });
		});
</script>
<!--################################################################-->
<!--FUNÇÃO PARA INICIAR PEDIDO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnIniciarPedido').click(function(){

				dados=$('#frmIniciarPedido').serialize();
				//alert(dados);

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/pedidos/iniciarPedido.php",
					success:function(r){
						if(r==1){
							escondercampo();
							alertify.success("Pedido iniciado");
						}else{
							alertify.error("Pedido não iniciado");
						}
					}
				});
			});
		});
	</script>

<!--##########################################################-->
<!--JAVASCRIPT PARA CONTROLE DE CAMPOS-->
<script type="text/javascript">
	function escondercampo(){
			document.getElementById("nome_cliente").disabled = true;
			buscarIdPedido();
			buscarIdPedido();
			//document.getElementById("#frmIniciarPedido").hidde();
	}

	function desabilitarInicio(){
		document.getElementById("nome_produto").disabled = true;
		document.getElementById("valor_produto").disabled = true;
		document.getElementById("quantidade").disabled = true;
		document.getElementById("cod_produto").disabled = true;
		document.getElementById("numero_pedido").disabled = true;
	}

	function abilitarInicio(){
		document.getElementById("nome_produto").disabled = false;
		document.getElementById("valor_produto").disabled = false;
		document.getElementById("nome_cliente").disabled = false;
		
	}
	function desabilitarNomeCliente(){
		
	}

	function abilitarQuantidade(){
		document.getElementById("quantidade").disabled = false;
	}

	function limpaCampos(){
		document.getElementById('nome_produto').value= " ";
		document.getElementById('valor_produto').value= " ";
		document.getElementById('cod_produto').value= " ";
		document.getElementById('quantidade').value= " ";
		document.getElementById('codigo_produto').value= " ";
		document.getElementById("quantidade").disabled = true;

	}

	function buscarIdPedido(){
		dados = 1;
		$.ajax({
			type:"POST",
			data:dados,
			url:"../procedimentos/pedidos/buscarIdPedido.php",
			success:function(r){
				dado=jQuery.parseJSON(r);

				$('#numero_pedido').val(dado['cod_pedido']);
			}
		});

	}



</script>	

