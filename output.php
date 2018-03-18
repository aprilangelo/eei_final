<?php
//setting header to json
header('Content-Type: application/json');

//get connection
$db = mysqli_connect("localhost", "root", "", "eei_db");

if(!$db){
	die("Connection failed: " . $db->error);
}

//query to get data from the table
$query = sprintf("SELECT COUNT(ticket_id) as count, MONTHNAME(date_prepared) as month FROM ticket_t GROUP BY month ORDER BY date_prepared");

//execute query
$result = $db->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$db->close();

//now print the data
print json_encode($data);
