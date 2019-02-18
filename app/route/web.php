<?php

// day la noi tiep nhan request tu phia client gui len
// cac quy uoc ma phia client bat buoc phai lam de gui len
// index.php?c=home&m=index
// muon truy cao vao controller co ten la home // ?c : controller
// muon truy cap vao method nam trong controller do co ten la index // &m : method cua controller

if (!defined('APP_PATH')) {
	# code...
	die('Can not access');
}

class Route
{
	public function home()
	{
		require 'app/controller/HomeController.php';
		// echo "This is home";
		// index.php?c=home
	}

	public function about()
	{
		require 'app/controller/AboutController.php';
		// index.php?c=cart
	}

	public function contact()
	{
		require 'app/controller/ContactController.php';
	}

	public function __call($req,$res)
	{
		echo "Not found Request";
	}
}

$c = $_GET['c'] ?? 'home';
$c = strip_tags($c);
$route = new Route;
$route->$c();