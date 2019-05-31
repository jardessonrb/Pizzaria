
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php"><img class="img-responsive logo img-thumbnail" src="../img/" alt="" width="200px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>


          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Gestão Inicial <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="TelaListagemPedidos.php">Listagem de Pedidos</a></li>
              <li><a href="TelaCadPedidos.php">Iniciar Novo Pedido</a></li>
              <li><a href="TesteCadastro.php">Cadastro teste</a></li>
            </ul>
          </li>  

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Gestão administrativa<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="TelaCadFuncionario.php">Cadastro Funcionário</a></li>
              <li><a href="TelaCadUsuario.php">Cadastro Usuário</a></li>
              <li><a href="TelaRelatorioPedido.php">Relátorio de Pedidos</a></li>
            </ul>
          </li>
 

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Cadastros do Sistema <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="TelaCadFornecedor.php">Cadastro Fornecedor</a></li>
              <li><a href="TelaCadProduto.php">Cadastro Produtos</a></li>
              <li><a href="TelaCadCliente.php">Cadastro Clientes</a></li>
              <li><a href="TelaCadItemCozinha.php">Cadastro Itens de Cozinha</a></li>

            </ul>
          </li>   

         

          glyphicon glyphicon-user
          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario:   <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        


</body>
</html>

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