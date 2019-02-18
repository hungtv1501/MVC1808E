<?php
namespace app\controller;

class BaseController
{
	public function __construct()
	{
		$this->accessFile();
	}

	public function __call($req,$res)
	{
		echo "Not found method";
	}
	protected function permission()
	{
		$userSession = $_SESSION['username'] ?? '';
		if (empty($userSession)) {
			# code...
			return false;
		}
		return true;
	}
	protected function accessFile()
	{
		if (!defined('ADMIN_PATH')) {
			# code...
			die('Can not access');
		}
	}
	protected function loadHeader()
	{
		require 'application/view/common/header_view.php';
	}
	protected function loadSidebar()
	{
		require 'application/view/common/sidebar_view.php';
	}
	protected function loadFooter()
	{
		require 'application/view/common/footer_view.php';
	}
}