<?php 

	// Update database
	
	include('config.php');

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	}
	else {
		header('localhost: view.php');
	}

	if (isset($_POST['form1'])) {

		try {
			
			if(empty($_POST['st_name'])){

				throw new Exception("Name cannot be empty");
				
			}

			if (empty($_POST['st_roll'])) {

				throw new Exception("Roll cannot be empty");
			
			}

			if (empty($_POST['st_age'])) {
				
				throw new Exception("Age cannot be empty");
				
			}

			if (empty($_POST['st_email'])) {

				throw new Exception("Email cannot be empty");
				
			}

			//$result = mysql_query("insert into tbl_student (st_name,st_roll,st_age,st_email) values ('$_POST[st_name]', '$_POST[st_roll]', '$_POST[st_age]', '$_POST[st_email]') ");
			
			$result = mysql_query("update tbl_student set st_name='$_POST[st_name]', st_roll='$_POST[st_roll]', st_age='$_POST[st_age]', st_email='$_POST[st_email]' where st_id='$id' ");

			$success_message = 'Data has been updated successfully.';


		}
		 catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Update Page</title>
</head>
<body>
	
	<h2>Data Update Page</h2>

	<?php 

		if (isset($error_message)) {
			echo $error_message;
		}

		if (isset($success_message)) {
			echo $success_message;
		}

	 ?>

	 <br>

	 <?php  

	 	$result = mysql_query("select * from tbl_student where st_id='$id'");
	 	while ($row=mysql_fetch_array($result)) {
	 		$st_name_old = $row['st_name'];
	 		$st_roll_old = $row['st_roll'];
	 		$st_age_old = $row['st_age'];
	 		$st_email_old = $row['st_email'];

	 	}

	 ?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Name: </td>
				<td><input type="text" name="st_name" value="<?php echo $st_name_old; ?>"></td>
			</tr>
			<tr>
				<td>Roll: </td>
				<td><input type="text" name="st_roll" value="<?php echo $st_roll_old; ?>"></td>
			</tr>
			<tr>
				<td>Age: </td>
				<td><input type="text" name="st_age" value="<?php echo $st_age_old; ?>"></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="text" name="st_email" value="<?php echo $st_email_old; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update" name="form1"></td>
			</tr>
		</table>

		<input type="hidden" name="id" value="<?php echo $id; ?>">

	</form>
	
	<br>

	<a href="index.php">back to previous</a>

</body>
</html>