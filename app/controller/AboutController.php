<?php
namespace app\controller;

if (!defined('APP_PATH')) {
	# code...
	die('Can not access');
}

class AboutController
{
	public function show()
	{
		require 'app/view/about/about_view.php';
	}
	public function add()
	{
		if (isset($_POST['btnSum'])) {
			# code...
			// echo "<pre>";
			// print_r($_POST);
			$a = $_POST['number-1'] ?? 0;
			$a = is_numeric($a) ? $a : 0;
			$b = $_POST['number-2'] ?? 0;
			$b = is_numeric($b) ? $b : 0;
			$sum = $a+$b;

			header("location:?c=about&total={$sum}");
		}
	}
	public function __call($req, $res)
	{
		echo "Not found method";
	}
}
$ma = $_GET['m'] ?? 'show';
$about = new AboutController;
$about->$ma();