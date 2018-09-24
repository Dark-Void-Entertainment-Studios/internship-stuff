<?php

function error_404()
{
	echo "<p>404 - the asked route does not exist. go check your function names</p>";
}

function error_db()
{
	echo "<p>something went wrong, go find the problem. DB error</p>";
}

function error_delete()
{
	echo "<p>no delete for you!</p>";
}