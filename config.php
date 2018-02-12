<?php 
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('ISPRODUCTION', false);
} else {
    define('ISPRODUCTION', true);
}

if (ISPRODUCTION === true) {
    define('HOST','localhost');
    define('USERNAME','thuonghieu_admin');
    define('PASSWORD','hPH12.h0');
    define('DBNAME','thuonghieu_db');
    define('DOMAIN','http://chamsocthuonghieu.vn/');	

} else {
    define('HOST','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DBNAME','thuonghieu_db');
    define('DOMAIN','http://localhost/code/');	
}

// define('HOST','localhost');
// define('USERNAME','root');
// define('PASSWORD','');
// define('DBNAME','thuonghieu_db');
// define('DOMAIN','http://chamsocthuonghieu.vn/');	
session_start();
require 'class/database.php';
require_once('class/xl_param.php');
require 'class/xl_nhomtin.php';
require 'class/xl_tintuc.php';
$xl_tintuc = new xl_tintuc();
$xl_nhomtin = new xl_nhomtin();
$xl_param = new xl_param();
$tukhoa = $xl_param->DocTheoTen('tukhoa')->giatri;
$tieude = $xl_param->DocTheoTen('tieude')->giatri;
$motatukhoa = $xl_param->DocTheoTen('motatukhoa')->giatri;
?>