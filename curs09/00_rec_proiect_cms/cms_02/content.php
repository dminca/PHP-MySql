<?php require("includes/connection.php"); ?>

<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<ul class="subjects">
				<?php
					$query="SELECT *
								FROM subjects
								ORDER BY position ASC";
					$subject_set=mysqli_query($connection,$query);
					if(!$subject_set){
						die("Interogarea bazei de date nu a reusit!");
						}
					//afisez lista de subiecte
					while($subject=mysqli_fetch_array($subject_set)){
						echo "<li><a href=\"content.php?subj={$subject['id']}\">{$subject['menu_name']}</a></li>";
						//pentru fiecare subiect selectez din bd lista de pagini
						$query="SELECT *
								FROM pages
								WHERE subject_id={$subject['id']}
								ORDER BY position ASC";
						$page_set=mysqli_query($connection,$query);
						if(!$page_set){
							die("Interogarea bazei de date nu a reusit!");
							}
						//pentru fiecare subiect afisez lista de pagini
						echo "<ul class=\"pages\">";
						while($page=mysqli_fetch_array($page_set)){
							echo "<li><a href=\"content.php?page={$page['id']}\">{$page['menu_name']}</a></li>";
							}
						echo "</ul>";
						}
				?>
			</ul>
		</td>
		<td id="page">
			
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
