<?php

// day la noi xu ly de lay du lieu
namespace app\model;

if (!defined('APP_PATH')) {
	# code...
	die('Can not access');
}

class HomeModel
{
	public function getAllDataUsers()
	{
		$users = 
		[
			[
				'msv' => 113,
				'name' => 'NVA',
				'address' => 'HN',
				'email' => 'nva@gmail.com',
				'money' => 12314,
			],
			[
				'msv' => 114,
				'name' => 'NVB',
				'address' => 'ND',
				'email' => 'nvbND@gmail.com',
				'money' => 12314748,
			],
			[
				'msv' => 115,
				'name' => 'NVC',
				'address' => 'TB',
				'email' => 'nvcTB@gmail.com',
				'money' => 1796314,
			],
		];
		return $users;
	}

}