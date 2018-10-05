<?php 

?>
<h1>FAQ</h1>
<table id="myTable">
	<thead>
		<tr>
			<th colspan="1">Vraag</th>
			<th colspan="2">Antwoord</th>
		</tr>
	</thead>
<tbody>
<?php 
foreach ($questions as $question) {
?>
		<tr>
			<td colspan="1"><?= $question["question"] ?></td>
			<td colspan="2"><?= $question["answer"] ?></td>
		</tr>
<?php 
	}
?>
	</tbody>
</table>
