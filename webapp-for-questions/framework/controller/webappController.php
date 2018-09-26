<?php

require(ROOT . "model/webappModel.php");

function index()
{
	$allQuestions = generateQuestions();
	
	render("webapp/index", array(
		'questions' => $allQuestions)
	);
}


//for later	
/*function sign_up()
{



}

function login()
{



}

*/