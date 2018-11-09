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
function FAQ()
{
	$allFAQ = getFAQ();

	render("webapp/FAQ", array(
		'questions' => $allFAQ)
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
function editQuestionPage($idG)
{
	$progress = getProgress();
	$question = getQuestion($idG);
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
		//$result = editQuestion($idQ);
		//var_dump($result);
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