<?php
namespace app\controller;

require 'application/controller/BaseController.php';
use app\controller\BaseController;

class HomeController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->permission()) {
			# code...
			header('location:?c=login');
			die;
		}
	}
	public function index()
	{
		$user = $_SESSION['username'] ?? '';

		$this->loadHeader();
		$this->loadSidebar();

		require 'application/view/home/index_view.php';

		$this->loadFooter();
	}
	// public function __call($req,$res)
	// {
	// 	echo "Not found method";
	// }
}
$m = $_GET['m'] ?? 'index';
$home = new HomeController;
$home->$m();