<?php 

?>
<h2>Sign up</h2>
<form action="<?= URL ?>webapp/signUpConfirm" method="POST">
	<p>student name:</p>
	<input type="text" placeholder="Enter Username" required name="name"><br>
	
	<p>Password:</p>
	<input type="password" placeholder="Enter Password" required name="pwd"><br>
	
	<p>Confirm password:</p>
	<input type="password" placeholder="confirm Password" name="confirm-psw" required><br>
	<button type="submit" name="submit" >Sign up</button>
</form>