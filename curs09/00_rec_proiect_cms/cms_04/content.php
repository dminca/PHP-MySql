<?php require("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php	find_selected_page($sel_subj,$sel_page); ?>

<?php include("includes/header.php") ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<ul class="subjects">
				<?php
					//selectez subiectele din baza de date
					$subject_set=get_all_subjects();
						
					//afisez lista de subiecte
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
						echo "</ul>";
						}
				?>
			</ul>
		</td>
		<td id="page">
			<?php
				//afisez numele subiectului sau paginii selectate
				if(!is_null($sel_subj)) {
					echo "<h2>{$sel_subj['menu_name']}</h2";
					}elseif(!is_null($sel_page)) {
						echo "<h2>{$sel_page['menu_name']}</h2>";
						echo "{$sel_page['content']}";
						}else{
							echo "<h2>Selectati un subiect sau o pagina</h2";
							}					
			?>
		</td>
	</tr>
</table>
<?php include("includes/footer.php")?>
