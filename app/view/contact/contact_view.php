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
	<title>Contact Page</title>
	<link rel="stylesheet" href="public/css/bootstrap.css">
</head>
<body>
	<?php 
		$sub = $_GET['sub'] ?? 0;
	?>
	<div class="container">
		<div class="row">
			<h1>This is contact</h1>
			<a href="?c=home">Home</a>
			<a href="?c=about">About</a>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<form action="?c=contact&m=sub" method="POST">
					<label for="number-1">Number 1: </label>
					<input type="number" name="number-1" id="number-1">
					<br><br>
					<label for="number-2">Number 2:</label>
					<input type="number" name="number-2" id="number-2">
					<br><br>
					<button type="submit" name="btnSub">Sub</button>
				</form>
				<?php if($sub != 0): ?>
					<p>Ket qua khi tru la: <?=$sub;?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</body>
</html>