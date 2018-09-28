<?php
session_start();
	$name = $_SESSION['student_name'];
	$id = $_SESSION['student_id'];
?>
<h1>what is your question?</h1>
<form action="<?= URL ?>webapp/questionConfirm>" method='POST'>
	<input type="hidden" value="<?= $id ?>" name="student_id">
	<p>student name</p>
	<input readonly value="<?= $name ?>" >

	<p>question</p>
	<textarea required minlength="2" name="question" rows="10" cols="75" placeholder="type question here"></textarea>
	<br>
	<input type="submit" value="send question">
</form>