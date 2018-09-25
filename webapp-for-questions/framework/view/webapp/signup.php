<?php 

?>
<h2>Sign up</h2>
<form action="<?= URL ?>webapp/sign_up" method="POST">
	<p>student name:</p>
	<input type="text" required="" name="name"><br>
	
	<p>Password:</p>
	<input type="password" required="" name="pwd"><br>
	
	<p>Confirm password:</p>
	<input type="password" name="confirm-psw" required><br>
	<button type="submit" name="submit" >Sign up</button>
</form>