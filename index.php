<?php
    require_once(__DIR__."/config/config.php");
    require_once(__DIR__."/config/function.php");
    require_once(__DIR__."/class/Mobile_Detect.php");
    $title = 'HOME | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/public/client/Header.php");
    if($CMSNAV->site('baotri') == 'OFF') {
        require_once(__DIR__.'/public/baotri/baotri.php');
        exit();
    }
    require_once(__DIR__."/public/client/Nav.php");
    require_once(__DIR__."/class/Date/HumanDiff.php");
    $rateRobux = $CMSNAV->get_row(" SELECT * FROM `raterobux`");
            
    if(isset($_GET['ref']) ){
        $ref_id = check_string($_GET['ref']);
        if($CMSNAV->get_row("SELECT * FROM `users` WHERE `id` = '$ref_id' ")['ip'] != myip()){
            $CMSNAV->cong("users", "ref_click", 1, " `id` = '$ref_id' ");
            $_SESSION['ref'] = check_string($_GET['ref']);
        }
        else{
            $_SESSION['ref'] = NULL;
        } 
    }

 
if(empty($_SESSION['ref'])) 
{ 
    $_SESSION['ref'] = NULL;
}
?>
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<form id="logout-form" action="" method="POST" class="d-none">
    <input type="hidden" name="_token" value="opRTRuXjTgzzZNtaMa8j8MUM6HzOZY5elyz0KoQa"></form>
    <div class="layout">
        <div class="content" style="">
                        
   
                                    <div class="container c-container">
                                                                                    <div class="banner-slide swiper-general c-pt-24 c-mt-lg-4 c-mb-16 c-mb-lg-28">
        <div class="swiper swiper-banner brs-12">
           <div class="swiper-wrapper">
<div class="swiper-wrapper ">

<?php if ($CMSNAV->site('loaicanhnapthe') == 'youtube') { ?>

   
    <div class="swiper-slide slide-youtube">
    <div class="video-wrapper">
        <iframe
            src="https://www.youtube.com/embed/<?= $CMSNAV->site('id_video_youtube'); ?>"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>
</div>
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<?php } else { ?>
 <?php } ?>
    <div class="swiper-slide">
        <a href="javascript:void(0)">
            <img onerror="imgError(this)" width="1200" height="370" loading="lazy"
                 src="<?=$CMSNAV->site('banner1');?>" alt="img-banner">
        </a>
    </div>

    <div class="swiper-slide">
        <a href="javascript:void(0)">
            <img onerror="imgError(this)" width="1200" height="370" loading="lazy"
                 src="<?=$CMSNAV->site('banner2');?>" alt="img-banner">
        </a>
    </div>

      
</div>
</div>
            <div class="navigation slider-next icon-slick">
                <img src="/assets/frontend1/theme_5/image/svg/arrow-left.svg" alt="slider-next">
            </div>
            <div class="navigation slider-prev icon-slick">
                <img src="/assets/frontend1/theme_5/image/svg/arrow-left.svg" alt="slider-prev">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
       
    
    <?php if($CMSNAV->site('status_boxtype') == 'ON'): ?>
      <!-- 🔹 DANH MỤC BOXTYPE - Giao diện PC -->
 <div class="container c-container d-lg-block d-none c-px-0">
    <div class="d-flex flex-wrap justify-content-between pt-3">
        
        <?php foreach($CMSNAV->get_list("SELECT * FROM `boxtype`") as $row) { ?>
       <a href="<?=$row['link'];?>" target="_blank" class="d-flex justify-content-center" style="flex-basis: 12.5%">
                    <div class="" style="width: 100px;">
                        <div class="ssqXYK OyNMA5 c-mt-0">
                            <div class="VcjTix _03TyL4">
                                <div class="-1zdvZ y2U2TZ vi-tri-6"
                                    style="background-image: url(<?=$row['image_url'];?>); background-size: contain; background-repeat: no-repeat;">

                                </div>
                            </div>
                        </div>
                        <div class="_8IM+-o vdmlF5 vi-tri-0"><?=$row['description'];?></div>                  
                  </div>                  
                     </a>
               <?php } ?> 
                   </div>
                 </div>

       <div class="container c-container d-lg-none c-mb-16">

    <div class="d-flex flex-wrap justify-content-between pt-3">                   
  
        <?php foreach($CMSNAV->get_list("SELECT * FROM `boxtype`") as $row) { ?>
       <a href="<?=$row['link'];?>" target="_blank" class="d-flex justify-content-center" style="flex-basis: 12.5%">
                    <div class="" style="width: 100px;">
                        <div class="ssqXYK OyNMA5 c-mt-0">
                            <div class="VcjTix _03TyL4">
                                <div class="-1zdvZ y2U2TZ vi-tri-6"
                                    style="background-image: url(<?=$row['image_url'];?>); background-size: contain; background-repeat: no-repeat;">

                                </div>
                            </div>
                        </div>
                        <div class="_8IM+-o vdmlF5 vi-tri-0"><?=$row['description'];?></div>                  
                  </div>                  
                     </a>
               <?php } ?> 
                   </div>
                 </div>
    <?php endif; ?>

    
    
    
  

