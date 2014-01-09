<?php require("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php	find_selected_page($sel_subj,$sel_page); ?>

<?php include("includes/header.php") ?>
	<table id="structure">
		<tr>
		<td id="navigation">
			<?php	navigation($sel_subj,$sel_page);?>
			<br />
			<a href="create_subject.php">+ Add a new subject</a>
		</td>
		<td id="page">
			<?php
				//afisez numele subiectului sau paginii selectate
				if(!is_null($sel_subj)) {
					echo "<h2>{$sel_subj['menu_name']}</h2";
					}elseif(!is_null($sel_page)) {
						echo "<h2>{$sel_page['menu_name']}</h2>";
						//cu strip_tags() specific etichetele html care vor fi interpretate
						//nl2br() transforma new line din bd in br la afisarea in browser
						//echo "<div class=\"page-content\">". nl2br(strip_tags($sel_page['content'],'<p>,<b>,<a>,<div>'))."</div>";
						//echo "<div class=\"page-content\">". strip_tags($sel_page['content'],'<p>,<b>,<a>,<div>')."</div>";
						echo "<div class=\"page-content\">". $sel_page['content']."</div>";						
						echo "<br />";
						echo "<a href=\"create_page.php?page=".urlencode($sel_page['id'])."\">Edit page</a>";
						}else{
							echo "<h2>Select a subject or page</h2>";
							}					
			?>
		</td>
		</tr>
	</table>
<?php require("includes/footer.php"); ?>
