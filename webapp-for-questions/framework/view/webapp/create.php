<?php
session_start();
	$name = $_SESSION['student_name'];
	$id = $_SESSION['student_id'];
?>
<h1>Wat is je vraag?</h1>
<form action="<?= URL ?>webapp/questionConfirm" method="POST">

	<input type="hidden" value="<?= $id ?>" name="student_id">
	<p>Student naam</p>
	<input readonly value="<?= $name ?>">

	<p>Vraag</p>
	<textarea autofocus required minlength="10" name="question" rows="10" cols="75" placeholder="Type je vraag hier"></textarea>
	<br>
	<input type="submit" value="Vraag op sturen">
</form>