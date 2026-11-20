<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");

if (isset($_POST['id'])) {
    $id = check_string($_POST['id']);
    if (!$row = $CMSNAV->get_row("SELECT * FROM `admin_ip` WHERE `id` = '$id' ")) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'ID không tồn tại trong hệ thống'
        ]));
    }
    $isRemove = $CMSNAV->remove("admin_ip", " `id` = '$id' ");
    if ($isRemove) {
       
        $data = json_encode([
            'status'    => 'success',
            'msg'       => 'Xóa thành công'
        ]);
        die($data);
    }
}
?>