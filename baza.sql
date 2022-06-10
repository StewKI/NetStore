create table if not exists kategorije(
    id_kategorije int not null PRIMARY KEY,
    naziv varchar(45) not null
);

create table if not exists proizvodi(
    id_proizvoda int not null PRIMARY KEY,
    naziv varchar(45) not null,
    opis text,
    slika varchar(25),
    stanje int not null,
    cena int not null,
    id_kategorije int not null,
    FOREIGN KEY (id_kategorije) references kategorije(id_kategorije)
);

create table if not exists detalji(
    id_detalja int not null PRIMARY KEY,
    naziv varchar(45) not null,
    opis varchar(45) not null,
    id_proizvoda int not null,
    FOREIGN KEY (id_proizvoda) references proizvodi(id_proizvoda)
);

create table if not exists korisnici(
    id_korisnika int not null PRIMARY KEY,
    ime varchar(20) not null,
    prezime varchar(20) not null
    /*podaci za placanje, adresa*/
);

create table if not exists ocene(
    id_ocene int not null PRIMARY KEY,
    broj_zvezdica int not null,
    komentar varchar(200),
    id_korisnika int not null,
    id_proizvoda int not null,
    FOREIGN KEY (id_korisnika) references korisnici(id_korisnika),
    FOREIGN KEY (id_proizvoda) references proizvodi(id_proizvoda)
);

create table if not exists porudzbine(
    id_porudzbine int not null PRIMARY KEY,
    vreme datetime not null default CURRENT_TIMESTAMP,
    cena int not null,
    isporucena boolean,
    ime varchar(20) not null,
    prezime varchar(20) not null,
    ulica varchar(20) not null,
    broj varchar(4) not null,
    grad varchar(20) not null,
    postanski varchar(10) not null,
    telefon varchar(12) not null,
    email varchar(20)
);

create table if not exists poruceni_proizvodi(
    id_por_proiz int not null PRIMARY KEY AUTO_INCREMENT,
    kolicina int not null default 1,
    id_porudzbine int not null,
    id_proizvoda int not null,
    FOREIGN KEY (id_porudzbine) references porudzbine(id_porudzbine),
    FOREIGN KEY (id_proizvoda) references proizvodi(id_proizvoda)
);