<?php

	if (!defined('ADMIN_PATH')) {
	# code...
	die('Can not access');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Page</title>
	<link rel="stylesheet" href="../public/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 mt-5">
				<form action="?c=login&m=handle" method="POST">
					<div class="form-group">
						<label for="user">Username: </label>
						<input type="text" class="form-control" name="user" id="user">
					</div>
					<div class="form-group">
						<label for="pass">Password: </label>
						<input type="password" class="form-control" name="pass" id="pass">
					</div>
					<button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>