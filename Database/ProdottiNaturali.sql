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
    note varchar(255),
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

/* POPOLAZIONE DB */
insert into categoria(nome,descrizione) values ("Oli Essenziali", "I nostri oli essenziali sono puri e 100% naturali, certificati e privi di sostanze sintetiche.
Queste sostanze volatili, pregiate, profumate e ricche di principi attivi, vengono ottenute per estrazione a partire da materiale vegetale aromatico ricco in essenze. Provengono dai fiori, frutti, foglie, dalle cortecce e dalle resine. L’estrazione avviene mediante distillazione in corrente di vapore, spremitura o enflouragei.");
insert into categoria(nome,descrizione) values ("Saponi", "I NOSTRI SAPONI 100% NATURALI SONO LAVORATI A MANO, SONO UNICI E NON CONTENGONO RIEMPITIVI ECONOMICI, DERIVATI DEL PETROLIO, PROFUMI O COLORANTI ARTIFICIALI, OLIO DI PALMA E DI PALMISTO, CONSERVANTI E NON SONO TESTATI SU ANIMALI.");
insert into categoria(nome,descrizione) values ("Creme","Prodotti mirati per la cura e il nutrimento di viso e collo. Attivi naturali altamente efficaci in grado di prevenire e migliorare i segni del tempo!");
insert into sottocategoria(nome,descrizione,id_c) values ("Rilassanti", "Un'accurata selezione di oli essenziali per eliminare lo stess ambientale, alimentare, fisico, mentale ed emotivo.", 1);
insert into sottocategoria(nome,descrizione,id_c) values ("Digestivi", "Un'accurata selezione di oli essenziali per stimolare il processo digestivo.", 1);
insert into sottocategoria(nome,descrizione,id_c) values ("Stimolanti", "Un'accurata selezione di oli essenziali utilizzati in aromaterapia con ottime proprietà stimolanti.", 1);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone di Aleppo", "Il Sapone di Aleppo è un sapone per l'igiene personale, basato sull'uso dell'olio d'oliva con l'aggiunta di una percentuale variabile di olio d'alloro; è un prodotto tipico della città di Aleppo in Siria",2);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone liquido", "Saponi liquidi completamente naturali",2);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone nero", "Il sapone nero è conosciuto anche come sapone marocchino o sapone nero africano. Il suo impiego è tipico degli Hammam, dove viene utilizzato in accompagnamento ad uno speciale guanto esfoliante.",2);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone tradizionale", "Tipico sapone solido naturale al 100%",2);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI CUMINO - LAB. ALTHO", " Lenitivo, antinfiammatorio, antispasmodico, analgesico, digestivo, aperitivo, carminativo, sedativo. Stimolante del sistema digestivo, è utile contro la formazione di gas intestinale, la secrezione biliare, spasmi, mancanza di appetito, digestione difficile, ecc. È anche apprezzato per essere lenitivo, sedativo e rilassante. Viene infatti utilizzato in sinergia con oli essenziali di agrumi per combattere l'insonnia. L'olio essenziale di Cumino è facilmente utilizzabile in cucina.","olio-essenziale-di-cumino-lab-altho.jpg", "Per via orale: 1 goccia di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero 2 volte al giorno per stimolare l'appetito. Sulla pelle: Miscela da 3 a 5 gocce di olio essenziale in 30 ml di olio di Sesamo in applicazioni locali per massaggiare l'addome in caso di aerofagia.", 2);
insert into formato(capacita, prezzo, disponibilita, id_p) values (10, 7.5, 15, 1);
insert into formato(capacita, prezzo, disponibilita, id_p) values (20, 13.4, 15, 1);
insert into formato(capacita, prezzo, disponibilita, id_p) values (50, 29.9, 15, 1);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI LIMONE", "La composizione biochimica dell'olio essenziale di Limone gli conferisce potenti proprietà antisettiche, antibatteriche e antivirali. E' un tonico digestivo, stimolante dell'appetito, un antiinfiammatorio e un febbrifugo. Un prezioso alleato per le sue proprietà drenanti epatiche e per la sua azione sulla cellulite. Ha la capacità di riattivare la circolazione, proprietà funzionale anche contro la sensazione di 'gambe pesanti'. Un potente antisettico, capace di disinfettare le ferite ed in diffusione di eliminare i rischi di contagio. È uno degli oli essenziali da avere in casa per le sue numerose proprietà, anche in cucina: vinaigrette, mousse e sorbetto al Limone, torte, ecc ...", "olio-essenziale-di-limone.jpg","Per via orale: 2 gocce di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero 3 volte al giorno per trattare infezioni digestive o raffreddori. Sulla pelle: 20 gocce di olio essenziale di Cedro più 20 gocce di olio essenziale di Limone in 100 ml di olio di Nocciola per trattamenti drenanti anticellulite. In diffusione: Aiuta a rifocalizzarsi su se stessi, inoltre profumerà i tuoi ambienti purificando l'aria ed eliminando i rischi di contagio durante i mesi invernali.", 2);
insert into formato(capacita, prezzo, disponibilita, id_p) values (10, 8.9, 10, 2);
insert into formato(capacita, prezzo, disponibilita, id_p) values (50, 35.5, 10, 2);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI SALVIA SCLAREA - LAB. ALTHO", "Antitraspirante, tonico per il cuoio capelluto, diuretico, antibatterico, antimicotico, endocrino-modulante. Spesso consigliato in pre-menopausa, l'olio essenziale di Salvia sclarea è particolarmente adatto alle donne, la sua influenza sugli ormoni femminili aiuta a regolare i cicli mestruali e riequilibra la donna in menopausa. Utilizzato in lozioni stabilizza la secrezione di sebo e sudore, risulta inoltre un eccellente tonico per il cuoio capelluto, in grado di promuovere la crescita dei capelli. È efficace anche per alleviare i piedi e le mani sudate. In aromaterapia risulta calmante e rilassante, spesso descritto come euforico. Si dice che incentivi sogni piacevoli.", "olio-essenziale-di-salvia-sclarea-lab-altho.jpg", "Per via orale: 1 goccia di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero da assumere durante la menopausa. Sulla pelle: Miscela 3 gocce di olio essenziale al tuo shampoo per trattare i capelli grassi. In diffusione: Utile in caso di affaticamento, allontana gli insetti sgraditi.",1);
insert into formato(capacita, prezzo, disponibilita, id_p) values (10, 5.3, 15, 3);
insert into formato(capacita, prezzo, disponibilita, id_p) values (20, 9.3, 20, 3);
insert into formato(capacita, prezzo, disponibilita, id_p) values (50, 19.9, 15, 3);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI MENTA VERDE - LAB. ALTHO", "Antifiammatorio, digestivo, calmante del sistema nervoso, anti-stress, mucolitico e cicatrizzante. È efficace contro il raffreddore, la bronchite, le infezioni del tratto respiratorio. Facilita la digestione, sarà efficace in caso di cistite (infiammazione), per disinfettare una ferita o una cicatrice. Può ovviamente essere usato in cucina dove profumerà sottilmente i tuoi piatti e dessert.", "olio-essenziale-di-menta-verde-lab-altho.jpg", "Per via orale: 1 goccia di olio essenziale dopo i pasti facilita la digestione Sulla pelle: 2 gocce di olio essenziale in olio di nocciolo di Albicocca per nausea o mal di viaggio. In diffusione: Pulisce e rinfresca l'aria degli ambienti.", 3);
insert into formato(capacita, prezzo, disponibilita, id_p) values (10, 7.3, 20, 4);
insert into formato(capacita, prezzo, disponibilita, id_p) values (20, 12.2, 20, 4);
insert into formato(capacita, prezzo, disponibilita, id_p) values (50, 29.8, 20, 4);