
<!DOCTYPE html>
<html lang="eng" class="h-100">

<head>
	<title>Website ni Valzado</title>
	<meta charset="utf-8">
	<link href="./bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel=" stylesheet" type="text/css" href="include.css">
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
			<?php include 'nav.php';
				// if ((!isset($_SESSION['user_level']))) {
				// 	include 'nav.php';
				// }else{
				// ($_SESSION['user_level'] === 1) ? include 'nav-admin.php' : include 'nav-member.php';
				// }
			?>
			<?php
			// session_start();
			// isset($_SESSION['user_level']) ? $nav = ($_SESSION['user_level'] === 1) ? 'nav-admin.php' : 'nav-member.php' : $nav = 'nav.php';
			// include($nav);
			// 
			?>
			<div class="row mx-1">
				<div class="col">
					<h2 class="courier-prime-bold">Home Page</h2>
					<div class="">
						<p>Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia aenean posuere velit; donec curabitur tellus. Sociosqu hendrerit quis, id curae ultrices habitasse maximus quis. Vitae nec vitae eget mollis semper lacinia ante imperdiet scelerisque. Fusce nec aenean; ridiculus nostra porttitor netus. Convallis ad quis ex dictum praesent tincidunt. Tincidunt commodo risus amet penatibus ipsum nisl penatibus sodales.</p>
						<p>Magna interdum condimentum vestibulum potenti penatibus consequat amet pretium justo? Natoque torquent egestas convallis vel; justo ut mattis velit. Efficitur laoreet magnis dui amet at aptent aliquet. Semper magnis feugiat lacus congue semper ultricies duis tempor. Arcu non tempor quam nisi; amet primis porta blandit. Orci ipsum auctor faucibus nunc suspendisse ex nulla suspendisse bibendum. Sapien sed orci sociosqu tempus dui habitant euismod platea hac. Tortor ultrices augue vel eget hendrerit ad enim enim. Condimentum ullamcorper himenaeos penatibus bibendum diam congue orci quis.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis aut ea similique distinctio dicta mollitia pariatur a ut natus officia. Voluptate obcaecati perspiciatis quasi corrupti error eum qui, fugit illo. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut totam vero eveniet quos magnam, mollitia nobis, ratione nam dignissimos, error nihil saepe quidem voluptatibus! Tenetur incidunt accusantium accusamus rerum culpa.</p>
					</div>
					<div class="">
						<p>Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia aenean posuere velit; donec curabitur tellus. Sociosqu hendrerit quis, id curae ultrices habitasse maximus quis. Vitae nec vitae eget mollis semper lacinia ante imperdiet scelerisque. Fusce nec aenean; ridiculus nostra porttitor netus. Convallis ad quis ex dictum praesent tincidunt. Tincidunt commodo risus amet penatibus ipsum nisl penatibus sodales.</p>
						<p>Magna interdum condimentum vestibulum potenti penatibus consequat amet pretium justo? Natoque torquent egestas convallis vel; justo ut mattis velit. Efficitur laoreet magnis dui amet at aptent aliquet. Semper magnis feugiat lacus congue semper ultricies duis tempor. Arcu non tempor quam nisi; amet primis porta blandit. Orci ipsum auctor faucibus nunc suspendisse ex nulla suspendisse bibendum. Sapien sed orci sociosqu tempus dui habitant euismod platea hac. Tortor ultrices augue vel eget hendrerit ad enim enim. Condimentum ullamcorper himenaeos penatibus bibendum diam congue orci quis.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis aut ea similique distinctio dicta mollitia pariatur a ut natus officia. Voluptate obcaecati perspiciatis quasi corrupti error eum qui, fugit illo. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut totam vero eveniet quos magnam, mollitia nobis, ratione nam dignissimos, error nihil saepe quidem voluptatibus! Tenetur incidunt accusantium accusamus rerum culpa.</p>
					</div>
					<div class="">
						<p>Lorem ipsum odor amet, consectetuer adipiscing elit. Cubilia aenean posuere velit; donec curabitur tellus. Sociosqu hendrerit quis, id curae ultrices habitasse maximus quis. Vitae nec vitae eget mollis semper lacinia ante imperdiet scelerisque. Fusce nec aenean; ridiculus nostra porttitor netus. Convallis ad quis ex dictum praesent tincidunt. Tincidunt commodo risus amet penatibus ipsum nisl penatibus sodales.</p>
						<p>Magna interdum condimentum vestibulum potenti penatibus consequat amet pretium justo? Natoque torquent egestas convallis vel; justo ut mattis velit. Efficitur laoreet magnis dui amet at aptent aliquet. Semper magnis feugiat lacus congue semper ultricies duis tempor. Arcu non tempor quam nisi; amet primis porta blandit. Orci ipsum auctor faucibus nunc suspendisse ex nulla suspendisse bibendum. Sapien sed orci sociosqu tempus dui habitant euismod platea hac. Tortor ultrices augue vel eget hendrerit ad enim enim. Condimentum ullamcorper himenaeos penatibus bibendum diam congue orci quis.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis aut ea similique distinctio dicta mollitia pariatur a ut natus officia. Voluptate obcaecati perspiciatis quasi corrupti error eum qui, fugit illo. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut totam vero eveniet quos magnam, mollitia nobis, ratione nam dignissimos, error nihil saepe quidem voluptatibus! Tenetur incidunt accusantium accusamus rerum culpa.</p>
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