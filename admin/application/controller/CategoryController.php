<?php
namespace app\controller;

require 'application/controller/BaseController.php';
use app\controller\BaseController;

class CategoryController extends BaseController
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
	public function show()
	{
		$this->loadHeader();
		$this->loadSidebar();
		require 'application/view/category/index_view.php';
		$this->loadFooter();
	}
	public function __call($req,$res)
	{
		echo "Not found method";
	}
}

$m = $_GET['m'] ?? 'show';
$category = new CategoryController;
$category->$m();