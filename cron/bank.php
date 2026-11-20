<?php
    require_once("../config/config.php");
    require_once("../config/function.php");


    if($CMSNAV->site('status_cron_bank') != 'ON')
    {
        die('Chức năng đang tắt.');
    }
    if($CMSNAV->site('api_bank') == '')
    {
        die('Thiếu API');
    }
    if (time() > $CMSNAV->site('check_time_cron_bank')) {
        if (time() - $CMSNAV->site('check_time_cron_bank') < 5) {
            die('Thao tác quá nhanh, vui lòng thử lại sau!');
        }
    }
    $CMSNAV->update("options", [
        'value' => time()
    ], " `name` = 'check_time_cron_bank' ");
    $token = $CMSNAV->site('api_bank');
    $stk = $CMSNAV->site('stk_bank');
    $mk = $CMSNAV->site('mk_bank');



    if($CMSNAV->site('type_bank') == 'VCB')
    {
        $result = curl_get("https://api.web2m.com/historyapivcb/$mk/$stk/$token");
        $result = json_decode($result, true);
        if($result['status'] != true)
        {
            die('Lấy dữ liệu thất bại');
        }
        foreach($result['data']['ChiTietGiaoDich'] as $data)
        {
            $des = $data['MoTa'];
            $amount = str_replace(',' ,'', $data['SoTienGhiCo']);
            $tid = $data['SoThamChieu'];
            $id = parse_order_id($des);
            if($amount < $CMSNAV->site('recharge_min'))
            {
                continue;
            }
            if ($id)
            {
                $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `id` = '$id' ");
                if($row['username'])
                {
                    if($CMSNAV->num_rows(" SELECT * FROM `bank_auto` WHERE `description` = '$des' ") == 0)
                    {
                        if($CMSNAV->num_rows(" SELECT * FROM `bank_auto` WHERE `tid` = '$tid' AND `description` = '$des' ") == 0)
                        {
                            /* GHI LOG BANK AUTO */
                            $create = $CMSNAV->insert("bank_auto", array(
                                'tid' => $tid,
                                'description' => $des,
                                'amount' => $amount,
                                'time' => gettime(),
                                'username' => $row['username']
                                ));
                            if ($create)
                            {
                                $real_amount = $amount + $amount * $CMSNAV->site('ck_bank') / 100;
                                $isCheckMoney = $CMSNAV->cong("users", "money", $real_amount, " `username` = '".$row['username']."' ");
                                if($isCheckMoney)
                                {
                                    $CMSNAV->cong("users", "total_money", $real_amount, " `username` = '".$row['username']."' ");
                                    /* GHI LOG DÒNG TIỀN */
                                    $CMSNAV->insert("dongtien", array(
                                        'sotientruoc' => $row['money'],
                                        'sotienthaydoi' => $real_amount,
                                        'sotiensau' => $row['money'] + $real_amount,
                                        'thoigian' => gettime(),
                                        'noidung' => 'Nạp tiền tự động ngân hàng ('.$des.')',
                                        'username' => $row['username']
                                    ));
                                }
                            }
                            
                        }
                    }
                }
            }    
        }
        die();
    }
    if($CMSNAV->site('type_bank') == 'TCB')
    {
        $result = curl_get("https://api.web2m.com/historyapitcb/$mk/$stk/$token");
        $result = json_decode($result, true);
        if($result['success'] != true)
        {
            die('Lấy dữ liệu thất bại');
        }
        foreach($result['transactions'] as $data)
        {
            $des = $data['Description'];
            $amount = str_replace(',' ,'', $data['Amount']);
            $tid = explode('\\', $data['TransID'])[0];
            $id = parse_order_id($des);
            if($amount < $CMSNAV->site('recharge_min'))
            {
                continue;
            }
            $file = @fopen('LogBank.txt', 'a');
            if ($file)
            {
                $data = "tid => $tid description => $des ($id) amount => $amount ".PHP_EOL;
                fwrite($file, $data);
            }
            if ($id)
            {
                $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `id` = '$id' ");
                if($row['username'])
                {
                    if($CMSNAV->num_rows(" SELECT * FROM `bank_auto` WHERE `tid` = '$tid' ") == 0)
                    {
                        /* GHI LOG BANK AUTO */
                        $create = $CMSNAV->insert("bank_auto", array(
                            'tid' => $tid,
                            'description' => $des,
                            'amount' => $amount,
                            'time' => gettime(),
                            'username' => $row['username']
                            ));
                        if ($create)
                        {
                            $real_amount = $amount + $amount * $CMSNAV->site('ck_bank') / 100;
                            $isCheckMoney = $CMSNAV->cong("users", "money", $real_amount, " `username` = '".$row['username']."' ");
                            if($isCheckMoney)
                            {
                                $CMSNAV->cong("users", "total_money", $real_amount, " `username` = '".$row['username']."' ");
                                /* GHI LOG DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $row['money'],
                                    'sotienthaydoi' => $real_amount,
                                    'sotiensau' => $row['money'] + $real_amount,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Nạp tiền tự động ngân hàng (Techcombank | '.$tid.')',
                                    'username' => $row['username']
                                ));
                            }
                        }
                    }
                }
            }    
        }
        die();
    }

    if($CMSNAV->site('type_bank') == 'ACB')
    {
        $result = curl_get("https://api.sieuthicode.net/historyapiacbv2/$token");
        $result = json_decode($result, true);
        if(!isset($result['transactions']))
        {
            die('Lấy dữ liệu thất bại');
        }
        print_r($result);
        foreach($result['transactions'] as $data)
        {
            $des = $data['description'];
            $amount = $data['amount'];
            $tid = $data['transactionID'];
            $id = parse_order_id($des);
            if($amount < $CMSNAV->site('recharge_min'))
            {
                continue;
            }
            if ($id)
            {
                $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `id` = '$id' ");
                if($row['username'])
                {
                    if($CMSNAV->num_rows(" SELECT * FROM `bank_auto` WHERE `tid` = '$tid'  ") == 0)
                    {
                        /* GHI LOG BANK AUTO */
                        $create = $CMSNAV->insert("bank_auto", array(
                            'tid' => $tid,
                            'description' => $des,
                            'amount' => $amount,
                            'time' => gettime(),
                            'username' => $row['username']
                            ));
                        if ($create)
                        {
                            $real_amount = $amount + $amount * $CMSNAV->site('ck_bank') / 100;
                            $isCheckMoney = $CMSNAV->cong("users", "money", $real_amount, " `username` = '".$row['username']."' ");
                            if($isCheckMoney)
                            {
                                $CMSNAV->cong("users", "total_money", $real_amount, " `username` = '".$row['username']."' ");
                                /* GHI LOG DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $row['money'],
                                    'sotienthaydoi' => $real_amount,
                                    'sotiensau' => $row['money'] + $real_amount,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Nạp tiền tự động ngân hàng (ACB | '.$tid.')',
                                    'username' => $row['username']
                                ));
                            }
                        }
                    }
                }
            }    
        }
        die();
    }
    if($CMSNAV->site('type_bank') == 'MB')
    {
        $result = curl_get("https://api.web2m.com/historyapimb/$mk/$stk/$token");
        $result = json_decode($result, true);
        if($result['success'] != true)
        {
            die('Lấy dữ liệu thất bại');
        }
        foreach($result['data'] as $data)
        {
            $des = $data['description'];
            $amount = $data['creditAmount'];
            $tid = explode('\\', $data['refNo'])[0];
            $id = parse_order_id($des);
            if($amount < $CMSNAV->site('recharge_min'))
            {
                continue;
            }
            $file = @fopen('LogBank.txt', 'a');
            if ($file)
            {
                $data = "tid => $tid description => $des ($id) amount => $amount ".PHP_EOL;
                fwrite($file, $data);
            }
            if ($id)
            {
                $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `id` = '$id' ");
                if($row['username'])
                {
                    if($CMSNAV->num_rows(" SELECT * FROM `bank_auto` WHERE `tid` = '$tid' AND `description` = '1.4.0$des' ") == 0)
                    {
                        /* GHI LOG BANK AUTO */
                        $create = $CMSNAV->insert("bank_auto", array(
                            'tid' => $tid,
                            'description' => '1.4.0'.$des,
                            'amount' => $amount,
                            'time' => gettime(),
                            'username' => $row['username']
                            ));
                        if ($create)
                        {
                            $real_amount = $amount + $amount * $CMSNAV->site('ck_bank') / 100;
                            $isCheckMoney = $CMSNAV->cong("users", "money", $real_amount, " `username` = '".$row['username']."' ");
                            if($isCheckMoney)
                            {
                                $CMSNAV->cong("users", "total_money", $real_amount, " `username` = '".$row['username']."' ");
                                /* GHI LOG DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $row['money'],
                                    'sotienthaydoi' => $real_amount,
                                    'sotiensau' => $row['money'] + $real_amount,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Nạp tiền tự động ngân hàng (MB Bank | '.$tid.')',
                                    'username' => $row['username']
                                ));
                            }
                        }
                    }
                }
            }    
        }
        die();
    }

    if($CMSNAV->site('type_bank') == 'TPB' || $CMSNAV->site('type_bank') == 'TPB')
    {
        $result = curl_get("https://api.web2m.com/historyapitpb/$token");
        $result = json_decode($result, true);
        if($result['error'] == true)
        {
            die($result['msg']);
        }
        foreach($result['transactionInfos'] as $data)
        {
            $des = $data['description'];
            $amount = $data['amount'];
            $tid = $data['reference'];
            $id = parse_order_id($des);
            if($amount < $CMSNAV->site('recharge_min'))
            {
                continue;
            }
            if ($id)
            {
                $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `id` = '$id' ");
                if($row['username'])
                {
                    if($CMSNAV->num_rows(" SELECT * FROM `bank_auto` WHERE `tid` = '$tid'  ") == 0)
                    {
                        /* GHI LOG BANK AUTO */
                        $create = $CMSNAV->insert("bank_auto", array(
                            'tid' => $tid,
                            'description' => '1.4.0'.$des,
                            'amount' => $amount,
                            'time' => gettime(),
                            'username' => $row['username']
                            ));
                        if ($create)
                        {
                            $real_amount = $amount + $amount * $CMSNAV->site('ck_bank') / 100;
                            $isCheckMoney = $CMSNAV->cong("users", "money", $real_amount, " `username` = '".$row['username']."' ");
                            if($isCheckMoney)
                            {
                                $CMSNAV->cong("users", "total_money", $real_amount, " `username` = '".$row['username']."' ");
                                /* GHI LOG DÒNG TIỀN */
                                $CMSNAV->insert("dongtien", array(
                                    'sotientruoc' => $row['money'],
                                    'sotienthaydoi' => $real_amount,
                                    'sotiensau' => $row['money'] + $real_amount,
                                    'thoigian' => gettime(),
                                    'noidung' => 'Nạp tiền tự động ngân hàng (TPBank | '.$tid.')',
                                    'username' => $row['username']
                                ));
                            }
                        }
                    }
                }
            }    
        }
        die();
    }

    echo "Cập nhật lịch sử bank thành công!";