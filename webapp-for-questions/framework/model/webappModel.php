<?php
//working on
function generateQuestions()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM `questions`
		JOIN `students` ON `questions`.`student_id` = `students`.`student_id`
		ORDER BY `questions`.`time_stamp` DESC";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
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