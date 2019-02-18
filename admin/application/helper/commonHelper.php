<?php
function validateDataRoom($nameRoom,$bossRoom)
{
	$err = [];
	$errors['name'] = (empty($nameRoom) || mb_strlen($nameRoom) > 60) ? 'Vui long nhap ten phong va it hon 60 ki tu' : '';
	$errors['boss'] = (empty($bossRoom) || mb_strlen($bossRoom) > 60) ? 'Vui long nhap ten truong phong va it hon 60 ki tu' : '';
	return $errors;
}