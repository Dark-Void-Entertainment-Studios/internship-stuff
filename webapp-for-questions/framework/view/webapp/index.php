<?php 
session_start();
if (!$_SESSION['student_name'] == null) { ?>
	<p>you are logged in as <?= $_SESSION['student_name'] ?></p>
<?php
}
?>
<!--added questions_main id to differentiate this h2 -->
<h2 id="questions_main">so many questions</h2>
<table id="myTable">
	<thead>
		<tr>
			<th colspan="1" onclick="sortTable(0)">student Name</th>
			<th colspan="5" onclick="sortTable(1)">question</th>
			<th colspan="2" onclick="sortTable(2)">time stamp</th>
			<th colspan="1">status</th>

			<?php 
			if ($_SESSION['power_lvl'] == 1) { ?>
			<th colspan="1">Action</th>
			<?php 
			}
			?>
		</tr>
	</thead>
	<tbody>
<?php 
foreach ($questions as $question) {
	if ($question["progress_id"] == 3) {
	} else {
?>
		<tr>
			<td><?= $question["student_name"] ?></td>
			<td colspan="5"><?= $question["question_text"] ?></td>
			<td colspan="2"><?= $question["time_stamp"] ?></td>
			<td><?= $question["status"] ?></td>

			<?php 
			if ($_SESSION['power_lvl'] == 1) { ?>
			<td class="center"><a href="<?= URL ?>webapp/editQuestionPage/<?= $question["question_id"] ?>">edit</a></td>
			<?php 
			}
			?>
		</tr>
<?php 
		}
	}
?>
	</tbody>
</table>

<?php 
if (!$_SESSION['student_name'] == null) { ?>
	<p><a href="<?= URL ?>webapp/createQuestionPage">new question</a></p>
<?php 
}
if ($_SESSION['student_name'] == null) { ?>
	<h3><a href="<?= URL ?>webapp/loginPage">login</a></h3>
<?php 
}
?>
	<h3><a href="<?= URL ?>webapp/signUpPage">sign up</a></h3>
<?php 
if (!$_SESSION['student_name'] == null) { ?>
	<h3><a href="<?= URL ?>webapp/logout">logout</a></h3>
	<?php 
}
?>