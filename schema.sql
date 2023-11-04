create database planti;
use planti;

create table tipo (
	id int unsigned auto_increment primary key,
    tipo varchar(100) unique
);

create table plantas (
	id int unsigned auto_increment primary key,
    nome varchar(100) not null,
    tipo int unsigned not null,
    CONSTRAINT plantas_tipo FOREIGN KEY (tipo) REFERENCES tipo (id),
    id_user int unsigned not null,
    CONSTRAINT plantas_user FOREIGN KEY (id_user) REFERENCES users (id)
);

create table acoes (
	id int unsigned auto_increment primary key,
    acao text not null,
    id_planta int unsigned not null,
    CONSTRAINT acao_planta FOREIGN KEY (id_planta) REFERENCES plantas (id)
);