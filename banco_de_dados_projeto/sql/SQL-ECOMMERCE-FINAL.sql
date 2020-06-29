CREATE DATABASE Ecommercephp;

USE Ecommercephp;

CREATE TABLE cliente (
	id INT PRIMARY KEY,
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
	id_cliente INT,
	cep CHAR(10),
	numero VARCHAR(10),
	complemento VARCHAR(30),
	PRIMARY KEY (id_cliente, cep, numero, complemento),
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


CREATE TABLE Pedidos(
	Codigo_Pedido INT PRIMARY KEY,
	Data_Realizacao VARCHAR(10),
	id_cliente INT,
	Cod_Transportadora INT,
	Data_Entrega VARCHAR(10),
	Data_Envio VARCHAR(10),
	cep CHAR(10),
	complemento VARCHAR(30),
	numero VARCHAR(10),
	FOREIGN KEY (id_cliente) REFERENCES cliente (id),
	FOREIGN KEY (Cod_Transportadora) REFERENCES Transportadoras (Cod_Transportadora),
	FOREIGN KEY (cep) REFERENCES Endereco_Entrega (cep),
	FOREIGN KEY (numero) REFERENCES Endereco_Entrega (numero),
	FOREIGN KEY (complemento) REFERENCES Endereco_Entrega (complemento)
);	


CREATE TABLE Possui(
	Cod_Pedido INT,
	Cod_Produto INT,
	PRIMARY KEY (Cod_Pedido, Cod_Produto),
	FOREIGN KEY (Cod_Pedido) REFERENCES Pedidos (Cod_Pedido),
	FOREIGN KEY (Cod_Produto) REFERENCES Produtos(Cod_Produto)
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

ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
