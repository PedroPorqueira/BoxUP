create database boxup;

use boxup;

create table
  usuario (
    id int primary key auto_increment,
    nome varchar(250) not null,
    senha varchar(250) not null,
    usuario varchar(250) not null,
    cpf char(14) not null unique,
    email varchar(250) not null unique,
    motorista boolean not null,
    preco int not null,
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
