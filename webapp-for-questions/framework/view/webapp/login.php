<?php

?>
<h2>Login</h2>
<form action="<?= URL ?>webapp/loginConfirm" method="POST">
	<input type="text" autofocus placeholder="Enter Username" name="name" required >
	<input type="password" placeholder="Enter Password" name="pwd" required >
	<button type="submit" name="submit" required >login</button>
</form>
