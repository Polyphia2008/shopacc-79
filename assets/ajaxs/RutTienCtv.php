<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');

 
    if($_POST['type'] == 'XoaListBank')
    {
        $id = check_string($_POST['id']);
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập để tiếp tục !", BASE_URL("Auth/Login"), 2000);
        }
        if(empty($id))
        {
            msg_error2("Ngân hàng không tồn tại");
        }
        $CMSNAV->remove("listbank", " `id` = '$id' ");
        msg_success("Xóa thành công !", "", 500);
    }
    if($_POST['type'] == 'ThemNganHang')
    {
        $nganhang = check_string($_POST['nganhang']);
        $sotaikhoan = check_string($_POST['sotaikhoan']);
        $chutaikhoan = check_string($_POST['chutaikhoan']);
        $chinhanh = check_string($_POST['chinhanh']);

        
        if(empty($nganhang))
        {
            msg_error2("Vui lòng chọn ngân hàng");
        }
        if(empty($sotaikhoan))
        {
            msg_error2("Vui lòng nhập số tài khoản");
        }
        if(empty($chutaikhoan))
        {
            msg_error2("Vui lòng nhập tên chủ tài khoản");
        }
        if($CMSNAV->get_row(" SELECT * FROM `listbank` WHERE `username` = '".$getUser['username']."' AND `sotaikhoan` = '$sotaikhoan' AND `nganhang` = '$nganhang' "))
        {
            msg_error2("Bạn đã thêm ngân hàng này rồi");
        }
        $insert = $CMSNAV->insert("listbank", [
            'nganhang'      => $nganhang,
            'sotaikhoan'    => $sotaikhoan,
            'chutaikhoan'   => $chutaikhoan,
            'chinhanh'      => $chinhanh,
            'username'      => $getUser['username']
        ]);

        if($insert)
        {
            msg_success2("Thêm ngân hàng thành công !");
        }
        else
        {
            msg_error2("Vui lòng thử lại");
        }
    }

    if($_POST['type'] == 'Withdraw' )
    {
        $sotien = check_string($_POST['sotien']);
        $listbank = check_string($_POST['listbank']);
        $time_now = date("d/m/Y - h:i:s");
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập để tiếp tục !", BASE_URL("Auth/Login"), 2000);
        }
        if($sotien <= 0)
        {
            msg_error2("Vui lòng nhập số tiền hợp lệ !");
        }
        if(empty($listbank))
        {
            msg_error2("Vui lòng chọn ngân hàng cần rút về !");
        }
        $bank = $CMSNAV->get_row(" SELECT * FROM `listbank` WHERE `id` = '$listbank' AND `username` = '".$getUser['username']."' ");
        if(!$bank)
        {
            msg_error2("Ngân hàng không hợp lệ !");
        }
        if($getUser['ref_money'] < $sotien)
        {
            msg_error2("Số dư của bạn không có nhiều như thế !");
        }
        $isref_money = $CMSNAV->tru("users", "ref_money", $sotien, " `username` = '".$getUser['username']."' ");
        if($isref_money)
        {
            // phát hiện bug thì khoá tài khoản + huỷ lệnh rút tiền đang đợi xử lý
            if($CMSNAV->get_row("SELECT * FROM `users` WHERE `username` = '".$getUser['username']."' ")['ref_money'] < 0)
            {
                // huỷ rút tiền
                $CMSNAV->update("ruttien", [
                    'trangthai' => 'huy',
                    'ghichu'    => 'Anti Cheat Bug'
                ], " `trangthai` = 'xuly' AND `username` = '".$getUser['username']."'  ");
                // khoá tài khoản
                $CMSNAV->update("users", [
                    'banned'    => 1,
                    'reason_banned' => '[Anti Cheat] Bug rút tiền'
                ], " `username` = '".$getUser['username']."' ");
                msg_error2("Phát hiện hành vi gian lận.");
            }
            /* CẬP NHẬT DÒNG TIỀN */
            $CMSNAV->insert("dongtien", array(
                'sotientruoc'   => $getUser['ref_money'],
                'sotienthaydoi' => $sotien,
                'sotiensau'     => $getUser['ref_money'] - $sotien,
                'thoigian'      => gettime(),
                'noidung'       => 'Rút tiền về ngân hàng ('.$bank['nganhang'].' | '.$bank['sotaikhoan'].')',
                'username'      => $getUser['username']
            ));
            $CMSNAV->insert("ruttien", [
                'magd'          => random('QWERTYUIOPASDFGHJKZXCVBNM', 2).time(),
                'username'      => $getUser['username'],
                'sotien'        => $sotien - $total_phi,
                'thanhtoan'     => $sotien,
                'nganhang'      => $bank['nganhang'],
                'sotaikhoan'    => $bank['sotaikhoan'],
                'chutaikhoan'   => $bank['chutaikhoan'],
                'chinhanh'      => $bank['chinhanh'],
                'noidung'       => check_string($_POST['noidung']),
                'thoigian'      => gettime(),
                'trangthai'     => 'xuly'
            ]);
            $total_withdraw = format_cash($sotien-$total_phi);
            if($CMSNAV->site('status_bot_tele') == 'ON'){
            sendTele(templateTele($getUser['username']." tạo yêu cầu rút ".$total_withdraw."đ qua ".$bank['nganhang']));
            }
            msg_success2("Rút tiền thành công, vui lòng đợi xử lý trong vài giây !");

        }
        else
        {
            msg_error2("Vui lòng thao tác lại !");
        }
    }