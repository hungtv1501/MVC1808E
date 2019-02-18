<?php
namespace application\model;
if (!defined('ADMIN_PATH')) {
	# code...
	die('Can not access');
}

require 'application/config/database.php';
use app\config\Database;
use \PDO;

class RoomsModel extends Database
{
	public function __construct()
	{
		parent::__construct();

	}

	public function getInfoDataRoomById($id)
	{
		$data = [];
		$sql = "SELECT * FROM rooms WHERE rooms.id = :id ";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			# code...
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				# code...
				if ($stmt->rowCount() > 0) {
					# code...
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;

	}

	public function deleteRoomById($id)
	{
		$flagDel = false;
		$sql = "DELETE FROM rooms WHERE rooms.id = :id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			if($stmt->execute()){
				$flagDel = true;
			}
			$stmt->closeCursor();
		}
		return $flagDel;
	}

	public function checkExitsNameRoom($nameRoom)
	{
		$flagCheck = false;
		$sql = "SELECT * FROM rooms AS a WHERE a.name = :nameRoom LIMIT 1";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':nameRoom',$nameRoom,PDO::PARAM_STR);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$flagCheck = true;
				}
			}
			$stmt->closeCursor();
		}
		return $flagCheck;
	}

	public function checkNameRoomExitById($idRoom,$nameRoom)
	{
		$flagEdit = false;
		$sql = "SELECT * FROM rooms AS a WHERE a.name = :nameRoom AND a.id <> :idRoom";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':nameRoom',$nameRoom,PDO::PARAM_STR);
			$stmt->bindParam(':idRoom',$idRoom,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$flagEdit = true;
				}
			}
			$stmt->closeCursor();
		}
		return $flagEdit;
	}

	public function updateDataRoomById($idRoom, $nameRoom, $bossRoom, $newDateRoom, $statusRoom)
	{
		$flagUpdate = false;
		$sql = "UPDATE rooms SET name = :nameRoom, boss = :bossRoom, status = :statusRoom, create_time = :create_time, update_time= :update_time WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			# code...
			$stmt->bindParam(':nameRoom',$nameRoom,PDO::PARAM_STR);
			$stmt->bindParam(':bossRoom',$bossRoom,PDO::PARAM_STR);
			$stmt->bindParam(':statusRoom',$statusRoom,PDO::PARAM_INT);
			$stmt->bindParam(':create_time',$newDateRoom,PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$update_time,PDO::PARAM_STR);
			$stmt->bindParam(':id',$idRoom,PDO::PARAM_STR);
			if ($stmt->execute()) {
				# code...
				$flagEdit = true;
			}
			$stmt->closeCursor();
		}
		return $flagEdit;
	}

	public function insertDataRoom($name, $tp, $date)
	{
		$flagInsert = false;
		$status = 1;
		$update_time = null;
		$sql = "INSERT INTO rooms(name,boss,status,create_time,update_time) VALUES(:name, :boss, :status, :create_time, :update_time)";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);
			$stmt->bindParam(':boss',$tp, PDO::PARAM_STR);
			$stmt->bindParam(':status',$status, PDO::PARAM_INT);
			$stmt->bindParam(':create_time',$date, PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$update_time, PDO::PARAM_STR);
			// thuc thi cau lenh sql
			if($stmt->execute()){
				$flagInsert = true;
			}
			$stmt->closeCursor();
		}
		return $flagInsert;
	}

	public function getAllDataRooms($key = '')
	{
		$keyword = "%".$key."%";
		$data = [];
		$sql = "SELECT * FROM rooms WHERE rooms.name LIKE :name OR rooms.boss LIKE :boss";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			# code...
			// vi luc nay khong co tham so ao truyen vao stmt nen khong can bindParam kiem tra du lieu
			// thuc thi cai lenh
			$stmt->bindParam(':name',$keyword,PDO::PARAM_STR);
			$stmt->bindParam(':boss',$keyword,PDO::PARAM_STR);
			if ($stmt->execute()) {
				# code...
				// kiem tra xem co du lieu tra ve khong
				if ($stmt->rowCount() > 0) {
					# code...
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}

	public function getDataRoomByPage($key, $start, $limit)
	{
		$data = [];
		$keyword = "%".$key."%";
		$sql = "SELECT * FROM rooms AS a WHERE a.name LIKE :name OR a.boss LIKE :boss LIMIT :start, :limmit";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			# code...
			$stmt->bindParam(':name',$keyword,PDO::PARAM_STR);
			$stmt->bindParam(':boss',$keyword,PDO::PARAM_STR);
			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':limmit',$limit,PDO::PARAM_INT);
			if ($stmt->execute()) {
				# code...
				// kiem tra xem co du lieu tra ve khong
				if ($stmt->rowCount() > 0) {
					# code...
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}
}