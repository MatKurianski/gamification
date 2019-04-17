create database db_gamification;
use db_gamification;

create table tb_diretoria(
  cd_diretoria int primary key auto_increment,
  nm_diretoria varchar(25) not null,
    ds_cor varchar(10) not null,
  st_diretoria boolean not null
);

INSERT INTO `tb_diretoria` (`cd_diretoria`, `nm_diretoria`, `ds_cor`, `st_diretoria`) VALUES
(1, 'Projetos', '#4cbaff', 1),
(2, 'Marketing', '#8e0232', 1),
(3, 'Finanças e Pessoas', '#1c9924', 1),
(4, 'Presidência', '#ffb300', 1);

create table tb_cargo(
  cd_cargo int primary key auto_increment,
  nm_cargo varchar(20) not null,
  st_cargo boolean not null
);

INSERT INTO `tb_cargo` (`cd_cargo`, `nm_cargo`, `st_cargo`) VALUES
(1, 'Treinee', 1),
(2, 'Membro', 1),
(3, 'Diretor', 1),
(4, 'Presidente', 1),
(5, 'Vice-presidente', 1);

create table tb_membro(
  cd_membro int primary key auto_increment,
  nm_membro varchar(100) not null,  
  tx_senha varchar(100) not null,
  id_cargo int not null,
  id_diretoria int,
  st_membro boolean not null,
  foreign key(id_cargo) references tb_cargo(cd_cargo),
  foreign key(id_diretoria) references tb_diretoria(cd_diretoria)
);

INSERT INTO `tb_membro` (`cd_membro`, `nm_membro`, `tx_senha`, `id_cargo`, `id_diretoria`, `st_membro`) VALUES
(1, 'Guilherme Balog Gardino', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 1, 1, 1),
(2, 'Rodrigo', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 4, 4, 1),
(3, 'Leví', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 3, 2, 1),
(4, 'Bernardo Chagas', '914420a9b210195dea7e8a1fdc5234fb1f413c04dba3b5eaabed9df6adb47f51', 3, 1, 1);

create table tb_meta(
  cd_meta int primary key auto_increment,
  ds_meta text not null,
  vl_minimo int not null,
  st_meta boolean not null
);

create table tb_meta_membro(
  cd_meta_membro int primary key auto_increment,
  id_meta int not null,
  id_membro int not null,
  foreign key(id_meta) references tb_meta(cd_meta),
  foreign key(id_membro) references tb_membro(cd_membro)
);

create table tb_regra(
  cd_regra int primary key auto_increment,
  ds_regra text not null,
  qt_pontos int not null,
  st_regra boolean not null 
);

create table tb_pontuacao(
  cd_pontuacao int primary key auto_increment,
  dt_pontuacao datetime not null,
  id_membro int not null,
  id_regra int not null,
  foreign key(id_membro) references tb_membro(cd_membro),
  foreign key(id_regra) references tb_regra(cd_regra)
);
