<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');

    if($_POST['type'] == 'OrderCayThue')
    {
        if(empty($_SESSION['username']))
        {
            msg_error2("Vui lòng đăng nhập để thanh toán !");
        }
        $tk = check_string($_POST['tk']);
        $mk = check_string($_POST['mk']);
        $dichvu = check_string($_POST['dichvu']);
        $ghichu = check_string($_POST['ghichu']);
        $magiamgia = check_string($_POST['magiamgia']);
        if(empty($dichvu))
        {
            msg_error2("Vui lòng chọn gói dịch vụ");
        }
        if(empty($tk))
        {
            msg_error2("Vui lòng nhập tài khoản đăng nhập game");
        }
        if(empty($mk))
        {
            msg_error2("Vui lòng nhập mật khẩu đăng nhập game");
        }
        $group = $CMSNAV->get_row("SELECT * FROM `groups_caythue` WHERE `id` = '$dichvu' ");
        if(!$group['title'])
        {
            msg_error2("Dịch vụ không hợp lệ");
        }
        $sotien = $group['money'];
        if($magiamgia){
             $checkmagiamgia = $CMSNAV->get_row("SELECT * FROM `magiamgia` WHERE `code` = '$magiamgia' AND `solan` > '0'");
            if($checkmagiamgia){
                if($checkmagiamgia['dichvu'] == 'caythue'){
                    $sotien = $group['money'] - ($group['money'] * $checkmagiamgia['giam'] / 100);
                }else{
                     msg_error2("Không có% giảm");
                }
            }else{
                msg_error2("Mã giảm giá của bạn không tồn tại hoặc hết lượt dùng");
                 $sotien = $group['money'] - ($group['money'] * $checkmagiamgia['giam'] / 100);
            }
        }
        if($sotien > $getUser['money'])
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm");
        }
        $isMoney = $CMSNAV->tru("users", "money", $sotien, " `username` = '".$getUser['username']."' ");
        if($isMoney)
        {
            $isOrder = $CMSNAV->insert("orders_caythue", [
                'username' => $getUser['username'],
                'dichvu'   => $group['title'],
                'money'    => $sotien,
                'tk'       => $tk,
                'mk'       => $mk,
                'createdate' => gettime(),
                'updatedate' => gettime(),
                'status'     => 'xuly',
                'ghichu'     => $ghichu,
                'reason'     => $CMSNAV->site('note_admin')
            ]);
            if($isOrder)
            {
                /* GHI LOG DÒNG TIỀN */
                $CMSNAV->insert("dongtien", array(
                    'sotientruoc'   => $getUser['money'] ,
                    'sotienthaydoi' =>$sotien,
                    'sotiensau'     => $getUser['money'] - $sotien,
                    'thoigian'      => gettime(),
                    'noidung'       => 'Đặt hàng gói ('.$group['title'].')',
                    'username'      => $getUser['username']
                ));
                $CMSNAV->tru("magiamgia", "solan", '1', " `code` = '".$magiamgia."' ");
                $resone = 'Đặt hàng gói ('.$group['title'].')';
                webhookcaythue($resone, $getUser['username'], $ghichu);
                // /* XỬ LÝ HOA HỒNG CHO CTV */
                    if($CMSNAV->site('status_ref_dichvu') == 'ON')
                    {
                        if($getUser['ref'] != NULL)
                        {
                            $getRef = $CMSNAV->get_row("SELECT * FROM `users` WHERE `id` = '".$getUser['ref']."' ");
                            if($getRef)
                            {
                                $hoahong = $sotien * $CMSNAV->site('ck_ref') / 100;
                                /* CỘNG HOA HỒNG */
                                $CMSNAV->cong("users", "money_hoahong	", $hoahong, " `username` = '".$getRef['username']."' ");
                                /* CẬP NHẬT DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $getRef['money_hoahong	'],
                                    'sotienthaydoi' => $hoahong,
                                    'sotiensau' => $getRef['money_hoahong	'] + $hoahong,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Hoa hồng từ bạn bè ('.$getUser['username'].')',
                                    'username' => $getRef['username']
                                ));
                            }
                        }
                    }
                msg_success("Thanh toán thành công!", (""), 1000);
            }
            else
            {
                $CMSNAV->cong("users", "money", $sotien, " `username` = '".$getUser['username']."' ");
                msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
            }
        }
        else
        {
            msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
        }
    }
    if($_POST['type'] == 'OrderGpass')
    {
        if(empty($_SESSION['username']))
        {
            msg_error2("Vui lòng đăng nhập để thanh toán !");
        }
        $tk = check_string($_POST['tk']);
        $mk = check_string($_POST['mk']);
        $dichvu = check_string($_POST['dichvu']);
        $ghichu = check_string($_POST['ghichu']);
        $magiamgia = check_string($_POST['magiamgia']);
        if(empty($dichvu))
        {
            msg_error2("Vui lòng chọn gói dịch vụ");
        }
        if(empty($tk))
        {
            msg_error2("Vui lòng nhập tài khoản đăng nhập game");
        }
        if(empty($mk))
        {
            msg_error2("Vui lòng nhập mật khẩu đăng nhập game");
        }
        $group = $CMSNAV->get_row("SELECT * FROM `groups_gamepass` WHERE `id` = '$dichvu' ");
        if(!$group['title'])
        {
            msg_error2("Dịch vụ không hợp lệ");
        }
        $sotien = $group['money'];
        $sorobux = $group['robux'];
        if($magiamgia){
             $checkmagiamgia = $CMSNAV->get_row("SELECT * FROM `magiamgia` WHERE `code` = '$magiamgia' AND `solan` > '0'");
            if($checkmagiamgia){
                if($checkmagiamgia['dichvu'] == 'gamepass'){
                    $sotien = $group['money'] - ($group['money'] * $checkmagiamgia['giam'] / 100);
                }else{
                     msg_error2("Không có% giảm");
                }
            }else{
                msg_error2("Mã giảm giá của bạn không tồn tại hoặc hết lượt dùng");
                 $sotien = $group['money'] - ($group['money'] * $checkmagiamgia['giam'] / 100);
            }
        }
        if($sotien > $getUser['money'])
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm");
        }
        $isMoney = $CMSNAV->tru("users", "money", $sotien, " `username` = '".$getUser['username']."' ");
        if($isMoney)
        {
            $isOrder = $CMSNAV->insert("orders_gamepass", [
                'username' => $getUser['username'],
                'dichvu'   => $group['title'],
                'money'    => $sotien,
                'robux'    => $sorobux,
                'tk'       => $tk,
                'mk'       => $mk,
                'createdate' => gettime(),
                'updatedate' => gettime(),
                'status'     => 'xuly',
                'ghichu'     => $ghichu,
                'reason'     => $CMSNAV->site('note_admin')
            ]);
            if($isOrder)
            {
                /* GHI LOG DÒNG TIỀN */
                $CMSNAV->insert("dongtien", array(
                    'sotientruoc'   => $getUser['money'] ,
                    'sotienthaydoi' =>$sotien,
                    'sotiensau'     => $getUser['money'] - $sotien,
                    'thoigian'      => gettime(),
                    'noidung'       => 'Đặt hàng gói ('.$group['title'].')',
                    'username'      => $getUser['username']
                ));
                $CMSNAV->tru("magiamgia", "solan", '1', " `code` = '".$magiamgia."' ");
                $resone = 'Đặt hàng gói ('.$group['title'].')';
                webhookgamepass($resone, $getUser['username'], $ghichu);
                //  XỬ LÝ HOA HỒNG CHO CTV
                    if($CMSNAV->site('status_ref_dichvu') == 'ON')
                    {
                        if($getUser['ref'] != NULL)
                        {
                            $getRef = $CMSNAV->get_row("SELECT * FROM `users` WHERE `id` = '".$getUser['ref']."' ");
                            if($getRef)
                            {
                                $hoahong = $sotien * $CMSNAV->site('ck_ref') / 100;
                                /* CỘNG HOA HỒNG */
                                $CMSNAV->cong("users", "money", $hoahong, " `username` = '".$getRef['username']."' ");


                                /* CẬP NHẬT DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $getRef['money'],
                                    'sotienthaydoi' => $hoahong,
                                    'sotiensau' => $getRef['money'] + $hoahong,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Hoa hồng từ bạn bè ('.$getUser['username'].')',
                                    'username' => $getRef['username']
                                ));
                            }
                        }
                    }
                msg_success("Thanh toán thành công!", (""), 1000);
            }
            else
            {
                $CMSNAV->cong("users", "money", $sotien, " `username` = '".$getUser['username']."' ");
                msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
            }
        }
        else
        {
            msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
        }
    }
    if($_POST['type'] == 'OrderRobux')
    {
        if(empty($_SESSION['username']))
        {
            msg_error2("Vui lòng đăng nhập để thanh toán !");
        }
        $tk = check_string($_POST['tk']);
        $mk = check_string($_POST['mk']);
        $dichvu = check_string($_POST['dichvu']);
        $ghichu = check_string($_POST['ghichu']);
        $magiamgia = check_string($_POST['magiamgia']);
        if(empty($dichvu))
        {
            msg_error2("Vui lòng chọn gói dịch vụ");
        }
        if(empty($tk))
        {
            msg_error2("Vui lòng nhập tài khoản đăng nhập game");
        }
        if(empty($mk))
        {
            msg_error2("Vui lòng nhập mật khẩu đăng nhập game");
        }
        $group = $CMSNAV->get_row("SELECT * FROM `groups_robux` WHERE `id` = '$dichvu' ");
        if(!$group['title'])
        {
            msg_error2("Dịch vụ không hợp lệ");
        }
        $sotien = $group['money'];
        $sorobux = $group['robux'];
        if($magiamgia){
             $checkmagiamgia = $CMSNAV->get_row("SELECT * FROM `magiamgia` WHERE `code` = '$magiamgia' AND `solan` > '0'");
            if($checkmagiamgia){
                if($checkmagiamgia['dichvu'] == 'robux'){
                    $sotien = $group['money'] - ($group['money'] * $checkmagiamgia['giam'] / 100);
                }else{
                     msg_error2("Không có% giảm");
                }
            }else{
                msg_error2("Mã giảm giá của bạn không tồn tại hoặc hết lượt dùng");
                 $sotien = $group['money'] - ($group['money'] * $checkmagiamgia['giam'] / 100);
            }
        }
        if($sotien > $getUser['money'])
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm");
        }
        $isMoney = $CMSNAV->tru("users", "money", $sotien, " `username` = '".$getUser['username']."' ");
        if($isMoney)
        {
            $isOrder = $CMSNAV->insert("orders_robux", [
                'username' => $getUser['username'],
                'dichvu'   => $group['title'],
                'money'    => $sotien,
                'robux'    => $sorobux,
                'tk'       => $tk,
                'mk'       => $mk,
                'createdate' => gettime(),
                'updatedate' => gettime(),
                'status'     => 'xuly',
                'ghichu'     => $ghichu,
                'reason'     => $CMSNAV->site('note_admin')
            ]);
            if($isOrder)
            {
                /* GHI LOG DÒNG TIỀN */
                $CMSNAV->insert("dongtien", array(
                    'sotientruoc'   => $getUser['money'] ,
                    'sotienthaydoi' =>$sotien,
                    'sotiensau'     => $getUser['money'] - $sotien,
                    'thoigian'      => gettime(),
                    'noidung'       => 'Đặt hàng gói ('.$group['title'].')',
                    'username'      => $getUser['username']
                ));
                $CMSNAV->tru("magiamgia", "solan", '1', " `code` = '".$magiamgia."' ");
                $resone = 'Đặt hàng gói ('.$group['title'].')';
                webhookrobux($resone, $getUser['username'], $ghichu);
                // * XỬ LÝ HOA HỒNG CHO CTV */
                    if($CMSNAV->site('status_ref_dichvu') == 'ON')
                    {
                        if($getUser['ref'] != NULL)
                        {
                            $getRef = $CMSNAV->get_row("SELECT * FROM `users` WHERE `id` = '".$getUser['ref']."' ");
                            if($getRef)
                            {
                                $hoahong = $sotien * $CMSNAV->site('ck_ref') / 100;
                                /* CỘNG HOA HỒNG */
                                $CMSNAV->cong("users", "money", $hoahong, " `username` = '".$getRef['username']."' ");


                                /* CẬP NHẬT DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $getRef['money'],
                                    'sotienthaydoi' => $hoahong,
                                    'sotiensau' => $getRef['money'] + $hoahong,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Hoa hồng từ bạn bè ('.$getUser['username'].')',
                                    'username' => $getRef['username']
                                ));
                            }
                        }
                    }
                msg_success("Thanh toán thành công!", (""), 1000);
            }
            else
            {
                $CMSNAV->cong("users", "money", $sotien, " `username` = '".$getUser['username']."' ");
                msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
            }
        }
        else
        {
            msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
        }
    }
     if($_POST['type'] == 'OrderRobuxV2')
    {
        if(empty($_SESSION['username']))
        {
            msg_error2("Vui lòng đăng nhập để thanh toán !");
        }
        $tk = check_string($_POST['tk']);
        $mk = check_string($_POST['mk']);
        $ghichu = check_string($_POST['ghichu']);
        $magiamgia = check_string($_POST['magiamgia']);
        $money = check_string($_POST['money']);
        $sorb = check_string($_POST['sorb']);
        
        if(empty($sorb))
        {
            msg_error2("Vui lòng nhập số robux");
        }
        if($sorb < 10)
        {
            msg_error2("Số robux tối thiếu mua được là 10R$");
        }
        if(empty($tk))
        {
            msg_error2("Vui lòng nhập tài khoản đăng nhập game");
        }
        if(empty($mk))
        {
            msg_error2("Vui lòng nhập mật khẩu đăng nhập game");
        }
        if($money > $getUser['money'])
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm");
        }
        $sotien = $money;
        if($magiamgia){
             $checkmagiamgia = $CMSNAV->get_row("SELECT * FROM `magiamgia` WHERE `code` = '$magiamgia' AND `solan` > '0'");
            if($checkmagiamgia){
                if($checkmagiamgia['dichvu'] == 'robux'){
                    $sotien = $money - ($money * $checkmagiamgia['giam'] / 100);
                }else{
                     msg_error2("Không có % giảm");
                }
            }else{
                msg_error2("Mã giảm giá của bạn không tồn tại hoặc hết lượt dùng");
                 $sotien = $money - ($money * $checkmagiamgia['giam'] / 100);
            }
        }
        $isMoney = $CMSNAV->tru("users", "money", $money, " `username` = '".$getUser['username']."' ");
        if($isMoney)
        {
            $isOrder = $CMSNAV->insert("orders_robux", [
                'username' => $getUser['username'],
                'dichvu'   => round(+$sorb).'R$',
                'money'    => $money,
                'robux'    => round(+$sorb),
                'tk'       => $tk,
                'mk'       => $mk,
                'createdate' => gettime(),
                'updatedate' => gettime(),
                'status'     => 'xuly',
                'ghichu'     => $ghichu,
                'reason'     => $CMSNAV->site('note_admin')
            ]);
            if($isOrder)
            {
                /* GHI LOG DÒNG TIỀN */
                $CMSNAV->insert("dongtien", array(
                    'sotientruoc'   => $getUser['money'] + $money,
                    'sotienthaydoi' => $money,
                    'sotiensau'     => $getUser['money'],
                    'thoigian'      => gettime(),
                    'noidung'       => 'Đặt hàng gói ('.round(+$sorb / 0.7).') R$',
                    'username'      => $getUser['username']
                ));
                $CMSNAV->tru("magiamgia", "solan", '1', " `code` = '".$magiamgia."' ");
                // * XỬ LÝ HOA HỒNG CHO CTV */
                    if($CMSNAV->site('status_ref_dichvu') == 'ON')
                    {
                        if($getUser['ref'] != NULL)
                        {
                            $getRef = $CMSNAV->get_row("SELECT * FROM `users` WHERE `id` = '".$getUser['ref']."' ");
                            if($getRef)
                            {
                                $hoahong = $sotien * $CMSNAV->site('ck_ref') / 100;
                                /* CỘNG HOA HỒNG */
                                $CMSNAV->cong("users", "money", $hoahong, " `username` = '".$getRef['username']."' ");


                                /* CẬP NHẬT DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $getRef['money'],
                                    'sotienthaydoi' => $hoahong,
                                    'sotiensau' => $getRef['money'] + $hoahong,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Hoa hồng từ bạn bè ('.$getUser['username'].')',
                                    'username' => $getRef['username']
                                ));
                            }
                        }
                    }
                $resone = 'Đặt hàng gói ('.round(+$sorb / 0.7).') R$';
                webhookrobux($resone, $getUser['username'], $ghichu);
                msg_success("Thanh toán thành công!", (""), 1000);
            }
            else
            {
                $CMSNAV->cong("users", "money", $money, " `username` = '".$getUser['username']."' ");
                msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
            }
        }
        else
        {
            msg_error2("Không thể xử lý giao dịch, vui lòng thử lại");
        }
    }