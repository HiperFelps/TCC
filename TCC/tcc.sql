create database tcc;
use tcc;
drop database if exists tcc;
drop table if exists usuarios;
drop table if exists administrador;

create table usuarios(
id int not null auto_increment,
email varchar(100) not null unique,
senha varchar(255) not null,
numPet int,
numColor int,
numNivel int,
numEnergia int,
primary key (id)
);

create table administrador(
id int not null auto_increment,
email varchar(100) not null unique,
senha varchar(255) not null,
primary key(id)
);
