<?php
//working on
function generateQuestions()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `questions`
		JOIN `students` ON `questions`.`student_id` = `students`.`student_id`
		JOIN `progress` ON `questions`.`progress_id` = `progress`.`progress_id`
		ORDER BY `questions`.`time_stamp` ASC";
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

function createQuestion()
{
	$id = isset($_POST["student_id"]) ? $_POST["student_id"] : null;
	$question = isset($_POST["question"]) ? $_POST["question"] : null;

	if ($id === null || $question === null) {
		return FALSE;
		exit();
	}

	$db = openDatabaseConnection();

	$sql ="INSERT INTO `questions`(`student_id`, `question_text`, `progress_id`) 
	VALUES (:id, :question, 1)";


	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id,
		":question" => $question
	));

	$db = null;

	return TRUE;
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

function login()
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : null;

	if ($name === null || $pwd === null) {
		return FALSE;
		exit();
	}

	$db = openDatabaseConnection();

	$sql ="SELECT * FROM `students` WHERE `student_name` = :name AND `student_password` = :pwd LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":pwd" => $pwd
	));

	$check = $query->fetch();

	if ($check["student_password"]===$pwd && $check["student_name"]===$name) {
		$db = null;
		return $check;
	} else {
		$db = null;
		return FALSE;
	}
}

function createUser()
{	
	$person = isset($_POST["name"]) ? $_POST["name"] : null;
	$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : null;
	$pwd2 = isset($_POST["confirm-psw"]) ? $_POST["confirm-psw"] : null;

	if ($person === null || $pwd === null || $pwd2 === null) {
		return FALSE;
		exit();
	}

	if ($pwd !== $pwd2) {
		return FALSE;
		exit();
	}

	if (!preg_match("/^[a-zA-Z ]*$/",$person)) {
		return FALSE;
		exit(); 
	}

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `students` WHERE `student_name` = :person LIMIT 1";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person
	));

	$check = $query->fetch();
	if ($check == FALSE) {
		$check = "student_name";
	} elseif ($check["student_name"] == $person) {
		return FALSE;
		$db = null;
		exit();
	}

	$sql = "INSERT INTO `students` (`student_name`, `student_password`, `power_lvl`) 
	VALUES (:person, :pwd, 0)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person,
		":pwd" => $pwd
	));

	$db = null;

	return TRUE;
}

//not working yet DX
//for later. need some research
