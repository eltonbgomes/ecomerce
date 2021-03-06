CREATE DATABASE Ecommercephp;

USE Ecommercephp;

CREATE TABLE cliente (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	created_at datetime ,
	updated_at datetime ,
	nome VARCHAR(50),
	login VARCHAR(50),
	cpf VARCHAR(11),
	data_nascimento date,
	email VARCHAR(100),
	celular VARCHAR(9),
	foto varchar(50) NOT NULL,
	senha VARCHAR(32)
);


CREATE TABLE Endereco_Entrega (
	id_endereco_entrega INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_cliente INT,
	cep VARCHAR(10),
	estado VARCHAR(40),
	bairro VARCHAR(40),
	cidade VARCHAR(40),
	rua VARCHAR(40),
	numero VARCHAR(5),
	complemento VARCHAR(30),
	FOREIGN KEY (id_cliente) REFERENCES cliente (id)
);


CREATE TABLE Transportadoras (
	Cod_Transportadora INT PRIMARY KEY,
	cnpj VARCHAR(20),
	nome VARCHAR(100)
);	


CREATE TABLE Telefones(
	Cod_Transportadora INT,
	telefone CHAR(15),
	PRIMARY KEY (Cod_Transportadora, telefone),
	FOREIGN KEY (Cod_Transportadora) REFERENCES Transportadoras (Cod_Transportadora)
);


CREATE TABLE Produtos(
	Cod_Produto INT PRIMARY KEY,
	nome VARCHAR(100),
	peso VARCHAR(10),
	preco VARCHAR (255)
);


CREATE TABLE Livros(
	Cod_Produto INT,
	Data_Lancamento VARCHAR(10),
	Num_pag CHAR(255),
	Tema VARCHAR(200),
	Editora VARCHAR(200),
	PRIMARY KEY (Cod_Produto),
	FOREIGN KEY (Cod_Produto) REFERENCES Produtos (Cod_Produto)

);


CREATE TABLE Autores(
	Cod_Produto INT,
	Autor CHAR(200),
	PRIMARY KEY (Cod_Produto, Autor),
	FOREIGN KEY (Cod_Produto) REFERENCES Produtos (Cod_Produto)
);


CREATE TABLE Eletronicos(
	Cod_Produto INT,
	Fabricante VARCHAR(200),
	PRIMARY KEY (Cod_Produto),
	FOREIGN KEY (Cod_Produto) REFERENCES Produtos (Cod_Produto)
);


CREATE TABLE Fornecedores (
	Cod_Fornecedor INT PRIMARY KEY,
	nome VARCHAR(255),
	cnpj VARCHAR(20),
	telefone CHAR(15)
);


CREATE TABLE Fornece(
	Cod_Fornecedor INT,
	Cod_Produto INT,
	Data_Entrega VARCHAR(10),
	PRIMARY KEY (Cod_Fornecedor, Cod_Produto, Data_Entrega),
	FOREIGN KEY (Cod_Fornecedor) REFERENCES Fornecedores (Cod_Fornecedor),
	FOREIGN KEY (Cod_Produto) REFERENCES Produtos(Cod_Produto)

);

CREATE TABLE Pedidos(
	Cod_Pedido INT PRIMARY KEY,
	Data_Realizacao VARCHAR(10),
	id_cliente INT,
	Cod_Transportadora INT,
	Data_Entrega VARCHAR(10),
	Data_Envio VARCHAR(10),
	id_endereco_entrega INT,
	FOREIGN KEY (id_cliente) REFERENCES cliente (id),
	FOREIGN KEY (Cod_Transportadora) REFERENCES Transportadoras (Cod_Transportadora),
	FOREIGN KEY (id_endereco_entrega) REFERENCES Endereco_Entrega (id_endereco_entrega)
);


CREATE TABLE Possui(
	Cod_Pedido INT,
	Cod_Produto INT,
	PRIMARY KEY (Cod_Pedido, Cod_Produto),
	FOREIGN KEY (Cod_Pedido) REFERENCES Pedidos (Cod_Pedido),
	FOREIGN KEY (Cod_Produto) REFERENCES Produtos(Cod_Produto)
);
