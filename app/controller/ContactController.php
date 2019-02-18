<?php

namespace app\controller;

if (!defined('APP_PATH')) {
	# code...
	die('Can not access');
}

class ContactController
{
	public function show()
	{
		require 'app/view/contact/contact_view.php';
	}
	public function sub()
	{
		if (isset($_POST['btnSub'])) {
			# code...
			$a = $_POST['number-1'] ?? 0;
			$a = is_numeric($a) ? $a : 0;
			$b = $_POST['number-2'] ?? 0;
			$b = is_numeric($b) ? $b : 0;
			$sub = $a - $b;

			header("location:?c=contact&sub={$sub}");
		}
	} 
}
$m = $_GET['m'] ?? 'show';
$contact = new ContactController;
$contact->$m();
