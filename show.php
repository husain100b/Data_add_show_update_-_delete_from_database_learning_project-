<?php

	// Show data from database

	// Database connect
	include('config.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data view page</title>

	<script>
		function confirmDelete(){
			confirm('Are you sure you want delete this data?');
		}
	</script>
</head>
<body>
		
		<h2>View All data from database</h2>

		<table cellpadding="5" cellspacing="0" border="">
			<tr>
				<th>Serial No: </th>
				<th>Name: </th>
				<th>Roll: </th>
				<th>Age: </th>
				<th>Email: </th>
			</tr>

			<?php  

				$i = 0;

				$result = mysql_query("select * from tbl_student");

				while ($row=mysql_fetch_array($result)) {
				
				$i++;

			?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['st_name']; ?></td>
					<td><?php echo $row['st_roll']; ?></td>
					<td><?php echo $row['st_age']; ?></td>
					<td><?php echo $row['st_email']; ?></td>
					<td><a href="update.php?id=<?php echo $row['st_id']; ?>">Edit</a></td>
					<td><a onclick="confirmDelete()" href="delete.php?id=<?php echo $row['st_id']; ?>">Delete</a></td>
				</tr>

			<?php  

				}

			?>

		</table>

		<br>

		<a href="index.php">Back to Index Page</a>
</body>
</html>


