<main class="container">
<h2>Sign up</h2>

<!-- name register -->
<form action="<?= URL ?>webapp/signUpConfirm" method="POST">
	<section class="group">
		<input autofocus type="text" minlength="3" required name="name" autocomplete="off"><br>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label> Naam </label>
	</section>

	<!-- enter password -->
	<section class="group">
		<input type="password" minlength="4" required name="pwd"><br>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label> password</label>
	</section>

	<!-- confirm password -->
	<section class="group">
		<input type="password" minlength="4" name="confirm-psw" required><br>
		<span class="highlight"></span>
		<span class="bar"></span>
		<label>Bevestig Wachtwoord</label>
		<button class="Register_button" type="submit" name="submit" >registreer</button>
	</section>
</form>
</main>