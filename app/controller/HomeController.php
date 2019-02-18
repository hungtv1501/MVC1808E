<?php
namespace app\controller;

if (!defined('APP_PATH')) {
	# code...
	die('Can not access');
}

// nap model vao controller
require 'app/model/Home.php';
use app\model\HomeModel;

class HomeController
{
	private $homeModel;
	public function __construct()
	{
		$this->homeModel = new HomeModel;
	}
	public function index()
	{
		// echo "This is index of Home";
		
		$dataUsers = $this->homeModel->getAllDataUsers();

		// nap view 
		require 'app/view/home/index_view.php';
	}
	public function product()
	{
		echo "This is Product";
	}
	public function __call($req, $res)
	{
		echo "Not found method";
	}
}

$m = $_GET['m'] ?? 'index';
$home = new HomeController;
$home->$m();