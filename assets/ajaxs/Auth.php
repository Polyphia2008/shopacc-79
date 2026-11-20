<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    
    if($_POST['type'] == 'Login' ) {
    verifyRecaptcha(); // ✅ Thêm kiểm tra reCAPTCHA
     

        $username = check_string($_POST['username']);
        $password = TypePassword(check_string($_POST['password']));
        if(empty($username))
        {
            msg_error2("Vui lòng nhập tên đăng nhập !");
        }
        if(!$CMSNAV->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            msg_error2('Tên đăng nhập không tồn tại');
        }
        if(empty($password))
        {
            msg_error2("Vui lòng nhập mật khẩu !");
        }
        if($CMSNAV->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `banned` = '1' "))
        {
            msg_error2('Tài khoản này đã bị khóa');
        }
        if(!$CMSNAV->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' "))
        {
            msg_error2('Mật khẩu đăng nhập không chính xác');
        }
        $CMSNAV->update("users", [
            'otp' => NULL
        ], " `username` = '$username' ");
        $_SESSION['username'] = $username;

        $getUser = $CMSNAV->get_row("SELECT * FROM `users` WHERE `username` = '$username'");

        $CMSNAV->insert("logs", [
        'user_id'     => $getUser['id'],
        'ip'          => myip(),
        'device'      => $_SERVER['HTTP_USER_AGENT'],
        'create_date' => gettime(),
        'action'      => 'Đăng nhập thành công vào hệ thống'
    ]);

        msg_success('Đăng nhập thành công ', BASE_URL(''), 1000);
    }

    if($_POST['type'] == 'Registermb' ) {
        verifyRecaptcha();
        $username = check_string($_POST['username']);
        // $email = check_string($_POST['email']);
        $password = check_string($_POST['password']);
        $repassword = check_string($_POST['repassword']);
        if(empty($username))
        {
            msg_error2("Vui lòng nhập tên tài khoản !");
        }
        if(check_username($username) != True)
        {
            msg_error2('Vui lòng nhập định dạng tài khoản hợp lệ');
        }
        if(strlen($username) < 5 || strlen($username) > 64)
        {
            msg_error2('Tài khoản phải từ 5 đến 64 ký tự');
        }
        if($CMSNAV->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            msg_error2('Tên đăng nhập đã tồn tại!');
        }
        // if(empty($email))
        // {
        //     msg_error2("Vui lòng nhập địa chỉ email !");
        // }
        // if($CMSNAV->get_row(" SELECT * FROM `users` WHERE `email` = '$email' "))
        // {
        //     msg_error2('Email đã tồn tại!');
        // }
        if(empty($password))
        {
            msg_error2("Vui lòng nhập mật khẩu !");
        }
        if(strlen($password) < 3)
        {
            msg_error2('Vui lòng đặt mật khẩu trên 3 ký tự');
        }
        if($password != $repassword)
        {
            msg_error2('Nhập lại mật khẩu không đúng');
        }
        if($CMSNAV->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") > 3)
        {
            msg_error2('Bạn đã đạt giới hạn tạo tài khoản');
        }
        $create = $CMSNAV->insert("users", [
            'username'      => $username,
            'password'      => TypePassword($password),
            'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
            'money'         => 0,
            'robux'         => 0,
            'level'         => 'thanhvien',
            'banned'        => 0,
            // 'email'         => $email,
            'otp'           => 0,
            'ip'            => myip(),
            'time'          => time(),
            'total_money'   => 0,
            'money_hoahong' => 0,
            'createdate'    => gettime(),
            'ref_click'     => 0,
            'ref'           => $_SESSION['ref'],
            'ctv'           => 0,
            'ctvrobux'      => 0,
            'ctvacc'        => 0,
            'ctvgpass'      => 0
        ]);
        if ($create)
        {   
            $_SESSION['username'] = $username;

            $CMSNAV->insert("logs", [
        'user_id'     => $getUser['id'],
        'ip'          => myip(),
        'device'      => $_SERVER['HTTP_USER_AGENT'],
        'create_date' => gettime(),
        'action'      => 'Đăng ký tài khoản thành công'
    ]);

            msg_success('Tạo tài khoản thành công', BASE_URL(''), 1000);
        }
        else
        {
            msg_error2('Lỗi Hãy Liên Hệ Admin!');
        }
    }
if($_POST['type'] == 'Register' ){
    verifyRecaptcha();
       
        $username = check_string($_POST['username']);
        // $email = check_string($_POST['email']);
        $password = check_string($_POST['password']);
        $repassword = check_string($_POST['repassword']);
        if(empty($username))
        {
            msg_error2("Vui lòng nhập tên tài khoản !");
        }
        if(check_username($username) != True)
        {
            msg_error2('Vui lòng nhập định dạng tài khoản hợp lệ');
        }
        if(strlen($username) < 5 || strlen($username) > 64)
        {
            msg_error2('Tài khoản phải từ 5 đến 64 ký tự');
        }
        if($CMSNAV->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            msg_error2('Tên đăng nhập đã tồn tại!');
        }
        // if(empty($email))
        // {
        //     msg_error2("Vui lòng nhập địa chỉ email !");
        // }
        // if($CMSNAV->get_row(" SELECT * FROM `users` WHERE `email` = '$email' "))
        // {
        //     msg_error2('Email đã tồn tại!');
        // }
        if(empty($password))
        {
            msg_error2("Vui lòng nhập mật khẩu !");
        }
        if(strlen($password) < 3)
        {
            msg_error2('Vui lòng đặt mật khẩu trên 3 ký tự');
        }
        if($password != $repassword)
        {
            msg_error2('Nhập lại mật khẩu không đúng');
        }
        if($CMSNAV->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") > 3)
        {
            msg_error2('Bạn đã đạt giới hạn tạo tài khoản');
        }
        $create = $CMSNAV->insert("users", [
            'username'      => $username,
            'password'      => TypePassword($password),
            'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
            'money'         => 0,
            'robux'         => 0,
            'level'         => 'thanhvien',
            'banned'        => 0,
            // 'email'         => $email,
            'otp'           => 0,
            'ip'            => myip(),
            'time'          => time(),
            'total_money'   => 0,
            'money_hoahong' => 0,
            'createdate'    => gettime(),
            'ref_click'     => 0,
            'ref'           => $_SESSION['ref'],
            'ctv'           => 0,
            'ctvrobux'      => 0,
            'ctvacc'        => 0,
            'ctvgpass'      => 0
        ]);
        if ($create)
        {   
            $_SESSION['username'] = $username;
            msg_success('Tạo tài khoản thành công', BASE_URL(''), 1000);
        }
        else
        {
            msg_error2('Lỗi Hãy Liên Hệ Admin!');
        }
    }
    if($_POST['type'] == 'ChangePassword'){
        
        $otp = check_string($_POST['otp']);
        $repassword = check_string($_POST['repassword']);
        $password = check_string($_POST['password']);
        if(empty($otp))
        {
            msg_error2("Bạn chưa nhập OTP");
        }
        if(empty($password))
        {
            msg_error2("Bạn chưa nhập mật khẩu mới");
        }
        if(empty($repassword))
        {
            msg_error2("Vui lòng xác minh lại mật khẩu");
        }
        if(isset($_SESSION['countVeri']))
        {
            if($_SESSION['countVeri'] >= 3)
            {
                msg_error2("Chức năng này tạm khóa");
            }
        }
        else
        {
            $_SESSION['countVeri'] = 0;
        }
        $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `otp` = '$otp' ");
        if(!$row)
        {
            $_SESSION['countVeri'] = $_SESSION['countVeri'] + 1;
            msg_error2("OTP không tồn tại trong hệ thống");
        }
        if($password != $repassword)
        {
            msg_error2("Nhập lại mật khẩu không đúng");
        }
        if(strlen($password) < 5)
        {
            msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
        }
        $CMSNAV->update("users", [
            'otp' => NULL,
            'password' => TypePassword($password)
        ], " `id` = '".$row['id']."' ");
    
        msg_success("Mật khẩu của bạn đã được thay đổi thành công !", BASE_URL(''), 1000);
    }

    if($_POST['type'] == 'DoiMatKhau'){
        verifyRecaptcha();
        if($CMSNAV->site('status_demo') == 'ON')
        {
            msg_error2("Chức năng này không khả dụng trên trang web DEMO!");
        }
        $repassword = check_string($_POST['repassword']);
        $password = check_string($_POST['password']);
        if(empty($password))
        {
            msg_error2("Bạn chưa nhập mật khẩu mới");
        }
        if(empty($repassword))
        {
            msg_error2("Vui lòng xác minh lại mật khẩu");
        }
        if($password != $repassword)
        {
            msg_error2("Nhập lại mật khẩu không đúng");
        }
        if(strlen($password) < 5)
        {
            msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
        }
        $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if(!$row)
        {
            msg_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
        }
        $CMSNAV->update("users", [
            'otp' => NULL,
            'password' => TypePassword($password)
        ], " `id` = '".$row['id']."' ");

        $CMSNAV->insert("logs", [
        'user_id'     => $getUser['id'],
        'ip'          => myip(),
        'device'      => $_SERVER['HTTP_USER_AGENT'],
        'create_date' => gettime(),
        'action'      => 'Đổi mật khẩu thành công'
    ]);

        msg_success("Mật khẩu của bạn đã được thay đổi thành công !", BASE_URL(''), 1000);
    }
