<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
require $_SERVER['DOCUMENT_ROOT'] . '/lib/BiasedRandom/Element.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lib/BiasedRandom/Randomizer.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 1. Kiểm tra login
if(empty($_SESSION['username'])){
    echo json_encode(['status'=>'login']);
    die();
}

// 2. Lấy thông tin user qua CMSNAV
$getUser = $CMSNAV->get_row("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."'");

// 3. Lấy id vòng quay
$id = isset($_POST['id_vongquay']) ? intval($_POST['id_vongquay']) : 0;

// 4. Kiểm tra đã nhận thưởng chưa
$wheels = $CMSNAV->get_row("SELECT * FROM `lichsu_nhanqua` WHERE `username` = '".$getUser['username']."' AND `NA_trathuong` = '1' ");
if($wheels){
    echo json_encode(['status'=>'err','msg'=>"Mỗi người chỉ được nhận 1 lần."]);
    die();
}

// 5. Lấy lượt chưa nhận
$wheel = $CMSNAV->get_row("SELECT * FROM `lichsu_nhanqua` WHERE `username` = '".$getUser['username']."' AND `NA_trathuong` = '0' ");

// 6. Nếu chưa nhận, cộng thưởng và lưu lịch sử
if(empty($wheel)){
    $item = rand(5,10); // số kim cương ngẫu nhiên

    // cộng kim cương
    $CMSNAV->cong("users", "robux", $item, " `username` = '".$getUser['username']."' ");

    // lưu lịch sử nhận quà
    $CMSNAV->insert("lichsu_nhanqua", [
        'username' => $getUser['username'],
        'soluong' => $item,
        'NA_trathuong' => '1',
        'time' => time()
    ]);

    // trả về ajax
    echo json_encode(['status'=>'ok','kimcuong'=>$item]);
} else {
    echo json_encode(['status'=>'err','msg'=>'Bạn đã nhận thưởng trước đó.']);
}
?>
