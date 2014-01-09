Aplicatia finala va fi un CMS siplu care va permite vizitatorului sa navigheze si sa vizualizeze continutul paginilor.
Administratorul poate face login, poate administra continutul, poate administra userii, poate face logout.

cms_02
- layout-ul
+- Modulul de navigare 
	-- afisarea listei de subiecte si pagini
	-- link pe fiecare item al listei de subiecte catre scriptul content.php cu query stringul id-ul subiectului selectat
	-- link pe fiecare item al listei de pagini catre scriptul content.php cu query stringul id-ul paginii selectate

###########################

Structura aplicatiei
--------------------
Foldere: 
-images - va contine imaginile
-javascript - va contine scripturile js
-stylesheets - public.css
-includes - va contine:
-- constants.php - datele pentru conexiunea cu baza de date
-- connection.php - scriptul pentru conexiunea cu baza de date
+--header.php - codul pentru antetul paginii
+--footer.php - codul pentru subsolul paginii

Fisiere:
- content.php 
	+-includ connection.php
	+-includ header.php

	- structura layout-ului
	+- modulul de navigare
		+-- lista de subiecte si pagini
		+-- link pe fiecare item al listei catre atre scriptul content.php cu query stringul id-ul subiectului sau paginii selectate

	+-includ footer.php
###########################


