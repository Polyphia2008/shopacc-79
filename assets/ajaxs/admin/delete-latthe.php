<?php 
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-admin.php';

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        $row = $CMSNAV->get_row("SELECT * FROM `setting_latthe` WHERE `id` = '$id' ");
        if(!$row)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Game này không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $CMSNAV->remove("setting_latthe", " `id` = '$id' ");
        if($isRemove)
        {
            unlink(check_string('../../..'.$row['img']));
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa game thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa game thất bại.'
        ]);
        die($data);
    }