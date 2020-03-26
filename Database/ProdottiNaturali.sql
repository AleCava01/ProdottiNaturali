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
    misura varchar(5) not null,
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
    data datetime,
    via varchar(255),
    civico int,
    cap int,
    citta varchar(255),
    provincia varchar(255),
    pagamento int,
    note varchar(255),
    stato int,
    spedizione int,
    importo decimal(7,2),
    id_u int,
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
insert into categoria(nome,descrizione) values ("Saponi", "I nostri saponi 100% naturali sono lavorati a mano, sono unici e non contengono riempitivi economici, derivati del petrolio, profumi o coloranti artificiali, olio di palma e di palmisto, conservanti e non sono testati su animali.");
insert into categoria(nome,descrizione) values ("Creme","Prodotti mirati per la cura e il nutrimento di viso e collo. Attivi naturali altamente efficaci in grado di prevenire e migliorare i segni del tempo!");
insert into sottocategoria(nome,descrizione,id_c) values ("Rilassanti", "Un'accurata selezione di oli essenziali per eliminare lo stess ambientale, alimentare, fisico, mentale ed emotivo.", 1);
insert into sottocategoria(nome,descrizione,id_c) values ("Digestivi", "Un'accurata selezione di oli essenziali per stimolare il processo digestivo.", 1);
insert into sottocategoria(nome,descrizione,id_c) values ("Stimolanti", "Un'accurata selezione di oli essenziali utilizzati in aromaterapia con ottime proprietà stimolanti.", 1);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone di Aleppo", "Il Sapone di Aleppo è un sapone per l'igiene personale, basato sull'uso dell'olio d'oliva con l'aggiunta di una percentuale variabile di olio d'alloro; è un prodotto tipico della città di Aleppo in Siria",2);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone liquido", "Saponi liquidi completamente naturali",2);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone nero", "Il sapone nero è conosciuto anche come sapone marocchino o sapone nero africano. Il suo impiego è tipico degli Hammam, dove viene utilizzato in accompagnamento ad uno speciale guanto esfoliante.",2);
insert into sottocategoria(nome,descrizione,id_c) values ("Sapone tradizionale", "Tipico sapone solido naturale al 100%",2);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI CUMINO - LAB. ALTHO", " Lenitivo, antinfiammatorio, antispasmodico, analgesico, digestivo, aperitivo, carminativo, sedativo. Stimolante del sistema digestivo, è utile contro la formazione di gas intestinale, la secrezione biliare, spasmi, mancanza di appetito, digestione difficile, ecc. È anche apprezzato per essere lenitivo, sedativo e rilassante. Viene infatti utilizzato in sinergia con oli essenziali di agrumi per combattere l'insonnia. L'olio essenziale di Cumino è facilmente utilizzabile in cucina.","olio-essenziale-di-cumino-lab-altho.jpg", "Per via orale: 1 goccia di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero 2 volte al giorno per stimolare l'appetito. Sulla pelle: Miscela da 3 a 5 gocce di olio essenziale in 30 ml di olio di Sesamo in applicazioni locali per massaggiare l'addome in caso di aerofagia.", 2);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 7.5, 15, 1);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 13.4, 15, 1);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (50,"ml", 29.9, 15, 1);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI LIMONE", "La composizione biochimica dell'olio essenziale di Limone gli conferisce potenti proprietà antisettiche, antibatteriche e antivirali. E' un tonico digestivo, stimolante dell'appetito, un antiinfiammatorio e un febbrifugo. Un prezioso alleato per le sue proprietà drenanti epatiche e per la sua azione sulla cellulite. Ha la capacità di riattivare la circolazione, proprietà funzionale anche contro la sensazione di 'gambe pesanti'. Un potente antisettico, capace di disinfettare le ferite ed in diffusione di eliminare i rischi di contagio. È uno degli oli essenziali da avere in casa per le sue numerose proprietà, anche in cucina: vinaigrette, mousse e sorbetto al Limone, torte, ecc ...", "olio-essenziale-di-limone.jpg","Per via orale: 2 gocce di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero 3 volte al giorno per trattare infezioni digestive o raffreddori. Sulla pelle: 20 gocce di olio essenziale di Cedro più 20 gocce di olio essenziale di Limone in 100 ml di olio di Nocciola per trattamenti drenanti anticellulite. In diffusione: Aiuta a rifocalizzarsi su se stessi, inoltre profumerà i tuoi ambienti purificando l'aria ed eliminando i rischi di contagio durante i mesi invernali.", 2);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 8.9, 10, 2);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (50,"ml", 35.5, 10, 2);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI SALVIA SCLAREA - LAB. ALTHO", "Antitraspirante, tonico per il cuoio capelluto, diuretico, antibatterico, antimicotico, endocrino-modulante. Spesso consigliato in pre-menopausa, l'olio essenziale di Salvia sclarea è particolarmente adatto alle donne, la sua influenza sugli ormoni femminili aiuta a regolare i cicli mestruali e riequilibra la donna in menopausa. Utilizzato in lozioni stabilizza la secrezione di sebo e sudore, risulta inoltre un eccellente tonico per il cuoio capelluto, in grado di promuovere la crescita dei capelli. È efficace anche per alleviare i piedi e le mani sudate. In aromaterapia risulta calmante e rilassante, spesso descritto come euforico. Si dice che incentivi sogni piacevoli.", "olio-essenziale-di-salvia-sclarea-lab-altho.jpg", "Per via orale: 1 goccia di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero da assumere durante la menopausa. Sulla pelle: Miscela 3 gocce di olio essenziale al tuo shampoo per trattare i capelli grassi. In diffusione: Utile in caso di affaticamento, allontana gli insetti sgraditi.",1);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 5.3, 15, 3);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 9.3, 20, 3);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (50,"ml", 19.9, 15, 3);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI MENTA VERDE - LAB. ALTHO", "Antifiammatorio, digestivo, calmante del sistema nervoso, anti-stress, mucolitico e cicatrizzante. È efficace contro il raffreddore, la bronchite, le infezioni del tratto respiratorio. Facilita la digestione, sarà efficace in caso di cistite (infiammazione), per disinfettare una ferita o una cicatrice. Può ovviamente essere usato in cucina dove profumerà sottilmente i tuoi piatti e dessert.", "olio-essenziale-di-menta-verde-lab-altho.jpg", "Per via orale: 1 goccia di olio essenziale dopo i pasti facilita la digestione Sulla pelle: 2 gocce di olio essenziale in olio di nocciolo di Albicocca per nausea o mal di viaggio. In diffusione: Pulisce e rinfresca l'aria degli ambienti.", 3);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 7.3, 20, 4);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 12.2, 20, 4);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (50,"ml", 29.8, 20, 4);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI KATRAFRAY", "Antinfiammatorio, decongestionante, antistaminico, antipruriginoso, analgesico.È indicato in casi di dermatosi infiammatorie, eczema, vene varicose, gambe pesanti, psoriasi e allergie cutanee. Viene normalmente raccomandato anche contro i dolori muscolari, reumatismi, artrite e tendiniti.", "olio-essenziale-di-katafray.jpg", "Sulla pelle: 15/20 gocce di olio essenziale in 10 ml di macerato di Calendula per in applicazione locale contro eczema o allergie cutanee.In diffusione: Tonico generale.", 3);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 8.9, 20, 5);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 14.0, 20, 5);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (50,"ml", 35.4, 20, 5);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI RODODENDRO", "Possiede proprietà antinfiammatorie simili a quelle delle conifere, inoltre per le sue virtù simili al trattamento al cortisone e immunostimolanti può essere utilizzato per contrastare i dolori reumatici, dolori alla schiena e gli stati influenzali. Tonico e riconfortante sul piano psichico, ridona vigore ed energia. Può essere un buon alleato durante i periodi di stanchezza o di convalescenza.", "olio-essenziale-di-rododendro.jpg", "Per via orale: Solo sotto supervisione medica. Sulla pelle: Miscela qualche goccia di olio essenziale in olio vegetale per trattare localmente con massaggi i dolori reumatici o alla schiena. Puoi anche aggiungerne 10 gocce in una manciata di sale marino e versarlo nella vasca per un bagno ristoratore. In diffusione: Aiuta il rilassamento e a ritrovare energia.", 3);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 10.2, 22, 6);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (50,"ml", 27.5, 15, 6);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI RAVINTSARA - CENTIFOLIA", "Allevia i dolori, diminuisce gli agenti patogeni, allevia le contrazioni muscolari, libera le vie respiratorie. Inoltre, stimola l’energia e rivitalizza il nostro organismo in modo da aumentare la difesa dalle infezioni. Se vaporizzato purifica l'aria e difende dal contagio nei periodi invernali e durante le epidemie. In cosmesi può essere utilizzato in bagni-doccia per il suo effetto rinfrescante o in creme o lozioni per il viso per il trattamento della pelle impura o come tonico.", "olio-essenziale-di-ravintsara-centifolia.jpg", "Da consumare come parte di un dieta variegata ed equilibrata ed un sano stile di vita. Dose giornaliera massima 2 gocce. L'uso per via orale degli oli essenziali può essere effettuato solo sotto la supervisione di un medico.", 3);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 12.3, 22, 7);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (60,"ml", 29.9, 15, 7);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI DRAGONCELLO", "Potente antispasmodico muscolare, ha proprietà digestive e stomachiche, è antinfiammatorio, antiallergico, antivirale, antibatterico e rilassante. L'olio essenziale di Dragoncello è tradizionalmente indicato contro i mali di stomaco, flatulenza, colite, disturbi mestruali e dismenorrea. Efficace anche per il mal di viaggio. Per il suo campo di azione antivirale, è consigliato contro: tosse spastica, asma allergico e rinite allergica (pollini, polvere).", "olio-essenziale-di-dragoncello.jpg", "Per via orale: 2 o 3 gocce di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero prima dei pasti per aiutare la digestione o contro le flatulenze. Sulla pelle: 5 gocce di olio essenziale in 3 ml di olio di Nocciola applicato localmente per contrastare i crampi muscolari. In diffusione: Efficace in caso di allergie respiratorie.", 1);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 4.2, 40, 8);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 7.3, 30, 8);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (80,"ml", 27.9, 20, 8);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("OLIO ESSENZIALE DI ARANCIO DOLCE - LAB. ALTHO", "Noto per la sua azione sulla psiche: rilassante, antidepressivo, lenitivo e sedativo. L'olio essenziale di arancio biologico calma l'ansia, il nervosismo, l'irrequietezza, i disturbi del sonno e gli stati depressivi. Combatte i disturbi digestivi e decongestiona i tessuti (cellulite, edema). In cucina, il suo aroma gourmet ti sedurrà e profumerà deliziosamente le tue preparazioni culinarie.", "olio-essenziale-di-arancio-dolce-lab-altho.jpg", "Per via orale: 2 gocce di olio essenziale in un cucchiaino con un po' di sciroppo d'Agave o di Acero 3 volte al giorno per contrastare i disturbi del sonno. Sulla pelle: Miscela 2 gocce di olio essenziale in 2 ml di olio Sesamo per un massaggio sui polsi e sul plesso solare dagli effetti rilassanti e calmanti. In diffusione: Disinfetta l'aria degli ambienti e ti invita ad un momento di serenità regalandoti il suo dolce e rassicurante profumo.", 1);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (10,"ml", 5.2, 40, 9);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (20,"ml", 8, 30, 9);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (60,"ml", 24.9, 20, 9);
insert into prodotto(nome, descrizione, immagine, istruzioni, id_sc) values ("SAPONE DI ALEPPO - ISHA COSMETICS", "È il più antico in assoluto dei saponi solidi, le prime testimonianze archeologiche rinvenute in Babilonia risalgono al 2500 a.C. Gli stessi francesi appresero la tecnica di saponificazione dalla città di Aleppo ai tempi delle crociate, nacque così il figlio minore conosciuto come sapone di Marsiglia. Il sapone di Aleppo è completamente vegetale e biodegradabile senza aggiunta di conservanti, coloranti o profumi aggiunti. L’olio di Alloro è conosciuto per le sue ottime proprietà antifiammatorie, antisettiche e disinfettanti. È indicato come rimedio naturale per combattere eczemi, psoriasi, acne e dermatiti. Emolliente e delicato sulla pelle, è indicato anche per i bambini, ottimo anche come maschera per il viso se lasciato in posa per qualche minuto o come sostitutivo della schiuma da barba.", "sapone-di-aleppo-isha-cosmetics.jpg", "Applica sulla pelle o sul viso sull'area interessata con movimenti circolari fino al raggiungimento di una schiuma delicata. Evita il contatto con parti sensibili come gli occhi. Lascia in posa per qualche secondo e risciacqua con abbondante acqua corrente.", 4);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (5,"%", 5.5, 40, 10);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (16,"%", 7, 30, 10);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (25,"%", 8, 40, 10);
insert into formato(capacita,misura, prezzo, disponibilita, id_p) values (40,"%", 10, 30, 10);
