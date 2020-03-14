# ProdottiNaturali
PROGETTAZIONE DATABASE – ALESSANDRO CAVALIERI
ANALISI
Si vuole realizzare un sito web per la vendita di prodotti naturali e biologici. Il sito dovrà disporre di categorie, ognuna delle quali disporrà a sua volta di diverse sottocategorie che conterranno i prodotti.
Ogni prodotto è disponibile in uno o più formati. In base al formato, alla quantità di prodotti e alla tipologia di spedizione, verrà calcolato l’importo totale dell’ordine.
Per effettuare gli ordini gli utenti devono essere registrati.
IPOTESI
-	Tutti i prodotti devono appartenere ad una sottocategoria
-	Un prodotto non può essere contenuto in più sottocategorie
-	Un ordine deve contenere almeno un prodotto
-	Ogni prodotto deve possedere almeno un formato
-	Un ordine può essere effettuato da un solo utente
ENTITA’
-	CATEGORIA
o	ID_C – chiave primaria (int)
o	nome (string)
o	descrizione (string)
-	SOTTOCATEGORIA
o	ID_SC – chiave primaria (int)
o	nome (string)
o	descrizione (string)
-	PRODOTTO
o	ID_P – chiave primaria (int)
o	nome (string)
o	descrizione (string)
o	immagine (string)
o	istruzioni (string)
-	FORMATO
o	ID_F – chiave primaria (int)
o	capacità (double)
o	prezzo (double)
o	disponibilità (int)
-	ORDINE
o	ID_O – chiave primaria (int)
o	data (datetime)
o	via (string)
o	civico (int)     
o	CAP (int)
o	città (string)
o	provincia (string)
o	pagamento (int) -> 1: carta di credito 2: bonifico bancario 3: gift card 4: contrassegno
o	spedizione (int) -> 1: prioritaria 2: normale 3: low-cost
o	note (string)
o	stato (int) -> 1: in attesa 2: spedito 3: consegnato
o	importo (double)
UTENTE
o	ID_U – chiave primaria (int)
o	username (string)
o	password (string)
o	email (string)
o	nome (string)
o	cognome (string)
o	via (string)
o	civico (int)
o	CAP (int)
o	citta (string)
o	provincia (string)
DIAGRAMMA E-R
 ASSOCIAZIONI
-	CONTIENE | Categoria -> Sottocategoria | 1:N |partecipazione totale in entrambi i versi| una categoria può contenere una o più sottocategorie, una sottocategoria deve essere contenuta in una categoria.
-	CATEGORIZZA | Sottocategoria -> Prodotto | 1:N | diretta parziale, inversa totale | una sottocategoria può contenere uno o più prodotti, ogni prodotto è contenuto in una sola sottocategoria.
-	POSSIEDE | Prodotto -> Formato | 1:N | totale in entrambi i versi | un prodotto possiede più formati, un formato è posseduto da un solo prodotto.
-	AGGIUNTO | Formato -> Ordine | N:N | totale in entrambi i versi | più formati possono essere aggiunti ad un ordine, più ordini possono avere più formati di un prodotto| attributo dell’associazione: Quantità (int), specifica la quantità del formato del prodotto da aggiungere all’ordine, Prezzo_parziale (double).
-	EFFETTUA | Utente -> Ordine | 1:N | diretta parziale, inversa totale | un utente può effettuare più ordini, ogni ordine è di un solo utente.
SCHEMA LOGICO
-	CATEGORIA (ID_C (PK), nome, descrizione)
-	SOTTOCATEGORIA (ID_SC (PK), nome, descrizione, ID_C (FK))
-	PRODOTTO (ID_P (PK), nome, descrizione, immagine, istruzioni, ID_SC(FK))
-	FORMATO (ID_F (PK), capacità, prezzo, disponibilità, ID_P (FK))
-	UTENTE (ID_U (PK), username, password, email, nome, cognome, via, civico, CAP, città, provincia)
-	ORDINE (ID_O (PK), data, via, civico, CAP, città, provincia, pagamento, note, stato, spedizione, importo, ID_U (FK))
-	CARRELLO (ID_F (FK), ID_O (FK), quantità, importo_parziale) *ID_F e ID_O, insieme, formano la PK.
