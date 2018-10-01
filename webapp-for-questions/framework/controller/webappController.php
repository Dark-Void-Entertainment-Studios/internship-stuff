<?php

require(ROOT . "model/webappModel.php");

function index()
{
	$allQuestions = generateQuestions();
	
	render("webapp/index", array(
		'questions' => $allQuestions)
	);
	exit();
}

function createQuestionPage()
{
	render("webapp/create"	);
	exit();
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
	exit();
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

function loginPage()
{
	render("webapp/login");
	exit();
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
		exit();
	} else {
		//$result = login();
		//var_dump($result);
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function signUpPage()
{
	render("webapp/signup");
	exit();
}

function signUpConfirm()
{
	if (createUser()) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		//var_dump($_POST);
		//$result = createUser();
		//var_dump($result);
		header("location:" . URL . "error/error_db");
		exit();	
	}
}

function logout()
{
	session_start();
	setcookie();
	session_destroy();
	header("location:" . URL . "webapp/index");
	exit();
}