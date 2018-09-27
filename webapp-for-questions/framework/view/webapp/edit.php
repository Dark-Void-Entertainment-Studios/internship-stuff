<form action="<?= URL ?>webapp/editQuestionConfirm/<?= $question["question_id"]; ?>" method='POST'>
	<h3>student name</h3>
	<p><?= $question["student_name"]; ?></p>
	<h3>question</h3>
	<p><?= $question["question_text"]; ?>"</p>
	<h3>status</h3>

	<select required="" name="status">
<?php foreach ($progress as $progress) { ?>
	<option value="<?= $progress["progress_id"] ?>"><?= $progress["status"] ?></option>
<?php } ?>
	</select><br>
	<input id="confirm_edit" type="submit" value="edit"> <!-- changed name to confirm for now and added id--> 
</form>