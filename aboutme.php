<?php
session_start();
if ((!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 0))) {
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
			<?php include('nav-member.php'); ?>
			<div class="row mx-1">
				<div class="col">
					<h2 class="courier-prime-bold">About Me</h2>
					<div class="border p-4 mt-3 me-5" style="--bs-border-color: #4E524C;">
						<div class="" style="display: inline-block; width: 25%;">
							<img src="about-me.jpg" alt="">
						</div>
						<div class="courier-prime-regular" style="display: inline-block; padding-left: 22rem">
							I am a student.
						</div>
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