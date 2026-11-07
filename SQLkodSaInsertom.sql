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

INSERT INTO automobil (brend, model, godina, proizvod, kategorija_proizvoda, cena) VALUES

('Toyota','Supra MK4',1998,'HKS turbo sistem','Turbo sistem',4000),
('Toyota','Supra MK4',1998,'Greddy intercooler','Sistem za hlađenje',950),
('Toyota','Supra MK4',1998,'K&N filter','Usisni sistem',120),
('Toyota','Supra MK4',1998,'NOS EFI wet kit','Nitro sistem',2500),
('Toyota','Supra MK4',1998,'Brembo kočioni sistem','Kočioni sistem',3200),
('Toyota','GT86',2017,'Invidia izduv','Izduvni sistem',1500),
('Toyota','GT86',2017,'Tein komplet vešanja','Vešanje',1400),
('Toyota','GT86',2017,'HKS usis vazduha','Usisni sistem',500),
('Toyota','GT86',2017,'OZ Racing felne','Felne',2400),
('Toyota','Celica',2005,'Farovi Angel Eyes Toyota Celica','Eksterijer',600),
('Toyota','Celica',2005,'K-series turbo kit','Turbo sistem',2500),
('Toyota','Celica',2005,'Custom sportski volan','Enterijer',450),
('Toyota','Celica',2005,'Eibach Pro Kit opruge','Vešanje',320),

('Nissan','Skyline R34',1999,'Garrett turbo punjač','Turbo sistem',2500),
('Nissan','Skyline R34',1999,'Nismo izduvni sistem','Izduvni sistem',2200),
('Nissan','Skyline R34',1999,'Brembo kočioni sistem','Kočioni sistem',3200),
('Nissan','Skyline R34',1999,'NOS EFI wet kit','Nitro sistem',2500),
('Nissan','Skyline R34',1999,'HKS coilover vešanje','Vešanje',2200),
('Nissan','350Z',2005,'JWT usis vazduha','Usisni sistem',350),
('Nissan','350Z',2005,'BC Racing vešanje','Vešanje',1300),
('Nissan','350Z',2005,'Invidia izduv','Izduvni sistem',1500),
('Nissan','350Z',2005,'Advan Racing felne','Felne',3200),
('Nissan','370Z',2016,'Stillen usis vazduha','Usisni sistem',480),
('Nissan','370Z',2016,'Akrapovič izduv','Izduvni sistem',1800),
('Nissan','370Z',2016,'StopTech kočioni sistem','Kočioni sistem',2600),
('Nissan','370Z',2016,'Sparco sedišta','Enterijer',1500),
('Nissan','370Z',2016,'HKS racing hladnjak','Sistem za hlađenje',950),

('Honda','Civic Type R',1998,'PRL usis vazduha','Usisni sistem',400),
('Honda','Civic Type R',1998,'HKS izduv','Izduvni sistem',1200),
('Honda','Civic Type R',1998,'Spoon sportsko vešanje','Vešanje',1800),
('Honda','Civic Type R',1998,'NOS EFI wet kit','Nitro sistem',2500),
('Honda','Civic Type R',1998,'Alcantara volan','Enterijer',650),
('Honda','S2000',2004,'Toda Racing usis','Usisni sistem',650),
('Honda','S2000',2004,'HKS coilover vešanje','Vešanje',2200),
('Honda','S2000',2004,'Invidia izduv','Izduvni sistem',1500),
('Honda','S2000',2004,'Volk Racing felne','Felne',2800),
('Honda','S2000',2004,'AP Racing kočnice','Kočioni sistem',3500),
('Honda','NSX',1999,'Megan Racing amortizeri','Vešanje',2000),
('Honda','NSX',1999,'AKR Performance izduv','Izduvni sistem',3800),
('Honda','NSX',1999,'Koyorad hladnjak','Sistem za hlađenje',800),
('Honda','NSX',1999,'NOS EFI wet kit','Nitro sistem',2500),
('Honda','NSX',1999,'LB Works body kit','Eksterijer',5500),


