<?php 
    require_once("../../../config/config.php");
    require_once("../../../config/function.php");
    require_once('../../../class/class.smtp.php');
    require_once('../../../class/PHPMailerAutoload.php');
    require_once('../../../class/class.phpmailer.php');
    
    // Login admin
    if($_POST['type'] == 'btnLogin' )
    {
        $email = check_string($_POST['email']);
        $password = TypePassword(check_string($_POST['password']));
        if(empty($email))
        {
            msg_error2("Vui lòng nhập email để đăng nhập admin !");
        }
        if(!$CMSNAV->get_row(" SELECT * FROM `users` WHERE `email` = '$email' AND `level` = 'admin' "))
        {
            msg_error2('Tài khoản này không phải là tài khoản admin');
        }
        if(empty($password))
        {
            msg_error2("Vui lòng nhập mật khẩu để đăng nhập admin !");
        }
        if(getLocation(myip())['country'] != 'VN')
        {
             msg_error2("Vui lòng dùng địa chỉ IP thật để truy cập quản trị !");
        }
        if($CMSNAV->get_row("SELECT * FROM `users` WHERE `email` = '$email' AND `level` = 'NULL' "))
        {
            msg_error2('Tài khoản này không phải là tài khoản admin');
        }
        if(!$CMSNAV->get_row(" SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' "))
        {
            msg_error2('Mật khẩu đăng nhập admin không chính xác');
        }
        $new_token = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6).time());
        $CMSNAV->update("users", [
            'otp' => NULL,
            'token'     => $new_token
        ], " `email` = '$email' ");
        setcookie("token", $new_token, time() + $CMSNAV->site('session_login'), "/");
        $_SESSION['admin_login'] = $new_token;
        msg_success('Đăng nhập thành công ', BASE_URL('Admin/Home'), 0);
    }

