<main class="container">
<h2>Login</h2> 

<!-- name login bar -->
<form action="<?= URL ?>webapp/loginConfirm" method="POST">
	<section class="group">
	<input type="text" name="name" required >
	<span class="highlight"></span>
	<span class="bar"></span>
	<label>Naam</label>
	</section>

<!-- password login bar -->
<section class="group">
	<input type="password" name="pwd" required >
	<span class="highlight"></span>
	<span class="bar"></span>
	<label>Wachtwoord</label>
	<button class="login_button" type="submit" name="submit" required >login</button>
</section>
</form>
</main>
