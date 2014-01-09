<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php	find_selected_page($sel_subj,$sel_page); ?>
<?php
if (logged_in()) {//daca s-a facut login
		logged_out();
	}
?>

<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo public_navigation($sel_subj, $sel_page); ?>
			
			
		</td>
		<td id="page">
			<?php if ($sel_page) {//am selectat pagina, ii afisez denumirea si continutul; am selectat subiect cu pagini, afisez denumirea si continutul primei pagini considerata default ?>
				<h2><?php echo htmlentities($sel_page['menu_name']); ?></h2>
				<div class="page-content">
					<?php 
					//echo strip_tags(nl2br($sel_page['content']), "<b><br><p><a><div><table><tr><td>"); 
					echo $sel_page['content'];
					?>
				</div>
			<?php } else {//am selectatsubiect fara pagini, ii afisez denumirea ?>
				<h2><?php echo htmlentities($sel_subj['menu_name']); ?></h2>
			<?php } ?>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>