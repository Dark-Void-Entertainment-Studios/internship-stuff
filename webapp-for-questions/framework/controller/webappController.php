<?php

require(ROOT . "model/webappModel.php");

function index()
{
	$allQuestions = generateQuestions();
	
	render("webapp/index", array(
		'questions' => $allQuestions)
	);
}

function createQuestionPage()
{
	render("webapp/create"	);
}



function editQuestionPage($idQ)
{
	$progress = getProgress();
	$question = getQuestion($idQ);
	render("webapp/edit" , array(
		'question' => $question,
		'progress' => $progress
    ));
}

function editQuestionConfirm($idQ)
{
	if (editQuestion($idQ)) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();	
	}
}


//for later	
/*function sign_up()
{



}

function login()
{



}

*/