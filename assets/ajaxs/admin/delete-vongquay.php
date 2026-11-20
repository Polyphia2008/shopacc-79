<?php 
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-admin.php';

    if(isset($_POST['name']))
    {
        $id = check_string($_POST['name']);
        $row = $NGUYENANHVU->get_row("SELECT * FROM `vongquay` WHERE `id` = '$id' ");
        if(!$row)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Vòng quay này không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $NGUYENANHVU->remove("vongquay", " `id` = '$id' ");
        if($isRemove)
        {
            unlink(check_string('../../..'.$row['img']));
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa chuyên vòng quay thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa vòng quay thất bại.'
        ]);
        die($data);
    }