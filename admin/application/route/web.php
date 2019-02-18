<?php

if (!defined('ADMIN_PATH')) {
	# code...
	die('Can not access');
}

class Route
{
	public function login()
	{
		require 'application/controller/LoginController.php';
		// echo "This is login page";
		// index.php?c=home
	}
	public function home()
	{
		require 'application/controller/HomeController.php';
	}
	public function product()
	{
		require 'application/controller/ProductController.php';
	}
	public function category()
	{
		require 'application/controller/CategoryController.php';
	}
	public function rooms()
	{
		require 'application/controller/RoomsController.php';
	}
	public function __call($req,$res)
	{
		echo "Not found Request";
	}
}

$c = $_GET['c'] ?? 'login';
$c = strip_tags($c);
$route = new Route;
$route->$c();