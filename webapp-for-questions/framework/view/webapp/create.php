<?php
session_start();
	$name = $_SESSION['student_name'];
?>
<form>
	<input type="hidden" value="" name="student_id">
	<input type="readonly" value="<?= $name ?>" >
	<p>question</p>
	<textarea required minlength="2" name="status" rows="10" cols="75" placeholder="type question here"></textarea><br>
</form>