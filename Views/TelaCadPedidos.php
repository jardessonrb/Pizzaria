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

<?php 
function Valor_Total(){
	require_once "../classes/conexao.class.php";

	$valor_total_compra = 0;

	$id = ultimoID();
    
	$c = new conectar();
	$conexao=$c->conexao();

	$sql="SELECT ite.quantidade, pro.valor_produto from tab_produtovenda pro JOIN tab_itempedido ite on pro.cod_produtovenda = ite.cod_produtovenda where ite.cod_pedido = '$id' ";

	$result = mysqli_query($conexao, $sql);

	while($mostrar = mysqli_fetch_row($result)):

		$valor_unidade = $mostrar[0] * $mostrar[1];

		$valor_total_compra = $valor_total_compra + $valor_unidade;

	endWhile;

	return $valor_total_compra;

}

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

	<link rel="stylesheet" type="text/css" href="../css/estiloTelaPedido.css">
	<script type="text/javascript">
		window.onload = function(){

          desabilitarInicio();

		}
	</script>
</head>
<body>
	<div id="container">
       	<div class="divs" id="campos_pedidos">
       			<div id="buscar_cliente">
				<form id="frmIniciarPedido">
					<label id="label_pedido">Pedido:</label>
				    <input type="text" class="form-control input-sm" id="numero_pedido" name="numero_pedido" placeholder="número pedido">
					<select class="form-control input-sm" name="nome_cliente" id="nome_cliente" required>
							<option value="0" selected="Selecione Cliente">Selecione Cliente</option>
							<?php while($mostra = mysqli_fetch_row($nomes)):?>
								<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]; ?></option>
							<?php endWhile; ?>	
						</select>
					<span class="btn btn-primary" id="btnIniciarPedido">Iniciar Pedido</span><br>
				</form>
			</div>

			<div id="buscar_produto">
				<form id="frmBuscarProduto">
					<label id="label_pedido">Buscar produto p/ código:</label>
					<input type="text" class="form-control input-sm" id="codigo_produto" name="codigo_produto" placeholder="código produto">
					<span class="btn btn-primary" id="btnBuscarProduto">Buscar</span><br>		
				</form>
			</div>
			<form id="posiciona_form">
				<label>Produto:</label>
				<input type="text" hidden="" id="qnt_estoque" name="qnt_estoque">
				<input type="text" hidden="" id="decremento" name="decremento">  
				<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto" placeholder="nome produto"> 
				<label>Valor:</label>
				<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto" placeholder="valor"> 
				<label>Codigo:</label>
				<input type="text" class="form-control input-sm" id="cod_produto" name="cod_produto" placeholder="código produto">
				<label>Insira Quantidade:</label>
				<input type="text" class="form-control input-sm" id="quantidade" name="quantidade" placeholder="Quantidade "><br>
				<span class="btn btn-primary" id="btnInserirProduto">Inserir Produto</span>
			</form>
			<hr id="hrdivision">
	</div>
       	<div class="divs" id="tabela_pedidos">
			<table class="table  table-condensed table-bordered" id="tableitem" border="1">
				<tr id="topo_tabela">
					<td width="30">Código</td>
					<td width="200">Produto</td>
					<td width="40">QNT</td>
					<td width="80">Val Produto</td>
					<td width="80">Total Uni</td>
					<td width="80">Cancelar</td>
				</tr>
				<?php while($mostrar = mysqli_fetch_row($result)): ?>

				<tr id="corpo_tabela">
					<td><?php echo $mostrar[0]; ?></td>
					<td><?php echo $mostrar[1]; ?></td>
					<td><?php echo $mostrar[2]; ?></td>
					<td><?php echo $mostrar[3]; ?></td>
					<td><?php echo $mostrar[2] * $mostrar[3]; ?></td>
					<td>
					   <span class="btn btn-danger btn-xs" onclick="excluirMemorando('<?php echo $mostrar[0]?>')"><span>
				        <span class="glyphicon glyphicon-remove"></span>
				      </span>
					</td>
				</tr>

			<?php endWhile; ?>

			</table>
			<div id="finalizarCompra">
				<label id="valor_total_label">Valor Total</label>
				<div id="label_btn">
					<input type="text" id="valor_total_input" name="valor_total_input">
					<span class="btn btn-danger" id="btnFinalizarCompra">Concluir
					</span>
				</div>
			</div>
       		</fieldset>
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
				var estoque = document.getElementById("qnt_estoque").value;
				var decremento = document.getElementById("decremento").value;

				var atualizar = estoque - quant;
				alert(atualizar);

				if(quant <= estoque || decremento == "nao"){
				$.ajax({
					type:"POST",
					data:{codigo: cod, quantidade: quant, numpedido: num, atualizar: atualizar},
					url:"../procedimentos/pedidos/inserirProdutoPedido.php",
					success:function(r){
						
						if(r==1){
							
							window.location.reload();
							limpaCampos();

						}else{
							
							alertify.error("Produto não Inserido");
						}
					}
				});
			}else{

				alertify.error('Quantida pedida maior que estoque');
			}
			});
		});
	</script>
<!--#######################################################-->
<!--FUNÇÃO PARA INSERIR NOS INPUTS, O PRODUTO BUSCADO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnBuscarProduto').click(function(){
				dados=$('#frmBuscarProduto').serialize();
				
				$.ajax({
					type:"POST",
					data: dados,
					url:"../procedimentos/produtos/buscarProdutoPedido.php",
					success:function(r){
						dado=jQuery.parseJSON(r);


						$('#nome_produto').val(dado['nome_produto']);
						$('#valor_produto').val(dado['valor_produto']);
						document.getElementById('decremento').value= dado['decremento'];
						document.getElementById('qnt_estoque').value= dado['qnt_produto'];
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
			<?php echo Valor_Total() ?>;
	}

	function desabilitarInicio(){
		document.getElementById("nome_produto").disabled = true;
		document.getElementById("valor_produto").disabled = true;
		document.getElementById("quantidade").disabled = true;
		document.getElementById("cod_produto").disabled = true;
		document.getElementById("numero_pedido").disabled = true;
		document.getElementById("valor_total_input").disabled = true;
		
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

		document.getElementById('nome_produto').value= "nome produto";
		document.getElementById('valor_produto').value= "valor produto";
		document.getElementById('cod_produto').value= "código produto";
		document.getElementById('quantidade').value= "";
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
	function ValorTotal(){
		dados = 1;
		$.ajax({
			type:"POST",
			data:dados,
			url:"../procedimentos/pedidos/buscarValorTotal.php",
			success:function(r){
				dado=jQuery.parseJSON(r);

				return val(dado['soma']);
			}
		});
	}

</script>	
<script type="text/javascript">
	


</script>

