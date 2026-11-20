<?php 
    require_once(__DIR__."/../../config/config.php");
    require_once(__DIR__."/../../config/function.php");
    require_once(__DIR__."/../../includes/login.php");

    if(isset($_GET['amount']) && isset($_GET['listbank']))
    {
        $sotien = check_string($_GET['amount']);
        $listbank = check_string($_GET['listbank']);
        $bank = $CMSNT->get_row(" SELECT * FROM `listbank` WHERE `id` = '$listbank' AND `username` = '".$getUser['username']."' ");
        if(!$bank)
        {
            die("Ngân hàng không hợp lệ !");
        }
        if($bank['nganhang'] == 'MOMO'){
        //$sotien = $sotien + $CMSNT->site('phi_rut_tien');
        // lấy phí rút %
        $phi_rut_tien_ck = $CMSNT->site('phi_rut_tien_ck');
        // lấy phí rút cố định
        $phi_rut_tien = $CMSNT->site('phi_rut_tien');
        }elseif($bank['nganhang'] != 'MOMO'){
        //$sotien = $sotien + $CMSNT->site('phi_rut_tien');
        // lấy phí rút %
        $phi_rut_tien_ck = $CMSNT->site('phi_rut_tien_ck_atm');
        // lấy phí rút cố định
        $phi_rut_tien = $CMSNT->site('phi_rut_tien_atm');
        }
        // tính số tiền phí khi trừ đi %
        $total_phi_rut_tien = $sotien * $phi_rut_tien_ck / 100;
        // tính tổng số tiền phí % + cố định
        $total_phi = $total_phi_rut_tien + $phi_rut_tien;
        // cộng tổng số tiền phí vào số tiền rút
        $sotien = $sotien + $total_phi;

        $json = json_encode([
            'total_rut' => format_currency($_GET['amount']),
            'total_phi' => format_currency($total_phi),
            'total_thanh_toan' => format_currency($sotien)
        ]);
        die($json);
    }

