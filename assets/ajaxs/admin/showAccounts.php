<?php
require_once("../../../config/config.php");
require_once("../../../config/function.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = '';
    foreach ($CMSNAV->get_list(" SELECT * FROM `accountsv2` WHERE `trans_id` = '".check_string($_POST['trans_id'])."' ORDER BY id DESC ") as $taikhoan) {
        $data .= $taikhoan['account'].PHP_EOL;
    }
    die($data);
}
