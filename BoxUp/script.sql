create database boxup;

use boxup;

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    senha VARCHAR(250) NOT NULL,
    usuario VARCHAR(250) NOT NULL,
    cpf CHAR(14) NOT NULL UNIQUE,
    email VARCHAR(250) NOT NULL UNIQUE,
    motorista TINYINT(1) NOT NULL,
    preco INT NOT NULL
);


create table
  mudanca (
    id int primary key auto_increment,
    id_usuario int not null,
    id_motorista int not null,
    objetos varchar(500) not null,
    endereco_inicial varchar(120) not null,
    endereco_final varchar(120) not null,
    observacoes varchar(120) not null,
    status int not null default 0,
    km int not null
  );
