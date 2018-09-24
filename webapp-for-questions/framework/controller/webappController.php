<?php

require(ROOT . "model/webappModel.php");

function index()
{
	$questions = generateQuestions();
	
	render("webapp/home", array(
		'questions' => $questions)
	);
}

function sign_up()
{



}

function login()
{



}

