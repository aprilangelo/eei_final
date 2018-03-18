<?php
// include "../templates/dbconfig.php";
session_start();
$db = mysqli_connect("localhost", "root", "", "eei_db");
$ticketID = mysqli_real_escape_string($db, $_POST['ticketID']);
// $request_details = mysqli_real_escape_string($db, $_POST['request_details']);
$logger = $_SESSION['user_id'];

$query = "UPDATE ticket_t SET ticket_status = 8 WHERE ticket_id = $ticketID";

if (!mysqli_query($db, $query))
{
  die('Error' . mysqli_error($db));
}

//working activity log query
mysqli_query($db, "INSERT INTO activity_log_t(activity_log_details, logger, ticket_id) VALUES('Confirmed by requestor. Ticket closed', '$logger', '$ticketID')");


echo $ticketID;
mysqli_close($db);
?>
