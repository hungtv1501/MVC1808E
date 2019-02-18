<?php
if (!defined('APP_PATH')) {
	# code...
	die('Can not access');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>About Page</title>
	<link rel="stylesheet" href="public/css/bootstrap.css">
</head>
<body>
	<div class="contrainer">
		<div class="row">
			
			<div class="col-lg-12 col-md-12 mb-3">
				<h1 class="text-center">This is About</h1>
				<a href="?c=home">Home</a>
				<a href="?c=contact">Contact</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<form action="?c=about&m=add" method="POST">
					<label for=number-1>Number 1</label>
					<input type="number" name="number-1" id="number-1">
					<br><br>
					<label for="number-2">Number-2</label>
					<input type="number" name="number-2" id="number-2">
					<br><br>
					<button type="submit" name="btnSum">Sum</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>