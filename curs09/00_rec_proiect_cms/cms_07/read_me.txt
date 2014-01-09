Aplicatia finala va fi un CMS siplu care va permite vizitatorului sa navigheze si sa vizualizeze continutul paginilor.
Administratorul poate face login, poate administra continutul, poate administra userii, poate face logout.

cms_07
- layout-ul
- Modulul de navigare 
	-- afisarea listei de subiecte si pagini
	-- link pe fiecare item al listei de subiecte catre scriptul content.php cu query stringul id-ul subiectului selectat
	-- link pe fiecare item al listei de pagini catre scriptul content.php cu query stringul id-ul paginii selectate
	--aplic clasa selected elementului <li> asociat subiectului sau	paginii selectate
- Continutul paginii
	--afisez numele subiectului sau paginii selectate
	--pentru pagina afisez si continutul
-Modulul de administrare
	--CRUD subjects
	--CRUD pages
+Modulul de login
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
-- header.php - codul pentru antetul paginii
-- footer.php - codul pentru subsolul paginii
--functions.php
	- functia mysql_prep()
		-
	--confirm_query($result_set)
		-daca !$result_set, intrerup executia scriptului
	+- get_all_subjects($public) - se modifica astfel
		- returneaza $result_set de tip resurce care contine toate datele din tabelul subjects daca $public=false
		- returneaza $result_set de tip resurce care contine toate datele cu visible=1 din tabelul subjects daca $public=true
	+- get_pages_for_subject($subject_id,$public) - se modifica astfel
		- returneaza $result_set de tip resurce care contine toate paginile legate de subiectul cu $subject_id daca $public=false
		- returneaza $result_set de tip resurce care contine toate paginile cu visible=1 legate de subiectul cu $subject_id daca $public=true
	-- get_subject_by_id($subject_id)
		- returneaza $subject de tip array reprezentand inregistrarea asociata subiectului cu id-ul $subject_id
	-- get_page_by_id($page_id)
		- returneaza $subject de tip array reprezentand inregistrarea asociata paginii cu id-ul $page_id
	+-get_default_page($subject_id)
		- daca subiectul are pagini, va returna prima pagina care va fi cea implicita
		- altfel va returna NULL
	--find_selected_page(&$sel_subj,&$sel_page)
		- memoreaza in &$sel_subj,respectiv &$sel_page subiectul sau pagina selectata sub forma de array
		- se folosesc functiile get_subject_by_id($subject_id),	respectiv get_page_by_id($page_id) 
	--navigation($sel_subj,$sel_page)
		- codul pentru modulul de navigare
	+-public_navigation($sel_subject, $sel_page, $public = true)
		-meniul penttru zona publica, adica numai subiectele si paginile cu visible=1
+-session.php
	+-pornirea/repornirea sesiunii
	+-logged_in() - TRUE daca s-a facut login, FALSE altfel 
	+-confirm_logged_in() -daca nu s-a facut login, redirect catre login.php
		-
Fisiere:
- content.php 
	-functiile strip_tags() si nl2br() la afisarea continutului paginii
	- includ connection.php
	- includ header.php
	- includ functions.php
		
	- apelez functia find_selected_page($sel_subj,$sel_page) si get_pages_for_subject($subject_id)
	- structura layout-ului
	- modulul de navigare
		--apelez functia navigation($sel_subj,$sel_page)
			-- lista de subiecte si pagini
				--voi folosi functiile get_all_subjects() si get_pages_for_subject($subject_id)
				--atentie: acum $sel_subj,  $sel_page sunt de tip array
			-- link pe fiecare item al listei catre atre scriptul content.php cu query stringul id-ul subiectului sau paginii selectate
			-- clasa selected pentru elementul <li> selectat
	
	- continutul paginii
		-- afisez numele subiectului sau paginii selectate
		-- pentru pagina afisez si continutul intr-un div cu clasa "page-selected"

	-includ footer.php
+index.php
	-aceeasi structura cu content.php
	-va afisa numai subiectele si paginile la care are acces publicul (visible=1)
	- va permite selectia unui subiect sau pagini
		- daca selectez pagina, se va afisa denumirea si continutul acesteia
		- daca selectez subiect cu pagini, se va afisa denumirea si continutul primei pagini pe care o consider implicita
		- daca selectez subiect fara pagini, ii afisez denumirea
-create_subject.php
-delete_subject.php
-create_page.php
-delete_page.php
+create_user.php

+staff.php
+login.php
+logout.php
###########################


