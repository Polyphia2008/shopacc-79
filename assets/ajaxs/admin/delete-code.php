<?php 
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-admin.php';

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        $row = $CMSNAV->get_row("SELECT * FROM `giftcode` WHERE `id` = '$id' ");
        if(!$row)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Gift code này không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $CMSNAV->remove("giftcode", " `id` = '$id' ");
        if($isRemove)
        {
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa giftcode thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa giftcode thất bại.'
        ]);
        die($data);
    }