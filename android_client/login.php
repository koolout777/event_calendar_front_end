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
		$validate = false;
	} else if(!isset($_POST['student_password'])){
		$params['result_message'] = $invalid_params . "must student_password";
		$validate = false;
	}
	
	if($validate){
		$student_id			= addslashes($_POST['student_id']);
		$student_password	= addslashes($_POST['student_password']);

		$resultUser	= mysql_query("SELECT id_no FROM user_accounts WHERE id_no='$student_id' AND password='$student_password'");

		$output[] = mysql_fetch_assoc($resultUser);

		if(!$output[0]){
			$params['result_message'] = "invalid username or password";
			$params['result_code'] = 1;
		} else{
			$params['user_id'] = $output[0]['id_no'];
		}
	} else{
		$params['result_code'] = 1;
	}

	print(json_encode($params));

	mysql_close();
?>
