<?php require_once("includes/session.php"); ?>
<?php session_set(); ?>

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
				if(!is_null($sel_subj)) {//am selectat subiect
					echo "<h2>{$sel_subj['menu_name']}</h2";
					}elseif(!is_null($sel_page)) {//am selectat pagina
						echo "<h2>{$sel_page['menu_name']}</h2>";
						//cu strip_tags() specific etichetele html care vor fi interpretate
						//nl2br() transforma new line din bd in br la afisarea in browser
						//echo "<div class=\"page-content\">". nl2br(strip_tags($sel_page['content'],'<p>,<b>,<a>,<div>,<table>,<tr>,<td>'))."</div>";
						//echo "<div class=\"page-content\">". strip_tags($sel_page['content'],'<p>,<b>,<a>,<div>')."</div>";
						echo "<div class=\"page-content\">". $sel_page['content']."</div>";						
						echo "<br />";
						echo "<a href=\"create_page.php?page=".urlencode($sel_page['id'])."\">Edit page</a>";
						}else{//nu am selectat nici pagina, nici subiect
							echo "<h2>Selectati un subiect sau o pagina</h2>";
							}					
			?>
		</td>
		</tr>
	</table>
<?php require("includes/footer.php"); ?>
