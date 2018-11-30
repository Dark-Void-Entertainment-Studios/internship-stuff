<?php
session_start();
?>
<br><br>


<?php 
echo $error;
if ($error == "error_404") {
	echo "<p>404 - the asked route does not exist. go check your function names</p>";
} elseif ($error == "error_db") {
	echo "<p>something went wrong, go find the problem. DB error</p>";
} elseif ($error == "error_blanks") {
	echo "<p>please fill in all the fields</p>";
} elseif ($error == "error_powerLVL") {
	echo "<p>you dont have the right to do this</p>";
} elseif ($error == "error_password_missmatch") {
	echo "<p>your given passwords dont match</p>";
} elseif ($error == "error_wrong_characters") {
	echo "<p>the given characters are not allowed</p>";
	echo "<p>allowed characters are:</p>";
	echo "<p>a-z A-Z and space</p>";
} elseif ($error == "error_name_already_exists") {
	echo "<p>that user name is already taken</p>";
	echo "<p>if you forgot your password go ask the teacher to reset it for you</p>";
} elseif ($error == "error_delete") {
	echo "<p>no delete for you!</p>";
}


