create database bdLogin;
use bdLogin;

create table usuarios(
    id int auto_increment primary key,
    nome varchar(50) not null unique,
    senha varchar(255) not null
);