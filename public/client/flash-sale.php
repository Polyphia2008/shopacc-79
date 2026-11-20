<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Shop dịch vụ all game giá rẻ, uy tín, tự động. | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
     
?>

 
           <div class="layout">
        <div class="content" style="">
                        <header class="header-flash-sale">
          <div>
                <img src="/assets/frontend/theme_5/image/banner_sale/img-flashsale.png" alt="">
            </div>
            <div class="c-px-14 d-flex align-items-center">
                <div><img src="/assets/frontend/theme_5/image/banner_sale/icon-timerrr.png" alt=""></div>
                <div class="text-countdown text-end">KẾT THÚC TRONG</div>
            </div>
            <div class="countdown">
                <div class="check_countdownt_days_list">
                    <div class="box-timer-coundown">
                        <div class="day_config fw-700 fz-15 lh-10">00</div>
                        <div class="text-banner-sale fw-700 fz-8 lh-5" >
                            DAYS
                        </div>
                    </div>
                </div>
                <div>
                    <div class="box-timer-coundown">
                        <div class="hour_config fw-700 fz-15 lh-10">00</div>
                        <div class="text-banner-sale fw-700 fz-8 lh-5" >
                            HRS
                        </div>
                    </div>
                </div>
                <div>
                    <div class="box-timer-coundown">
                        <div class="minute_config fw-700 fz-15 lh-10">00</div>
                        <div class="text-banner-sale fw-700 fz-8 lh-5" >
                            MINS
                        </div>
                    </div>
                </div>
                <div>
                    <div class="box-timer-coundown">
                        <div class="second_config fw-700 fz-15 lh-10">00</div>
                        <div class="text-banner-sale fw-700 fz-8 lh-5" >
                            SECS
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <div class="c-mb-16 d-flex d-lg-none result-countdown-2">
                                               
                         <?php 
$currentHour = intval($gio);

