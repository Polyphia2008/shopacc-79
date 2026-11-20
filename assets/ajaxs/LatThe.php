<?php 
require_once("../../config/config.php");
require_once("../../config/function.php");

if (session_status() === PHP_SESSION_NONE) session_start();

function json_response($status, $msg, $img = null, $pos = null) {
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'msg' => $msg, 'img' => $img, 'pos' => $pos]);
    exit;
}

$id = isset($_POST['id_latthe']) ? intval($_POST['id_latthe']) : 0;
if ($id <= 0) json_response(0, 'Thiếu ID lật thẻ!');
if (empty($_SESSION['username'])) json_response(0, 'Bạn cần đăng nhập để chơi!');

$getUser = $CMSNAV->get_row("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
$row = $CMSNAV->get_row("SELECT * FROM `setting_latthe` WHERE `id` = '$id'");

if (!$row) json_response(0, 'Không tìm thấy cấu hình lật thẻ!');
if ($row['giatien'] > $getUser['money']) json_response(0, 'Bạn không đủ tiền để chơi!');

require $_SERVER['DOCUMENT_ROOT'] . '/assets/ajaxs/BiasedRandom/Element.php';
require $_SERVER['DOCUMENT_ROOT'] . '/assets/ajaxs/BiasedRandom/Randomizer.php';

$randomizer = new Randomizer();
for ($i = 1; $i <= 14; $i++) {
    if (isset($row["item_$i"])) {
        $randomizer->add(new Element("$i", $row["item_$i"]));
    }
}

// ✅ Nếu có ô nào = 100%, ưu tiên ô đó
$vongquay = 0;
for ($i = 1; $i <= 14; $i++) {
    if (isset($row["item_$i"]) && intval($row["item_$i"]) >= 100) {
        $vongquay = $i;
        break;
    }
}

// Nếu không có ô nào 100%, random theo tỷ lệ
if ($vongquay == 0) {
    $vongquay = intval($randomizer->get());
}

// Lấy thông tin phần thưởng
$img = $row["imglatthe_{$vongquay}"];
$gift = $row["textlatthe_{$vongquay}"];
$kimcuong = $row["robuxlatthe_{$vongquay}"];

// Trừ tiền, cộng thưởng
$CMSNAV->tru("users", "money", $row['giatien'], " `username` = '".$getUser['username']."' ");
$CMSNAV->cong("users", "robux", $kimcuong, " `username` = '".$getUser['username']."' ");
$CMSNAV->cong("setting_latthe", "luotdaquay", 1, " `id` = '$id' ");

$CMSNAV->insert("dongtien", [
    'sotientruoc'   => $getUser['money'],
    'sotienthaydoi' => $row['giatien'],
    'sotiensau'     => $getUser['money'] - $row['giatien'],
    'thoigian'      => gettime(),
    'noidung'       => 'Chơi MiniGame Lật Thẻ',
    'username'      => $getUser['username']
]);

// Trả kết quả + vị trí thẻ để JS highlight đúng ô
json_response(1, $gift, $img, $vongquay);
