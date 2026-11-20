<?php
    require_once("../config/config.php");
    require_once("../config/function.php");


    if($CMSNAV->site('api_bank_tsr') == '')
    {
        die('Thiếu API');
    }
    
    $CMSNAV->update("options", [
        'value' => time()
    ], " `name` = 'check_time_cron_tsr' ");
    
    
    $token = $CMSNAV->site('api_bank_tsr');
    $stk = $CMSNAV->site('stk_bank_tsr');
    $mk = $CMSNAV->site('mk_bank_tsr');
       
       if($CMSNAV->site('status_naptsr') == 'ON')
    {
        $result = curl_get("https://thueapi.pro/historyapithesieurev2/$token");
        $result = json_decode($result, true);
        if($result['status'] != true)
        {
            die('Lấy dữ liệu thất bại');
        }
         foreach($result['transactions'] as $data)
    {
        $tid            = explode('\\', $data['transactionID'])[0];
        $description    = check_string($data['description']);
        $amount         = check_string($data['amount']);
        $id = parse_order_id($description);
        
        $file = @fopen('LogBank.txt', 'a');
        if ($file)
        {
            $data = "tid => $tid description => $description ($id) amount => $amount ".PHP_EOL;
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
                                'noidung' => 'Nạp tiền tự động ngân hàng (TheSieure | '.$tid.')',
                                'username' => $row['username']
                            ));
                            }
                        }
                    }
                }
            }    
        }
    }
?>