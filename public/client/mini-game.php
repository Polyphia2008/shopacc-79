<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Shop dịch vụ all game giá rẻ, uy tín, tự động. | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>

   <div class="layout">
        <div class="content" style="">
                <div class="container c-container" id="minigame-category">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mini-game" class="breadcrumb-link">minigame</a>
            </li>
        </ul>
        
        <div class="banner-slide swiper-general">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">
                            </div>
            <div class="navigation slider-next "></div>
            <div class="navigation slider-prev "></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
        
        <section class="section-category lien-quan">

    <div class="section-header c-mb-16 c-mb-lg-16">

        <h2 class="section-title fz-lg-18">
            Danh mục minigame
        </h2>
    </div>

           <div class="swiper class-config-account-viewed card-list">
            <div class="swiper-wrapper">
                                   

   

    
          
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
                    $url = BASE_URL('VongQuay/' . $game['id']);
                    $thumb = mini_game($game['id'], 'thumb');
                    $title = $game['name'];
                    $luot = $game['sudung'];
                    $gia = $game['price'];
                } else {
                    // Lật thẻ
                    $url = BASE_URL('LatThe/' . $game['id']);
                    $thumb = $game['imglatthe_thumb'];
                    $title = $game['title'];
                    $luot = $game['luotdaquay'];
                    $gia = $game['giatien'];
                }
            ?>
               <div class="swiper-slide">
                        <div class="item-category">
                            <div class="card h-100">
                                <a href="<?= $url ?>" class="card-body scale-thumb c-p-16 c-p-lg-12">
                                    <div class="account-thumb c-mb-8">
                                                                                    <img src="<?= $thumb ?>"
                                                alt="" class="account-thumb-image" loading="lazy"
                                                width="200" height="120">
                                                                            </div>
                                    <div class="account-title">
                                        <div class="text-title fw-700 text-limit limit-1"><?= $title ?></div>
                                    </div>
                                    <div class="account-info c-mb-8">
                                        <div class="info-attr">
                                          Đã Chơi: <?= $luot ?>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-current w-100">
                                            <?=number_format($gia);?>đ</div>
                                                                                    <div class="price-old c-mr-8">
                                               <?=number_format($gia*3);?>đ
                                            </div>
                                                                                                                            <div class="discount">
                                               <?=$CMSNAV->site('giamgia');?>
                                           </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>
</section>

<?php 
    require_once("../../public/client/Footer.php");
?>
