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
	<title>Home Page</title>
	<link rel="stylesheet" href="public/css/bootstrap.css">
</head>
<body>
	<div class="contrainer">
		<div class="row">
			
			<div class="col-lg-12 col-md-12 mb-3">
				<h1 class="text-center">This is Home</h1>
				
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1 col-md-1">
				
			</div>
			<div class="col-lg-10 col-md-10">
				<a href="?c=about">About</a>
				<a href="?c=contact">Contact</a>
				<table class="table table-active table-bordered text-center">
					<thead>
						<th>MSV</th>
						<th>Name</th>
						<th>Address</th>
						<th>Email</th>
						<th>Money</th>
					</thead>
					<tbody>
						<?php foreach($dataUsers as $key => $val ): ?>
						<tr>
							<td><?= $val['msv']; ?></td>
							<td><?= $val['name']; ?></td>
							<td><?= $val['address']; ?></td>
							<td><?= $val['email']; ?></td>
							<td><?= $val['money']; ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
