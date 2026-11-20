<?php 
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-admin.php';

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        $user = $CMSNAV->get_row("SELECT * FROM `blogs` WHERE `id` = '$id' ");
        if(!$user)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Tin Tức này không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $CMSNAV->remove("blogs", " `id` = '$id' ");
        if($isRemove)
        {
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa Tin Tức thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa Tin Tức thất bại.'
        ]);
        die($data);
    }