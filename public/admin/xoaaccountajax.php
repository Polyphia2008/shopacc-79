<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");

if (isset($_POST['id'])) {
    if ($CMSNAV->site('status_demo') != 0) {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Không được dùng chức năng này vì đây là trang web demo'
        ]);
        die($data);
    }
    $id = check_string($_POST['id']);
    $row = $CMSNAV->get_row("SELECT * FROM `accounts` WHERE `id` = '$id' ");
    if (!$row) {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'ID accounts không tồn tại trong hệ thống'
        ]);
        die($data);
    }
    $isRemove = $CMSNAV->remove("accounts", " `id` = '$id' ");
    if ($isRemove) {
        $data = json_encode([
            'status'    => 'success',
            'msg'       => 'Xóa người dùng thành công'
        ]);
        die($data);
    }
} else {
    $data = json_encode([
        'status'    => 'error',
        'msg'       => 'Dữ liệu không hợp lệ'
    ]);
    die($data);
}
?>