<script src="/assets/frontend1/theme_5/js/js_jirim/banner_config_countdown.js"></script>
 <?php if($CMSNAV->site('status_sale') == 'ON'): ?>
<section class="banner-flashsale c-my-20 c-p-lg-0">

    <div class="section-header d-flex justify-content-between tiltel-flashsale-home">
        <div class="d-flex align-items-center c-pl-16">
            <div class="section-title d-flex c-mr-24">
                F
                <img src="/assets/frontend1/theme_5/image/banner_sale/icon-set.png" alt="" class="icon-set-flashsale">
                ASH SALE
            </div>

            <div class="d-none d-lg-flex">
                <div class="c-mr-16 d-flex align-items-center countdown_time_text">
                    <img src="/assets/frontend1/theme_5/image/banner_sale/icon-timerrr.png" alt="" class="c-mr-4">
                    <span class="text-end">KẾT THÚC TRONG</span>
                </div>

                <div class="countdown noselect countdown_time">
                    <div class="check_countdownt_days">
                        <div class="box-timer-coundown">
                            <div class="day_config fw-700 fz-15 lh-10">00</div>
                            <div class="text-banner-sale fw-700 fz-8 lh-5">DAYS</div>
                        </div>
                    </div>
                    <div>
                        <div class="box-timer-coundown">
                            <div class="hour_config fw-700 fz-15 lh-10">00</div>
                            <div class="text-banner-sale fw-700 fz-8 lh-5">HRS</div>
                        </div>
                    </div>
                    <div>
                        <div class="box-timer-coundown">
                            <div class="minute_config fw-700 fz-15 lh-10">00</div>
                            <div class="text-banner-sale fw-700 fz-8 lh-5">MINS</div>
                        </div>
                    </div>
                    <div>
                        <div class="box-timer-coundown">
                            <div class="second_config fw-700 fz-15 lh-10">00</div>
                            <div class="text-banner-sale fw-700 fz-8 lh-5">SECS</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    </div>

 <!-- TAB GIỜ FLASH SALE -->
<div class="c-m-16 d-flex result-countdown">

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

    <!-- MOBILE COUNTDOWN -->
    <div class="countdown_time_mobile">
        <div class="c-mr-16 d-flex align-items-center countdown_time_text">
            <img src="/assets/frontend1/theme_5/image/banner_sale/ic_time.png" alt="" class="c-mr-4">
            <span class="text-end">KẾT THÚC TRONG</span>
        </div>
        <div class="countdown noselect countdown_time">
            <div class="check_countdownt_days">
                <div class="box-timer-coundown">
                    <div class="day_config fw-500 fz-12 lh-10">00</div>
                    <div class="text-banner-sale fw-500 fz-7">DAYS</div>
                </div>
            </div>
            <div>
                <div class="box-timer-coundown">
                    <div class="hour_config fw-700 fz-12 lh-10">00</div>
                    <div class="text-banner-sale fw-500 fz-7">HRS</div>
                </div>
            </div>
            <div>
                <div class="box-timer-coundown">
                    <div class="minute_config fw-700 fz-12 lh-10">00</div>
                    <div class="text-banner-sale fw-500 fz-7">MINS</div>
                </div>
            </div>
            <div>
                <div class="box-timer-coundown">
                    <div class="second_config fw-700 fz-12 lh-10">00</div>
                    <div class="text-banner-sale fw-500 fz-7">SECS</div>
                </div>
            </div>
        </div>
    </div>

    <!-- SWIPER SẢN PHẨM FLASH SALE -->
    <div class="c-mx-16 c-mx-lg-0 swiper swiper-related-service card-list swiper-container-horizontal">
       <div class="swiper-wrapper loadjs_flashsale_nick">

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
        <div class="swiper-slide">
            <div class="card">
                <div class="card-body c-p-16 c-p-lg-8 scale-thumb">
                    <a href="<?=BASE_URL('Orders/'.$group['id']);?>">
                        <div class="card-thumb c-mb-8 percent_discount" data-content="-33">
                            <img src="<?=$CMSNAV->site('loader');?>"
                                 data-src="<?=$group['img'];?>"
                                 alt=""
                                 loading="lazy"
                                 class="card-thumb-image lazy">
                        </div>
                        <div class="card-attr">
                            <div class="text-title fw-700 text-limit limit-1">
                                <?=$group['title'];?>
                            </div>
                            <div class="info-attr c-pb-12">
                                ID: AC<?=$group['id'];?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
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

        <div class="navigation slider-next"></div>
        <div class="navigation slider-prev swiper-button-disabled"></div>

    </div>