// Lấy đúng 1 giờ trùng với giờ hiện tại
$current = $CMSNAV->get_row("
    SELECT * FROM `giosale` 
    WHERE `status` = 'ON'
    AND `gio` = '".$currentHour."'
    LIMIT 1
");

if ($current) {
    $hour = intval($current['gio']);
    $status = "Đang diễn ra";
?>

    <div class="c-p-6 box-time-banner banner-config-active click-banner-active bottom-banner-countdown"
        data-id="<?=$current['id']?>"
        data-cacheload="1"
        data-started_at="<?= strtotime(date('Y-m-d '.$hour.':00:00')) * 1000 ?>"
        data-ended_at="<?= strtotime(date('Y-m-d '.$hour.':59:59')) * 1000 ?>"
    >

        <div class="text-pri-color fw-700 lh-28 fz-20 text-center">
            <?=$hour;?>:00
        </div>

        <div class="noselect_text text-center d-flex align-items-center justify-content-center">
            <img src="/assets/frontend1/theme_5/image/banner_sale/fire-flash-sale.png" alt="" class="c-mr-4">
            <p class="c-mb-0 text-nowrap take-place fw-500 lh-20">
                <?=$status?>
            </p>
        </div>

    </div>

<?php 
} 
?>

</div>
                         </div>
        <div class="container c-container" id="flashsale-list"
             data-sapdienra="Sắp diễn ra"
             data-ketthuctrong="KẾT THÚC TRONG"
             data-batdausau="BĂT ĐẦU SAU"
             data-dangdienra="Đang diễn ra">
            <div class="head-mobile head-mobile-fl">
                <a href="/" class="link-back" style="filter: brightness(0) invert(1)"></a>
                <p class="head-title text-title head-title-flashsale-mb">
                    F
                    <img src="/assets/frontend/theme_5/image/banner_sale/icon-set.png" alt="" style="width: 13px;height: 18px;">
                    ASH SALE
                </p>
             
            </div>
            <div class="c-my-16 d-none d-lg-flex result-countdown-2">
                                                             <?php 
$currentHour = intval($gio);

// Lấy đúng 1 giờ trùng với giờ hiện tại
$current = $CMSNAV->get_row("
    SELECT * FROM `giosale` 
    WHERE `status` = 'ON'
    AND `gio` = '".$currentHour."'
    LIMIT 1
");

if ($current) {
    $hour = intval($current['gio']);
    $status = "Đang diễn ra";
?>

    <div class="c-p-6 box-time-banner banner-config-active click-banner-active bottom-banner-countdown"
        data-id="<?=$current['id']?>"
        data-cacheload="1"
        data-started_at="<?= strtotime(date('Y-m-d '.$hour.':00:00')) * 1000 ?>"
        data-ended_at="<?= strtotime(date('Y-m-d '.$hour.':59:59')) * 1000 ?>"
    >

        <div class="text-pri-color fw-700 lh-28 fz-20 text-center">
            <?=$hour;?>:00
        </div>

        <div class="noselect_text text-center d-flex align-items-center justify-content-center">
            <img src="/assets/frontend1/theme_5/image/banner_sale/fire-flash-sale.png" alt="" class="c-mr-4">
            <p class="c-mb-0 text-nowrap take-place fw-500 lh-20">
                <?=$status?>
            </p>
        </div>

    </div>

<?php 
} 
?>

</div>
                                                </div>

            <div class="c-my-10 d-lg-none d-flex justify-content-end">
                <div class="c-mr-16 d-flex align-items-center countdown_time_text">
                    <img src="/assets/frontend/theme_5/image/banner_sale/ic_time.png" alt="" class="c-mr-4">
                    <span class="text-end">Kết thúc trong</span>
                </div>
                <div class="d-flex countdown noselect countdown_time">
                    <div class="check_countdownt_days_list">
                        <div class="box-timer-coundown">
                            <div class="day_config fw-500 fz-12 lh-10">00</div>
                            <div class="text-banner-sale fw-500 fz-7" >
                                DAYS
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box-timer-coundown">
                            <div class="hour_config fw-700 fz-12 lh-10">00</div>
                            <div class="text-banner-sale fw-500 fz-7" >
                                HRS
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box-timer-coundown">
                            <div class="minute_config fw-700 fz-12 lh-10">00</div>
                            <div class="text-banner-sale fw-500 fz-7" >
                                MINS
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box-timer-coundown">
                            <div class="second_config fw-700 fz-12 lh-10">00</div>
                            <div class="text-banner-sale fw-500 fz-7" >
                                SECS
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="listing-account list-content">
                
                <div class="item-account-flashsale">
        <div class="card card-hover p-3">   
<?php 
foreach($CMSNAV->get_list("SELECT * FROM `giosale` WHERE `status` = 'ON'") as $row) {

    if ($currentHour != intval($row['gio'])) continue; // chỉ hiển thị giờ đang diễn ra

    $product = $CMSNAV->get_list("
        SELECT * FROM `accounts`
        WHERE `sale` = 'SHOW'
        AND `username` IS NULL
    ");

    foreach($product as $group) {
?>
       
      
                
                    <a href="<?=BASE_URL('Orders/'.$group['id']);?>">
                        <div class="account-thumb c-mb-8 percent_discount" data-content="-33" style="padding-bottom: 60%">
                            <img 
                                 src="<?=$group['img'];?>"
                                 alt=""
                                 loading="lazy"
                                 class="account-thumb-image">
                        </div>
                        <div class="account-title">
                            <div class="text-title fw-700 text-limit limit-1">
                                <?=$group['title'];?>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center c-pt-30 c-pt-md-22">
                                <div class="price-flashsale">
                                    <div class="price-old c-mr-8"><?=format_cash($group['money']*3);?></div>
                                    <div class="price-current-flashsale w-100"><?=format_cash($group['money']);?></div>
                               </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



</div>
<?php 
    }
} 
?>

</div>
            </div>
        
             
                       