drop database if exists aftermarket;
create database aftermarket;
use aftermarket;
create table automobil(id int auto_increment primary key not null,
brend varchar(30) not null,
model varchar(30) not null,
godina year not null,
proizvod varchar(50) not null,
kategorija_proizvoda varchar(50) not null,
cena bigint not null)engine=innodb;

create table proizvod(id int auto_increment primary key,
naziv varchar(45) not null,
cena bigint not null,
kategorija_proizvoda varchar(50) not null)engine=innodb
as 
select distinct
proizvod as naziv,
cena,
kategorija_proizvoda
from automobil;

create table automobil_proizvod(id int auto_increment primary key)engine=InnoDB
as
select distinct automobil.id as a_id, proizvod.id as p_id
from automobil
join proizvod on automobil.proizvod = proizvod.naziv;

alter table automobil_proizvod
add constraint fk_automobil_id
foreign key(a_id) references automobil(id)
on update cascade on delete restrict;
alter table automobil_proizvod
add constraint fk_proizvod_id
foreign key(p_id) references proizvod(id)
on update cascade on delete restrict;

alter table automobil
drop column proizvod,
drop column kategorija_proizvoda,
drop column cena;

create table brend(id int auto_increment primary key,
naziv varchar(30) not null)engine=innodb
as 
select distinct
brend as naziv
from automobil;

alter table automobil add column(brend_id int not null);

update automobil
inner join brend on automobil.brend = brend.naziv
set automobil.brend_id = brend.id;

alter table automobil 
add constraint fk_brend_id
foreign key (brend_id)
references brend(id)
on update cascade on delete restrict;

alter table automobil
drop column brend;

create table kategorija(id int auto_increment primary key,
naziv varchar(45) not null)engine=innodb
as 
select distinct
kategorija_proizvoda as naziv
from proizvod;

alter table proizvod add column(kategorija_id int not null);

update proizvod
inner join kategorija on proizvod.kategorija_proizvoda = kategorija.naziv
set proizvod.kategorija_id = kategorija.id;

alter table proizvod 
add constraint fk_kategorija_id
foreign key (kategorija_id)
references kategorija(id)
on update cascade on delete restrict;

alter table proizvod
drop column kategorija_proizvoda;
