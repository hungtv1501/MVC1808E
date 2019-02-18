<?php

namespace application\libs;

class Panigation
{
	const BASE_URL = 'index.php';
	const ROW_LIMITED = 2; // so dong hien thi toi da tren 1 trang

	// ham hien thi cac nut ban phan trang de hien thi ra View
	public static function panigate($links, $totalRecord, $currentPage, $keyword)
	{
		// ham nay phai tinh dc:
		// tham so: start
		// tong so trang: total page
		// chuoi html phan trang - hien thi ra view

		// tinh total page
		$totalPage = ceil($totalRecord/self::ROW_LIMITED);
		// can xac dinh pham vi cua current page
		if ($currentPage < 1) {
			# code...
			$currentPage = 1;
		} elseif ($currentPage > $totalPage) {
			# code...
			$currentPage = $totalPage;
		}

		// tinh start
		$start = ($currentPage - 1)*self::ROW_LIMITED;

		// tao template html phan trang bang bootstrap 4
		// can co link phan trang - lay tu createLink tu controller vao
		$htmlPage = '';
		$htmlPage .= '<nav aria-label="Page navigation example">';
		$htmlPage .= '<ul class="pagination">';
		// xu ly nut previous(back page)
		if ($currentPage > 1) {
			# code...
			$htmlPage .= '<li class="page-item"><a class="page-link" href="'.str_replace('{page}', $currentPage - 1, $links).'" tabindex="-1">Previous</a></li>';
		}

		// xu ly cho nhung trang o giua
		for ($i=1; $i <= $totalPage ; $i++) { 
			# code...
			if ($i == $currentPage) {
				# code...
				// active current page
				$htmlPage .= '<li class="page-item active"><a class="page-link">'.$currentPage.'</a></li>';
			} else {
				$htmlPage .= '<li class="page-item"><a class="page-link" href="'.str_replace('{page}', $i, $links).'">'.$i.'</a></li>';
			}
		}

		// xu ly cho nut next
		if ($currentPage < $totalPage) {
			# code...
			$htmlPage .= '<li class="page-item"><a class="page-link" href="'.str_replace('{page}', $currentPage + 1, $links).'" tabindex="-1">Next</a></li>';
		}
		
		$htmlPage .= '</ul>';
		$htmlPage .= '</nav>';

		return [
			'start' => $start,
			'page' => $currentPage,
			'html' => $htmlPage,
			'limit' => self::ROW_LIMITED,
		];
	}

	// tao duong link phan trang
	public static function createLink($data = [])
	{
		// ?c=room&page=1&keyword=aks;
		/*
			$data = [
				'c' => 'rooms',
				'm' => 'index',
				'page' => {$page},
				'keyword' => 'avc',
			]
		*/
		$newLink =  '';
		if ($data) {
			# code...
			foreach ($data as $key => $value) {
				# code...
				$newLink .=(empty($newLink)) ? "?{$key}={$value}" : "&{$key}={$value}";
			}
		}
		return trim(self::BASE_URL.$newLink);
	}
}

