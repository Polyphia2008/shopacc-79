<?php 
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-admin.php';

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        $row = $CMSNAV->get_row("SELECT * FROM `connect_api` WHERE `id` = '$id' ");
        if(!$row)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $CMSNAV->remove("connect_api", " `id` = '$id' ");
        if($isRemove)
        {
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa thất bại.'
        ]);
        die($data);
    }