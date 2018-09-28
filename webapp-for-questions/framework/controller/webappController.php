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

function questionConfirm()
{
	if (createQuestion()) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();	
	}
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
	if (login()) {
		$result = login();
		session_start();
		$_SESSION['student_name']= $result["student_name"];
		$_SESSION['student_id']= $result["student_id"];
		$_SESSION['password']= $result["student_password"];
		$_SESSION['power_lvl']= $result["power_lvl"];
		header("location:" . URL . "webapp/index");
	} else {
		//$result = login();
		//var_dump($result);
		header("location:" . URL . "error/error_db");
		exit();
	}
}

//for later	
/*function sign_up()
{



}
*/


