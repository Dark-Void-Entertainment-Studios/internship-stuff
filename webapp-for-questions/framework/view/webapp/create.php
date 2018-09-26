<?php
session_start();
	$_SESSION['student_name']= $name;
?>
<form>
	<input type="hidden" value="" name="student_id">
	<input type="readonly" value="" >
	<p>question</p>
	<textarea required minlength="2" name="status" rows="10" cols="75" placeholder="type question here"></textarea><br>
</form>