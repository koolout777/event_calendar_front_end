<?php

	if(!mysql_connect("localhost","root","")){
		die("cannot connect to the server!!");
	}

	if(!mysql_select_db("db_eventcalendar")){
		die("cannot select database");
	}
	
	
	$sql = "SELECT *FROM events WHERE event_type='Official'";
	$result = mysql_query($sql);

	while($row = mysql_fetch_assoc($result)){
	//echo $row['event_title'];
		$output[] = $row;
	}
	
	$params["events"] = $output;
	print(json_encode($params));

?>
