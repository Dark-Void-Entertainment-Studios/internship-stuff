<?php 

?>
<h2>so many questions</h2>
	<table id="myTable">
		<thead>
			<tr>
				<th onclick="sortTable(0)">student Name</th>
				<th onclick="sortTable(1)">question</th>
				<th onclick="sortTable(2)">time stamp</th>
				<th colspan="1">waiting</th>
				<th colspan="1">being worked on</th>
				<th colspan="1">Done</th>
			</tr>
		</thead>
		<tbody>
<?php 
foreach ($questions as $question) {
?>
			<tr>
				<td><?= $question["student_name"] ?></td>
				<td><?= $question["question_text"] ?></td>
				<td><?= $question["time_stamp"] ?></td>
				<td><input type="radio" checked=""></td>
				<td><input type="radio"></td>
				<td><input type="radio"></td>
			</tr>
<?php 
}
?>
		</tbody>
	</table>
	<p><a href="<?= URL ?>webapp/create">new question</a></p>