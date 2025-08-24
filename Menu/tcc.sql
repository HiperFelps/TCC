create database tcc;
use tcc;
drop database if exists tcc;
drop table if exists usuarios;

create table usuarios(
id int not null auto_increment,
email varchar(100) not null unique,
senha varchar(255) not null,
numPet int,
numColor int,
NumNivel int,
primary key (id)
)
