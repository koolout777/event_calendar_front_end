<?php

	if(!mysql_connect("localhost","root","")){
		die("cannot connect to the server!!");
	}

	if(!mysql_select_db("db_eventcalendar")){
		die("cannot select database");
	}

	$validate = true;
		
	if(isset($_GET['student_id'])){
		$student_id = addslashes($_GET['student_id']);
	}
	
	$invalid_params = "request parameter invalid: ";

	$params = array(
			'result_code' => 0,
			'result_message' => "OK"
		);

	if(!isset($_GET['student_id'])){
		$params['result_message'] = $invalid_params . "must student_id";
		$validate = false;
	}

	if($validate){
		$resultUser = mysql_query("SELECT* FROM user_accounts WHERE id_no='$student_id'");
		$no = mysql_num_rows($resultUser);

		if($no>0){

			$sql = "SELECT * FROM event_receivers WHERE receiver_id = '$student_id'";
			$result = mysql_query($sql);


			while($row = mysql_fetch_array($result)){
				$event_id = $row['event_id'];

				$result2 = mysql_query("SELECT* FROM events WHERE event_id=$event_id");
				$row2 = mysql_fetch_assoc($result2);
				$row2['event_start_date'] = date('Y-m-d', strtotime($row2['event_start_date']));
				$row2['event_end_date'] = date('Y-m-d', strtotime($row2['event_end_date']));
				$output[] = $row2;
			}
		
			$sql = "SELECT *FROM events WHERE event_type='Official'";
			$resultofficial = mysql_query($sql);

			while($row = mysql_fetch_assoc($resultofficial)){
			//echo $row['event_title'];
				$row['event_start_date'] = date('Y-m-d', strtotime($row['event_start_date']));
				$row['event_end_date'] = date('Y-m-d', strtotime($row['event_end_date']));
				$outputofficial[] = $row;
			}
					
			$no = mysql_num_rows($result);
			
			if($no>0){
				$params['events'] = $output;
				foreach($outputofficial as $event){
					array_push($params['events'], $event);
				}
			} else{
				$params['events'] = [];
				foreach($outputofficial as $event){
					array_push($params['events'], $event);
				}
			}

		} else {
			$params['result_message'] = "student not found";
			$params['result_code'] = 1;
		}

		mysql_close();
	}else{
		$params['result_code'] = 1;
	}

	print(json_encode($params));
?>
