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
		return false;
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
	return true;
}


//for later. need some research
/*function login()
{
	$name = isset($_POST["name"]) ? $_POST["name"] : null;
	$psw = isset($_POST["psw"]) ? $_POST["psw"] : null;

	if ($name === null || $psw === null) {
		return FALSE;
		exit();
	}

	$sql = $this->db->query("SELECT * FROM `webapp` WHERE student_name = :name? AND student_password = :psw? LIMIT 1");

	$query = $db->prepare($sql);
	$query->execute(array(
		":student_name?" => $name,
		":psw?" => $psw
	));

	$row = mysql_fetch_assoc($result);

	if ($row["student_password"]==$psw && $row["student_name"]==$name) {
	session_start();
	$_SESSION['student_name']= $name;
	$_SESSION['student_id']= $name;
	$_SESSION['password']= $psw;
	} else {
		return FALSE;
	}
}

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
		return false;
		exit();
	}

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `webapp` WHERE `student_name`=`:person`";
	
	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person
	));

	$query->fetchAll();
	if ($query == $person) {
		return false;
		exit();
	}






	$sql = "INSERT INTO `webapp` (`person`, `pwd`) 
	VALUES (:person, :pwd)";

	$query = $db->prepare($sql);
	$query->execute(array(
		":person" => $person,
		":pwd" => $pwd
	));

	$db = null;
	return true;
}

*/