<?php
require(ROOT . "model/webappModel.php");
function errorPage($error2)
{
	//var_dump($error2);
	render("webapp/error", array(
		"error" => $error2));
	exit();
}
function index()
{
	$allQuestions = generateQuestions();
	
	render("webapp/index", array(
		'questions' => $allQuestions));
	exit();
}
function FAQ()
{
	$allFAQ = getFAQ();

	render("webapp/FAQ", array(
		'questions' => $allFAQ));
	exit();
}
function createQuestionPage()
{
	render("webapp/create"	);
	exit();
}
function questionConfirm()
{
	$result = createQuestion();

	if ($result[0] == TRUE) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		$error1 = $result[1];
		errorPage($error1);
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
	$result = editQuestion($idQ);
	if ($result[0] == TRUE) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		$error1 = $result[1];
		errorPage($error1);
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
	$result = login();
	if ($result[0] == TRUE) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		$error1 = $result[1];
		errorPage($error1);
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
	$result = createUser();
	if ($result[0] == TRUE) {
		header("location:" . URL . "webapp/index");
		exit();
	} else {
		$error1 = $result[1];
		errorPage($error1);
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