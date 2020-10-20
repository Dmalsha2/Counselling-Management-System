<?php 
include "database_connection.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['user_id'])) {
	$user_id = $_GET['user_id'];

	// write delete query
	$sql = "DELETE FROM `login` WHERE `user_id`='$user_id'";

	// Execute the query

	$result =  $connect->query($sql);

	if ($result == TRUE) {
		echo "Record deleted successfully.";
	}else{
		echo "Error:" . $sql . "<br>" . $connect->error;
	}
}

?>