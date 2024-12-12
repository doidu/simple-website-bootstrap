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
	<title>Edit User Info</title>
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
					<div class="row mx-1 text-center justify-content-center">
						<h2 class="courier-prime-bold">Edit User Record</h2>
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
						$fnameErr = $lnameErr = $emailErr = '';
						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							$error = array();
							//! check kung may laman fname, lname, email textbox
							if (empty($_POST['fname'])) {
								$fnameErr = 'First Name is required';
								$error[] = $fnameErr;
							} else {
								$fn = trim($_POST['fname']);
							}
							if (empty($_POST['lname'])) {
								$lnameErr = 'Last Name is required';
								$error[] = $lnameErr;
							} else {
								$ln = trim($_POST['lname']);
							}
							if (empty($_POST['email'])) {
								$emailErr = 'Email Address is required';
								$error[] = $emailErr;
							} else {
								$em = trim($_POST['email']);
							}

							if (empty($error)) {
								$q = "UPDATE users SET fname = '$fn', lname = '$ln', email = '$em' WHERE user_id = '$id' LIMIT 1";
								$result = @mysqli_query($dbconn, $q);
								if (mysqli_affected_rows($dbconn) == 1) {
									echo '<h2>User Record Updated</h2>';
								} else {
									echo '<h2>User Record Has Not Been Updated</h2>';
								}
							}
							// else{
							//// display and laman ng $errors
							// }
						}

						$q = "SELECT fname, lname, email FROM users WHERE user_id = '$id'";
						$result = @mysqli_query($dbconn, $q);

						if (mysqli_num_rows($result) == 1) {
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

							echo '
								<div class="col-6">
                    			<div class="form-control py-4 reg-div border-0">
								<form action="edit_user.php" method="POST">
									<div class="form-floating">
                            		<p>
										<label for="fname">First Name: </label>
										<input class="form-control text-center ' . (!$fnameErr ?: 'is-invalid') . ' " type="text" id="fname" name="fname" size="30" maxlength="40" value="' . $row['fname'] . '">
										<small class="text-danger-emphasis ubuntu-mono-regular-italic"> ' . (!$fnameErr ? '' : "$fnameErr") . '</small>
                                	</p>
								</div>
								<div class="form-floating">
									<p>
										<label for="lname">Last Name: </label>
										<input class="form-control text-center ' . (!$lnameErr ?: 'is-invalid') . '" type="text" id="lname" name="lname" size="30" maxlength="40" value="' . $row['lname'] . '">
										<small class="text-danger-emphasis ubuntu-mono-regular-italic">' . (!$lnameErr ? '' : "$lnameErr") . '</small>
									</p>
								</div>
								<div class="form-floating">
									<p>
										<label for="email">Email Address: </label>
										<input class="form-control text-center ' . (!$emailErr ?: 'is-invalid') . '" type="email" id="email" name="email" size="30" maxlength="50" value="' . $row['email'] . '">
										<small class="text-danger-emphasis ubuntu-mono-regular-italic">' . (!$emailErr ? '' : "$emailErr") . '</small>
									</p>
								</div>
								<div>
									<p>
										<input class="btn btn-outline-dark px-4" type="submit" id="submit" name="submit" value="Edit">
									</p>
									<p>
										<input type="hidden" name="id" value="' . $id . '">
									</p>
								</div>
									</form>
								</div>
								</div>
								';
						} else {
							echo '<h2>User Not Found.</h2>';
							echo '<input class="btn btn-outline-dark rounded-pill w-25 mt-2" type="button" onclick="location.href=\'register.php\';" value="Register Now">';
						}
						mysqli_close($dbconn);
						?>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php'); ?>
		<script src="./bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js">

		</script>
</body>

</html>