</section>
 <?php endif; ?>


      <!--PC MUA ACC-->
      <?php if($CMSNAV->site('accounts') == 'ON') { ?>
<div class="c-pt-8 border-bottom-destop c-pt-lg-2"></div>

	<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'account'") as $row) { ?>
                                    <section class="section-related-service c-pt-32 c-mt-lg-6 c-mb-lg-6 media-web">
        <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
            <h2 class="section-title fz-lg-15 lh-lg-24">
                <i class="icon-title c-mr-8"
                    style="--path:url(//bloxvn.net/assets/frontend/theme_5/image/png/acc-game.png)"></i>
                <?=$row['name'];?>
            </h2>
            <a href="mua-acc" class="link arr-right">Xem tất cả</a>
        </div>
                            <div class="list-category">
                                <?php foreach($CMSNAV->get_list("SELECT * FROM `groups` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $group) { ?>
                                                                        <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                        <div class="card">
                            <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                                <a href="<?=BASE_URL('Accounts/'.$group['id']);?>"
                       class="flex-grow-1 d-flex flex-column js-view-product"
                       data-id="<?=$group['id'];?>"
                       data-title="<?=$group['title'];?>"
                       data-module="acc_category"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$group['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                    <div class="card-thumb c-mb-8">
                                        <img width="200" height="120"
                                            src="<?=$CMSNAV->site('loader');?>" data-src="<?=$group['img'];?>"
                                            alt="<?=$group['title'];?> " class="lazy card-thumb-image" loading="lazy">
                                    </div>
                                    <div class="card-attr">
                                        <div class="text-title fw-700 text-limit limit-1">
                                            <?=$group['title'];?>                                </div>
                                        <div class="info-attr">
                                                                                                                                        Số tài khoản:
                                               <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `groups` = '".$group['id']."' AND `username` IS NULL "));?>
                                            
                                        </div>
                                                                                                                                                                                <div class="price">
                                                                    <div class="price-current w-100">
                                        <?=format_cash($group['giamgia']);?></div>
                                                                            <div class="price-old c-mr-8">
                                            <?=format_cash($group['giatiengoc']);?>
                                        </div>
                                        
                                                                                                    </div>
                                                                                                                        </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    	<?php } ?>
                             	<?php } ?>                                                       
                                    </div>
                    <!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->               
    </section>
    	<?php } ?>
    	<!--ACCOUNT MOBILE-->
    	<?php if($CMSNAV->site('accounts') == 'ON') { ?>
    		<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'account'") as $row) { ?>
<section class="acc-game-v2 media-mobile c-mt-12 c-mt-lg-24 c-mb-12 c-mb-lg-6">
    <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
        <h2 class="section-title fz-lg-20 lh-lg-24">
            <i class="icon-title c-mr-8"
                style="--path:url(//BLOXVN.NET/assets/frontend/theme_5/image/png/acc-game.png)"></i>
            <?=$row['name'];?>
        </h2>
        <a href="mua-acc" class="link arr-right">Xem tất cả</a>
    </div>
    
    <div class="list-category content-desc-nick hide">
         <?php foreach($CMSNAV->get_list("SELECT * FROM `groups` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $group) { ?>
                                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card">
                        <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                           <a href="<?=BASE_URL('Accounts/'.$group['id']);?>"
                       class="flex-grow-1 d-flex flex-column js-view-product"
                       data-id="<?=$group['id'];?>"
                       data-title="<?=$group['title'];?>"
                       data-module="acc_category"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$group['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                <div class="card-thumb c-mb-8">
                                    <img width="200" height="120"
                                        src="<?=$CMSNAV->site('loader');?>" data-src="<?=$group['img'];?>"
                                            alt="<?=$group['title'];?> " class="lazy card-thumb-image" loading="lazy">
                                </div>
                                <div class="card-attr">
                                    <div class="text-title fw-700 text-limit limit-1">
                                        <?=$group['title'];?>
                                    </div>
                                    <div class="info-attr">
                                                                                                                            Số tài khoản: <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `groups` = '".$group['id']."' AND `username` IS NULL "));?>

                                      <!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->                                      </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                        	<?php } ?>     
                        		<?php } ?>     
                        </div>
    <div class="card-footer-nick text-center">
        <span class="see-more-nick" data-content="Xem thêm nội dung"></span>
    </div>
</section>
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
	<?php } ?>
	<!--END-->
	<!--DỊCH VỤ TRÊN PC-->
	<?php if($CMSNAV->site('robux') == 'ON') { ?>
	<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'robux'") as $row) { ?>
<div class="c-pt-8 border-bottom-destop c-pt-lg-16"></div>

                                    <section class="section-related-service c-pt-32 c-pt-lg-6 c-pb-12 c-pb-lg-6 media-web">
        <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
            <h2 class="section-title fz-lg-15 lh-lg-24">
                <i class="icon-title c-mr-8"
                    style="--path:url(/assets/frontend1/theme_5/image/acc-game.png)"></i>
                <?=$row['name'];?>
            </h2>
            <a href="/ro-bux" class="link arr-right">Xem tất cả</a>
        </div>
                            <div class="list-category d-flex flex-wrap">
                               <!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
                <?php foreach($CMSNAV->get_list("SELECT * FROM `category_robux120h` WHERE `display` = 'SHOW' and `loai` = 'link' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
            
                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card d-flex flex-column h-100">
                        <div class="card-body d-flex flex-column c-p-16 c-p-lg-12 scale-thumb">
                            <a href="<?=BASE_URL('rb-link/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="robux"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                        data-src="<?=$category['img'];?>"
                                        alt="ROBUX TỰ ĐỘNG" loading="lazy" width="200" height="120"
                                        class="lazy card-thumb-image" loading="lazy">
                                </div>
                                <div class="card-attr flex-grow-1 d-flex flex-column">
                                    <div class="text-title fw-700  mb-auto">
                                       <?=$category['title'];?>
                                    </div>
                                    <div class="info-attr">
                                                                                                                                                                                                                                               
                                      <!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->                  <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                          	<?php }?>
              <?php foreach($CMSNAV->get_list("SELECT * FROM `category_robux120h` WHERE `display` = 'SHOW' and `loai` = 'userpass' AND `danhmuc` = '".$row['id']."'") as $category) { ?>  
                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card d-flex flex-column h-100">
                        <div class="card-body d-flex flex-column c-p-16 c-p-lg-12 scale-thumb">
                            <a href="<?=BASE_URL('rb-tkmk/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="robux"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                        data-src="<?=$category['img'];?>"
                                        alt="ROBUX TỰ ĐỘNG" loading="lazy" width="200" height="120"
                                        class="lazy card-thumb-image" loading="lazy">
                                </div>
                                <div class="card-attr flex-grow-1 d-flex flex-column">
                                    <div class="text-title fw-700  mb-auto">
                                       <?=$category['title'];?>
                                    </div>
                                    <div class="info-attr">
                                                                                                                                                                                                                                                
                                       <!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->                 <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                          	<?php }?>
              <?php foreach($CMSNAV->get_list("SELECT * FROM `category_robux` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card d-flex flex-column h-100">
                        <div class="card-body d-flex flex-column c-p-16 c-p-lg-12 scale-thumb">
                            <a href="<?=BASE_URL('Robux/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="robux"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                        data-src="<?=$category['img'];?>"
                                        alt="ROBUX TỰ ĐỘNG" loading="lazy" width="200" height="120"
                                        class="lazy card-thumb-image" loading="lazy">
                                </div>
                                <div class="card-attr flex-grow-1 d-flex flex-column">
                                    <div class="text-title fw-700  mb-auto">
                                       <?=$category['title'];?>
                                    </div>
                                    <div class="info-attr">
                                                                                                                                                                                                                                                
                                                        <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                          	<?php }?>
                            </div>
    </section>
    <?php }?>
    <?php } ?><!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
    <!--dịch vụ trên mobile-->
<?php if($CMSNAV->site('robux') == 'ON') { ?>
	<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'robux'") as $row) { ?>
<section class="acc-game-v2 media-mobile c-pt-12 c-pt-lg-6 c-pb-12 c-pb-lg-6">
    <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
        <h2 class="section-title fz-lg-20 lh-lg-24">
            <i class="icon-title c-mr-8"
                style="--path:url(/assets/frontend1/theme_5/image/acc-game.png)"></i>
           <?=$row['name'];?>
        </h2>
        <a href="/ro-bux" class="link arr-right">Xem tất cả</a>
    </div>
        <div class="list-category content-desc-nick hide">
           
            <?php foreach($CMSNAV->get_list("SELECT * FROM `category_robux120h` WHERE `display` = 'SHOW' and `loai` = 'link' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                <div class="card">
                    <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                         <a href="<?=BASE_URL('rb-link/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="robux"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                            <div class="card-thumb c-mb-8">
                                <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                    data-src="<?=$category['img'];?>"
                                    alt="<?=$category['title'];?>" class="lazy card-thumb-image" loading="lazy"
                                    width="200" height="120">
                            </div>
                            <div class="card-attr">
                                <div class="text-title fw-700">
                                    <?=$category['title'];?>
                                </div>
                                <div class="info-attr">
                                                                                                                                                                                                                            
                                                    <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
         <?php }?>
                    <?php foreach($CMSNAV->get_list("SELECT * FROM `category_robux120h` WHERE `display` = 'SHOW' and `loai` = 'userpass' AND `danhmuc` = '".$row['id']."'") as $category) { ?> 
                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                <div class="card">
                    <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                        <a href="<?=BASE_URL('rb-tkmk/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="robux"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                            <div class="card-thumb c-mb-8"> 
                                <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                    data-src="<?=$category['img'];?>"
                                    alt="<?=$category['title'];?>" class="lazy card-thumb-image" loading="lazy"
                                    width="200" height="120">
                            </div>
                            <div class="card-attr">
                                <div class="text-title fw-700">
                                    <?=$category['title'];?>
                                </div>
                                <div class="info-attr">
                                                                                                                                                                                                                            
                                                    <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
         <?php }?>
                   <?php foreach($CMSNAV->get_list("SELECT * FROM `category_robux` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                <div class="card">
                    <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                         <a href="<?=BASE_URL('Robux/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="robux"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                            <div class="card-thumb c-mb-8">
                                <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                    data-src="<?=$category['img'];?>"
                                    alt="<?=$category['title'];?>" class="lazy card-thumb-image" loading="lazy"
                                    width="200" height="120">
                            </div>
                            <div class="card-attr">
                                <div class="text-title fw-700">
                                    <?=$category['title'];?>
                                </div>
                                <div class="info-attr">
                                                                                                                                                                                                                            
                                                    <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
         <?php }?>
                    
            </div>
    <div class="card-footer-nick text-center">
        <span class="see-more-nick" data-content="Xem thêm nội dung"></span>
    </div>
</section>
<?php }?>
<?php }?>

<!--GAMEPAss+ vật phẩm PC-->
<?php if($CMSNAV->site('gamepass') == 'ON') { ?>
    <?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'vatpham'") as $row) { ?>
<div class="c-pt-8 border-bottom-destop c-pt-lg-16"></div>

                                    <section class="section-related-service c-pt-32 c-pt-lg-6 c-pb-12 c-pb-lg-6 media-web">
        <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
            <h2 class="section-title fz-lg-15 lh-lg-24">
                <i class="icon-title c-mr-8"
                    style="--path:url(/assets/frontend1/theme_5/image/acc-game.png)"></i>
                <?=$row['name'];?>
            </h2>
            <a href="/vat-pham" class="link arr-right">Xem tất cả</a>
        </div>
                            <div class="list-category d-flex flex-wrap">

              <?php foreach($CMSNAV->get_list("SELECT * FROM `category_gamepass` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column c-p-16 c-p-lg-12 scale-thumb">
                            <a href="<?=BASE_URL('vatpham/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="vatpham"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                        data-src="<?=$category['img'];?>"
                                        alt="ROBUX TỰ ĐỘNG" loading="lazy" width="200" height="120"
                                        class="lazy card-thumb-image">
                                </div>
                                <div class="card-attr flex-grow-1 d-flex flex-column">
                                    <div class="text-title fw-700  mb-auto">
                                       <?=$category['title'];?>
                                    </div>
                                    <div class="info-attr">
                                                                                                                                                                                                                                                
                                                        <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                          	<?php }?>
                            </div>
    </section>
    <?php }?>
    <?php } ?>




<?php if($CMSNAV->site('gamepass') == 'ON') { ?>
    <?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'vatpham'") as $row) { ?>
<section class="acc-game-v2 media-mobile c-pt-12 c-pt-lg-6 c-pb-12 c-pb-lg-6">
    <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
        <h2 class="section-title fz-lg-20 lh-lg-24">
            <i class="icon-title c-mr-8"
                style="--path:url(/assets/frontend1/theme_5/image/acc-game.png)"></i>
            <?=$row['name'];?>
        </h2>
        <a href="/vat-pham" class="link arr-right">Xem tất cả</a>
    </div>
        <div class="list-category content-desc-nick hide">
            <?php foreach($CMSNAV->get_list("SELECT * FROM `category_gamepass` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                <div class="card">
                    <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                         <a href="<?=BASE_URL('vatpham/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="vatpham"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                            <div class="card-thumb c-mb-8">
                                <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                    data-src="<?=$category['img'];?>"
                                    alt="Gamepass Skibidi Tower Defense" class="lazy card-thumb-image" loading="lazy"
                                    width="200" height="120">
                            </div>
                            <div class="card-attr">
                                <div class="text-title fw-700">
                                    <?=$category['title'];?>
                                </div>
                                <div class="info-attr">
                                                                                                                                                                                                                            
                                                   <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
           <?php }?>
       
            </div>
    <div class="card-footer-nick text-center">
        <span class="see-more-nick" data-content="Xem thêm nội dung"></span>
    </div>
</section>
<?php }?>
<?php }?>

                                    <!--GAMEPAss+ vật phẩm PC-->
<?php if($CMSNAV->site('caythue') == 'ON') { ?>
    <?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'dichvu'") as $row) { ?>
<div class="c-pt-8 border-bottom-destop c-pt-lg-16"></div>

                                    <section class="section-related-service c-pt-32 c-pt-lg-6 c-pb-12 c-pb-lg-6 media-web">
        <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
            <h2 class="section-title fz-lg-15 lh-lg-24">
                <i class="icon-title c-mr-8"
                    style="--path:url(/assets/frontend1/theme_5/image/acc-game.png)"></i>
                <?=$row['name'];?>
            </h2>
            <a href="dich-vu" class="link arr-right">Xem tất cả</a>
        </div>
                            <div class="list-category d-flex flex-wrap">

              <?php foreach($CMSNAV->get_list("SELECT * FROM `category_caythue` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                    <div class="card d-flex flex-column h-100">
                        <div class="card-body d-flex flex-column c-p-16 c-p-lg-12 scale-thumb">
                            <a href="<?=BASE_URL('dich-vu/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="caythue"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                                <div class="card-thumb c-mb-8">
                                    <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                        data-src="<?=$category['img'];?>"
                                        alt="ROBUX TỰ ĐỘNG" loading="lazy" width="200" height="120"
                                        class="lazy card-thumb-image">
                                </div>
                                <div class="card-attr flex-grow-1 d-flex flex-column">
                                    <div class="text-title fw-700  mb-auto">
                                       <?=$category['title'];?>
                                    </div>
                                    <div class="info-attr">
                                                                                                                                                                                                                                                
                                                        <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                          	<?php }?>
                            </div>
    </section>
    <?php }?>
    <?php } ?>












<?php if($CMSNAV->site('caythue') == 'ON') { ?>
    <?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'dichvu'") as $row) { ?>
<section class="acc-game-v2 media-mobile c-pt-12 c-pt-lg-6 c-pb-12 c-pb-lg-6">
    <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
        <h2 class="section-title fz-lg-20 lh-lg-24">
            <i class="icon-title c-mr-8"
                style="--path:url(/assets/frontend1/theme_5/image/acc-game.png)"></i>
            <?=$row['name'];?>
        </h2>
        <a href="/dich-vu" class="link arr-right">Xem tất cả</a>
    </div>
        <div class="list-category content-desc-nick hide">
            <?php foreach($CMSNAV->get_list("SELECT * FROM `category_caythue` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                <div class="card">
                    <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                         <a href="<?=BASE_URL('dich-vu/'.$category['id']);?>"
                       class="js-view-product"
                       data-id="<?=$category['id'];?>"
                       data-title="<?=$category['title'];?>"
                       data-module="caythue"
                       data-category="<?=$row['id'];?>"
                       data-image="<?=$category['img'];?>"
                       data-displaytype="2"
                       data-child="">
                            <div class="card-thumb c-mb-8">
                                <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                    data-src="<?=$category['img'];?>"
                                    alt="Gamepass Skibidi Tower Defense" class="lazy card-thumb-image" loading="lazy"
                                    width="200" height="120">
                            </div>
                            <div class="card-attr">
                                <div class="text-title fw-700">
                                    <?=$category['title'];?>
                                </div>
                                <div class="info-attr">
                                                                                                                                                                                                                            
                                                   <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                    </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
           <?php }?>
       
            </div>
    <div class="card-footer-nick text-center">
        <span class="see-more-nick" data-content="Xem thêm nội dung"></span>
    </div>
</section>
<?php }?>
<?php }?>
<?php if($CMSNAV->site('minigame') == 'ON') { ?> 
<section class="section-related-service c-pt-32 c-mt-lg-6 c-mb-lg-6 ">
    <div class="section-header c-mb-8 c-mb-lg-16 justify-content-between">
        <h2 class="section-title fz-lg-15 lh-lg-24">
            <i class="icon-title c-mr-8" style="--path:url(//BLOXVN.NET/assets/frontend/theme_5/image/lock_money/bonus.png)"></i>
            MINI GAME ĐỘC QUYỀN
        </h2>
        <a href="/mini-game" class="link arr-right">Xem tất cả</a>
    </div>

    <div class="swiper swiper-related-service card-list swiper-container-horizontal">
        <div class="swiper-wrapper h-100">

            <?php 
            // Lấy cả 2 bảng (mini_game + setting_latthe)
            $list_vongquay = $CMSNAV->get_list("SELECT * FROM `mini_game` WHERE `status` = 'true' ");
            $list_latthe = $CMSNAV->get_list("SELECT * FROM `setting_latthe` WHERE `display` = 'SHOW' ");
            
            // Gộp dữ liệu lại thành 1 mảng
            $all_games = array_merge($list_vongquay, $list_latthe);

            // Duyệt tất cả
            foreach ($all_games as $game) {
                // Xác định loại để link đúng
                if(isset($game['price'])) {
                    // Vòng quay
                    $url = BASE_URL($game['slug']);
                    $thumb = mini_game($game['id'], 'thumb');
                    $title = $game['name'];
                    $luot = $game['sudung'];
                    $gia = $game['price'];
                } else {
                    // Lật thẻ
                    $url = BASE_URL($game['slug']);
                    $thumb = $game['imglatthe_thumb'];
                    $title = $game['title'];
                    $luot = $game['luotdaquay'];
                    $gia = $game['giatien'];
                }
            ?>
            <div class="swiper-slide h-auto">
                <div class="item-category h-100">
                    <div class="card h-100">
                       <a href="<?=$url;?>"
   class="card-body scale-thumb c-p-16 c-p-lg-12 js-view-product"
   data-id="<?=$game['id'];?>"
   data-title="<?=$title;?>"
   data-module="minigame"
   data-category="0"
   data-image="<?=$thumb;?>"
   data-displaytype="1"
   data-child="">

                            <div class="account-thumb top-buy sm c-mb-8" data-content="Top <?=$game['id'];?>">
                                <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>" 
                                     data-src="<?=$thumb;?>" 
                                     alt="<?=$title;?>" 
                                     loading="lazy" width="200" height="120" 
                                     class="lazy account-thumb-image">
                            </div>
                            <div class="account-title">
                                <div class="text-title fw-700"><?=$title;?></div>
                            </div>
                            <div class="account-info c-mb-8">
                                <div class="info-attr">Đã chơi: <?=$luot;?></div>
                            </div>
                            <div class="price">
                                <div class="price-current w-100">
                                    <?=number_format($gia);?>đ
                                    <img onerror="imgError(this)" 
                                         src="//BLOXVN.NET/assets/frontend/theme_5/image/lock_money/bonus.png" 
                                         alt="bonus" class="image-bonus-lock">
                                </div>
                                <div class="price-old c-mr-8"><?=number_format($gia*3);?>đ</div>
                                <div class="discount"><?=$CMSNAV->site('giamgia');?></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="navigation slider-next"></div>
        <div class="navigation slider-prev"></div>
    </div>
</section>
<?php } ?>





<div class="c-pt-8 border-bottom-destop c-pt-lg-16"></div>
                                    <section class="news c-pt-32 c-pt-lg-24 c-mb-lg-6">
        <div class="section-header c-mb-24 c-mb-lg-24 justify-content-between">
            <h2 class="section-title">
                <i class="icon-title c-mr-8"
                    style="--path:url(https://bloxvn.net/assets/frontend/theme_5/image/png/speaker.png)"></i>
                Tin tức
            </h2>
            <a href="/tin-tuc" class="link arr-right">Xem thêm</a>
        </div>
        <!-- Desktop -->
        <div class="swiper js-swiper-news card-list d-none d-lg-block">
            <div class="swiper-wrapper">
                <?php foreach($CMSNAV->get_list("SELECT * FROM `blogs` WHERE `display` = 'SHOW' ") as $row) { ?>
                                    <div class="swiper-slide">
                        <div class="card news">
                            <a href="<?=BASE_URL('tin-tuc/'.$row['id']);?>" class="news-link scale-thumb">
                                <div class="card-body">
                                    <div class="news-thumb">
                                        <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                            data-src="<?=$row['img'];?>" alt="<?=$row['title'];?>"
                                            loading="lazy" width="200" height="120" class="lazy news-thumb-image">
                                    </div>
                                    <div>
                                        <div class="news-title c-mt-12 c-mb-4 text-limit limit-2 c_max-header-tin-tuc">
                                            <?=$row['title'];?> </div>
                                        <div class="datetime">
                                           <?=$row['time'];?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php }?>
                                    
                            </div>
            <div class="navigation slider-next"></div>
            <div class="navigation slider-prev"></div>
        </div>
        <!-- End Desktop -->
        <!-- Mobile -->
        <ul class="news-list d-block d-lg-none">
            <?php foreach($CMSNAV->get_list("SELECT * FROM `blogs` WHERE `display` = 'SHOW' ") as $row) { ?>
                            <li class="news-item">
                    <a href="<?=BASE_URL('tin-tuc/'.$row['id']);?>" class="news-link">
                        <div class="news-article">
                            <div class="article-thumb-wrap">
                                <div class="news-thumb">
                                    <img onerror="imgError(this)" src="<?=$CMSNAV->site('loader');?>"
                                        data-src="<?=$row['img'];?>" alt="img-news"
                                        class="lazy news-thumb-image">
                                </div>
                            </div>
                            <div class="news-info">
                                <div class="news-title text-limit limit-3 fz-lg-13 lh-lg-20 c-mb-4"><?=$row['title'];?>
                                </div>
                                <div class="datetime"><?=$row['time'];?></div>
                            </div>
                        </div>
                    </a>
                </li>
                <?php }?>
                           
                    </ul>
        <!-- End Mobile -->
    </section>
<div class=" mt-fix-20 c-container c-pb-24 c-pt-17 section-about">
    <div class="box-product c-mt-md-18">
        <div class="swiper-container  list-intro">
            <div class="swiper-wrapper">
                                    <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                        <div>
                            <div class="item-intro-img c-pt-16">
                                <img src="/assets/frontend1/theme_5/image/duong/intro1.svg"
                                    alt="intro1">
                            </div>
                            <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                                Sản phẩm, dịch vụ đa dạng, cập nhật thường xuyên
                            </div>
                            <div class="list-intro-content fz-13 fw-400">
                                Hệ thống luôn cung cấp, cập nhật những sản phẩm mới/hot nhất của các dòng game trên thị
                                trường.
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                        <div>
                            <div class="item-intro-img c-pt-16">
                                <img src="/assets/frontend1/theme_5/image/duong/intro2.svg"
                                    alt="intro2">
                            </div>
                            <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                                Hàng nghìn khách hàng tin tưởng
                            </div>
                            <div class="list-intro-content fz-13 fw-400">
                                Hơn 260.000 giao dịch thành công mỗi ngày. Chúng tôi luôn đặt uy tín, chất lượng dịch
                                vụ lên hàng đầu.
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                        <div>
                            <div class="item-intro-img c-pt-16">
                                <img src="/assets/frontend1/theme_5/image/duong/intro3.svg"
                                    alt="intro3">
                            </div>
                            <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                                Trung tâm trợ giúp hỗ trợ tư vấn 24/24
                            </div>
                            <div class="list-intro-content fz-13 fw-400">
                                Đội ngũ chăm sóc khách hàng luôn tư vấn và hỗ trợ nhiệt tình khi gặp sự cố trong quá
                                trình trải nghiệm sản phẩm.
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide item-about-us c-p-md-16 c-mr-16 h-auto">
                        <div>
                            <div class="item-intro-img c-pt-16">
                                <img src="/assets/frontend1/theme_5/image/duong/intro4.svg"
                                    alt="intro4">
                            </div>
                            <div class="list-intro-title list-intro-title-mobile fz-18 fw-500">
                                Giá cả ưu đãi, siêu rẻ trên thị trường
                            </div>
                            <div class="list-intro-content fz-13 fw-400">
                                Cung cấp những sản phẩm với giá cả tốt nhất cùng với đó là những ưu đãi vô cùng hấp dẫn.
                            </div>
                        </div>
                    </div>
                            </div>
        </div>
    </div>
</div>
                                    </div>
                                    

<script>
    window.saleHours = [<?php
        $arr = [];
        foreach($CMSNAV->get_list("SELECT * FROM `giosale` WHERE `status`='ON' ORDER BY gio ASC") as $row){
            $arr[] = $row['gio'];
        }
        echo implode(",", $arr);
    ?>];
</script>
<style>
    .video-wrapper {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 */
    border-radius: 12px;
    overflow: hidden;
}

.video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
/* Banner ảnh vẫn giữ nguyên */
.banner-slide .swiper-slide {
    position: relative;
    padding-bottom: 30%;
}

/* ❌ TẮT padding cho slide YouTube */
.banner-slide .swiper-slide.slide-youtube {
    padding-bottom: 0 !important;
}

/* Video chuẩn 16:9 */
.video-wrapper {
    position: relative;
    width: 100%;
    padding-top: 56.25%;
    border-radius: 12px;
    overflow: hidden;
}

.video-wrapper iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
}

</style>
<script src="/assets/frontend1/theme_5/js/countdown.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php 
    require_once(__DIR__."/public/client/Footer.php");
?>

