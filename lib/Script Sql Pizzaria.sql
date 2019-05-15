create database Pizzaria;

use Pizzaria;

create table Tab_Funcionario(

	cod_funcionario int primary key auto_increment,
	nome_funcionario varchar(50),
    cargo varchar(50),
    data_nascimento date,
    cpf_funcionario varchar(11),
    telefone varchar(11),
    data_admissao date,
    rua_funci varchar(60),
    bairro_funci varchar(60),
    numero int,
    salario double

);

create table Tab_Cliente(

	cod_cliente int primary key auto_increment,
	nome_cliente varchar(50),
	cpf_cliente varchar(11),
    telefone varchar(11),
    data_nascimento date,
	rua_cliente varchar(60),
	bairro_cliente varchar(60),
	numero int
    
);

create  table Tab_ProdutoVenda(
	
    cod_produtovenda int primary key auto_increment,
    nome_produto varchar(50),
    valor_produto double,
    descricao_produto varchar(60)
    
);

create table Tab_Fornecedor(

	cod_fornecedor int primary key auto_increment,
    nome_fornecedor varchar(50),
    razao_social varchar(50),
    cnpj_fornecedor varchar(14),
    email varchar(50),
    telefone varchar(11),
    bairro_fornecedor varchar(50),
    rua_fornecedor varchar(50),
    numero int

);

create table Tab_ItensCozinha(

		cod_itenscozinha int primary key auto_increment,
        cod_fornecedor int,
        nome_item varchar(50),
        quantidade int,
        validade date,
        valor_item double,
        descricao_item varchar(60),
        categoria varchar(40)
        
);

create table Tab_Pedido(

	cod_pedido int primary key auto_increment,
    data_pedido date,
    hora_pedido time,
    valor_total double,
    cod_cliente int,
    cod_funcionario int

);

create table Tab_ItemPedido(

	quantidade int,
    cod_produtovenda int,
    cod_pedido int
    
);

/*
QUERY PARA LINKAR AS CHAVES DO BANCO DE DADOS
 */

alter table Tab_Pedido add
constraint fk_pefun foreign key (cod_funcionario) references Tab_Funcionario(cod_funcionario);

alter table Tab_Pedido add
constraint fk_vefun2 foreign key (cod_cliente) references Tab_Cliente(cod_cliente);

alter table Tab_ItemPedido add
constraint fk_itpedi foreign key (cod_pedido) references Tab_Pedido(cod_pedido);

alter table Tab_ItemPedido add
constraint fk_itpedi2 foreign key (cod_produtovenda) references Tab_ProdutoVenda(cod_produtovenda);

alter table Tab_ItensCozinha add
constraint fk_itemCo foreign key (cod_fornecedor) references Tab_Fornecedor(cod_fornecedor);
