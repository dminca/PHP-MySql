<?php require("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php	find_selected_page($sel_subj,$sel_page); ?>

<?php include("includes/header.php") ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php navigation($sel_subj,$sel_page);?>
			</ul>
		</td>
		<td id="page">
			<?php
				//afisez numele subiectului sau paginii selectate
				if(!is_null($sel_subj)) {
					echo "<h2>{$sel_subj['menu_name']}</h2";
					}elseif(!is_null($sel_page)) {
						echo "<h2>{$sel_page['menu_name']}</h2>";
						echo "<div class=\"page-content\">{$sel_page['content']}</div>";
						}else{
							echo "<h2>Selectati un subiect sau o pagina</h2";
							}					
			?>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
