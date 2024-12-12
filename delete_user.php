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
	<title>Delete User</title>
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
					<h2 class="courier-prime-bold">Delete Record</h2>
					<div class="">
						<?php
						if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
							$id = $_GET['id'];
						} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
							$id = $_POST['id'];
						} else {
							echo '<h5 class="invalid">Page Not Found.</h5>';
							echo '<input class="btn btn-outline-dark rounded-pill w-25 mt-2" type="button" onclick="location.href=\'register-view-users.php\';" value="Go Back">';
							exit();
						}
						require('mysqli_connect.php');

						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							if ($_POST['confirmed'] == 'Yes') {
								$q = "DELETE FROM users WHERE user_id = $id";
								$result = @mysqli_query($dbconn, $q);

								if (mysqli_affected_rows($dbconn) == 1) {
									echo '<h5 class="mt-5 ubuntu-mono-regular text-success-emphasis">User Record Deleted.</h5>';
									echo '<input class="btn btn-outline-dark rounded-pill w-25 mt-2" type="button" onclick="location.href=\'register-view-users.php\';" value="Go Back">';
								} else {
									echo '<h5 class="mt-5 ubuntu-mono-regular text-danger">Error in deleting user record.</h5>';
									echo '<input class="btn btn-outline-dark rounded-pill w-25 mt-2" type="button" onclick="location.href=\'register-view-users.php\';" value="Go Back">';
								}
							} else {
								echo '<h5 class="mt-5 ubuntu-mono-regular text-success-emphasis">User record has not been deleted.</h5>';
								echo '<input class="btn btn-outline-dark rounded-pill w-25 mt-2" type="button" onclick="location.href=\'register-view-users.php\';" value="Go Back">';
							}
						} else {
							$q = "SELECT CONCAT(fname, ' ', lname) FROM users WHERE user_id = $id";
							$result = @mysqli_query($dbconn, $q);
							if (mysqli_affected_rows($dbconn) == 1) {
								$row = mysqli_fetch_array($result, MYSQLI_NUM);
								echo "<h5 class='mt-5 ubuntu-mono-regular'>Delete User " . ucwords($row[0]) . " Permanently?</h5>";

								echo '
									<div class="mt-3">
									<form action="delete_user.php" method="POST">
									<input class="btn btn-outline-success rounded-pill w-auto px-4" id="submit-yes" type="submit" name="confirmed" value="Yes">
									<input class="btn btn-outline-danger rounded-pill w-auto px-4" id="submit-no" type="submit" name="confirmed" value="No">
									<input type="hidden" name="id" value="' . $id . '">
									</form></div>
									';
							} else {
								echo '<h5>No User Found.</h5>';
							}
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