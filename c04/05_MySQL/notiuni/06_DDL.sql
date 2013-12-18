##
## Create database
##

CREATE DATABASE d;
DROP DATABASE d;

CREATE DATABASE d1;
ALTER  DATABASE d1
CHARACTER SET = 'ascii';

CREATE DATABASE d1;

CREATE DATABASE d2;

ALTER  DATABASE d1
CHARACTER SET = 'ascii'
COLLATE = 'ascii_bin';


USE d1;
CREATE TABLE t1 
(c1 INT UNIQUE AUTO_INCREMENT,
 c2 INT DEFAULT 1,
 c3 DATE,
 c4 TIME,
 c5 FLOAT,
 c6 DOUBLE,
 c7 CHAR(20),
  PRIMARY KEY (c1));

describe t1;

INSERT INTO t1 SET c2 = 10, c3='2008-02-20', c4='12:30:20', c5=1.2, c6=0.02, c7='cuvant';
INSERT INTO t1 SET c3='2008/02/12', c4='8.66.20', c7='curs';
select * from t1;

UPDATE t1 SET c7='?apte' WHERE c2 = 1;


ALTER TABLE t1
C7 CHAR(20) CHARACTER SET ='utf8';


CREATE TABLE d2.persoana 
(nume char(10),
 prenume char(10),
 adresa char(30),
 telefon int,
 PRIMARY KEY (nume, prenume));


describe d2.persoana;


INSERT INTO d2.persoana SET nume='Preda', prenume='Gabriel', adresa='Bucuresti S6';
INSERT INTO d2.persoana SET nume='Preda', prenume='Cristian', adresa='Bucuresti S4';
INSERT INTO d2.persoana SET nume='Preda', prenume='Caterina', adresa='Bucuresti S1';
INSERT INTO d2.persoana SET nume='Popescu', prenume='Gabriel', adresa='Bucuresti S4';
INSERT INTO d2.persoana SET nume='Cristian', prenume='Preda', adresa='Brasov';


CREATE TABLE traducere
(token_id INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
 token_nume char(20),
 engleza char(50) CHARACTER SET'ascii',
 romana char(50) CHARACTER SET 'utf8',
 chineza char(50) CHARACTER SET 'big5');



INSERT INTO traducere set token_nume='OPEN_FILE', engleza='Open', romana='Deschide', chineza='?';
INSERT INTO traducere set token_nume='SAVE_FILE', engleza='Save', romana='Salveaz?', chineza='?';


##
## Creare tabela folosind instructiunea select
##

CREATE TABLE translation
SELECT token_nume as token_name, engleza as English, romana AS Romanian
FROM traducere;

CREATE TABLE translation
(French char(50))
SELECT token_nume as token_name, engleza as English, romana AS Romanian
FROM traducere;

##
## Creare tabela folosind instructiunea LIKE
##

CREATE TABLE dictionar
LIKE traducere;

##
## Stergerea unei coloane
##
ALTER TABLE traducere
DROP COLUMN chineza;

##
## Adaugarea unei coloane
##
ALTER TABLE traducere
ADD COLUMN chineza char(50);

##
## Modificarea unei coloane
##
ALTER TABLE traducere
ALTER COLUMN chineza SET DEFAULT 'Necompletat';

INSERT INTO traducere set token_nume='SAVE_AS_FILE', engleza='Save As', romana='Salveaz? ca';

ALTER TABLE traducere
ALTER COLUMN chineza DROP DEFAULT;

INSERT INTO traducere set token_nume='PRINT_FILE', engleza='Print', romana='Tip?re?te';


ALTER TABLE traducere
CHANGE COLUMN chineza japoneza char(50);

ALTER TABLE translation
MODIFY COLUMN French char(60) AFTER Romanian;

ALTER TABLE translation
RENAME TO translate;


##
## Adaugarea unei chei
##
ALTER TABLE translation
ADD PRIMARY KEY (token_name);

##
## Stergere unei chei
##
ALTER TABLE translation
DROP PRIMARY KEY;

##
## Stergerea unei tabele
##

DROP TABLE IF EXISTS traducere;
DROP TABLE IF EXISTS translation;


