<?php
if (file_exists('app/route/web.php')) {
	# code...
	define('APP_PATH','index.php');
	require 'app/route/web.php';
}
else {
	echo "Web dang duoc nang cap";
}