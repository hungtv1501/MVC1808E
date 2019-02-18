<?php
namespace application\controller;

require 'application/controller/BaseController.php';
use app\controller\BaseController;

require 'application/model/RoomsModel.php';
use application\model\RoomsModel;

require 'application/libs/panigation.php';
use application\libs\Panigation;

class RoomsController extends BaseController
{
	private $roomModel;
	public function __construct()
	{
		parent::__construct();
		if (!$this->permission()) {
			# code...
			header('location:?c=login');
			die;
		}
		$this->roomModel = new RoomsModel;
	}
	public function index()
	{
		if (isset($_SESSION['errAddRoom'])) {
			# code...
			unset($_SESSION['errAddRoom']);
		}
		if (isset($_SESSION['nameDuplicate'])) {
			# code...
			unset($_SESSION['nameDuplicate']);
		}

		$keyword = $_GET['keyword'] ?? '';
		$keyword = strip_tags($keyword);

		// lay current page tren URL
		$page = $_GET['page'] ?? '';
		$page = is_numeric($page) ? $page : 1;

		// echo $keyword;
		// die;

		$dataLink = [
			'c' => 'rooms',
			'm' => 'index',
			'page' => '{page}',
			'keyword' => $keyword,
		];

		$linkPage = Panigation::createLink($dataLink);
		// echo $linkPage;
		// die;

		//$infoData
		$totalRecordRooms = $this->roomModel->getAllDataRooms($keyword);
		// echo "<pre>";
		// print_r($infoData);
		// die;

		// goi ham phan trang
		$panigation = Panigation::panigate($linkPage, count($totalRecordRooms), $page, $keyword);
		// echo "<pre>";
		// print_r($panigation);
		// die;
		$infoData = $this->roomModel->getDataRoomByPage($keyword, $panigation['start'], $panigation['limit']);

		$this->loadHeader();

		$this->loadSidebar();

		require('application/view/rooms/index_view.php');

		$this->loadFooter();
	}
	public function addView()
	{
		$errosMess = $_SESSION['errAddRoom'] ?? [];
		$dupKeyName = $_SESSION['nameDuplicate'] ?? '';
		$state = $_GET['state'] ?? '';
		$this->loadHeader();

		$this->loadSidebar();

		require('application/view/rooms/add_view.php');

		$this->loadFooter();
	}
	public function handleAdd()
	{
		if (isset($_POST['btnSave'])) {
			# code...
			$nameRoom = $_POST['nameRoom'] ?? '';
			$nameRoom = strip_tags($nameRoom);

			$bossRoom = $_POST['bossRoom'] ?? '';
			$bossRoom = strip_tags($bossRoom);

			// $statusRoom = $_POST['nameRoom'] ?? '';
			// $statusRoom = strip_tags($statusRoom);

			$dateRoom = $_POST['dateRoom'] ?? '';
			$dateRoom = strip_tags($dateRoom);

			$errorsRoom = validateDataRoom($nameRoom,$bossRoom);
			// echo "<pre>";
			// print_r($errorsRoom);
			// die;
			$flagErr = true;
			foreach ($errorsRoom as $key => $value) {
				# code...
				if (!empty($value)) {
					# code...
					$flagErr = flase;
					break;
				}
			}
			if ($flagErr === true) {
				# code...
				// truong hop nay nguoi dung nhap du lieu hoan toan dung
				if (isset($_SESSION['errAddRoom'])) {
					# code...
					unset($_SESSION['errAddRoom']);
				}
				$checkInsert = $this->roomModel->checkExitsNameRoom($nameRoom);
				if (!$checkInsert) {
					# code...
					if (isset($_SESSION['nameDuplicate'])) {
						# code...
						unset($_SESSION['nameDuplicate']);
					}
					$insert = $this->roomModel->insertDataRoom($nameRoom,$bossRoom,$dateRoom);
					if ($insert) {
						# code...
						header('location:?c=rooms&state=success');
					}
					else
					{
						header('location:?c=room&m=addView&state=fail');
					}
				}
				else
				{
					$_SESSION['nameDuplicate'] = $nameRoom;
					header('location:?c=rooms&m=addView&state=dup');
				}
			}
			else
			{
				// nguoi dung nhap sai du lieu can thong bao cho ho biet
				$_SESSION['errAddRoom'] = $errorsRoom;
				header('location:?c=rooms&m=addView&state=err');
			}
		}
	}
	public function delete()
	{
		$idRoom = $_GET['id'] ?? '';
		$idRoom = is_numeric($idRoom) ? $idRoom : 0;
		if($idRoom > 0){
			$del = $this->roomModel->deleteRoomById($idRoom);
			if($del){
				echo "OK";
			} else {
				echo "FAIL";
			}
		} else {
			echo "ERR";
		}
	}