('Mazda','RX-7 FD',1995,'Greddy turbo sistem','Turbo sistem',4600),
('Mazda','RX-7 FD',1995,'Apex izduv','Izduvni sistem',1400),
('Mazda','RX-7 FD',1995,'Koyorad hladnjak','Sistem za hlađenje',800),
('Mazda','RX-7 FD',1995,'StopTech kočioni sistem','Kočioni sistem',2600),
('Mazda','MX-5 Miata',2019,'HKS coilover vešanje','Vešanje',2200),
('Mazda','MX-5 Miata',2019,'Borla izduv','Izduvni sistem',900),
('Mazda','MX-5 Miata',2019,'K&N filter','Usisni sistem',120),
('Mazda','MX-5 Miata',2019,'Carbon fiber diffuser','Eksterijer',1400),
('Mazda','RX-8',2006,'NOS EFI wet kit','Nitro sistem',2500),
('Mazda','RX-8',2006,'BBS XR felne','Felne',2200),
('Mazda','RX-8',2006,'Ventilacioni nosač cajgera','Enterijer',90),
('Mazda','RX-8',2006,'Custom carbon intake','Usisni sistem',500),

('Subaru','Impreza WRX STI',2016,'BBS OEM felne','Felne',2600),
('Subaru','Impreza WRX STI',2016,'Invidia downpipe','Izduvni sistem',650),
('Subaru','Impreza WRX STI',2016,'Tein komplet vešanja ','Vešanje',1400),
('Subaru','Impreza WRX STI',2016,'NOS EFI wet kit','Nitro sistem',2500),
('Subaru','BRZ',2020,'HKS usis vazduha','Usisni sistem',500),
('Subaru','BRZ',2020,'Greddy izduv','Izduvni sistem',1200),
('Subaru','BRZ',2020,'BC Racing vešanje','Vešanje',1300),
('Subaru','BRZ',2020,'Turbo upgrade kit','Turbo sistem',4500),
('Subaru','SVX',1997,'Sparco sedišta','Enterijer',1500),
('Subaru','SVX',1997,'OEM auto folija','Eksterijer',1400),
('Subaru','SVX',1997,'Ceika big brake kit','Kočioni sistem',3000),
('Subaru','SVX',1997,'Subaru OEM hladnjak','Sistem za hlađenje',750),


('Mitsubishi','Lancer Evo IX',2006,'AMS turbo sistem','Turbo sistem',4800),
('Mitsubishi','Lancer Evo IX',2006,'HKS izduv','Izduvni sistem',1200),
('Mitsubishi','Lancer Evo IX',2006,'StopTech kočioni sistem','Kočioni sistem',3500),
('Mitsubishi','Lancer Evo X',2012,'ETS hladnjak','Sistem za hlađenje',900),
('Mitsubishi','Lancer Evo X',2012,'Cobb usis','Usisni sistem',520),
('Mitsubishi','Lancer Evo X',2012,'BC Racing vešanje','Vešanje',1300),
('Mitsubishi','3000GT',2000,'TD04HL turbo','Turbo sistem',2300),
('Mitsubishi','3000GT',2000,'GTO instrument tabla','Enterijer',400),
('Mitsubishi','3000GT',2000,'Racing hauba','Eksterijer',1100),


('Suzuki','Swift Sport',2019,'Akrapovič izduv','Izduvni sistem',1800),
('Suzuki','Swift Sport',2019,'Enkei RPF1 felne','Felne',1700),
('Suzuki','Swift Sport',2019,'HKS turbo sistem','Turbo sistem',4000),
('Suzuki','Swift Sport',2019,'NOS EFI wet kit','Nitro sistem',2500),
('Suzuki','Swift Sport',2019,'Wilwood brake kit','Kočioni sistem',3000),
('Suzuki','Jimny',2021,'G63 body kit','Eksterijer',2800),
('Suzuki','Jimny',2021,'Android Auto multimedija','Enterijer',550),
('Suzuki','Jimny',2021,'Ohlins vešanje','Vešanje',2400),
('Suzuki','Jimny',2021,'Work Meister felne','Felne',2600),
('Suzuki','Jimny',2021,'Custom carbon intake','Usisni sistem',500),
('Suzuki','Alto Works',1998,'Blitz turbo kit','Turbo sistem',2800),
('Suzuki','Alto Works',1998,'Cusco vešanje','Vešanje',1100),
('Suzuki','Alto Works',1998,'HKS Hi-Power izduv','Izduvni sistem',950),
('Suzuki','Alto Works',1998,'Aluminum radiator','Sistem za hlađenje',900),

