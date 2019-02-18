<?php
namespace application\controller;

if (!defined('ADMIN_PATH')) {
	# code...
	die('Can not access');
}

require 'application/model/Login_model.php';
use application\model\LoginModel;

class LoginController
{
	private $loginModel;
	public function __construct()
	{
		$this->loginModel = new LoginModel;
	}
	public function index()
	{
		require 'application/view/login/index_view.php';
		// echo "This is method index";
	}
	public function handle()
	{
		if (isset($_POST['btnLogin'])) {
			# code...
			$user = $_POST['user'] ?? '';
			$user = strip_tags($user);
			$pass = $_POST['pass'] ?? '';
			$pass = strip_tags($pass);
			if (empty($user) || empty($pass)) {
				# code...
				header('location:?c=login&m=index&state=err');
			}
			else
			{
				$infoAdmin = $this->loginModel->checkLoginAdmin($user,$pass);
				// echo "<pre>";
				// print_r($infoAdmin);
				// die;
				if ($infoAdmin) {
	// echo "acas";
	// die;
					# code...
					// header('location:?c=login&state=ok');
					// luu thong tin cua nguoi dung vao sesstion
					$_SESSION['username'] = $infoAdmin['username'];
					$_SESSION['id'] = $infoAdmin['id'];
					$_SESSION['role'] = $infoAdmin['role'];
					// dieu huong vao trang home
					header('location:?c=home');
				}
				else
				{
					header('location:?c=login&state=false');	
				}
			}
		}
	}
	public function logout()
	{
		if (isset($_SESSION['username'])) {
			# code...
			unset($_SESSION['username']);
			unset($_SESSION['id']);
			unset($_SESSION['role']);
		}
		header('location:?c=login');
	}
	public function __call($req,$res)
	{
		echo "not found method";
	}
}
$m = $_GET['m'] ?? 'index';
$login = new LoginController;
$login->$m();