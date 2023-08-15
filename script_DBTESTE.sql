create database db_testeestagio;
use db_testeestagio;

create table tb_cadastro
(
id_cadastro int(10) not null primary key auto_increment,
nome_cadastro varchar(100) not null,
data_nascimento_cad date not null,
email_cadastro varchar(45) not null,
celcontato_cadastro varchar(20) not null,
telcontato_cadastro varchar(20) not null,
profissao_cadastro varchar(100) not null,
whats_cadastro varchar(10) not null,
sms_cadastro varchar(10) not null,
notemail_cadastro varchar(10) not null


);
