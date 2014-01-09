<?php
	function confirm_query($result_set){
		if(!$result_set){
			die("Interogarea bazei de date nu a reusit!");
			}
		}
		
	function get_all_subjects(){
		global $connection;
		$query="SELECT *
				FROM subjects
				ORDER BY position ASC";
		$result_set=mysqli_query($connection,$query);
		confirm_query($result_set);
		return $result_set;
		}
		
	function get_pages_for_subject($subject_id){
		global $connection;
		$query="SELECT *
				FROM pages
				WHERE subject_id={$subject_id}
				ORDER BY position ASC";
		$result_set=mysqli_query($connection,$query);
		confirm_query($result_set);
		return $result_set;
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
	
	function get_pages_by_id($page_id){
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
			
	function find_selected_page(&$sel_subj,&$sel_page){
		if(isset($_GET['subj'])){
			$sel_subj=get_subject_by_id($_GET['subj']);
			$sel_page=NULL;
			}elseif(isset($_GET['page'])){
				$sel_subj=NULL;
				$sel_page=get_pages_by_id($_GET['page']);
				}else{
					$sel_subj=NULL;
					$sel_page=NULL;
					}
			}
	
	function navigation($sel_subj,$sel_page){
		//selectez subiectele din baza de date
		$subject_set=get_all_subjects();
			
		//afisez lista de subiecte
		echo "<ul class=\"subjects\">";
		while($subject=mysqli_fetch_array($subject_set)){
			echo "<li ";
			if($sel_subj['id']==$subject['id']){//aplic clasa selected subiectului selectat
				echo "class=\"selected\"";
				}
			echo "><a href=\"content.php?subj={$subject['id']}\">{$subject['menu_name']}</a></li>";
			
			//pentru fiecare subiect selectez din bd lista de pagini
			$page_set=get_pages_for_subject($subject['id']);
			//pentru fiecare subiect afisez lista de pagini
			echo "<ul class=\"pages\">";
			while($page=mysqli_fetch_array($page_set)){
				echo "<li ";
				if($sel_page['id']==$page['id']){//aplic clasa selected paginii selectate
					echo "class=\"selected\"";
					}
				echo "><a href=\"content.php?page={$page['id']}\">{$page['menu_name']}</a></li>";
				}
			echo "</ul>";//end lista pagini
			}
		echo "</ul>";//end lista subiecte
		}
?>
