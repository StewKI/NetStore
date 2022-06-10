insert into kategorije(id_kategorije,naziv) values
(1,'Bela tehnika'),
(2,'IT uredjaji'),
(3,'Kablovi');

insert into proizvodi(id_proizvoda,naziv,opis,stanje,id_kategorije,cena,slika) values
(1,'Ves mašina gorenje','Dobra mašina',3,1,25999,'ves_gorenje.jpg'),
(2,'Frizider Beko','Dobar frizider',4,1,29999,'frizider_beko.jpg'),
(3,'Sporet Sloboda Cacak','Dobar sporet',2,1,34999,'sporet_sloboda.jpg'),
(4,'Laptop Asus','Dobar laptop',5,2,46999,'laptop_asus.jpg'),
(5,'Monitor Dell','Dobar monitor',4,2,16999,'monitor_dell.jpg'),
(6,'HDMI kabl','Dobar kabl',6,3,599,'hdmikabl.jpg');
