<?php
require_once($_SERVER['DOCUMENT_ROOT']."/config/config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/config/function.php");

if(!isset($_GET['slug'])) die("mua code tạo topie.vn");

$slug = check_string($_GET['slug']);

/* tìm trong bảng mini_game */
$mini = $CMSNAV->get_row("SELECT * FROM mini_game WHERE slug='$slug'");
if($mini){
    $_GET['id'] = $mini['id'];
    require($_SERVER['DOCUMENT_ROOT']."/public/client/Wheel.php");  // FIX CHUẨN
    exit;
}

/* tìm trong bảng lật thẻ */
$latthe = $CMSNAV->get_row("SELECT * FROM setting_latthe WHERE slug='$slug'");
if($latthe){
    $_GET['id'] = $latthe['id'];
    require($_SERVER['DOCUMENT_ROOT']."/public/client/LatThe.php"); // FIX CHUẨN
    exit;
}

header("HTTP/1.0 404 Not Found");
require($_SERVER['DOCUMENT_ROOT']."/public/404/index.php");
exit;

