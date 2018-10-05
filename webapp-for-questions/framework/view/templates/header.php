<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Smartlab</title>	
	<link rel="stylesheet" href="<?= URL ?>public/css/main.css">
</head>
<body>
	<nav>
		<ul>
			<li class="left"><a href="<?= URL ?>webapp/index">Home</a></li>
			<li class="left"><a href="<?= URL ?>webapp/FAQ">FAQ</a></li>



			<?php if ($_SESSION['student_name'] == null) { ?>
			<li class="right"><a href="<?= URL ?>webapp/loginPage">Login</a></li>
			<?php 
			}
			?>
			
			<?php if ($_SESSION['student_name'] == null) { ?>
			<li class="right"><a href="<?= URL ?>webapp/signUpPage">Registeren</a></li>
			<?php 
			}
			?>

			<?php if (!$_SESSION['student_name'] == null) { ?>
			<li class="right"><a href="<?= URL ?>webapp/logout">Uitloggen</a></li>
			<?php 
			}
			?>
			
			<?php if (!$_SESSION['student_name'] == null) { ?>
			<li class="gebruiker">Je bent ingelogd als: <?= $_SESSION['student_name'] ?></li>
			<?php
			}
			?>
		</ul>
	</nav><br>