	public function editView()
	{
		$id = $_GET['id'] ?? '';
		$id = is_numeric($id) ? $id : 0;
		$infoDataRoom = $this->roomModel->getInfoDataRoomById($id);
		// echo "<pre>";
		// print_r($infoDataRoom);
		// die;
		if($infoDataRoom){
			$errosMess = $_SESSION['errEditRoom'] ?? [];
			$dupKeyName = $_SESSION['nameDuplicate'] ?? '';
			$state = $_GET['state'] ?? '';
			// load view
			$this->loadHeader();
			//load Sidebar
			$this->loadSidebar();
			require 'application/view/rooms/edit_view.php';
			//load footer
			$this->loadFooter();
		} else {
			//load header
			$this->loadHeader();
			//load Sidebar
			$this->loadSidebar();
			require 'application/view/common/not_page_view.php';
			//load footer
			$this->loadFooter();
		}
	}
	public function handleEdit()
	{
		if (isset($_POST['btnEdit'])) {
			# code...
			$idRoom = $_GET['id'];
			$idRoom = is_numeric($idRoom) ? $idRoom : 0;

			$nameRoom = $_POST['nameRoom'] ?? '';
			$nameRoom = strip_tags($nameRoom);

			$bossRoom = $_POST['bossRoom'] ?? '';
			$bossRoom = strip_tags($bossRoom);

			$statusRoom = $_POST['statusRoom'] ?? '';
			$statusRoom = in_array($statusRoom, ['0','1']) ? $statusRoom : 0;

			$dateRoom = $_POST['oldDateRoom'] ?? '';
			$dateRoom = strip_tags($dateRoom);

			$newDateRoom = $_POST['newDateRoom'] ?? '';
			$newDateRoom = strip_tags($newDateRoom);

			$newDateRoom = empty($newDateRoom) ? $dateRoom : $newDateRoom;

			// validate rooms
			$errorsRoom = validateDataRoom($nameRoom,$bossRoom);
			// echo "<pre>";
			// print_r($errorsRoom);
			// die;
			$flagErr = true;
			foreach ($errorsRoom as $key => $value) {
				# code...
				if (!empty($value)) {
					# code...
					$flagErr = flase;
					break;
				}
			}
			if ($flagErr === true) {
				# code...
				// du lieu hop le
				if (isset($_SESSION['errEditRoom'])) {
					# code...
					unset($_SESSION['errEditRoom']);
				}
				$checkEditRoom = $this->roomModel->checkNameRoomExitById($idRoom,$nameRoom);
				if (!$checkEditRoom) {
					# code...
					// ten room hop le
					if ($_SESSION['nameDuplicate']) {
						# code...
						unset($_SESSION['nameDuplicate']);
					}
					$up = $this->roomModel->updateDataRoomById($idRoom, $nameRoom, $bossRoom, $newDateRoom, $statusRoom);
					if ($up) {
						# code...
						header('location:?c=rooms&state=success');
					} else {
						header("location:?c=room&m=editView&state=fail&id={$idRoom}");
					}

				} else {
					// ten room khong hop le
					$_SESSION['nameDuplicate'] = $nameRoom;
					header("location:?c=rooms&m=editView&id={$idRoom}&state=dup");
				}
			} else {
				// du lieu khong hop le
				$_SESSION['errEditRoom'] = $errorsRoom;
				header("location:?c=rooms&m=editView&id={$idRoom}&state=err");
			}

		}
	}
}



$m = $_GET['m'] ?? 'index';
$room = new RoomsController;
$room->$m();