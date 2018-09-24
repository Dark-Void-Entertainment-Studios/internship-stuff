<?php 

function login(){

		$name = isset($_POST["name"]) ? $_POST["name"] : null;
		$psw = isset($_POST["psw"]) ? $_POST["psw"] : null;

		if ($name === null || $psw === null) {
			return FALSE;
			exit();
		}

		$sql = $this->db->query("SELECT * FROM `User` WHERE student_name = :name? AND student_password = :psw? LIMIT 1");

		$query = $db->prepare($sql);
		$query->execute(array(
			":name?" => $name,
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