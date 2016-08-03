<?php  

	// Delete form the database
	
	include('config.php');

	if (isset($_REQUEST['id'])) {
	 	$id = $_REQUEST['id'];

	 	$result = mysql_query("delete from tbl_student where st_id='$id'");

	 	header('location: show.php');
	 } 
	 else {
	 	header('location: show.php');
	 }


?>