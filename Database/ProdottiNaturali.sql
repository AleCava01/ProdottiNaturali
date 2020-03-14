drop database if exists prodottiNaturali;
create database prodottiNaturali;
use prodottiNaturali;

create table categoria(
    id_c int not null auto_increment primary key,
    nome varchar(255) not null,
    descrizione varchar(255) not null
)engine innodb;

create table sottocategoria(
    id_sc int not null auto_increment primary key,
    nome varchar(255) not null,
    descrizione varchar(255) not null,
    id_c int not null,
    foreign key(id_c) references categoria(id_c)
)engine innodb;

create table prodotto(
    id_p int not null auto_increment primary key,
    nome varchar(255) not null,
    descrizione varchar(255) not null,
    immagine varchar(255) not null,
    istruzioni varchar(255) not null,
    id_sc int not null,
    foreign key(id_sc) references sottocategoria(id_sc)
)engine innodb;

create table formato(
    id_f int not null auto_increment primary key,
    capacita decimal(7,2) not null,
    prezzo decimal(7,2) not null,
    disponibilita int not null,
    id_p int not null,
    foreign key(id_p) references prodotto(id_p)
)engine innodb;

create table utente(
    id_u int not null auto_increment primary key,
    username varchar(255) not null,
    password varchar(255) not null,
    email varchar(255) not null,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    via varchar(255) not null,
    civico int not null,
    cap int not null,
    citta varchar(255) not null,
    provincia varchar(255) not null
)engine innodb;

create table ordine(
    id_o int not null auto_increment primary key,
    data datetime not null,
    via varchar(255) not null,
    civico int not null,
    cap int not null,
    citta varchar(255) not null,
    provincia varchar(255) not null,
    pagamento int not null,
    note varchar(255) not null,
    stato int not null,
    spedizione int not null,
    importo decimal(7,2) not null,
    id_u int not null,
    foreign key(id_u) references utente(id_u)
)engine innodb;

create table carrello(
    id_f int not null,
    id_o int not null,
    quantita int not null,
    importo_parziale decimal(7,2) not null,
    foreign key(id_f) references formato(id_f),
    foreign key(id_o) references ordine(id_o)
)engine innodb;

