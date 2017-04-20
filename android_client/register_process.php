<?php
	if(!mysql_connect("localhost","root","")){
		die("cannot connect to the server!!");
	}

	if(!mysql_select_db("db_eventcalendar")){
		die("cannot select database");
	}

	$validate = true;

	$invalid_params = "request parameter invalid: ";

	$params = array(
			'result_code' => 0,
			'result_message' => "OK"
		);

	if(!isset($_POST['student_id'])){
		$params['result_message'] = $invalid_params . "must student_id";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['un'])){
		$params['result_message'] = $invalid_params . "must un (username)";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['fn'])){
		$params['result_message'] = $invalid_params . "must fn (firstname)";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['ln'])){
		$params['result_message'] = $invalid_params . "must ln (lastname)";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['c'])){
		$params['result_message'] = $invalid_params . "must c (course)";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['y'])){
		$params['result_message'] = $invalid_params . "must y (year)";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['e'])){
		$params['result_message'] = $invalid_params . "must e (email)";
		$params['result_code'] = 1;
		$validate = false;
	} else if (!isset($_POST['p'])){
		$params['result_message'] = $invalid_params . "must p (password)";
		$params['result_code'] = 1;
		$validate = false;
	}


	if($validate){
		$student_id = addslashes($_POST['student_id']);
		$username = addslashes($_POST['un']);
		$firstname = addslashes($_POST['fn']);
		$lastname = addslashes($_POST['ln']);
		$course = addslashes($_POST['c']);
		$year = addslashes($_POST['y']);
		$email = addslashes($_POST['e']);
		$password = addslashes($_POST['p']);
		$check_exist = mysql_query("SELECT * FROM user_accounts WHERE id_no =  '{$student_id}' ");
		$result = mysql_fetch_assoc($check_exist);

		if($result){
			$params['result_message'] = "user already exists";
			$params['result_code'] = 3;
		} else {
			$sql = "INSERT INTO user_accounts(id_no,username,fname,lname,course,year,email,password,status)VALUES('$student_id','$username','$firstname','$lastname','$course',$year,'$email','$password','PENDING')";
			$result = mysql_query($sql);
		}
	}

	print(json_encode($params));
?>

