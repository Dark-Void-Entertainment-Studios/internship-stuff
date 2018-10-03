<?php 
session_start();
?>

<table id="myTable">
	<thead>
		<tr>
			<th colspan="1" onclick="sortTable(0)">Student</th>
			<th colspan="5" onclick="sortTable(1)">Vraag</th>
			<th colspan="2" onclick="sortTable(2)">Tijd</th>
			<th colspan="1">Status</th>

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
			<td class="center"><a href="<?= URL ?>webapp/editQuestionPage/<?= $question["question_id"] ?>">Edit</a></td>
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
	<p><a href="<?= URL ?>webapp/createQuestionPage">Vraag stellen</a></p>
<?php 
}
?>