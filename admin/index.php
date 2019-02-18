<?php
session_start();
if (file_exists('application/route/web.php')) {
	# code...
	define('ADMIN_PATH','index.php');
	require 'application/helper/commonHelper.php';
	require 'application/route/web.php';
}
else {
	echo "Web dang duoc nang cap";
}