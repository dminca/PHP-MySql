Aplicatia finala va fi un CMS siplu care va permite vizitatorului sa navigheze si sa vizualizeze continutul paginilor.
Administratorul poate face login, poate administra continutul, poate administra userii, poate face logout.

cms_05
- layout-ul
- Modulul de navigare 
	-- afisarea listei de subiecte si pagini
	-- link pe fiecare item al listei de subiecte catre scriptul content.php cu query stringul id-ul subiectului selectat
	-- link pe fiecare item al listei de pagini catre scriptul content.php cu query stringul id-ul paginii selectate
	--aplic clasa selected elementului <li> asociat subiectului sau	paginii selectate
- Continutul paginii
	--afisez numele subiectului sau paginii selectate
	--pentru pagina afisez si ontinutul

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
	--confirm_query($result_set)
		-daca !$result_set, intrerup executia scriptului
	-- get_all_subjects()
		- returneaza $result_set de tip resurce care contine toate datele din tabelul subjects
	-- get_pages_for_subject($subject_id)
		- returneaza $result_set de tip resurce care contine toate paginile legate de subiectul cu $subject_id
	-- get_subject_by_id($subject_id)
		- returneaza $subject de tip array reprezentand inregistrarea asociata subiectului cu id-ul $subject_id
	-- get_page_by_id($page_id)
		- returneaza $subject de tip array reprezentand inregistrarea asociata paginii cu id-ul $page_id
	--find_selected_page(&$sel_subj,&$sel_page)
		- memoreaza in &$sel_subj,respectiv &$sel_page subiectul sau pagina selectata sub forma de array
		- se folosesc functiile get_subject_by_id($subject_id),	respectiv get_page_by_id($page_id) 
	+--navigation($sel_subj,$sel_page)
		- codul pentru modulul de navigare

Fisiere:
- content.php 
	- includ connection.php
	- includ header.php
	- includ functions.php
		
	- apelez functia find_selected_page($sel_subj,$sel_page) si get_pages_for_subject($subject_id)
	- structura layout-ului
	- modulul de navigare
		+--apelez functia navigation($sel_subj,$sel_page)
			-- lista de subiecte si pagini
				--voi folosi functiile get_all_subjects() si get_pages_for_subject($subject_id)
				--atentie: acum $sel_subj,  $sel_page sunt de tip array
			-- link pe fiecare item al listei catre atre scriptul content.php cu query stringul id-ul subiectului sau paginii selectate
			-- clasa selected pentru elementul <li> selectat
	
	- continutul paginii
		-- afisez numele subiectului sau paginii selectate
		-- pentru pagina afisez si continutul intr-un div cu clasa "page-selected"

	-includ footer.php
###########################


