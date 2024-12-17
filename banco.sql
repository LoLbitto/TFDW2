create database bdDesvWeb;
use bdDesvWeb;

create table tbRelatos(
	id int auto_increment,
    titulo varchar(100) not null,
    descricao text not null,
    localimagem varchar(100) not null,
    
    constraint pk_tbRelatos primary key(id)
);

select * from tbRelatos;

-- drop table tbRelatos;