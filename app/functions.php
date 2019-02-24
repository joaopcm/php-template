<?php

function formatDate($date) {
	$str = strtotime($date);
	$nmeng = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	$nmport = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
	return str_replace($nmeng, $nmport ,date('d', $str)) . ' de ' . str_replace($nmeng, $nmport ,date('F', $str)) . ' de ' . str_replace($nmeng, $nmport ,date('Y', $str)) . ' às ' . date('H:i', $str);
}

function getGravatarUrl()
{
    $user = new User();
    $user->get($_SESSION['User']['iduser']);
    $url = 'https://www.gravatar.com/avatar/';
    $email = $user->getdesemail();
    $hash = md5(strtolower(trim($email)));
    return $url . $hash;
}

function getGravatarUrlByEmail($email)
{
    $url = 'https://www.gravatar.com/avatar/';
    $hash = md5(strtolower(trim($email)));
    return $url . $hash;
}

function formatBytes($bytes, $unit = "", $decimals = 2) {
	$units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4, 
			'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);
	$value = 0;
	if ($bytes > 0) {
		if (!array_key_exists($unit, $units)) {
			$pow = floor(log($bytes)/log(1024));
			$unit = array_search($pow, $units);
		}
		$value = ($bytes/pow(1024,floor($units[$unit])));
	}
	if (!is_numeric($decimals) || $decimals < 0) {
		$decimals = 2;
	}
	return sprintf('%.' . $decimals . 'f '.$unit, $value);
  }