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

function createQuestion()
{
	
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

function loginpage()
{
	render("webapp/login");
}

function loginConfirm()
{
	var_dump($_POST);

	if (login()) {
		session_start();
		$_SESSION['student_name']= $result["student_name"];
		$_SESSION['student_id']= $result["student_id"];
		$_SESSION['password']= $result["student_password"];
		echo"<p>it worked</p>";
	} else {
		var_dump($check);
		//header("location:" . URL . "error/error_db");
		//exit();
	}
}

//for later	
/*function sign_up()
{



}
*/


