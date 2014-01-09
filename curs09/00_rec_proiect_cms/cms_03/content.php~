<?php require("includes/connection.php") ?>

<?php
//determin subiectul sau pagina selectata
if(isset($_GET['subj'])){
	$sel_subj=$_GET['subj'];
	$sel_page=NULL;
	}elseif(isset($_GET['page'])){
		$sel_subj=NULL;
		$sel_page=$_GET['page'];
		}else{
			$sel_subj=NULL;
			$sel_page=NULL;
			}
?>

<?php include("includes/header.php") ?>
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
						echo "<li ";
						if($sel_subj==$subject['id']){//aplic clasa selected subiectului selectat
							echo "class=\"selected\"";
							}
						echo "><a href=\"content.php?subj={$subject['id']}\">{$subject['menu_name']}</a></li>";
						
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
							echo "<li ";
							if($sel_page==$page['id']){//aplic clasa selected paginii selectate
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
				//afisez id-ul subiectului sau paginii selectate
				if(!is_null($sel_subj)) {
					echo "<h2>{$sel_subj}</h2";
					}elseif(!is_null($sel_page)) {
						echo "<h2>{$sel_page}</h2";
						}else{
							echo "<h2>Selectati un subiect sau o pagina</h2";
							}				
			?>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>
