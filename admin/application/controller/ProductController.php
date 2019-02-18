<?php

namespace app\controller;

require 'application/controller/BaseController.php';
use app\controller\BaseController;

class ProductController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->permission()) {
			header('location:?c=login');
			die;
		}
	}
	public function show()
	{
		$this->loadHeader();
		$this->loadSidebar();
		require 'application/view/product/index_view.php';
		
		$this->loadFooter();

	}
	public function __call($req,$res)
	{
		echo "Not Found Method";
	}
}

$m = $_GET['m'] ?? 'show';
$product = new ProductController;
$product->$m();