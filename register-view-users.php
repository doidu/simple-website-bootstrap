<?php
session_start();
if ((!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))) {
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="eng" class="h-100">

<head>
	<title>Website ni Valzado</title>
	<meta charset="utf-8">
	<link href="./bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="include.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400&display=swap');
	</style>
</head>

<body class="d-flex flex-column h-100">
	<div>
		<div class="container">
			<?php include('header.php'); ?>
			<?php include('nav-admin.php'); ?>
			<div class="row mx-1">
				<div class="col">
					<h2 class="courier-prime-bold">Registered Users</h2>
					<div class="">
						<?php
						require('mysqli_connect.php');
						$q = "SELECT user_id, fname, lname, email, DATE_FORMAT(registration_date, '%M %d, %Y') as regdate FROM users ORDER BY registration_date ASC";
						$result = @mysqli_query($dbconn, $q);

						if ($result) {
							echo '<table class="table table-striped mb-2" style="--bs-table-bg: #8E948E00; border-color: black;">
								<tr class="ubuntu-mono-bold" style="--bs-table-bg: #696E69FF">
								<th>Name</th>
								<th>Email</th>
								<th>Date of Registration</th>
								<th style="text-align: center;">Actions</th>
								</tr>';
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								echo '<tr><td>' . ucfirst($row['lname']) . ', ' . ucfirst($row['fname']) . '</td><td>' .
									$row['email'] . '</td><td>' .
									$row['regdate'] . '</td>
									<td style="text-align: center;"><a class="text-info-emphasis" href="edit_user.php?id=' . $row['user_id'] . '">Edit</a>&emsp;<a class="text-danger" href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
									</tr>';
							}
							echo '</table>';
							mysqli_free_result($result);
						} else {
							echo '<p class="invalid">System Error: Cannot retrieve users. Error Code: 22</p>';
						}
						mysqli_close($dbconn);
						?>
					</div>
				</div>
				<div class="border col-2 me-3" style="--bs-border-color: #4E524C; max-height: 20rem;">
					<?php include('info-col.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
	<script src="./bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js">
	</script>
</body>

</html>