('Acura','RSX Type S',2006,'Body kit komplet','Eksterijer',2600),
('Acura','RSX Type S',2006,'Recaro sedišta','Enterijer',2400),
('Acura','RSX Type S',2006,'Power Stop kočnice','Kočioni sistem',1200),
('Acura','RSX Type S',2006,'NOS EFI wet kit','Nitro sistem',2500),
('Acura','RSX Type S',2006,'Air suspension system','Vešanje',3500),
('Acura','TL Type S',2008,'BBS CH-R felne','Felne',2400),
('Acura','TL Type S',2008,'Brembo kočioni sistem','Kočioni sistem',3200),
('Acura','TL Type S',2008,'BCP Racing usis','Usisni sistem',480),
('Acura','TL Type S',2008,'Sparco sedišta','Enterijer',1500),
('Acura','TL Type S',2008,'Body kit extension','Eksterijer',3000),
('Acura','TL Type S',2008,'Acura turbo upgrade','Turbo sistem',5000),
('Acura','Integra Type R',2001,'Mugen izduv','Izduvni sistem',1900),
('Acura','Integra Type R',2001,'Wilwood brake kit','Kočioni sistem',3000),
('Acura','Integra Type R',2001,'Acura racing hladnjak','Sistem za hlađenje',1200),
('Acura','Integra Type R',2001,'Bride Zeta III sedište','Enterijer',1200),

('Lexus','IS350',2018,'Karbon spojler','Eksterijer',900),
('Lexus','IS350',2018,'Sportski volan karbon','Enterijer',750),
('Lexus','IS350',2018,'OZ Ultraleggera felne','Felne',2100),
('Lexus','IS350',2018,'NOS EFI wet kit','Nitro sistem',2500),
('Lexus','IS350',2018,'TwinScroll turbo','Turbo sistem',6000),
('Lexus','GS F',2017,'Titanijumski izduv','Izduvni sistem',4500),
('Lexus','GS F',2017,'Satin crna folija','Eksterijer',1800),
('Lexus','GS F',2017,'Forgiato felne','Felne',5200),
('Lexus','GS F',2017,'Carbon fiber intake manifold','Usisni sistem',1500),
('Lexus','RC F',2019,'Koyorad hladnjak','Sistem za hlađenje',800),
('Lexus','RC F',2019,'AP Racing kočnice','Kočioni sistem',3500),
('Lexus','RC F',2019,'Enkei NT03+M felne','Felne',2300),
('Lexus','RC F',2019,'Lexus air suspension','Vešanje',4200),

('Infiniti','G35',2006,'HKS turbo sistem','Turbo sistem',4000),
('Infiniti','G35',2006,'Stillen sportski izduv','Izduvni sistem',950),
('Infiniti','G35',2006,'K&N filter','Usisni sistem',120),
('Infiniti','G35',2006,'Brembo kočioni sistem','Kočioni sistem',3200),
('Infiniti','G35',2006,'Nismo body kit','Eksterijer',2800),
('Infiniti','Q50',2018,'Tein komplet vešanja','Vešanje',1400),
('Infiniti','Q50',2018,'HKS usis vazduha','Usisni sistem',500),
('Infiniti','Q50',2018,'OZ Ultraleggera felne','Felne',2100),
('Infiniti','G37',2013,'Farovi Angel Eyes Infiniti G37','Eksterijer',650),
('Infiniti','G37',2013,'HKS sportski izduv','Izduvni sistem',1100),
('Infiniti','G37',2013,'K-series turbo kit','Nitro sistem',2500),

('Daihatsu','Copen',2005,'HKS turbo sistem','Turbo sistem',4000),
('Daihatsu','Copen',2005,'Greddy intercooler','Sistem za hlađenje',950),
('Daihatsu','Copen',2005,'K&N filter','Usisni sistem',120),
('Daihatsu','Copen',2005,'Invidia izduv','Izduvni sistem',1500),
('Daihatsu','Copen',2005,'SSW felne','Felne',2000),
('Daihatsu','Terios',2012,'Tein komplet vešanja','Vešanje',1400),
('Daihatsu','Terios',2012,'HKS usis vazduha','Usisni sistem',500),
('Daihatsu','Terios',2012,'Sportski Volan','Enterijer',350),
('Daihatsu','Terios',2012,'Brembo kočioni sistem','Kočioni sistem',3200),
('Daihatsu','Sirion',2010,'Farovi Angel Eyes Daihatsu Sirion','Eksterijer',600),
('Daihatsu','Sirion',2010,'Eibach Pro Kit opruge','Vešanje',320),
('Daihatsu','Sirion',2010,'NOS EFI wet kit','Nitro sistem',2500);


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
