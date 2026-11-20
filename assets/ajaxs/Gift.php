<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
require $_SERVER['DOCUMENT_ROOT'] . '/lib/BiasedRandom/Element.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lib/BiasedRandom/Randomizer.php';
$id = intval($_POST['id_vongquay']);
$item = rand(5,10);

$CMSNAV->cong("users", "robux", $item, " `username` = '".$getUser['username']."' ");
    /* CỘNG LƯỢT QUAY */
if (empty($_SESSION['username'])){
    echo json_encode(array('status' => 'login'));

    
    die();
}

        
$wheels = $CMSNAV->get_row("SELECT * FROM `lichsu_nhanqua` WHERE `username` = '".$getUser['username']."' AND `NA_trathuong` = '1' ");
if($wheels['username'] != NULL)
{
            msg_error2("Mỗi người chỉ được nhận 1 lần.");
}

$wheel = $CMSNAV->get_row("SELECT * FROM `lichsu_nhanqua` WHERE `username` = '".$getUser['username']."' AND `NA_trathuong` = '0' ");

if(empty($wheel)){

$CMSNAV->insert("lichsu_nhanqua", array(
    'username'  => $getUser['username'],
    'soluong'   => $item,
    'NA_trathuong'=>'1',
    'time'      => time()
));



// Xuất thông báo
echo json_encode(array('status' => 'ok', 'kimcuong' => $item));
}