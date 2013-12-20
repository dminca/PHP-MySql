##Create database
CREATE DATABASE IF NOT EXISTS d;
use d;

##Create table(s)

CREATE TABLE IF NOT EXISTS departament
(id int unique auto_increment primary key,
nume char(20),
manager_id int);

CREATE TABLE IF NOT EXISTS angajat
(id int unique auto_increment primary key,
nume char(20),
prenume char(20),
departament_id int,
manager_id int ,
salariu int,
angajare date,
vechime date,
INDEX (departament_id),
FOREIGN KEY (departament_id) REFERENCES departament(id),
FOREIGN KEY(manager_id) REFERENCES angajat(id));


INSERT INTO departament (nume, manager_id) VALUES
('R&D', 1), ('QA', 2), ('IT', 3), ('Backend', 4), ('HR', 5);


INSERT INTO angajat 
(nume, prenume, departament_id, manager_id, salariu, angajare) 
VALUES
('Popa', 	'Ion', 	  1, NULL, 8000, '2000-1-12'),
('Popescu', 	'Maria',   1, 1, 3000, '2003-5-6'),
('Marinescu', 	'Vasile', 1, 1, 5000, '2004-6-3'),
('Ionescu', 	'Andrei', 1, NULL, 3000, '2002-1-1'),
('Vasilescu', 	'Ana', 	  2, NULL, 2000, '2006-3-3'),
('Dragan', 	'Dinu',   2, 5, 2000, '2004-11-12'),
('Mihailescu', 	'Adrian', 5, NULL, 2500, '2006-10-12'),
('Teodorescu', 	'Matei',  3, NULL, 2000, '2005-1-12'),
('Popescu', 	'Vasile', 3, 8, 3000, '2005-9-9'),
('Mateescu', 	'Dumitru',3, 8, 3000, '2007-2-5'),
('Calinescu', 	'Alin',   4, NULL, 3200, '2005-8-2'),
('Popescu', 	'Mihaela',4, 12, 1500, '2005-4-8'),
('Ionescu', 	'Diana',  5, NULL, 5000, '2001-1-12');



# Numele angajatilor
# Numele angajatilor, ordonate crescator
# Numele angajatilor, ordonate descrescator
# Numele angajatilor care lucreaza la R&D
# Angajatii care nu lucreaza la R&D
# Angajatii care au salariu mai mare de 3000 lei
# Angajatii care au salariul 3000 lei
# Angajatii care au salariul intre 3000 si 5000 de lei
# Angajatii care nu au manager
# Angajatii ai caror manager are ID-ul  1
# Angajatii ai caror manager este Popa Ion
# Angajatii care au salariu mai mare de 2500 lei si lucreaza la Backend


SELECT nume, prenume 
FROM angajat;


SELECT nume, prenume
FROM angajat
ORDER BY 2, 3;

SELECT nume, prenume
FROM angajat
ORDER BY nume, prenume ASC;

SELECT nume, prenume
FROM angajat
ORDER BY nume, prenume DESC;

SELECT nume, prenume
FROM angajat
ORDER BY nume DESC, prenume DESC;

SELECT nume, prenume
FROM angajat
ORDER BY departament_id DESC, salariu;

SELECT nume AS Nume, prenume AS Prenume, departament_id AS Dept, Salariu
FROM angajat
ORDER BY departament_id DESC, salariu;


SELECT nume 
FROM angajat
WHERE departament_id = 1;



SELECT angajat.nume 
FROM angajat, departament
WHERE angajat.departament_id = departament.id 
AND departament.nume = 'R&D';



SELECT angajat.nume 
FROM angajat, departament
WHERE angajat.departament_id = departament.id 
AND departament.nume <> 'R&D';

# Angajatii care au salariu mai mare de 3000 lei
SELECT nume, prenume
FROM angajat
WHERE salariu > 3000;

SELECT nume, prenume, salariu
FROM angajat
WHERE salariu > 3000;

# Angajatii care au salariul 3000 lei
SELECT nume, prenume, salariu
FROM angajat
WHERE salariu = 3000;

# Angajatii care au salariul intre 3000 si 5000 de lei (incluzand limitele)
SELECT nume, prenume, salariu
FROM angajat
WHERE salariu >= 3000 AND salariu <= 5000;


SELECT nume, prenume, salariu
FROM angajat
WHERE salariu BETWEEN 3000 AND 5000;

SELECT nume, prenume, salariu
FROM angajat
WHERE salariu > 3000 AND salariu < 5000;

# Angajatii care nu au manager
SELECT nume, prenume
FROM angajat
WHERE manager_id IS NULL;

# Angajatii ai carui manager are ID-ul  1
SELECT nume, prenume
FROM angajat
WHERE manager_id = 1;


# Angajatii ai carui manager este Popa Ion
SELECT nume, prenume
FROM angajat
WHERE manager_id IN 
(SELECT id
FROM angajat
WHERE nume='Popa' AND prenume='Ion');

#Angajatii ai caror manager NU este Popa Ion si care au salariu mai mare de 4000 lei

SELECT nume, prenume
FROM angajat
WHERE manager_id IS NULL 
OR manager_id NOT IN 
(SELECT id
FROM angajat
WHERE nume='Popa' AND prenume='Ion')
AND salariu > 1000;



SELECT nume, prenume
FROM angajat
WHERE manager_id NOT IN 
(SELECT id
FROM angajat
WHERE nume='Popa' AND prenume='Ion')

# Angajatii care au salariu mai mare de 2500 lei si lucreaza la Backend

SELECT angajat.nume AS Angajat, departament.nume AS Departament, salariu AS Salariu
FROM angajat, departament
WHERE 
(angajat.departament_id = departament.id 
AND departament.nume = 'Backend')
AND salariu > 2500;


# Angajatii, grupati pe departamente

SELECT angajat.nume, angajat.prenume, departament.nume AS Departament
FROM angajat, departament
WHERE angajat.departament_id = departament.id
GROUP BY Departament;

# Numarul de angajati in fiecare departament

SELECT departament.nume AS Departament, count(*) AS 'Numar Angajati'
FROM angajat, departament
WHERE angajat.departament_id = departament.id
GROUP BY Departament

# Numarul de angajati in fiecare departament, ordonare dupa numar de angajati

SELECT departament.nume AS Departament, count(*) AS 'Numar Angajati'
FROM angajat, departament
WHERE angajat.departament_id = departament.id
GROUP BY Departament
ORDER BY count(*) DESC;

# Angajatii, ordonati dupa vechime

SELECT nume, prenume, YEAR(CURRENT_DATE()) - YEAR(angajare) AS Vechime
FROM angajat
ORDER BY Vechime;


SELECT nume, prenume, YEAR(CURRENT_DATE()) - YEAR(angajare) AS Vechime_An,
MONTH(CURRENT_DATE()) - MONTH(angajare) AS Vechime_Luna,
DAY(CURRENT_DATE()) - DAY(angajare) AS Vechime_Zile
FROM angajat
ORDER BY Vechime_An DESC, Vechime_Luna DESC, Vechime_Zile DESC;

