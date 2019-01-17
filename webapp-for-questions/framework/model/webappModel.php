<?php
//gets all the questions from the DB
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
//gets all the FAQ from the DB
function getFAQ()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `FAQ`";

	$query = $db->prepare($sql);
	$query->execute();

	$db = null;
	return $query->fetchAll();
}
//gets 1 question from the DB to edit
function getQuestion($IDQ)
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `questions`
		JOIN `students` ON `questions`.`student_id` = `students`.`student_id`
		JOIN `progress` ON `questions`.`progress_id` = `progress`.`progress_id`
		WHERE question_id = :IDQ LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":IDQ" => $IDQ
	));

	$db = null;
	return $query->fetch();
}
//gets the info from progress out of the DB for edit
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
//creates a new question in the DB 
function createQuestion()
{
	$id = isset($_POST["student_id"]) ? $_POST["student_id"] : null;
	$question = isset($_POST["question"]) ? $_POST["question"] : null;

	if ($id === null || $question === null) {
		$error = "error_blanks";
		return array(FALSE, $error);
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
	return array(TRUE);
	exit();
}
//edits a question if you have the power
function editQuestion($idQ)
{
	$status = isset($_POST["status"]) ? $_POST["status"] : null;	
	$name = isset($_POST["name"]) ? $_POST["name"] : null;	//'name' => string 'Rens'
	$id = isset($_POST["id"]) ? $_POST["id"] : null;					//'id' => string '1'
	$lvl = isset($_POST["lvl"]) ? $_POST["lvl"] : null;				//'lvl' => string '1'
	
	if ($status === null || $lvl === null || $id === null || $name === null) {
		$error = "error_blanks";
		return array(FALSE, $error);
		exit();
	}

	//check if you have the right power
	if ($lvl != 1) {
		$error = "error_powerLVL";
		return array(FALSE, $error);
		exit();
	}

	$db = openDatabaseConnection();

	 $sql ="SELECT * FROM `students` WHERE `student_name` = :name AND `student_id` = :id AND `power_lvl` = 1 LIMIT 1";

	$query = $db->prepare($sql);
	$query->execute(array(
		":name" => $name,
		":id" => $id
	));

	$check = $query->fetch();
	//check if the user is truly allowed to edit
	if ($check["student_id"] == $id && $check["student_name"] === $name && $check["power_lvl"] == $lvl) {
		
		$sql = "UPDATE `questions` 
		SET `progress_id`= :status
		WHERE question_id = :idQ";

		$query = $db->prepare($sql);
		$query->execute(array(
			":status" => $status,
			":idQ" => $idQ
		));

		$db = null;
		return array(TRUE);
		exit();

	} else {

		$db = null;
		$error = "error_db";
		return array(FALSE, $error);
		exit();
	}
}
//login as a user from the DB
function login()
{
	if (empty($_POST["name"]) || empty($_POST["pwd"])) {
		$error = "error_blanks";
		return array(FALSE, $error);
		exit();
	}
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : null;

	if ($name === null || $pwd === null) {
		$error = "error_blanks";
		return array(FALSE, $error);
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
	//check if password and username match with the user input
	if ($check["student_password"]===$pwd && $check["student_name"]===$name) {
		$db = null;
		session_start();
		$_SESSION['student_name']= $check["student_name"];
		$_SESSION['student_id']= $check["student_id"];
		$_SESSION['password']= $check["student_password"];
		$_SESSION['power_lvl']= $check["power_lvl"];
		return array(TRUE);
		exit();
	} else {
		$db = null;
		$error = "error_db";
		return array(FALSE, $error);
		exit();
	}
}
//creates a new user in the DB
function createUser()
{	
	if (empty($_POST["name"]) || empty($_POST["pwd"]) || empty($_POST["confirm-psw"])) {
		$error = "error_blanks";
		return array(FALSE, $error);
		exit();
	}

	$person = isset($_POST["name"]) ? $_POST["name"] : null;
	$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : null;
	$pwd2 = isset($_POST["confirm-psw"]) ? $_POST["confirm-psw"] : null;

	if ($person === null || $pwd === null || $pwd2 === null) {
		$error = "error_blanks";
		return array(FALSE, $error);
		exit();
	}
	//check if the given passwords match 
	if ($pwd !== $pwd2) {
		$error = "error_password_missmatch";
		return array(FALSE, $error);
		exit();
	}
	// check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$person)) {
		$error = "error_wrong_characters";
		return array(FALSE, $error);
		exit();
	}

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `students` WHERE `student_name` = :person LIMIT 1";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person
	));
	//checks if the name is already in the DB
	$check = $query->fetch();
	if ($check == FALSE) {
		$check = "student_name";
	} elseif ($check["student_name"] == $person) {
		$error = "error_name_already_exists";
		return array(FALSE, $error);
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
	return array(TRUE);
}