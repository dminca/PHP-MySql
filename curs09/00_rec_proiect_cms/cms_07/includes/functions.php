<?php

	function mysql_prep( $value ) {
		global $connection;
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysqli_real_escape_string" ); // true pt PHP >= v4.3.0
		if($new_enough_php ) { // PHP v4.3.0 sau dupa
			// anulez orice efect al ghilimelelor magice; folosesc mysqli_real_escape_string 
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysqli_real_escape_string($connection, $value );
		} else { // versiuni mai vechi de PHP v4.3.0
			// daca nu sunt active ghilimele magice, adaug slash manual
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// daca sunt active ghilimele magice, slash exista deja
		}
		return $value;
	}
	
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	function confirm_query($result_set){
		if(!$result_set){
			die("Interogarea bazei de date nu a reusit!");
			}
		}
		
	function get_all_subjects($public = true) {
		global $connection;
		$query = "SELECT * 
				FROM subjects ";
		if ($public) {
			$query .= "WHERE visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection,$query);
		confirm_query($subject_set);
		return $subject_set;
	}
	
	function get_pages_for_subject($subject_id, $public = true) {
		global $connection;
		$query = "SELECT * 
				FROM pages ";
		$query .= "WHERE subject_id = {$subject_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$page_set = mysqli_query($connection,$query);
		confirm_query($page_set);
		return $page_set;
	}
	
	function get_subject_by_id($subject_id){
		global $connection;
		$query="SELECT *
				FROM subjects
				WHERE id={$subject_id}
				ORDER BY position ASC
				LIMIT 1";
		$result_set=mysqli_query($connection,$query);
		confirm_query($result_set);
		if($subject=mysqli_fetch_array($result_set)){
			return $subject;
			}else {
				return NULL;
				}
		}	
	
	function get_page_by_id($page_id){
		global $connection;
		$query="SELECT *
				FROM pages
				WHERE id={$page_id}
				ORDER BY position ASC
				LIMIT 1";
		$result_set=mysqli_query($connection,$query);
		confirm_query($result_set);
		if($page=mysqli_fetch_array($result_set)){
			return $page;
			}else {
				return NULL;
				}
		}	
	
	function get_default_page($subject_id) {
		// Get all visible pages
		$page_set = get_pages_for_subject($subject_id, true);
		if ($first_page = mysqli_fetch_array($page_set)) {
			return $first_page;
		} else {
			return NULL;
		}
	}	
		
	function find_selected_page(&$sel_subj,&$sel_page){
		if(isset($_GET['subj']) && is_numeric($_GET['subj']) && intval($_GET['subj'])!=0){
			$sel_subj=get_subject_by_id($_GET['subj']);
			//$sel_page=NULL;
			$sel_page = get_default_page($sel_subj['id']);
			}elseif(isset($_GET['page']) && is_numeric($_GET['page']) &&  intval($_GET['page'])!=0){
				$sel_subj=NULL;
				$sel_page=get_page_by_id($_GET['page']);
				}else{
					$sel_subj=NULL;
					$sel_page=NULL;
					}
			}
	
	function navigation($sel_subj,$sel_page){
		//selectez subiectele din baza de date
		$subject_set=get_all_subjects(FALSE);
			
		//afisez lista de subiecte
		echo "<ul class=\"subjects\">";
		while($subject=mysqli_fetch_array($subject_set)){
			echo "<li";
			if($sel_subj['id']==$subject['id']){//aplic clasa selected subiectului selectat
				echo " class=\"selected\"";
				}
			echo "><a href=\"create_subject.php?subj=". urlencode($subject["id"]) ."\">{$subject['menu_name']}</a></li>";
			
			//pentru fiecare subiect selectez din bd lista de pagini
			$page_set=get_pages_for_subject($subject['id'],FALSE);
			//pentru fiecare subiect afisez lista de pagini
			echo "<ul class=\"pages\">";
			while($page=mysqli_fetch_array($page_set)){
				echo "<li";
				if($sel_page['id']==$page['id']){//aplic clasa selected paginii selectate
					echo " class=\"selected\"";
					}
				echo "><a href=\"content.php?page=". urlencode($page["id"]) ."\">{$page['menu_name']}</a></li>";
				}
			echo "</ul>";//end lista pagini
			}
			echo "</ul>";//end lista subiecte
		}
		
function public_navigation($sel_subj, $sel_page, $public = true) {
		//selectez subiectele vizibile pentru public din baza de date
		$subject_set=get_all_subjects($public);
			
		//afisez lista de subiecte
		echo "<ul class=\"subjects\">";
		while($subject=mysqli_fetch_array($subject_set)){
			echo "<li";
			if($sel_subj['id']==$subject['id']){//aplic clasa selected subiectului selectat
				echo " class=\"selected\"";
				}
			echo "><a href=\"index.php?subj=". urlencode($subject["id"]) ."\">{$subject['menu_name']}</a></li>";
			
			//pentru fiecare subiect selectez din bd lista de pagini vizibile pentru public
			$page_set=get_pages_for_subject($subject['id'],$public);
			//pentru fiecare subiect afisez lista de pagini
			echo "<ul class=\"pages\">";
			while($page=mysqli_fetch_array($page_set)){
				echo "<li";
				if($sel_page['id']==$page['id']){//aplic clasa selected paginii selectate
					echo " class=\"selected\"";
					}
				echo "><a href=\"index.php?page=". urlencode($page["id"]) ."\">{$page['menu_name']}</a></li>";
				}
			echo "</ul>";//end lista pagini
			}
			echo "</ul>";//end lista subiecte
		}
	
?>
