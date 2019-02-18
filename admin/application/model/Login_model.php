<?php
namespace application\model;
if (!defined('ADMIN_PATH')) {
	# code...
	die('Can not access');
}

require 'application/config/database.php';
use app\config\Database;
use \PDO;

class LoginModel extends Database
{
	public function __construct()
	{
		parent::__construct();

	}
	public function checkLoginAdmin($user,$pass)
	{
		//echo $user . $pass;
		//die;
		// su dung PDO de query databse 
		$data = [];
		$sql = "SELECT * FROM user AS a WHERE a.username = :user AND a.password= :pass AND a.status = 1 AND a.role = -1 LIMIT 1";
		$stmt = $this->db->prepare($sql); // lay du lieu OR kiem tra xem co lay dc du lieu hay khong
		if ($stmt) {
			// echo "asc";
			// die;
			// vi chung ta co tham so :user va :pass duoc goi la tham so hinh thuc ( ts ao? ) cua 2 bien $user va $pass nen chung ta can kiem tra tinh hop le cua no
			$stmt->bindParam(':user',$user, PDO::PARAM_STR);
			$stmt->bindParam(':pass',$pass, PDO::PARAM_STR);

			// thuc thi cau lenh
			if ($stmt->execute()) {
				# code
				// kiem tra xem cau lenh sql do co tra ve du lieu ko
				if ($stmt->rowCount() > 0) {
					# code...
					// fetch : lay ra 1 dong du lieu - tra ve mang don
					// PDO::FETCH_ASSOC : tra ve mang khong tuan tu voi cac key la cac truong nam trong bang db
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
					// $datta = $stmt->fetchAll(PDO::FETCH_ASSOC); lay ra mang nhieu chieu
				}
			}
			// dung viec ngat kiem tra prepare
			$stmt->closeCursor();
		}
		return $data;
	}
}