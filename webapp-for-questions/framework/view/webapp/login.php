<div class="container">
<h2>Login</h2> 

<!-- name login bar -->
<form action="<?= URL ?>webapp/loginConfirm" method="POST">
	<div class="group">
	<input type="text" name="name" required >
	<span class="highlight"></span>
	<span class="bar"></span>
	<label>Naam</label>
	</div>

<!-- password login bar -->
<div class="group">
	<input type="password" name="pwd" required >
	<span class="highlight"></span>
	<span class="bar"></span>
	<label>Wachtwoord</label>
	<button id="login_button" type="submit" name="submit" required >login</button>
</div>
</form>
</div>
