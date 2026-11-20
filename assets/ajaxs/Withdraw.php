<?php
require_once("../../config/config.php");
require_once("../../config/function.php");

if ($_POST['type'] == 'RUTKIMCUONG') {
    if (empty($_SESSION['username'])) {
        msg_error2("Vui lòng đăng nhập để rút vật phẩm !");
    }
    $id_game = check_string($_POST['id_game']);
    $mk = check_string($_POST['mk']);
    $action = check_string($_POST['action']);
    if ($action == "NULL") {
        msg_error2("Vui lòng chọn gói rút");
    }
    if (empty($id_game)) {
        msg_error2("Vui lòng nhập tài khoản hoặc link gamepass, svv đã set");
    }
    if (empty($mk)) {
        msg_error2("Vui lòng nhập mật khẩu đăng nhập game hoặc link gampass svv đã set");
    }
    if ($action < 100)
    {
        msg_error2("Gói rút không hợp lệ");
    }
    if ($action > $getUser['robux']) {
        msg_error2("Không đủ vật phẩm");
    }
    // Tru kim cuong
    $isDiamond = $CMSNT->tru("users", "robux", $action, " `username` = '" . $getUser['username'] . "' ");
    if ($isDiamond) {
        $isOrder = $CMSNT->insert("orders_withdraw", [
            'username' => $getUser['username'],
            'id_game'   => $id_game,
            'mk'   => $mk,
            'action'    => $action,
            'status' => 'xuly',
            'time'     => time()
        ]);
        if ($isOrder) {
            msg_success("Rút vật phẩm thành công!", BASE_URL("rut-vat-pham/"), 1000);
        } else {
            $CMSNT->cong("users", "robux", $action, " `username` = '" . $getUser['username'] . "' ");
            msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
        }
    } else {
        msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
    }
}
else
{
    exit('PIẾN');
}
