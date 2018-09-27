<?php
//working on
function generateQuestions()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `questions`
		JOIN `students` ON `questions`.`student_id` = `students`.`student_id`
		JOIN `progress` ON `questions`.`progress_id` = `progress`.`progress_id`
		ORDER BY `questions`.`time_stamp` DESC";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function getQuestion($idQ)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `questions`
		JOIN `students` ON `questions`.`student_id` = `students`.`student_id`
		JOIN `progress` ON `questions`.`progress_id` = `progress`.`progress_id`
		WHERE question_id = :idQ LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":idQ" => $idQ
	));

	$db = null;

	return $query->fetch();
}

function getProgress()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `progress`
	ORDER BY `progress`.`progress_id` ASC";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function editQuestion($idQ)
{
	$status = isset($_POST["status"]) ? $_POST["status"] : null;

	if ($status === null) {
		return FALSE;
		exit();
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE `questions` 
		SET `progress_id`= :status
		WHERE question_id = :idQ";

	$query = $db->prepare($sql);
	$query->execute(array(
		":status" => $status,
		":idQ" => $idQ
	));

	$db = null;
	return TRUE;
}


//for later. need some research
function login()
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$psw = isset($_POST["psw"]) ? $_POST["psw"] : null;

	if ($name === null || $psw === null) {
		return FALSE;
		exit();
	}

	$sql ="SELECT * FROM `students` WHERE `student_name` = :name AND `student_password` = :psw LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":psw" => $psw
	));

	$check = $query->fetch();

	if ($check["student_password"]===$psw && $check["student_name"]===$name) {
		return TRUE;
	} else {
		return $check;
	}

	$db = null;
}
/*
function createUser()
{	
	$nameErr ="";
	$name = ucwords($_POST["name"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$nameErr = "Only letters and white space allowed"; 
	}
	$person = isset($name) ? $name : null;
	$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : null;
	
	if ($person === null || $pwd === null) {
		return FALSE;
		exit();
	}

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `students` WHERE `student_name`=`:person`";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person
	));

	$query->fetchAll();
	if ($query == $person) {
		return FALSE;
		exit();
	}



	$sql = "INSERT INTO `students` (`person`, `pwd`) 
	VALUES (:person, :pwd)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person,
		":pwd" => $pwd
	));

	$db = null;

	return TRUE;
}

*/