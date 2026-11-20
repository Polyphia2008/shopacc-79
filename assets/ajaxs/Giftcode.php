<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');
    require_once('../../class/class.php');
    
    
    if($_POST['type'] == 'nhangiftcode' )
    {
        $code = check_string($_POST['code']);
        $vu = $CMSNAV->get_row("SELECT * FROM `giftcode` WHERE `code` = '$code' ");
        $query_log = $CMSNAV->query("SELECT * FROM log_giftcode WHERE code = '$code' AND username = '".$getUser['username']."' ");
        if(empty($code))
        {
            admin_msg_error('Vui lòng nhập Giftcode !', '', 500);
        }
        if(!$CMSNAV->get_row(" SELECT * FROM `giftcode` WHERE `code` = '$code' "))
        {
            admin_msg_error('Giftcode không tồn tại trong hệ thống !', '', 500);
        }
        if($vu['dieukien'] > $getUser['total_money'])
        {
            admin_msg_error('Bạn không đủ điều kiện sử dụng Giftcode này !', '', 500);
        }
        if($vu['soluong'] <= $vu['sudung'])
        {
            admin_msg_error('Giftcode đã hết lượt sử dụng !', '', 500);
        }
        if($query_log->num_rows != 0)
        {
            admin_msg_error("Bạn đã sử dụng Giftcode này rồi !", '', 500);
        }
        
        if ($vu['loai'] == 'money'){
        // Cộng tiền
        $CMSNAV->update("users", [
            'money' => $getUser['money'] + $vu['sovatpham']
        ], " `username` = '".$getUser['username']."' ");

        /* GHI LOG DÒNG TIỀN */
        $CMSNAV->insert("dongtien", array(
            'sotientruoc'   => $getUser['money'],
            'sotienthaydoi' => $vu['sovatpham'],
            'sotiensau'     => $getUser['money'] + $vu['sovatpham'],
            'thoigian'      => gettime(),
            'noidung'       => 'Nhận Giftcode nhận tiền ('.$vu['code'].')',
            'username'      => $getUser['username']
        ));
        }elseif ($vu['loai'] == 'robux'){
           $CMSNAV->update("users", [
            'robux' => $getUser['robux'] + $vu['sovatpham']
        ], " `username` = '".$getUser['username']."' ");

        /* GHI LOG DÒNG TIỀN */
        $CMSNAV->insert("dongtien", array(
            'sotientruoc'   => $getUser['robux'],
            'sotienthaydoi' => $vu['sovatpham'],
            'sotiensau'     => $getUser['robux'] + $vu['sovatpham'],
            'thoigian'      => gettime(),
            'noidung'       => 'Nhận Giftcode nhận robux ('.$vu['code'].')',
            'username'      => $getUser['username']
        ));

        }
        
    
        
        $create = $CMSNAV->insert("log_giftcode", [
            'username'      => $getUser['username'],
            'code'          => $code,
            'sovatpham'     => $vu['sovatpham'],
            'createdate'    => gettime(),
            'loai'          => $vu['loai']
        ]);
        if ($create)
        { 
            $CMSNAV->cong("giftcode", "sudung", 1, " `code` = '$code' ");
            admin_msg_success('Nhận Giftcode thành công', BASE_URL('users/giftcode'), 1000);
        }
        else
        {
            admin_msg_error('Lỗi Hãy Liên Hệ Admin!', '', 500);
        }
    }
 ?>