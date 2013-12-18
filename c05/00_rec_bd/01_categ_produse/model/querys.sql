use myshop;
SELECT * FROM categorie;
INSERT INTO categorie(denumire)
VALUES('laptopuri'),('software'),('periferice');
DELETE FROM categorie
WHERE id >=4;