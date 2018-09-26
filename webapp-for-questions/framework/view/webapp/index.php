<h2>so many questions</h2>
	<table id="myTable">
		<thead>
			<tr>
				<th colspan="1" onclick="sortTable(0)">student Name</th>
				<th colspan="3" onclick="sortTable(1)">question</th>
				<th colspan="2" onclick="sortTable(2)">time stamp</th>
				<th colspan="1">status</th>
			</tr>
		</thead>
		<tbody>
<?php 
foreach ($questions as $question) {
?>
			<tr>
				<td><?= $question["student_name"] ?></td>
				<td colspan="3"><?= $question["question_text"] ?></td>
				<td colspan="2"><?= $question["time_stamp"] ?></td>
				<td><?= $question["status"] ?></td>
			</tr>
<?php 
}
?>
		</tbody>
	</table>
	<p><a href="<?= URL ?>webapp/create">new question</a></p>