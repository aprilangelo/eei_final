
<?php
	#connect to the server and database
	$db = mysqli_connect("localhost", "root", "", "eei_db");
	$details=$_POST['details'];
  $old = $_POST['old'];

  $oldfname= $old[0];
  $oldlname = $old[1];
  $olduserid = $old[2];
  $oldemail = $old[3];
  $oldtype = $old[4];

  $newfname= $details[0];
  $newlname = $details[1];
  $newuserid = $details[2];
  $newemail = $details[3];
  $newtype = $details[4];


	$str= ltrim ($newtype,' ');
	#default value of image path
	#include middle name siguro
	$sql = "UPDATE user_t SET first_name='$newfname', last_name='$newlname',userid='$newuserid',email_address='$newemail',user_type='$str' WHERE email_address = '$oldemail'";
  if (mysqli_query($db, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($db);
}

?>
